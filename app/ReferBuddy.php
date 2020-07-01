<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ReferBuddy extends Model
{
    use SoftDeletes;

    protected $table = 'refer_buddy';
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'source_user_id', 'name', 'mobile_number', 'email', 'loan_product_id', 'loan_amount', 'prefered_contact_time'
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
