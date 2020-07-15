<?php

namespace App\Exports;

use App\DsaLead;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class DsaLeadExport implements FromView
{
    public function view(): View
    {
        return view('exports.dsa_leads', [
            'dsa_leads' => DsaLead::with('employee')->get()
        ]);
    }
}
