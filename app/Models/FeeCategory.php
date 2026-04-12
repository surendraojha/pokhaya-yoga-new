<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FeeCategory extends Model
{
    public function feeList(){
    	return $this->hasMany(FeeList::class, 'category_id', 'id');
    }
}
