<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CurrentOffer extends Model
{
    use SoftDeletes;

    protected $table = 'current_offers';
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'file_path'
    ];
}
