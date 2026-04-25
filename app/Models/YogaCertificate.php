<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class YogaCertificate extends Model
{

    public function yogaClass()
    {
        return $this->belongsTo(YogaClass::class);
    }

    public function getImageUrlAttribute()
    {
        return asset('uploads/' . $this->image);
    }
}
