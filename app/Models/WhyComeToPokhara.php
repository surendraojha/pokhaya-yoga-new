<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WhyComeToPokhara extends Model
{
    // Explicit table name (since it's not pluralized conventionally)
    protected $table = 'why_come_to_pokhara';

    // Mass assignable fields
    protected $fillable = [
        'title',
        'content',
    ];

    // Optional: if you later convert content to JSON
    protected $casts = [
        'content' => 'string',
    ];
}