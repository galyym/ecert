<?php

namespace App\Services\TelegramBots\InfoBot\Keyboards\MainMenyKeyboard;

use App\Models\Setting;
use App\Services\Telegram\TelegramService;
use App\Services\TelegramBots\InfoBot\Entities\TelegramButton;
use App\Services\TelegramBots\InfoBot\Keyboards\Doc24\Doc24Keyboard;
use Illuminate\Support\Facades\Log;
use Longman\TelegramBot\Entities\CallbackQuery;
use Longman\TelegramBot\Entities\ServerResponse;
use Longman\TelegramBot\Exception\TelegramException;
use Longman\TelegramBot\Request;

class MainMenu extends TelegramButton
{
    protected string $buttonKey = 'main_menu';

    protected string $buttonText = 'Главное меню';

    public function __construct()
    {
        parent::__construct();
        $this->buttonText = __('telegram.main.main_menu');
    }

    /**
     * @throws TelegramException
     */
    public function handle(CallbackQuery $query): ServerResponse
    {
        $accountInfo = $query->getMessage()->getChat();
        $chatId = $accountInfo->getId();

        TelegramService::deleteLastMessage($chatId);
        return Request::sendMessage([
            'chat_id'       => $chatId,
            'text'          => __('telegram.main.main_menu'),
            'reply_markup' => '',
        ]);
    }
}
