<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BankBranch extends Model
{
    use SoftDeletes;
    
    protected $table = 'bank_branches';

    protected $fillable = [
        'ifsc', 'bank', 'branch', 'address', 'contact', 'city', 'district', 'state'
    ];
}
