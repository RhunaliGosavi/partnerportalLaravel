<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class EmployeeHelpdesk extends Model
{
    use SoftDeletes;

    protected $table = 'employee_helpdesk';
  

    protected $fillable = [
        'name', 'file_path', 'file_size_in_mb', 'download_flag'
    ];
}
