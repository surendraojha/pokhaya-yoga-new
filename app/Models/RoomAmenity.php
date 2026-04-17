<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RoomAmenity extends Model
{
    protected $fillable = [
        'room_id',
        'icon',
        'title',
    ];

    public function room()
    {
        return $this->belongsTo(Room::class);
    }
}
