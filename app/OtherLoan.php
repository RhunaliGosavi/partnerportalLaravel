<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OtherLoan extends Model
{

    protected $table = 'other_loans';

    protected $fillable = [
        'source_user_id', 'lead_generated_source', 'employee_id', 'name', 'mobile_number', 'loan_amount', 'loan_product_id', 'prefered_contact_time'
    ];

    // Fetch employee
    public function employee(){
        return $this->belongsTo('App\Employee','source_user_id');
    }

    // Fetch loan product
    public function loan_product(){
        return $this->belongsTo('App\LoanProduct','loan_product_id');
    }
}
