<?php

namespace App\Helpers;

use App\CalculatorPolicy;

class calEmiHelper
{
    //$policyFOIR,$policyROI,$expectedROI in percentage
    public function __construct($roi,$loanTenure,$loanAmount)
    {

        $this->roi=$roi;
        $this->loanTenure=$loanTenure;
        $this->loanAmount=$loanAmount;

    }

    public function calculateEMI()
    {

        $error='';
        $error.=empty($this->roi) ? 'Ret Of Interest' :'';
        $error.=empty($this->loanTenure) ? (!empty($error)? ',':'').' Loan Tenure' : '';
        $error.=empty($this->loanAmount) ? (!empty($error)? ',':'').' Loan Amount' : '';
        $error.=!empty($error) ? ' Can not be empty' : '';
       if(empty($error)){
            $Emi=round($this->getEmi());
            $interestPiad=$this->gerInterestPaid();
            $totalOutFlow=$this->getTotalOutflow();
            return array('Emi'=>number_format($Emi,0),'intetest_paid'=>number_format(round($interestPiad),0),'total_overflow'=>number_format(round($totalOutFlow),0));
        }
        return array('error'=>$error);

    }

    public function getEmi(){
      $calPMTHelper= new calPMTHelper();
      return $calPMTHelper->calPmt($this->roi,$this->loanTenure,$this->loanAmount);
    }
    public function gerInterestPaid(){
        $calPMTHelper= new AmortizationHelper();
        //$amount,$rate,$emi
        $schedule=$calPMTHelper->getAmortizationTbl($this->loanAmount,$this->roi,$this->getEmi());
        return $schedule['sum_interest'];

    }
    public function getTotalOutflow(){
        $calPMTHelper= new AmortizationHelper();
        //$amount,$rate,$emi
        $schedule=$calPMTHelper->getAmortizationTbl($this->loanAmount,$this->roi,$this->getEmi());

        return $schedule['sum_interest'] + $schedule['sum_principal'];


    }



}

?>
