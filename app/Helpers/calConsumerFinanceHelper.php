<?php

namespace App\Helpers;

use App\CalculatorPolicy;

class calConsumerFinanceHelper
{

    public function __construct($roi,$loanTenure,$loanAmount,$advancedEMI)
    {

        $this->roi=$roi;
        $this->loanTenure=$loanTenure;
        $this->loanAmount=$loanAmount;
        $this->advancedEMI=$advancedEMI;

    }

    //$policyFOIR,$policyROI,$expectedROI in percentage
    public function calculateConsumerFinance()
    {

        $error='';
        $error.=empty($this->roi) ? 'Ret Of Interest' :'';
        $error.=empty($this->loanTenure) ? (!empty($error)? ',':'').' Loan Tenure' : '';
        $error.=empty($this->loanAmount) ? (!empty($error)? ',':'').' Loan Amount' : '';
        $error.=empty($this->advancedEMI) ? (!empty($error)? ',':'').' Advance EMI' : '';
        $error.=!empty($error) ? ' Can not be empty' : '';
       if(empty($error)){
            $Emi=round($this->getEmi());
            $advancedEmi=round($this->getAdvancedEmi());
            $netLoan=round($this->getNetLoan());

            return array('Emi'=>$Emi,'AdvancedEMI'=>$advancedEmi,'NetLoan'=>$netLoan);
        }
        return array('error'=>$error);

    }

    public function getEmi(){
      $calPMTHelper= new calPMTHelper();
      return $calPMTHelper->calPmt($this->roi,$this->loanTenure,$this->loanAmount);
    }

    public function getAdvancedEmi(){
        $emi=$this->getEmi();
        return  $emi*$this->advancedEMI;
    }
    public function getNetLoan(){

        $advemi=$this->getAdvancedEmi();
        return $this->loanAmount - $advemi;
   }


}

?>
