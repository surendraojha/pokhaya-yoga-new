<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SoundHealingSession extends Model
{
    protected $fillable = [
        'sound_healing_id',
        'date',
        'time',
        'title',
        'spots_left',
        'description',
    ];

    public function soundHealing()
    {
        return $this->belongsTo(SoundHealing::class);
    }
}
