<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DocumentChecklistCategory extends Model
{
    use SoftDeletes;

    protected $table = 'document_checklist_categories';
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'name'
    ];

    // Fetch document checklist products
    public function document_checklist_products(){
        return $this->hasMany('App\DocumentChecklistProduct','document_checklist_category_id');
    }
}
