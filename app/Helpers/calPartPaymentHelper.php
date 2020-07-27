<?php

namespace App\Helpers;



class calPartPaymentHelper
{
    //$type: 1.existing emi 2.revised emi

    public function __construct($partPayment,$existingroi,$existingTenure,$existingOutstanding,$type)
    {

        $this->partPayment=$partPayment;
        $this->existingroi=$existingroi;
        $this->existingTenure=$existingTenure;
        $this->existingOutstanding=$existingOutstanding;
        $this->type=$type;


    }

    public function calculatePartPayment()
    {

        $error='';
        $error.=empty($this->partPayment) ? 'Part Payment' :'';
        $error.=empty($this->existingroi) ? (!empty($error)? ',':'').' Existing ROI' : '';
        $error.=empty($this->existingTenure) ? (!empty($error)? ',':'').' Existing Trnure' : '';
        $error.=empty($this->existingOutstanding) ? (!empty($error)? ',':'').' Existing Outstanding' : '';
        $error.=empty($this->type) ? (!empty($error)? ',':'').' Type' : '';
        $error.=!empty($error) ? ' Can not be empty' : '';
        if(empty($error)){

          $revisedOutStanding=$this->getRevisedOutstanding();
          $revisedEmi=$this->getRevisedEMI();
          $revisedTenure=$this->getRevisedTenure();
          return array('revisedOutStanding'=>number_format(round($revisedOutStanding),0),'revisedEmi'=>number_format(round($revisedEmi),0),'revisedTenure'=>$revisedTenure);

        }
        return array('error'=>$error);

    }
    public function getRevisedOutstanding(){

      return $this->existingOutstanding-$this->partPayment;
    }

    public function getExistingEMI(){

        $calPMTHelper= new calPMTHelper();
        return $calPMTHelper->calPmt($this->existingroi, $this->existingTenure, $this->existingOutstanding);
    }
    public function getRevisedEMI(){

        if($this->type=='revised emi'){
            $revisedOutstanding=$this->getRevisedOutstanding();
            $calPMTHelper= new calPMTHelper();
            return $calPMTHelper->calPmt($this->existingroi, $this->existingTenure, $revisedOutstanding);
        }
        return $this->getExistingEMI();
    }
    public function getRevisedTenure(){

        $calPMTHelper= new AmortizationHelper();

        $schedule=$calPMTHelper->getAmortizationTbl($this->getRevisedOutstanding(),$this->existingroi,$this->getRevisedEMI());
        return $schedule['month'];

    }


}

?>
