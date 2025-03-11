<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin Builder
 */
class Position extends Model
{
    protected $fillable = [
        'name_kk',
        'name_ru',
        'type'
    ];

    public function getNameAttribute()
    {
        return $this->{'name_' . app()->getLocale()};
    }

    public function getDescriptionAttribute()
    {
        return $this->{'description_' . app()->getLocale()};
    }

    public function certificate()
    {
        return $this->hasMany(Certificate::class, 'id', 'specialty_id');
    }
}
