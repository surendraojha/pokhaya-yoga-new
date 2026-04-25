<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = [
        'title',
        'description',
        'detailed_description',
        'price',
        'bed_type',
        'guests',
        'size',
        'room_size',
        'badge',
        'is_active',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'is_active' => 'boolean',
    ];

    public function images()
    {
        return $this->hasMany(RoomImage::class);
    }

    public function amenities()
    {
        return $this->hasMany(RoomAmenity::class);
    }

    public function featuredImage()
    {
        return $this->hasOne(RoomImage::class)->where('is_featured', true)->orOrderBy('display_order');
    }
}
