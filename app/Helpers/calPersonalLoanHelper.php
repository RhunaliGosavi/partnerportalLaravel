<?php

namespace App\Helpers;

use App\CalculatorPolicy;

class calPersonalLoanHelper
{
    //$policyFOIR,$policyROI,$expectedROI in percentage
    public function __construct($monthlyIncome,$obligation,$loanTenure,$expectedROI)
    {
     
        $this->monthlyIncome=$monthlyIncome;
        $this->obligation=$obligation;
        $this->loanTenure=$loanTenure;
        $this->expectedROI=$expectedROI;
       
    }
    
    public function calculatePersonalLoan() 
    {
        $calData=CalculatorPolicy::first();
        $error='';
        $error.=empty($this->monthlyIncome) ? 'Monthly income' :'';
        $error.=empty($this->obligation) ? (!empty($error)? ',':'').' Obligation' : '';
        $error.=empty($this->loanTenure) ? (!empty($error)? ',':'').' Loan Tenure' : '';
        $error.=empty($this->expectedROI) ? (!empty($error)? ',':'').' Expected ROI' : '';
        $error.=empty($calData) ? (!empty($error)? ',':'').' Personal loan FORI or ROI' : '';
        $error.=!empty($error) ? ' Can not be empty' : '';
       if(empty($error)){
            $policyFOIR= $calData->personal_loan_fori;
            $policyROI= $calData->personal_loan_roi;
            $applicableLoanAmt=$this->getApplicableLoadAmt($policyFOIR,$policyROI);
            $applicableEMI=$this->getApplicableEmi($policyFOIR);
            $desiredEMI=$this->getDesiredEMI();
            $desiredFOIR=round($this->getDesiredFOIR($policyFOIR));
            $desiredROI= $this->getDesiredROI($policyROI);

            return array('ApplicableAmt'=>$applicableLoanAmt,'ApplicableEMI'=>$applicableEMI,'DesiredEmai'=>$desiredEMI,'DesiredFOIR'=>$desiredFOIR,'DesiredROI'=>$desiredROI);
        }
        return array('error'=>$error);
      
    } 
    public function getApplicableLoadAmt($policyFOIR,$policyROI){

        $applicableEMI=$this->getApplicableEmi($policyFOIR);
        $policyEmiFactor=$this->getPolicyEMIFactor($policyROI);
        $appLoanAmount= ($applicableEMI/$policyEmiFactor)*100000;
        return $appLoanAmount;
    }
    public function getApplicableEmi($policyFOIR){
       $policyFOIR=$policyFOIR/100;
       return ($this->monthlyIncome*$policyFOIR) - $this->obligation;
    }
    public function getPolicyEMIFactor($policyROI){
      $calPMTHelper= new calPMTHelper();
      return $calPMTHelper->calPmt($policyROI,$this->loanTenure,100000);

    }
    public function getDesiredEMI(){

        $calPMTHelper= new calPMTHelper();
        return $calPMTHelper->calPmt($this->expectedROI,$this->loanTenure,1000000);
    }

    public function getDesiredFOIR($policyFOIR){
        $policyFOIR=$policyFOIR/100;
        $desEMI=$this->getDesiredEMI();
        return ((($desEMI+$this->obligation)/$this->monthlyIncome) - $policyFOIR)*100;
    }

    public function getDesiredROI($policyROI){

       return $this->expectedROI-$policyROI;
    }
        
}

?>