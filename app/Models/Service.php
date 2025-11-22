<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

/**
 * @mixin Builder
 */
class Service extends Model
{
    // Используем стандартную таблицу services, но с новыми полями
    
    protected $fillable = [
        'title',
        'description',
        'icon',
        'features',
        'price',
        'duration',
        'category',
        'is_active',
        'sort_order'
    ];

    protected $casts = [
        'features' => 'array',
        'is_active' => 'boolean',
        'price' => 'decimal:2'
    ];
}
