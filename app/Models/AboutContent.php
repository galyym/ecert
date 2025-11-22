<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

/**
 * @mixin Builder
 */
class AboutContent extends Model
{
    protected $fillable = [
        'section_key',
        'title',
        'subtitle',
        'content',
        'image',
        'features',
        'stats',
        'is_active'
    ];

    protected $casts = [
        'content' => 'array',
        'features' => 'array',
        'stats' => 'array',
        'is_active' => 'boolean'
    ];

    public static function getBySection($section_key)
    {
        return static::where('section_key', $section_key)
                    ->where('is_active', true)
                    ->first();
    }
}
