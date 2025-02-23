<?php

namespace App\Services\TelegramBots\InfoBot\Keyboards\StartKeyboard;

use App\Services\TelegramBots\InfoBot\Keyboards\CertificateKeyboard\CheckCertificate;
use App\Services\TelegramBots\InfoBot\Keyboards\RegisterKeyboard\Register;
use App\Services\TelegramBots\InfoBot\Keyboards\TelegramKeyboard;
use Longman\TelegramBot\Entities\InlineKeyboard;
use Longman\TelegramBot\Entities\Keyboard;

class StartKeyboard extends TelegramKeyboard
{
    public function buildKeyboard(string $value = ''): Keyboard
    {
        return new InlineKeyboard(
            [
                $this->inlineButton(new Register()),
            ],[
                $this->inlineButton(new Services()),
            ],[
                $this->inlineButton(new CheckCertificate()),
            ]
        );
    }
}
