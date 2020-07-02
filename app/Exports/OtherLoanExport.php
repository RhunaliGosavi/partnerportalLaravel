<?php

namespace App\Exports;

use App\OtherLoan;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class OtherLoanExport implements FromView
{
    public function view(): View
    {
        return view('exports.other_loan', [
            'loans' => OtherLoan::with('loan_product')->with('employee')->get()
        ]);
    }
}
