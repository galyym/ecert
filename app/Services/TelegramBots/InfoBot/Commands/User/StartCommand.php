<?php

namespace App\Services\TelegramBots\InfoBot\Commands\User;

use App\Models\Message;
use App\Models\Setting;
use App\Models\User;
use App\Services\Telegram\TelegramService;
use App\Services\TelegramBots\InfoBot\Keyboards\MainMenyKeyboard\MenuKeyboard;
use App\Services\TelegramBots\InfoBot\Keyboards\StartKeyboard\StartKeyboard;
use App\Services\TelegramBots\InfoBot\Traits\ImageSelector;
use Illuminate\Support\Facades\Log;
use Longman\TelegramBot\Commands\UserCommand;
use Longman\TelegramBot\Entities\Keyboard;
use Longman\TelegramBot\Entities\ServerResponse;
use Longman\TelegramBot\Exception\TelegramException;
use Longman\TelegramBot\Request;
use Throwable;

/**
 * Start command
 */
class StartCommand extends UserCommand
{
    use ImageSelector;

    /**
     * @var string
     */
    protected $name = 'start';

    /**
     * @var string
     */
    protected $description = 'Start command';

    /**
     * @var string
     */
    protected $usage = '/start';

    /**
     * @var string
     */
    protected $version = '1.2.0';

    /**
     * @return ServerResponse
     * @throws TelegramException
     * @throws Throwable
     */
    public function execute(): ServerResponse
    {
        $message = $this->getMessage();
        $chat    = $message->getChat();
        $chat_id = $chat->getId();

        return $this->send(
            'Добро пожаловать! Для продолжения работы с ботом, пожалуйста, ознакомьтесь с правилами и условиями использования бота.',
            $chat_id,
            StartKeyboard::make()->getKeyboard()
        );
    }

    /**
     * @throws TelegramException
     */
    private function send(string $text, int $chatId, Keyboard $keyboard): ServerResponse
    {
        TelegramService::deleteLastMessage($chatId);
        return Request::sendMessage([
            'chat_id'       => $chatId,
            'text'          => $text,
            'reply_markup'  => $keyboard
        ]);
    }
}
