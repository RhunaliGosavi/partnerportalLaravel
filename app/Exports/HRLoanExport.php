<?php

namespace App\Exports;

use App\HrLoan;
use App\OtherLoan;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromView;

class HRLoanExport implements FromView
{
    protected $id;

    function __construct($id=null,$otherLoanType=null) {
            $this->id = $id;
            $this->otherLoanType=$otherLoanType;
    }
   	public function view(): View
    {

        if($this->id){
            $this->query= HrLoan::with('employee')->where('hr_loans.id',$this->id)->get();
         }else if($this->otherLoanType){
             $this->query= HrLoan::with('employee')->where('hr_loans.created_at', '>', DB::raw('NOW() - INTERVAL 24 HOUR'))->get();
         }else{
            $this->query=HrLoan::with('employee')->get();
         }
        return view('exports.hr_loan', [
            'loans' =>$this->query,
            'otherloans' => ($this->id || $this->otherLoanType)? array(): OtherLoan::with('loan_product')->with('employee')->get()
        ]);
    }
}
