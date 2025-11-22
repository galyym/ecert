<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class SiteSetting extends Model
{
    protected $fillable = [
        'key',
        'value',
        'type',
        'group'
    ];

    protected $casts = [
        'value' => 'array'
    ];

    /**
     * Получить значение настройки по ключу
     */
    public static function get(string $key, mixed $default = null): mixed
    {
        return Cache::remember("setting_{$key}", 3600, function () use ($key, $default) {
            $setting = static::where('key', $key)->first();
            
            if (!$setting) {
                return $default;
            }

            // Если значение - массив с одним элементом, вернуть его
            if (is_array($setting->value) && count($setting->value) === 1) {
                return $setting->value[0] ?? $default;
            }

            return $setting->value ?? $default;
        });
    }

    /**
     * Установить значение настройки
     */
    public static function set(string $key, mixed $value, string $type = 'text', string $group = 'general'): void
    {
        static::updateOrCreate(
            ['key' => $key],
            [
                'value' => is_array($value) ? $value : [$value],
                'type' => $type,
                'group' => $group
            ]
        );

        Cache::forget("setting_{$key}");
    }

    /**
     * Очистить кеш настроек
     */
    public static function clearCache(): void
    {
        Cache::flush();
    }

    /**
     * Event listener для очистки кеша при сохранении
     */
    protected static function booted(): void
    {
        static::saved(function ($setting) {
            Cache::forget("setting_{$setting->key}");
        });

        static::deleted(function ($setting) {
            Cache::forget("setting_{$setting->key}");
        });
    }
}
