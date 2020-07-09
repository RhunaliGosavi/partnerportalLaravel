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
            return array('Emi'=>$Emi);
        }
        return array('error'=>$error);
      
    } 

    public function getEmi(){
      $calPMTHelper= new calPMTHelper();
      return $calPMTHelper->calPmt($this->roi,$this->loanTenure,$this->loanAmount);
    }

   
        
}

?>