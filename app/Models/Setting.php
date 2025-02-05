<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;
use function Laravel\Prompts\select;

/**
 * @mixin Builder
 */
class Setting extends Model
{
    use HasFactory;

    CONST TERMS_TELEGRAM_BOT = 'terms_telegram_bot';
    CONST INSTRUCTIONS_DOGOVOR_24 = 'instructions_dogovor_24';
    CONST REGISTER_LINK_DOGOVOR_24 = 'register_link_dogovor_24';

    protected $fillable = [
        'name',
        'value',
        'key',
        'description',
    ];

    public static function getWithKey($key)
    {
        return self::where('key', $key)->first();
    }
}
