<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Retreats extends Model
{
    protected $fillable = [
        'from',
        'to',
        'nights',
        'days',
        'share_room',
        'private_room',
        'order',
        'price'
    ];

}
