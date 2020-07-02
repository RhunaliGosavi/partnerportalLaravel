<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class EmployeeHelpdesk extends Model
{
    

    protected $table = 'employee_helpdesk';
  

    protected $fillable = [
        'name', 'file_path', 'file_size_in_mb'
    ];
}
