<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HrLoan extends Model
{
    use SoftDeletes;
    
    protected $table = 'hr_loans';

    protected $fillable = [
        'source_user_id', 'lead_generated_source', 'employee_id', 'name', 'mobile_number', 'loan_amount', 'designation', 'prefered_contact_time'
    ];

    // Fetch employee
    public function employee(){
        return $this->belongsTo('App\Employee','source_user_id');
    }
}
