<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImportantLink extends Model
{

    protected $table = 'important_links';

    protected $fillable = [
        'portal_name', 'web_link'
    ];
}
