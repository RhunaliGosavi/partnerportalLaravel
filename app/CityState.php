<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CityState extends Model
{
    use SoftDeletes;
    
    protected $table = 'city_states';

    protected $fillable = [
        'pincode', 'city_name', 'state_name'
    ];
}
