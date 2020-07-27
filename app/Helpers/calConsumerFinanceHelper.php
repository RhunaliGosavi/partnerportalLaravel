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
            $getApplicableAmortizationDetails=$this->getApplicableAmortizationDetails();

            return array('Emi'=>$Emi,'Emi_text'=>number_format($Emi,0),'AdvancedEMI'=>$advancedEmi,'AdvancedEMI_text'=>number_format($advancedEmi,0),'NetLoan'=>$netLoan,'NetLoan_text'=>number_format($netLoan,0),'applicable_amortization_details'=>$getApplicableAmortizationDetails);
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
   public function getApplicableAmortizationDetails(){
    ini_set('max_execution_time', 0);

        $calPMTHelper= new AmortizationHelper();
        //$amount,$rate,$emi
        $schedule=$calPMTHelper->getAmortizationTbl($this->getNetLoan(),$this->roi,$this->getEmi());

        return array('sum_interest'=>round($schedule['sum_interest']),'sum_interest_text'=>number_format($schedule['sum_interest'],0),'sum_principal'=>round($schedule['sum_principal']),'sum_principal_text'=>number_format($schedule['sum_principal'],0));
    }


}

?>
