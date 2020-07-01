<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MarketingVisual extends Model
{
    use SoftDeletes;

    protected $table = 'marketing_visuals';
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'loan_product_id', 'marketing_visual_category_id', 'file_path'
    ];

    // Fetch loan product
    public function loan_product(){
        return $this->belongsTo('App\LoanProduct','loan_product_id');
    }

    // Fetch marketing visual category
    public function marketing_visual_category(){
        return $this->belongsTo('App\MarketingVisualCategory','marketing_visual_category_id');
    }
}
