<?php

namespace App\Services\TelegramBots\InfoBot\Keyboards\StartKeyboard;

use App\Services\Telegram\TelegramService;
use App\Services\TelegramBots\InfoBot\Entities\TelegramButton;
use App\Services\TelegramBots\InfoBot\Keyboards\RegKeyboard\RegKeyboard;
use Longman\TelegramBot\Entities\CallbackQuery;
use Longman\TelegramBot\Entities\ServerResponse;
use Longman\TelegramBot\Exception\TelegramException;
use Longman\TelegramBot\Request;

class Register extends TelegramButton
{
    protected string $buttonKey = 'register';

    protected string $buttonText = '';

    public function __construct()
    {
        parent::__construct();
        $this->buttonText = 'Регистрация';
    }

    /**
     * @throws TelegramException
     */
    public function handle(CallbackQuery $query): ServerResponse
    {
        $accountInfo = $query->getMessage()->getChat();
        $chatId = $accountInfo->getId();
        TelegramService::deleteLastMessage($chatId);
        return $this->telegram->executeCommand('register_user');
    }
}
