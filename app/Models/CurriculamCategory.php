<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CurriculamCategory extends Model
{
    public function curriculamList(){
    	return $this->hasMany('\App\Models\CurriculamList', 'category_id', 'id');
    }
}
