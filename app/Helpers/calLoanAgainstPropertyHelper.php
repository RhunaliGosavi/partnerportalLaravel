<?php
namespace App\Helpers;
use App\CalculatorPolicy;
class calLoanAgainstPropertyHelper
{

   public function calLoanAgainstPropert($roi,$loanTenure,$monthlyIncome,$monthlyObligation,$expectedLoanAmount,$propertyValue){
     $calData=CalculatorPolicy::first();
     $error='';
     $error.=empty($roi) ? 'Rate Of Interest' :'';
     $error.=empty($monthlyIncome) ?  (!empty($error)? ',':'').' Monthly Income' :'';
     $error.=empty($monthlyObligation) ? (!empty($error)? ',':'').' Obligation' : '';
     $error.=empty($loanTenure) ? (!empty($error)? ',':'').' Loan Tenure' : '';
     $error.=empty($expectedLoanAmount) ? (!empty($error)? ',':'').' Expected Loan Amount' : '';
     $error.=empty($propertyValue) ? (!empty($error)? ',':'').' Property Value' : '';
     $error.=empty($calData) ? (!empty($error)? ',':'').'FORI or LTV' : '';
     $error.=!empty($error) ? ' Can not be empty' : '';
     if(empty($error)){
        $policyFOIR= $calData->loan_against_property_fori;
        $policyLTV= $calData->loan_against_property_ltv;
        $loanAmt= round($this->getLoanAmount($roi,$loanTenure,$monthlyIncome,$policyFOIR,$monthlyObligation));
        $EMI=round($this->getEmi($roi,$loanTenure,$loanAmt));
        $desiredEmi=round($this->getDesiredEMI($roi,$loanTenure,$expectedLoanAmount));
        $desiredFOIR=round($this->getDesiredFOIR($policyFOIR,$monthlyObligation,$monthlyIncome,$roi,$loanTenure,$expectedLoanAmount));
        $desiredLtv=round($this->getDesiredLTV($expectedLoanAmount,$propertyValue,$policyLTV));
        return array('LoanAmt'=>$loanAmt,'EMI'=>$EMI,'DesiredEmi'=>$desiredEmi,'DesiredFOIR'=>$desiredFOIR,'DesiredLTV'=>$desiredLtv);
     }
     return array('error'=>$error);

   }
   public function getLoanAmount($roi,$loanTenure,$monthlyIncome,$policyFOIR,$monthlyObligation){
        $emiFactor=$this->getPolicyEmiFactor($roi,$loanTenure);
        $maxEmi=$this->policyMaxEmi($monthlyIncome,$policyFOIR,$monthlyObligation);
        return ($maxEmi / $emiFactor) * 100000;	


   }
   public function getPolicyEmiFactor($roi,$loanTenure){
        $calPMTHelper= new calPMTHelper();
        return $calPMTHelper->calPmt($roi,$loanTenure,100000);

   }
   public function policyMaxEmi($monthlyIncome,$policyFOIR,$monthlyObligation){
        $policyFOIR=$policyFOIR/100;
        return  ($monthlyIncome*$policyFOIR) - $monthlyObligation;	
   }

   public function getEmi($roi,$loanTenure,$loanAmt){
        $calPMTHelper= new calPMTHelper();
        return $calPMTHelper->calPmt($roi,$loanTenure,$loanAmt);
   }

   public function getDesiredEMI($roi,$loanTenure,$expectedLoanAmount){
        $calPMTHelper= new calPMTHelper();
        return $calPMTHelper->calPmt($roi,$loanTenure, $expectedLoanAmount);	
   }
   public function getDesiredFOIR($policyFOIR,$monthlyObligation,$monthlyIncome,$roi,$loanTenure,$expectedLoanAmount){
        $foirDeviation=$this->getFOIRDeviation($monthlyObligation,$monthlyIncome,$roi,$loanTenure,$expectedLoanAmount);
        return $foirDeviation - $policyFOIR;

   }
   public function getFOIRDeviation($monthlyObligation,$monthlyIncome,$roi,$loanTenure,$expectedLoanAmount){

        $desirefEmi=$this->getDesiredEMI($roi,$loanTenure,$expectedLoanAmount);
        return (($desirefEmi + $monthlyObligation)/$monthlyIncome)*100;	

   }
   public function getDesiredLTV($expectedLoanAmount,$propertyValue,$policyLTV){
        $ltvDev=$this->getLtvDeviation($expectedLoanAmount,$propertyValue);
        return $ltvDev-$policyLTV;

   }
   public function getLtvDeviation($expectedLoanAmount,$propertyValue){
        return ($expectedLoanAmount/$propertyValue)*100;

  }

}
?>