<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PageMenu extends Model
{
    public function pageInfo(){
    	return $this->hasMany('App\AllPage', 'id', 'all_page_id');
    }
    public function ourMenu(){
    	return $this->belongsTo(OurMenu::class);
    }
}
