<?php
namespace App\Helpers;

use Illuminate\Support\Facades\DB;

class calCollectionIncentiveHelper
{    //$type: preference,pick up
    //$bucketTYpe: 1.bkt1,bkt2,bkt3,bkt4
    public function __construct($type,$emiCollect,$noOfCases,$bucketTYpe,$rollback,$posOd,$posForOdCollected)
    {
       $this->type=$type;
       $this->emiCollect=$emiCollect;
       $this->noOfCases=$noOfCases;
       $this->bucketTYpe=$bucketTYpe;
       $this->rollback=$rollback;
       $this->posOd=$posOd;
       $this->posForOdCollected=$posForOdCollected;

    }

    public function calculateCollectionIncentive(){
        $error='';
        $error.=empty($this->type) ? 'Type' :'';
        $error.=($this->type=='pick up' && empty($this->emiCollect)) ? (!empty($error)? ',':'').' EMI collect' : '';
        $error.=($this->type=='pick up' && empty($this->noOfCases) )? (!empty($error)? ',':'').' No of cases' : '';
        $error.=($this->type=='preference' && empty($this->bucketTYpe)) ? (!empty($error)? ',':'').' Bucket type' : '';
        $error.=($this->type=='preference' && empty($this->rollback)) ? (!empty($error)? ',':'').' Rollback' : '';
        $error.=($this->type=='preference' && empty($this->posOd)) ? (!empty($error)? ',':'').' POS OD' : '';
        $error.=($this->type=='preference' && empty($this->posForOdCollected)) ? (!empty($error)? ',':'').' POS for OD collected' : '';
        $error.=!empty($error) ? ' Can not be empty' : '';
       if(empty($error)){
             return ($this->type=='pick up') ? $this->getPickUpDetails() : $this->getReferenceDetails();
        }
       return array('error'=>$error);

    }
    public function getPickUpDetails(){
        $archieved=($this->emiCollect/$this->noOfCases)*100;
        $incentivePerCase=$this->getIncentiveCase($archieved);
        return array('archieved'=>round($archieved),'incentivePerCase'=>round($incentivePerCase));

    }
    public function getIncentiveCase($archieved){

        switch($archieved){

            case $archieved>90:
                $case=300;
                break;
            case ($archieved > 85  && $archieved<= 90):
                $case=250;
                break;
            case ($archieved > 80  && $archieved<= 85):
                $case=225;
                break;
            default:
                $case=200;

        }
      return $case;

    }

    public function getReferenceDetails(){
        $getResult=($this->bucketTYpe =="bkt1")?  $this->getbucketOne() :$this->getbucketTwo_three_four();
        return $getResult;

    }
    public function getbucketOne()
    {
        $rollback=($this->rollback/ $this->posOd)*100;
        $resolution=($this->posForOdCollected/$this->posOd)*100;

        $comm = DB::table('collection_incentive')->select("bkt1")
        ->whereRaw("CASE WHEN min_resolution = 0  THEN  $resolution < max_resolution WHEN max_resolution = 0  THEN $resolution > min_resolution WHEN max_resolution !=0 and min_resolution!=0 THEN $resolution > min_resolution and $resolution <=max_resolution END and type='bkt1'")
        ->get();

        if(empty($comm->toArray())){
            return array('rollback'=>$rollback,'resolution'=>$resolution,'comission'=>0,'incentiveAmount'=>0);
        }
        $comission=$comm[0]->bkt1;
        $incentiveAmount= ($comission*$this->rollback)/100;

        return array('rollback'=>round($rollback),'resolution'=>round($resolution),'comission'=>round($comission),'incentiveAmount'=>$incentiveAmount);

    }
    public function getbucketTwo_three_four()
    {

        $rollback=($this->rollback/ $this->posOd)*100;
        $resolution=($this->posForOdCollected/$this->posOd)*100;

        $bktType=($this->bucketTYpe=='bkt2'|| $this->bucketTYpe=='bkt3') ? 'bkt2_bkt3' : $this->bucketTYpe;
        $comm = DB::table('collection_incentive')->select('bkt2','bkt3','bkt4')
        ->whereRaw("CASE WHEN max_resolution = 0 and max_rollback != 0 and min_rollback != 0   THEN $rollback >=min_rollback and $rollback <=max_rollback and  $resolution >=min_resolution  WHEN max_resolution = 0 and max_rollback = 0   THEN $rollback >=min_rollback and  $resolution >=min_resolution   WHEN max_rollback = 0 THEN $rollback >=min_rollback  and $resolution BETWEEN min_resolution and max_resolution  WHEN max_resolution = 0 and min_rollback = 0   THEN $rollback <=max_rollback and  $resolution >=min_resolution WHEN min_rollback = 0 THEN $rollback <=max_rollback  and $resolution BETWEEN min_resolution and max_resolution  WHEN  max_rollback != 0 and min_rollback != 0  THEN $rollback >=min_rollback and $rollback <=max_rollback and $resolution BETWEEN min_resolution and max_resolution  END and type='$bktType'")
        ->get();


        if(empty($comm->toArray())){
            return array('rollback'=>$rollback,'resolution'=>$resolution,'comission'=>0,'incentiveAmount'=>0);
        }
        $comission=($this->bucketTYpe=='bkt2') ? $comm[0]->bkt2 :(($this->bucketTYpe=='bkt3') ? $comm[0]->bkt3 :$comm[0]->bkt4);

        $incentiveAmount= ($comission*$this->rollback)/100;

        return array('rollback'=>round($rollback),'resolution'=>round($resolution),'comission'=>$comission,'incentiveAmount'=>$incentiveAmount);

    }


}
?>
