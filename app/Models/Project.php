<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

/**
 * @mixin Builder
 */
class Project extends Model
{
    protected $table = 'site_projects';
    
    protected $fillable = [
        'title',
        'slug',
        'description',
        'client',
        'completion_date',
        'images',
        'category',
        'is_featured',
        'is_active'
    ];

    protected $casts = [
        'images' => 'array',
        'is_featured' => 'boolean',
        'is_active' => 'boolean',
        'completion_date' => 'date'
    ];

    /**
     * Scope для получения только активных проектов
     */
    public function scopeActive(Builder $query): Builder
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope для получения избранных проектов
     */
    public function scopeFeatured(Builder $query): Builder
    {
        return $query->where('is_featured', true);
    }

    /**
     * Scope для фильтрации по категории
     */
    public function scopeCategory(Builder $query, string $category): Builder
    {
        return $query->where('category', $category);
    }

    /**
     * Получить URL проекта
     */
    public function getUrlAttribute(): string
    {
        return route('projects.show', $this->slug);
    }

    /**
     * Получить главное изображение
     */
    public function getMainImageAttribute(): ?string
    {
        return $this->images[0] ?? null;
    }
}
