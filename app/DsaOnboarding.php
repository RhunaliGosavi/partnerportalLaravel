<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DsaOnboarding extends Model
{

    protected $table = 'dsa_onboarding';

    protected $fillable = [
        'title', 'file_path', 'file_size_in_mb', 'is_required'
    ];
}
