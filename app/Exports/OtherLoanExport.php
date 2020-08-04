<?php

namespace App\Exports;

use App\OtherLoan;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromView;

class OtherLoanExport implements FromView
{
    function __construct($id=null,$otherLoanType=null) {
        $this->id = $id;
        $this->otherLoanType=$otherLoanType;
    }
    public function view(): View
    {
        if($this->id){
           $this->query= OtherLoan::with('loan_product')->with('employee')->where('other_loans.id',$this->id)->get();
        }else if($this->otherLoanType){
            $this->query= OtherLoan::with('loan_product')->with('employee')->where('other_loans.loan_product_id',$this->otherLoanType)->where('other_loans.created_at', '>', DB::raw('NOW() - INTERVAL 24 HOUR'))->get();
        }else{
            $this->query= OtherLoan::with('loan_product')->with('employee')->get();
        }
        return view('exports.other_loan', [
            'loans' =>    $this->query    ]);
    }
}
