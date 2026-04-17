<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = [
        'title',
        'calendar_title',
        'meeting_location',
        'meeting_duration',
        'timezone_configurations',
    ];

    protected $casts = [
        'timezone_configurations' => 'array',
    ];
}
