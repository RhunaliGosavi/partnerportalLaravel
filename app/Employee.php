<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'name', 'employee_id', 'password','pan_number','mobile_number','status','email','middle_name','hub_name','company_name','work_location','state','department','designation','job_role','product','last_name','reporting_manager_name','manager_employee_id'
    ];

    // Fetch refered buddies
    public function refered_buddies(){
        return $this->hasMany('App\ReferBuddy','source_user_id');
    }

    // Fetch hr-staff loan leads
    public function hr_loan_leads(){
        return $this->hasMany('App\HrLoan','source_user_id');
    }

    // Fetch other loan product leads
    public function other_loan_leads(){
        return $this->hasMany('App\OtherLoan','source_user_id');
    }

    // Fetch hr-staff loan leads
    public function dsa_leads(){
        return $this->hasMany('App\DsaLead','source_user_id');
    }
}
