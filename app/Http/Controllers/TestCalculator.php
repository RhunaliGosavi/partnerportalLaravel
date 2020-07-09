<?php

namespace App\Http\Controllers;

use App\Helpers\calLoanAgainstPropertyHelper;
use App\Helpers\calPersonalLoanHelper;
use Illuminate\Http\Request;

class TestCalculator extends Controller
{
    public function index()
    {

        //personal loan
        /*$calPersonalLoanHelper= new calPersonalLoanHelper;
       //  return $calPersonalLoanHelper->calculatePersonalLoan($monthlyIncome,$policyFOIR,$obligation,$policyROI,$loanTenor,$expectedROI);
        return $calPersonalLoanHelper->calculatePersonalLoan(180000,60,9000,10,24,8);*/
        
        /*//Loan Against Property
         $calLoanAgainstPropertyHelper=new calLoanAgainstPropertyHelper;
        // $calLoanAgainstPropertyHelper->calLoanAgainstPropert($roi,$loanTenure,$monthlyIncome,$policyFOIR,$monthlyObligation,$expectedLoanAmount,$propertyValue,$policyLTV);
        return $calLoanAgainstPropertyHelper->calLoanAgainstPropert(10,24,2000000,70,380000,10000000,5000000,65);*/
  
    }
}
