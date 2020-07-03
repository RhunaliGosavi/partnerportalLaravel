<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CorporatePresentation extends Model
{
    protected $table = 'corporate_presentations';

    protected $fillable = [
        'title', 'file_path', 'file_size_in_mb', 'is_required'
    ];
}
