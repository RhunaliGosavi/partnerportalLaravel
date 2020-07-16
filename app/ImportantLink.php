<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ImportantLink extends Model
{
    use SoftDeletes;
    
    protected $table = 'important_links';

    protected $fillable = [
        'portal_name', 'web_link'
    ];
}
