<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Carousel
 * @property $image
 * @package App\Models
 */
class Carousel extends Model
{
    use HasFactory;

    protected $fillable = ['title', "description", "image"];

    protected $appends = ['image_url'];

    public function getImageUrlAttribute()
    {
        return asset('storage/' . $this->image);
    }

    protected $hidden = ['created_at', 'updated_at'];

}
