<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $table = 'schedules';

    protected $fillable = [
        'day',
        'time_slot',
        'class_id',
        'activity',
    ];

    public function yogaClass()
    {
        return $this->belongsTo(YogaClass::class, 'class_id');
    }
}
