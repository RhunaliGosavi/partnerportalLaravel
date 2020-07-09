<?php
namespace App\Helpers;
use App\CalculatorPolicy;
class calLoanAgainstPropertyHelper
{
     public function __construct($roi,$loanTenure,$monthlyIncome,$monthlyObligation,$expectedLoanAmount,$propertyValue)
    {
     
        $this->roi=$roi;
        $this->loanTenure=$loanTenure;
        $this->monthlyIncome=$monthlyIncome;
        $this->monthlyObligation=$monthlyObligation;
        $this->expectedLoanAmount=$expectedLoanAmount;
        $this->propertyValue=$propertyValue;
    }
    

   public function calLoanAgainstPropert(){
     $calData=CalculatorPolicy::first();
     $error='';
     $error.=empty($this->roi) ? 'Rate Of Interest' :'';
     $error.=empty($this->monthlyIncome) ?  (!empty($error)? ',':'').' Monthly Income' :'';
     $error.=empty($this->monthlyObligation) ? (!empty($error)? ',':'').' Obligation' : '';
     $error.=empty($this->loanTenure) ? (!empty($error)? ',':'').' Loan Tenure' : '';
     $error.=empty($this->expectedLoanAmount) ? (!empty($error)? ',':'').' Expected Loan Amount' : '';
     $error.=empty($this->propertyValue) ? (!empty($error)? ',':'').' Property Value' : '';
     $error.=empty($calData) ? (!empty($error)? ',':'').'FORI or LTV' : '';
     $error.=!empty($error) ? ' Can not be empty' : '';
     if(empty($error)){
        $policyFOIR= $calData->loan_against_property_fori;
        $policyLTV= $calData->loan_against_property_ltv;
        $loanAmt= round($this->getLoanAmount($policyFOIR));
        $EMI=round($this->getEmi($loanAmt));
        $desiredEmi=round($this->getDesiredEMI());
        $desiredFOIR=round($this->getDesiredFOIR($policyFOIR));
        $desiredLtv=round($this->getDesiredLTV($policyLTV));
        return array('LoanAmt'=>$loanAmt,'EMI'=>$EMI,'DesiredEmi'=>$desiredEmi,'DesiredFOIR'=>$desiredFOIR,'DesiredLTV'=>$desiredLtv);
     }
     return array('error'=>$error);

   }
   public function getLoanAmount($policyFOIR){
        $emiFactor=$this->getPolicyEmiFactor();
        $maxEmi=$this->policyMaxEmi($policyFOIR);
        return ($maxEmi / $emiFactor) * 100000;	


   }
   public function getPolicyEmiFactor(){
        $calPMTHelper= new calPMTHelper();
        return $calPMTHelper->calPmt($this->roi,$this->loanTenure,100000);

   }
   public function policyMaxEmi($policyFOIR){
        $policyFOIR=$policyFOIR/100;
        return  ($this->monthlyIncome*$policyFOIR) - $this->monthlyObligation;	
   }

   public function getEmi($loanAmt){
        $calPMTHelper= new calPMTHelper();
        return $calPMTHelper->calPmt($this->roi,$this->loanTenure,$loanAmt);
   }

   public function getDesiredEMI(){
        $calPMTHelper= new calPMTHelper();
        return $calPMTHelper->calPmt($this->roi,$this->loanTenure, $this->expectedLoanAmount);	
   }
   public function getDesiredFOIR($policyFOIR){
        $foirDeviation=$this->getFOIRDeviation();
        return $foirDeviation - $policyFOIR;

   }
   public function getFOIRDeviation(){

        $desirefEmi=$this->getDesiredEMI();
        return (($desirefEmi + $this->monthlyObligation)/$this->monthlyIncome)*100;	

   }
   public function getDesiredLTV($policyLTV){
        $ltvDev=$this->getLtvDeviation();
        return $ltvDev-$policyLTV;

   }
   public function getLtvDeviation(){
        return ($this->expectedLoanAmount/$this->propertyValue)*100;

  }

}
?>