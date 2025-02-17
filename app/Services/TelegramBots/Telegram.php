<?php

namespace App\Services\TelegramBots;

use App\Models\User;
use Longman\TelegramBot\Entities\Update;
use Longman\TelegramBot\Entities\ServerResponse;
use Longman\TelegramBot\Telegram as ParentTelegram;

class Telegram extends ParentTelegram
{
    public function processUpdate(Update $update): ServerResponse
    {
        if($userId = $update->getMessage()?->getFrom()?->getId() ?: $update?->getCallbackQuery()?->getFrom()?->getId()) {
            $userLanguage = User::getLocale($userId);
            app()->setLocale($userLanguage ?? 'kk');
        }
        return parent::processUpdate($update);
    }
}
