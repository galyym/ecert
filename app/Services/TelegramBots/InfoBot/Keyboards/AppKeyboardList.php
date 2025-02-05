<?php

namespace App\Services\TelegramBots\InfoBot\Keyboards;

use App\Services\TelegramBots\InfoBot\Keyboards\Doc24\Doc24instruct;
use App\Services\TelegramBots\InfoBot\Keyboards\Doc24\Doc24Keyboard;
use App\Services\TelegramBots\InfoBot\Keyboards\MainMenyKeyboard\MenuKeyboard;
use App\Services\TelegramBots\InfoBot\Keyboards\StartKeyboard\StartKeyboard;
use App\Services\TelegramBots\InfoBot\Keyboards\RegKeyboard\RegKeyboard;

class AppKeyboardList
{
    private array $keyboards = [
        StartKeyboard::class,
        MenuKeyboard::class
    ];

    /**
     * Get all buttons from keyboards
     *
     * @return array
     */
    public static function getAllButtons(): array
    {
        $keyboardObj = new static();
        $buttons = [];
        foreach ($keyboardObj->keyboards as $item) {

            $keyboard = new $item();

            if(!$keyboard instanceof TelegramKeyboard) {
                continue;
            }

            $buttons = array_merge($buttons, $keyboard->getButtons());
        }

        return $buttons;
    }
}
