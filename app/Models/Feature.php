<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Feature
 * @property $icon
 * @package App\Models
 */

class Feature extends Model
{
    protected $fillable = ['title', 'icon', 'description'];


    protected $appends = ['icon_url'];

    public function getIconUrlAttribute()
    {
        return asset('storage/'.$this->icon);
    }
}
