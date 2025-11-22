<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

/**
 * @mixin Builder
 */
class Page extends Model
{
    protected $fillable = [
        'title',
        'slug', 
        'content',
        'meta_title',
        'meta_description',
        'featured_image',
        'is_active',
        'sort_order'
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'content' => 'array'
    ];
    
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
