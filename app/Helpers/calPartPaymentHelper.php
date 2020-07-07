<?php

namespace App\Helpers;



class calPartPaymentHelper
{
    //$type: 1.existing emi 2.revised emi
    public function calculatePartPayment($partPayment,$existingroi,$existingTenure,$existingOutstanding,$type) 
    {
      
        $error='';
        $error.=empty($partPayment) ? 'Part Payment' :'';
        $error.=empty($existingroi) ? (!empty($error)? ',':'').' Existing ROI' : '';
        $error.=empty($existingTenure) ? (!empty($error)? ',':'').' Existing Trnure' : '';
        $error.=empty($existingOutstanding) ? (!empty($error)? ',':'').' Existing Outstanding' : '';
        $error.=empty($type) ? (!empty($error)? ',':'').' Type' : '';
        $error.=!empty($error) ? ' Can not be empty' : '';
        if(empty($error)){
        
          $revisedOutStanding=$this->getRevisedOutstanding($partPayment,$existingOutstanding);
          $revisedEmi=$this->getRevisedEMI($type,$existingroi,$existingTenure,$existingOutstanding,$partPayment);
          $revisedTenure=$this->getRevisedTenure();
          return array('revisedOutStanding'=>$revisedOutStanding,'revisedEmi'=>$revisedEmi,'revisedTenure'=>$revisedTenure);

        }
        return array('error'=>$error);
      
    } 
    public function getRevisedOutstanding($partPayment,$existingOutstanding){
      
      return $existingOutstanding-$partPayment;
    }

    public function getExistingEMI($existingroi,$existingTenure,$existingOutstanding){
      	
        $calPMTHelper= new calPMTHelper();
        return $calPMTHelper->calPmt($existingroi, $existingTenure, $existingOutstanding);		
    }
    public function getRevisedEMI($type,$existingroi,$existingTenure,$existingOutstanding,$partPayment){

        if($type=='revised emi'){
            $revisedOutstanding=$this->getRevisedOutstanding($partPayment,$existingOutstanding);
            $calPMTHelper= new calPMTHelper();
            return $calPMTHelper->calPmt($existingroi, $existingTenure, $revisedOutstanding);	
        }
        return $this->getExistingEMI($existingroi,$existingTenure,$existingOutstanding);
    }
    public function getRevisedTenure(){


    }


}

?>