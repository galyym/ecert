<?php

namespace App\Services\TelegramBots\InfoBot\Keyboards\RegisterKeyboard;

use App\Services\TelegramBots\InfoBot\Keyboards\TelegramKeyboard;
use Longman\TelegramBot\Entities\InlineKeyboard;
use Longman\TelegramBot\Entities\Keyboard;

class ReRegistrationKeyboard extends TelegramKeyboard
{
    public function buildKeyboard(string $value = ''): Keyboard
    {
        return new InlineKeyboard(
            [
                $this->inlineButton(new ReRegister()),
            ],
        );
    }
}
