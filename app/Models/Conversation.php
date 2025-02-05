<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin Builder
 */
class Conversation extends Model
{
    use HasFactory;

    CONST STATE_2 = 2;

    protected $fillable = [
        "user_id",
        "chat_id",
        "status",
        "command",
        "notes",
        "created_at",
        "updated_at",
    ];

    protected $table = 'conversation';

    public static function getWithUserId($userId)
    {
        return self::where("user_id", $userId)->first();
    }

    public static function getWithChatId($chatId)
    {
        return self::where("chat_id", $chatId)->first();
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
