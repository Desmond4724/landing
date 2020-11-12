<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Carousel extends Model
{

    protected $fillable = ['title', "description", "image"];

    protected $appends = ['image_url'];

    public function getImageUrlAttribute()
    {
        return asset(Storage::url($this->image));
    }


}
