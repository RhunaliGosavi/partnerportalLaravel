<?php

namespace App\Exports;

use App\HrLoan;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class HRLoanExport implements FromView
{
   	public function view(): View
    {
        return view('exports.hr_loan', [
            'loans' => HrLoan::with('employee')->get()
        ]);
    }
}