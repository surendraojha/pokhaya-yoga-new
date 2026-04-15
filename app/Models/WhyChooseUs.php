<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WhyChooseUs extends Model
{
    protected $table = 'why_choose_us';

    protected $fillable = [
        'title',
        'subtitle',
        'left_list',
        'right_list',
        'images',
    ];

    protected $casts = [
        'left_list' => 'array',
        'right_list' => 'array',
        'images' => 'array',
    ];
}