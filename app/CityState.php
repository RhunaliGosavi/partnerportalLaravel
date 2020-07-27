<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CityState extends Model
{
    use SoftDeletes;
    
    protected $table = 'city_states';

    protected $fillable = [
        'pincode', 'office_city', 'state', 'circle', 'region', 'division', 'office_type', 'delivery', 'district'
    ];
}
