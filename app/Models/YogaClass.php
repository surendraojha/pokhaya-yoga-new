<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class YogaClass extends Model
{
    //
     protected $fillable = [
        'videos',
    ];
    protected $casts = [
        'videos' => 'array'
    ];

    public function getImageUrlAttribute()
    {
        return $this->image ? asset('/uploads/' . $this->image): asset('/uploads/IMG20191103125404.jpg');
    }
}
