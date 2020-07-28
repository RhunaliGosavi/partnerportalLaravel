<?php

namespace App\Helpers;

use Illuminate\Support\Facades\DB;

class calBalanceTransferHelper
{
    //preference:1.existing_emi_change_in_tenure 2.flexi_loan_tenure 3.existing_tenure_change_in_emi
    //proposedTenure:"Choose your Tenor

    public function __construct($existingOutstanding,$costOnBtRequest,$preferenceType,$existingRoi,$proposedTenure,$proposedRoi,$balaceTenure)
    {

        $this->existingOutstanding=$existingOutstanding;
        $this->costOnBtRequest=$costOnBtRequest;
        $this->preferenceType=$preferenceType;
        $this->existingRoi=$existingRoi;
        $this->proposedTenure=$proposedTenure;
        $this->proposedRoi=$proposedRoi;
        $this->balaceTenure=$balaceTenure;

    }

    public function calculateBalanceTransfer()
    {

        $error='';
        $error.=empty($this->existingOutstanding) ? 'Existing outstanding' :'';
        $error.=empty($this->costOnBtRequest) ? (!empty($error)? ',':'').' Cost on BT request' : '';
        $error.=empty($this->preferenceType) ? (!empty($error)? ',':'').' Prference' : '';
        $error.=empty($this->existingRoi) ? (!empty($error)? ',':'').' Existing ROI' : '';
        $error.=empty($this->proposedTenure) ? (!empty($error)? ',':'').' Proposed tenure' : '';
        $error.=empty($this->balaceTenure) ? (!empty($error)? ',':'').' Balance tenure' : '';
        $error.=!empty($error) ? ' Can not be empty' : '';
       if(empty($error)){
             $revised_outstanding=$this->getRevisedOutstanding();
             $revised_emi=$this->getRevisedEmi();
             $revisedTenure=$this->getRevisedTenure();

            return array('Revised_outstanding'=> number_format(round($revised_outstanding),0),'Revised_EMI'=>number_format(round($revised_emi),0),'revised_tenure'=> $revisedTenure);

        }
        return array('error'=>$error);

    }
    public function getRevisedOutstanding(){
        return $this->existingOutstanding +$this->costOnBtRequest;

    }
    public function getRevisedEmi(){
        if($this->preferenceType=="existing_emi_change_in_tenure"){
            return $this->getExistingEmi();
        }
        $calPMTHelper= new calPMTHelper();
        return $calPMTHelper->calPmt($this->proposedRoi,$this->proposedTenure,$this->getRevisedOutstanding());


    }
     public function getExistingEmi(){
        $calPMTHelper= new calPMTHelper();
        return $calPMTHelper->calPmt($this->existingRoi,$this->balaceTenure,$this->existingOutstanding);

     }
    public function getRevisedTenure(){
        ini_set('max_execution_time', 0);
        if( $this->preferenceType=='existing_emi_change_in_tenure' || $this->preferenceType=='existing_tenure_change_in_emi'){
            $calPMTHelper= new AmortizationHelper();
            //$amount,$rate,$emi
            if($this->preferenceType=='existing_emi_change_in_tenure'){
                 $schedule=$calPMTHelper->getAmortizationTbl($this->getRevisedOutstanding(),$this->proposedRoi,$this->getRevisedEmi());
            }
            if($this->preferenceType=='existing_tenure_change_in_emi'){
                $schedule=$calPMTHelper->getAmortizationTbl($this->existingOutstanding,$this->existingRoi,$this->getExistingEmi());
            }
            if($this->preferenceType!='existing_tenure_change_in_emi' && $schedule['month']==0){
               return 'Select Preference A or C';
            }
            return $schedule['month'];
        }

        if($this->preferenceType=='flexi_loan_tenure'){
           return $this->proposedTenure;
        }

    }


}

?>
