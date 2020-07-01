<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MarketingVisualCategory extends Model
{
    use SoftDeletes;

    protected $table = 'marketing_visual_categories';
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'loan_product_id', 'name'
    ];

    // Fetch loan product
    public function loan_product(){
        return $this->belongsTo('App\LoanProduct','loan_product_id');
    }

    // Fetch marketing visuals
    public function marketing_visual_category(){
        return $this->hasMany('App\MarketingVisual','marketing_visual_category_id');
    }
}
