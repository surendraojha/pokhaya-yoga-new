<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OurMenu extends Model
{
    public function pageMenu(){
    	return $this->hasMany('\App\PageMenu');
    }
}
