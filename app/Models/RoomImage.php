<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RoomImage extends Model
{
    protected $fillable = [
        'room_id',
        'image',
        'display_order',
        'is_featured',
    ];

    protected $casts = [
        'is_featured' => 'boolean',
    ];

    public function room()
    {
        return $this->belongsTo(Room::class);
    }
}
