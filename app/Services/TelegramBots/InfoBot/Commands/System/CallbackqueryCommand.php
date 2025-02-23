<?php

namespace App\Services\TelegramBots\InfoBot\Commands\System;

use Longman\TelegramBot\Commands\SystemCommand;
use Longman\TelegramBot\Entities\ServerResponse;

/**
 * Callback query command
 */
class CallbackqueryCommand extends SystemCommand
{
    /**
     * @var callable[]
     */
    protected static array $callbacks = [];

    /**
     * @var string
     */
    protected $name = 'callbackquery';

    /**
     * @var string
     */
    protected $description = 'Reply to callback query';

    /**
     * @var string
     */
    protected $version = '1.0.0';

    /**
     * Command execute method
     *
     * @return ServerResponse
     */
    public function execute(): ServerResponse
    {
        $answer = null;

        $callback_query = $this->getCallbackQuery();

        foreach (self::$callbacks as $callback) {
            $answer = $callback($callback_query);
            if(!is_null($answer)) {
                break;
            }
        }

        $callback_data = $callback_query->getData();

//        if ($callback_data === 're_register') {
//            $button = new \App\Services\TelegramBots\InfoBot\Keyboards\RegisterKeyboard\ReRegister();
//            return $button->handle($callback_query);
//        }

        return ($answer instanceof ServerResponse) ? $answer : $callback_query->answer();
    }

    /**
     * Add a new callback handler for callback queries.
     *
     * @param $callback
     */
    public static function addCallbackHandler($callback): void
    {
        self::$callbacks[] = $callback;
    }
}
