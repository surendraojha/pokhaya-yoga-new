<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model
{
   protected $table="menu_items";

            protected $fillable=['label','link','parent','sort','class','menu','depth'];
}
