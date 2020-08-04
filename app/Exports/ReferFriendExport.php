<?php

namespace App\Exports;

use App\ReferBuddy;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromView;

class ReferFriendExport implements FromView
{
    function __construct($id=null,$otherLoanType=null) {
        $this->id = $id;
        $this->otherLoanType=$otherLoanType;
    }
    public function view(): View
    {
        if($this->id){
            $this->query= ReferBuddy::with('employee')->where('refer_buddy.id',$this->id)->get();
         }else if($this->otherLoanType){
             $this->query= ReferBuddy::with('employee')->where('refer_buddy.loan_product_id',$this->otherLoanType)->where('refer_buddy.created_at', '>', DB::raw('NOW() - INTERVAL 24 HOUR'))->get();
         }else{
            $this->query=ReferBuddy::with('employee')->get();
         }

        return view('exports.refer_friend', [
            'loans' => $this->query
        ]);
    }
}
