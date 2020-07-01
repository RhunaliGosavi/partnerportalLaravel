<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SalesContest extends Model
{
    use SoftDeletes;

    protected $table = 'sales_contests';
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'loan_product_id', 'content_data', 'file_path'
    ];

    // Fetch loan product
    public function loan_product(){
        return $this->belongsTo('App\LoanProduct','loan_product_id');
    }
}
