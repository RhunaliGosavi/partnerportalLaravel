<?php
namespace App\Helpers;

class calCollectionIncentiveHelper
{    //$type: preference,pick up
    //$bucketTYpe: 1.bucket1,bucket2,bucket3,bucket4
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
        $error.=empty($this->emiCollect) ? (!empty($error)? ',':'').' EMI collect' : '';
        $error.=empty($this->noOfCases) ? (!empty($error)? ',':'').' No of cases' : '';
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
        return array('archieved'=>$archieved,'incentivePerCase'=>$incentivePerCase);

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

        switch($this->bucketTYpe){

            case 'bucket1':
                $getResult=$this->getbucketOne();
                break;
            case 'bucket2':
                $getResult=$this->getbucketTwo();
                break;
            case 'bucket3':
                $getResult=$this->getbucketThree();
                break;
            case 'bucket4':
                $getResult=$this->getbucketFour();
                break;
          
        }
        return $getResult;
        
    }
    public function getbucketOne()
    {
        $rollback=($this->rollback/ $this->posOd)*100;
        $resolution=($this->posForOdCollected/$this->posOd)*100;
        switch($resolution){
            case $resolution > 85:
                $comission=8.5;
                break;
            case  $resolution > 80 :
                $comission=8.0;
                break;
            case $resolution > 75 :
                $comission= 7.5;
                break;
            case $resolution > 70:
                $comission= 7.0;
                break;
            case $resolution >= 65:
                $comission=  6.5;
                break;

            default:
                $comission=6;
        }
        $incentiveAmount= ($comission*$this->rollback)/100;
       
        return array('rollback'=>$rollback,'resolution'=>$resolution,'comission'=>round($comission),'incentiveAmount'=>$incentiveAmount);
        
    }
    public function getbucketTwo()
    {
        
    }
    public function getbucketThree()
    {
        
    }
    public function getbucketFour()
    {
        
    }

}
?>