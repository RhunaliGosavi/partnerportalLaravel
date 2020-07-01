<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SalesKitProduct extends Model
{
    use SoftDeletes;

    protected $table = 'sales_kit_products';
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'loan_product_id', 'name', 'content_data'
    ];

    // Fetch loan product
    public function loan_product(){
        return $this->belongsTo('App\LoanProduct','loan_product_id');
    }

    // Fetch document checklist products
    public function document_checklist_products(){
        return $this->hasMany('App\DocumentChecklistProduct','sales_kit_product_id');
    }
}
