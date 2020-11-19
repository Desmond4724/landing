<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Carousel
 * @property $image
 * @package App\Models
 */
class Carousel extends Model
{

    protected $fillable = ['title', "description", "image"];

    protected $appends = ['image_url'];

    public function getImageUrlAttribute()
    {
        return asset('storage/' . $this->image);
    }

    protected $hidden = ['created_at', 'updated_at'];


}
