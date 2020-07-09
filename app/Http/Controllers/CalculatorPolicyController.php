<?php

namespace App\Http\Controllers;

use App\CalculatorPolicy;
use Illuminate\Http\Request;

class CalculatorPolicyController extends Controller
{
    public function index(){
        $plocyData=CalculatorPolicy::first();
      
        return view('CalculatorPolicyInput.calculatorPolicyInput',['policy'=>$plocyData]);
    }

    public function store(Request $request,$id=1){
        
        $rules = [
            'personal_loan_fori' => 'required|numeric',
            'personal_loan_roi'    => 'required|numeric',
            'loan_against_property_fori'    => 'required|numeric',
            'loan_against_property_ltv'    => 'required|numeric',
        ];

        $request->validate($rules);
        
        $process = CalculatorPolicy::updateOrCreate(
            ['id'=>$id],
            ['personal_loan_fori' =>$request->personal_loan_fori,'personal_loan_roi'=>$request->personal_loan_roi,'loan_against_property_fori'=>$request->loan_against_property_fori,'loan_against_property_ltv'=>$request->loan_against_property_ltv]
            );
            if(! $process){
               return redirect()->back()->with('error', 'Failed To Update Data'); 
            }

        return redirect('calculator-policy')->with('success', 'Data updated successfully!');

    }
}
