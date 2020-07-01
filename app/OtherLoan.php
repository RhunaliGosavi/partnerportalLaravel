<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OtherLoanProductLead extends Model
{
    use SoftDeletes;

    protected $table = 'other_loans';
    protected $dates = ['deleted_at'];

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
