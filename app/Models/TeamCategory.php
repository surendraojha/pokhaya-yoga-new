<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TeamCategory extends Model
{
    public function ourTeam(){
    	return $this->hasMany(OurTeam::class);
    }
}
