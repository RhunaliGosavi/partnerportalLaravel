<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DsaLead extends Model
{
    use SoftDeletes;

    protected $table = 'dsa_leads';
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'source_user_id', 'lead_generated_source', 'name', 'pan_number', 'dob', 'gender', 'mobile_number', 'email', 'bank_acc_number', 'ifsc_code', 'bank_name', 'branch_name', 'upi_id', 'address_proof_doc', 'address_type', 'address_line1', 'address_line2', 'pincode', 'city', 'state', 'agency_name', 'gst_number', 'office_mobile_number', 'office_email'
    ];

    // Fetch employee
    public function employee(){
        return $this->belongsTo('App\Employee','source_user_id');
    }
}
