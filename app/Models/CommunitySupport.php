<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CommunitySupport extends Model
{
    protected $fillable = [
        'title',
        'description',
        'image',
        'stats'
    ];

    protected $casts = [
        'stats' => 'array',
    ];
}