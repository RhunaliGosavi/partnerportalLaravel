<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DocumentChecklistProduct extends Model
{
    use SoftDeletes;

    protected $table = 'document_checklist_products';
    protected $dates = ['deleted_at'];

    protected $fillable = [
        // 'sales_kit_product_id', 
        'document_checklist_category_id', 'content_data'
    ];

    // Fetch sales kit product
    // public function sales_kit_product(){
    //     return $this->belongsTo('App\SalesKitProduct','sales_kit_product_id');
    // }

    // Fetch document checklist category
    public function document_checklist_category(){
        return $this->belongsTo('App\DocumentChecklistCategory','document_checklist_category_id');
    }
}
