<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Info
 * @package App\Models
 * @property $image
 */
class Info extends Model
{
    protected $fillable = ['image', 'title', 'content'];

    protected $appends = ['image_url'];

    protected $primaryKey = 'id';

    public function getImageUrlAttribute()
    {
        return asset('storage/' . $this->image);
    }

}
