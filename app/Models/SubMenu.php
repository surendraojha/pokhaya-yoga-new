<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubMenu extends Model
{
   public function pageInfo(){
    	return $this->hasOne(AllPage::class,'id','child_id');
    }
}
