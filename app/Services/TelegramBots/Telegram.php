<?php

namespace App\Services\TelegramBots;

use App\Models\User;
use Illuminate\Support\Facades\Log;
use Longman\TelegramBot\Entities\Update;
use Longman\TelegramBot\Entities\ServerResponse;
use Longman\TelegramBot\Telegram as ParentTelegram;

class Telegram extends ParentTelegram
{
    public function processUpdate(Update $update): ServerResponse
    {

        if($userId = $update->getMessage()?->getFrom()?->getId() ?: $update?->getCallbackQuery()?->getFrom()?->getId()) {
            $appLocale = app()->getLocale();
            $userLanguage = User::getLocale($userId);
            if($appLocale != $userLanguage) {
                $lang = $userLanguage == 'kk' ? 'kk' : 'ru';
                app()->setLocale($lang);
            }
        }
        return parent::processUpdate($update);
    }
}
