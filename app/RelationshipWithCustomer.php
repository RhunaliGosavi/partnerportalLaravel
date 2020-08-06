<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RelationshipWithCustomer extends Model
{
    use SoftDeletes;

    protected $table = 'relationship_with_customer';
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'relationship'
        ];
}
