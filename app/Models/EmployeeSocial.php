<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmployeeSocial extends Model
{
    protected $fillable = ['employee_id', 'social_id', 'value'];

    protected $table = 'employee_social';

}
