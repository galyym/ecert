<?php

namespace App\Services\Telegram;

use App\Models\Message;
use Longman\TelegramBot\Request;

class TelegramService
{
    public static function deleteLastMessage($chatId)
    {
        $messages = Message::getLastMessage($chatId);
        $deletedMessage = Message::getLastDeletedMessage($chatId);

        if ($deletedMessage && $deletedMessage->id && $messages && $messages->id) {
            for ($i = $deletedMessage->id + 1; $i <= $messages->id; $i++) {
                Request::deleteMessage([
                    'chat_id' => $chatId,
                    'message_id' => $i,
                ]);
                Message::updateIsDeleted($i);
            }
        }
    }
}
