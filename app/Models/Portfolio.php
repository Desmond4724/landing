<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property $image
 */
class Portfolio extends Model
{
    protected $fillable = ['image', "title", "description"];

    protected $appends = ['image_url'];


    public function getImageUrlAttribute()
    {
        return asset('storage/' . $this->image);
    }
}
