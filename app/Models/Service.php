<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property $image
 */
class Service extends Model
{
    protected $fillable = ['image', 'title', 'description'];
}
