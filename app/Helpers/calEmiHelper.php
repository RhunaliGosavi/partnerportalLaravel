<?php

namespace App\Helpers;

use App\CalculatorPolicy;

class calEmiHelper
{
    //$policyFOIR,$policyROI,$expectedROI in percentage
    public function calculateEMI($roi,$loanTenure,$loanAmount) 
    {
       
        $error='';
        $error.=empty($roi) ? 'Ret Of Interest' :'';
        $error.=empty($loanTenure) ? (!empty($error)? ',':'').' Loan Tenure' : '';
        $error.=empty($loanAmount) ? (!empty($error)? ',':'').' Loan Amount' : '';
        $error.=!empty($error) ? ' Can not be empty' : '';
       if(empty($error)){
            $Emi=round($this->getEmi($roi,$loanTenure,$loanAmount));
            return array('Emi'=>$Emi);
        }
        return array('error'=>$error);
      
    } 

    public function getEmi($roi,$loanTenure,$loanAmount){
      $calPMTHelper= new calPMTHelper();
      return $calPMTHelper->calPmt($roi,$loanTenure,$loanAmount);
    }

   
        
}

?>