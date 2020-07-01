<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CorporatePresentation extends Model
{
    use SoftDeletes;

    protected $table = 'corporate_presentations';
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'title', 'file_path', 'file_size_in_mb', 'is_required'
    ];
}
