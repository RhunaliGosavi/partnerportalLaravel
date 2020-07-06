<?php

namespace App\Helpers;


class calPersonalLoanHelper
{
    //$policyFOIR,$policyROI,$expectedROI in percentage
    public function calculatePersonalLoan($monthlyIncome,$policyFOIR,$obligation,$policyROI,$loanTenure,$expectedROI) {

        $applicableLoanAmt=$this->getApplicableLoadAmt($monthlyIncome,$policyFOIR,$obligation,$policyROI,$loanTenure);
        $applicableEMI=$this->getApplicableEmi($monthlyIncome,$policyFOIR,$obligation);
        $desiredEMI=$this->getDesiredEMI($expectedROI,$loanTenure);
        $desiredFOIR=round($this->getDesiredFOIR($expectedROI,$loanTenure,$obligation,$monthlyIncome,$policyFOIR));
        $desiredROI= $this->getDesiredROI($expectedROI,$policyROI);

        return array('ApplicableAmt'=>$applicableLoanAmt,'ApplicableEMI'=>$applicableEMI,'DesiredEmai'=>$desiredEMI,'DesiredFOIR'=>$desiredFOIR,'DesiredROI'=>$desiredROI);
      
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