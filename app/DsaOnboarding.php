<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DsaOnboarding extends Model
{
    use SoftDeletes;
    
    protected $table = 'dsa_onboarding';

    protected $fillable = [
        'title', 'file_path', 'file_size_in_mb', 'is_required'
    ];
}
