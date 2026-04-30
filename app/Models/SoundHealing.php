<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SoundHealing extends Model
{
    public function teacher()
    {
        return $this->belongsTo(OurTeam::class, 'teacher_id');
    }

    public function sessions()
    {
        return $this->hasMany(SoundHealingSession::class);
    }
}
