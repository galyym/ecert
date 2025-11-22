<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

/**
 * @mixin Builder
 */
class Project extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'description',
        'content',
        'featured_image',
        'gallery',
        'client_name',
        'project_date',
        'category',
        'status',
        'is_featured',
        'is_published'
    ];

    protected $casts = [
        'gallery' => 'array',
        'project_date' => 'date',
        'is_featured' => 'boolean',
        'is_published' => 'boolean'
    ];
    
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function scopePublished($query)
    {
        return $query->where('is_published', true);
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }
}
