<?php

namespace App\Helpers;

class calRepricingHelper
{
//$type: 1.part payment 2.change in emi  3.change in tenure
    public function __construct($type,$existingOutstanding,$proposedROI,$balanceTenure,$existingROI)
    {

        $this->type=$type;
        $this->existingOutstanding=$existingOutstanding;
       
        $this->proposedROI=$proposedROI;
        $this->balanceTenure=$balanceTenure;
        $this->existingROI=$existingROI;
    }

    public function calculateRepricing()
    {
        $error='';
        $error.=empty($this->type) ? 'Type' :'';
        $error.=empty($this->existingOutstanding) ? (!empty($error)? ',':'').' Existing Outstanding' : '';

        $error.=empty($this->proposedROI) ? (!empty($error)? ',':'').' Proposed ROI' : '';
        $error.=empty($this->balanceTenure) ? (!empty($error)? ',':'').' Balance Tenure' : '';
        $error.=!empty($error) ? ' Can not be empty' : '';
        if(empty($error)){

          $revisedOutStanding=$this->getRevisedOutstanding();
          $revisedEMI=$this->getRevisedEMI();
          $revisedTenure=$this->getRevisedTenure();
          return array('revisedOutStanding'=>number_format(round($revisedOutStanding),0),'revisedEMI'=>number_format(round($revisedEMI),0),'revisedTenure'=>$revisedTenure);
        }
        return array('error'=>$error);
    }
    public function getRevisedOutstanding(){

        if($this->type=='part payment'){
            $partPaid=$this->getPartPaidAmount();
            return $this->existingOutstanding-$partPaid;
         }
        return $this->existingOutstanding;

    }

    public function getPartPaidAmount(){

        if($this->type=='part payment'){
            $calPVHelper=new calPVHelper;
            $pv=$calPVHelper->getPV($this->proposedROI,$this->balanceTenure,$this->getExistingEMI());
            return $this->existingOutstanding-$pv;
        }
      return 0;

   }
    public function getRevisedEMI(){
       if($this->type=='part payment' || $this->type=='change in tenure'){
          return $this->getExistingEMI();
       }
       $calPMTHelper= new calPMTHelper();
       return $calPMTHelper->calPmt($this->proposedROI, $this->balanceTenure, $this->existingOutstanding);
    }
    public function getExistingEMI(){
        $calPMTHelper= new calPMTHelper();
        return $calPMTHelper->calPmt($this->existingROI, $this->balanceTenure, $this->existingOutstanding);

    }
    public function getRevisedTenure(){

        $calPMTHelper= new AmortizationHelper();

        $schedule=$calPMTHelper->getAmortizationTbl($this->getRevisedOutstanding(),$this->proposedROI,$this->getRevisedEMI());
        if($schedule['month']==0 && $this->type=='change in tenure'){ return "Please Select Option A or C";}
        return $schedule['month'];
    }


}

?>
