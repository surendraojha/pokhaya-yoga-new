<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PhotoList extends Model
{
    public function photoCategory(){
    	return $this->belongsTo(PhotoCategory::class);
    }
}
