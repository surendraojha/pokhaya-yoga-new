<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FeeList extends Model
{
    public function feeCategory(){
    	return $this->belongsTo('\App\FeeCategory', 'category_id', 'id');
    }
    protected $fillable = ['triple_room','order'
        ];
}
