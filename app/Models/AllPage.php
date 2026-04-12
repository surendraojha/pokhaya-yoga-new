<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AllPage extends Model
{
    public function pageMenu(){
    	return $this->hasMany('App\PageMenu', 'id', 'all_page_menu');
    }

    public function subMenu(){
		return $this->hasMany('App\SubMenu','parent_id','id')->with('pageInfo');
	}
}
