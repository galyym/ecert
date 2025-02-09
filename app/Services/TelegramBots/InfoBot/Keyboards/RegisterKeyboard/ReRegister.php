<?php

namespace App\Services\TelegramBots\InfoBot\Keyboards\RegisterKeyboard;

use App\Services\TelegramBots\InfoBot\Commands\User\RegisterUserCommand;
use App\Services\TelegramBots\InfoBot\Entities\TelegramButton;
use Illuminate\Support\Str;
use Longman\TelegramBot\Entities\CallbackQuery;
use Longman\TelegramBot\Entities\Message;
use Longman\TelegramBot\Entities\ServerResponse;
use Longman\TelegramBot\Entities\Update;
use Longman\TelegramBot\Exception\TelegramException;
use Longman\TelegramBot\Request;
use Longman\TelegramBot\Telegram;

class ReRegister extends TelegramButton
{
    protected string $buttonKey = 're_register';

    protected string $buttonText = 'Перерегистрация';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle(CallbackQuery $query): ServerResponse
    {
        $message = $query->getMessage();
        $accountInfo = $message->getChat();
        $chatId = $accountInfo->getId();
        $fakeMessageData = [
            'message_id' => Str::uuid(),
            'from' => [
                'id' => $chatId,
                'first_name' => $accountInfo->first_name,
                'username' => $accountInfo->username,
            ],
            'chat' => [
                'id' => $chatId,
                'type' => 'private'
            ],
            'date' => time(),
            'text' => ''
        ];
        $fakeMessage = new Message($fakeMessageData);
        $fakeUpdate = new Update(['message' => $fakeMessage]);
        $telegram = new Telegram(config('telegram.bot_api_key'), config('telegram.bot_username'));

        $command = new RegisterUserCommand($telegram, $fakeUpdate);
        $command->execute(true);
        return Request::emptyResponse();
    }
}
