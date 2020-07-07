<?php

namespace App\Helpers;

use App\CalculatorPolicy;

class calConsumerFinanceHelper
{
    //$policyFOIR,$policyROI,$expectedROI in percentage
    public function calculateConsumerFinance($roi,$loanTenure,$loanAmount,$advancedEMI) 
    {
       
        $error='';
        $error.=empty($roi) ? 'Ret Of Interest' :'';
        $error.=empty($loanTenure) ? (!empty($error)? ',':'').' Loan Tenure' : '';
        $error.=empty($loanAmount) ? (!empty($error)? ',':'').' Loan Amount' : '';
        $error.=empty($advancedEMI) ? (!empty($error)? ',':'').' Advance EMI' : '';
        $error.=!empty($error) ? ' Can not be empty' : '';
       if(empty($error)){
            $Emi=round($this->getEmi($roi,$loanTenure,$loanAmount));
            $advancedEmi=round($this->getAdvancedEmi($roi,$loanTenure,$loanAmount,$advancedEMI));
            $netLoan=round($this->getNetLoan($roi,$loanTenure,$loanAmount,$advancedEMI));

            return array('Emi'=>$Emi,'AdvancedEMI'=>$advancedEmi,'NetLoan'=>$netLoan);
        }
        return array('error'=>$error);
      
    } 

    public function getEmi($roi,$loanTenure,$loanAmount){
      $calPMTHelper= new calPMTHelper();
      return $calPMTHelper->calPmt($roi,$loanTenure,$loanAmount);
    }

    public function getAdvancedEmi($roi,$loanTenure,$loanAmount,$advancedEMI){
        $emi=$this->getEmi($roi,$loanTenure,$loanAmount);
        return  $emi*$advancedEMI;
    }
    public function getNetLoan($roi,$loanTenure,$loanAmount,$advancedEMI){

        $advemi=$this->getAdvancedEmi($roi,$loanTenure,$loanAmount,$advancedEMI);
        return $loanAmount - $advemi;
   }
   
        
}

?>