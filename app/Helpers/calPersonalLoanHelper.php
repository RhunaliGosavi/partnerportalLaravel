<?php

namespace App\Helpers;

use App\CalculatorPolicy;

class calPersonalLoanHelper
{
    //$policyFOIR,$policyROI,$expectedROI in percentage
    public function calculatePersonalLoan($monthlyIncome,$obligation,$loanTenure,$expectedROI) 
    {
        $calData=CalculatorPolicy::first();
        $error='';
        $error.=empty($monthlyIncome) ? 'Monthly income' :'';
        $error.=empty($obligation) ? (!empty($error)? ',':'').' Obligation' : '';
        $error.=empty($loanTenure) ? (!empty($error)? ',':'').' Loan Tenure' : '';
        $error.=empty($expectedROI) ? (!empty($error)? ',':'').' Expected ROI' : '';
        $error.=empty($calData) ? (!empty($error)? ',':'').' Personal loan FORI or ROI' : '';
        $error.=!empty($error) ? ' Can not be empty' : '';
       if(empty($error)){
            $policyFOIR= $calData->personal_loan_fori;
            $policyROI= $calData->personal_loan_roi;
            $applicableLoanAmt=$this->getApplicableLoadAmt($monthlyIncome,$policyFOIR,$obligation,$policyROI,$loanTenure);
            $applicableEMI=$this->getApplicableEmi($monthlyIncome,$policyFOIR,$obligation);
            $desiredEMI=$this->getDesiredEMI($expectedROI,$loanTenure);
            $desiredFOIR=round($this->getDesiredFOIR($expectedROI,$loanTenure,$obligation,$monthlyIncome,$policyFOIR));
            $desiredROI= $this->getDesiredROI($expectedROI,$policyROI);

            return array('ApplicableAmt'=>$applicableLoanAmt,'ApplicableEMI'=>$applicableEMI,'DesiredEmai'=>$desiredEMI,'DesiredFOIR'=>$desiredFOIR,'DesiredROI'=>$desiredROI);
        }
        return array('error'=>$error);
      
    } 
    public function getApplicableLoadAmt($monthlyIncome,$policyFOIR,$obligation,$policyROI,$loanTenure){

        $applicableEMI=$this->getApplicableEmi($monthlyIncome,$policyFOIR,$obligation);
        $policyEmiFactor=$this->getPolicyEMIFactor($policyROI,$loanTenure);
        $appLoanAmount= ($applicableEMI/$policyEmiFactor)*100000;
        return $appLoanAmount;
    }
    public function getApplicableEmi($monthlyIncome,$policyFOIR,$obligation){
       $policyFOIR=$policyFOIR/100;
       return ($monthlyIncome*$policyFOIR) - $obligation;
    }
    public function getPolicyEMIFactor($policyROI,$loanTenure){
      $calPMTHelper= new calPMTHelper();
      return $calPMTHelper->calPmt($policyROI,$loanTenure,100000);

    }
    public function getDesiredEMI($expectedROI,$loanTenure){

        $calPMTHelper= new calPMTHelper();
        return $calPMTHelper->calPmt($expectedROI,$loanTenure,1000000);
    }

    public function getDesiredFOIR($expectedROI,$loanTenure,$obligation,$monthlyIncome,$policyFOIR){
        $policyFOIR=$policyFOIR/100;
        $desEMI=$this->getDesiredEMI($expectedROI,$loanTenure);
        return ((($desEMI+$obligation)/$monthlyIncome) - $policyFOIR)*100;
    }

    public function getDesiredROI($expectedROI,$policyROI){

       return $expectedROI-$policyROI;
    }
        
}

?>