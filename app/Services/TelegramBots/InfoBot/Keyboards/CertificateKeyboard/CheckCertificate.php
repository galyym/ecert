<?php

namespace App\Services\TelegramBots\InfoBot\Keyboards\CertificateKeyboard;

use App\Services\TelegramBots\InfoBot\Entities\TelegramButton;
use Longman\TelegramBot\Entities\CallbackQuery;
use Longman\TelegramBot\Entities\ServerResponse;
use Longman\TelegramBot\Exception\TelegramException;
use Longman\TelegramBot\Request;

class CheckCertificate extends TelegramButton
{
    protected string $buttonKey = 'check_certification';

    protected string $buttonText = '';

    public function __construct()
    {
        parent::__construct();
        $this->buttonText = 'Проверить сертификат';
    }

    /**
     * @throws TelegramException
     */
    public function handle(CallbackQuery $query): ServerResponse
    {
        $accountInfo = $query->getMessage()->getChat();
        $chatId = $accountInfo->getId();

        return Request::sendMessage([
            'chat_id' => $chatId,
            'text' => 'Введите ИИН и номер сертификата'
        ]);
    }
}
