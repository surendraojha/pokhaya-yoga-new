<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CurriculamList extends Model
{
    public function category(){
    	return $this->belongsTo('\App\Models\CurriculamCategory', 'category_id', 'id');
    }
}
