<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

/**
 * @mixin Builder
 */
class News extends Model
{
    protected $table = 'site_news';
    
    protected $fillable = [
        'title',
        'slug',
        'excerpt',
        'content',
        'image',
        'published_at',
        'is_published',
        'views'
    ];

    protected $casts = [
        'is_published' => 'boolean',
        'published_at' => 'datetime',
        'views' => 'integer'
    ];

    /**
     * Scope для получения только опубликованных новостей
     */
    public function scopePublished(Builder $query): Builder
    {
        return $query->where('is_published', true)
            ->where('published_at', '<=', now());
    }

    /**
     * Scope для сортировки по дате публикации
     */
    public function scopeLatest(Builder $query): Builder
    {
        return $query->orderBy('published_at', 'desc');
    }

    /**
     * Получить URL новости
     */
    public function getUrlAttribute(): string
    {
        return route('news.show', $this->slug);
    }

    /**
     * Увеличить счетчик просмотров
     */
    public function incrementViews(): void
    {
        $this->increment('views');
    }

    /**
     * Получить отформатированную дату публикации
     */
    public function getFormattedDateAttribute(): string
    {
        return $this->published_at?->format('d.m.Y') ?? '';
    }
}
