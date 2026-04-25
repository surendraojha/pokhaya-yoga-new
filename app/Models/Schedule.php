<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $table = 'schedules';

    protected $fillable = [
        'title',
        'content',
        'subtitle',
        'class_id',
    ];

    public function yogaClass()
    {
        return $this->belongsTo(YogaClass::class, 'class_id');
    }
}
