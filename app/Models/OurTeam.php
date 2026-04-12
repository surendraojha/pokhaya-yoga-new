<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OurTeam extends Model
{
    public function teamCategory(){
    	return $this->belongsTo(TeamCategory::class);
    }
}
