<?php

namespace App\Exports;

use App\ReferBuddy;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ReferFriendExport implements FromView
{
    public function view(): View
    {
        return view('exports.refer_friend', [
            'loans' => ReferBuddy::with('employee')->all()
        ]);
    }
}
