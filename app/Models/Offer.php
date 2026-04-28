<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    protected $fillable = [
        'title',
        'hero_title',
        'content',
        'hero_description',
        'hero_stats',
        'image',
        'discount',
        'is_active',
        'slug',
        'price',
        'end_date',
        'features_list',
        'learn_items',
    ];

    protected function casts(): array
    {
        return [
            'price' => 'decimal:2',
            'discount' => 'integer',
            'end_date' => 'date',
            'is_active' => 'boolean',
            'features_list' => 'array',
            'learn_items' => 'array',
            'hero_stats' => 'array',
        ];
    }

    public function getDiscountedPriceAttribute(): float
    {
        $price = (float) $this->price;
        $discount = (float) ($this->discount ?? 0);

        return round($price - (($price * $discount) / 100), 2);
    }
}
