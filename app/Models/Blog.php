<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    //
    protected $fillable = ['views' ];

    public function incrementViewsCount() {
        $this->views++;
        return $this->save();
    }

    public function getImageUrlAttribute()
    {
        return $this->image ?  asset('uploads/blogs/'.$this->image) : asset('images/default-banner.jpg');
    }
}
