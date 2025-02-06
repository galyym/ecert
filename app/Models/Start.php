<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Start extends Model
{
    protected $fillable = [
        'name_kk',
        'name_ru',
    ];

    public function getNameAttribute()
    {
        return $this->{'name_' . app()->getLocale()};
    }
}
