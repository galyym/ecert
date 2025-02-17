<?php

namespace App\Services\TelegramBots\InfoBot\Keyboards\StartKeyboard;

use App\Services\TelegramBots\InfoBot\Entities\TelegramButton;
use Longman\TelegramBot\Entities\CallbackQuery;
use Longman\TelegramBot\Entities\ServerResponse;
use Longman\TelegramBot\Exception\TelegramException;
use Longman\TelegramBot\Request;

class Services extends TelegramButton
{
    protected string $buttonKey = 'services';

    protected string $buttonText = '';

    public function __construct()
    {
        parent::__construct();
        $this->buttonText = 'Услуги';
    }

    /**
     * @throws TelegramException
     */
    public function handle(CallbackQuery $query): ServerResponse
    {
        $accountInfo = $query->getMessage()->getChat();
        $chatId = $accountInfo->getId();

        $serviceText = \App\Models\Services::all()->first()->description_kk;

        return Request::sendMessage([
            'chat_id' => $chatId,
            'text'          => $serviceText,
            'reply_markup' => StartKeyboard::make()->getKeyboard()
        ]);
    }
}
