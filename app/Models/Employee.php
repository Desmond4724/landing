<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = ["first_name", 'last_name', 'position', "image"];
    /**
     * @var mixed
     */
    private $id;

    public function socials()
    {
        return $this->belongsToMany(Social::class, EmployeeSocial::class);
    }
}
