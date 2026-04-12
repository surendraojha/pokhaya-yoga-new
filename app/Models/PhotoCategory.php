<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PhotoCategory extends Model
{
    public function photoList(){
    	return $this->hasMany(PhotoList::class);
    }
}
