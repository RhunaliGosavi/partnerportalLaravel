<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LoanProduct extends Model
{
    use SoftDeletes;
    
    protected $table = 'loan_products';

    protected $fillable = [
        'name', 'description'
    ];

    // Fetch refered buddies
    public function refered_buddies(){
        return $this->hasMany('App\ReferBuddy','loan_product_id');
    }

    // Fetch hr-staff loan leads
    public function hr_loan_leads(){
        return $this->hasMany('App\HrLoan','loan_product_id');
    }

    // Fetch other loan product leads
    public function other_loan_leads(){
        return $this->hasMany('App\OtherLoan','loan_product_id');
    }

    // Fetch sales kit products
    public function sales_kit_products(){
        return $this->hasMany('App\SalesKitProduct','loan_product_id');
    }

    // Fetch sales contests
    public function sales_contest(){
        return $this->hasMany('App\SalesContest','loan_product_id');
    }

    // Fetch customer schemes
    public function customer_schemes(){
        return $this->hasMany('App\CustomerScheme','loan_product_id');
    }

    // Fetch marketing visual category
    public function marketing_visual_category(){
        return $this->hasMany('App\MarketingVisualCategory','loan_product_id');
    }

    // Fetch marketing visuals 
    public function marketing_visuals(){
        return $this->hasMany('App\MarketingVisual','loan_product_id');
    }
}
