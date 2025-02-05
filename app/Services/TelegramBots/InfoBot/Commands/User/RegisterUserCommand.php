<?php

namespace App\Services\TelegramBots\InfoBot\Commands\User;

use App\Models\User;
use App\Services\Telegram\TelegramService;
use App\Services\TelegramBots\InfoBot\Keyboards\Doc24\Doc24Keyboard;
use App\Services\TelegramBots\InfoBot\Traits\ImageSelector;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Longman\TelegramBot\Commands\UserCommand;
use Longman\TelegramBot\Conversation;
use Longman\TelegramBot\Entities\Keyboard;
use Longman\TelegramBot\Entities\KeyboardButton;
use Longman\TelegramBot\Entities\ServerResponse;
use Longman\TelegramBot\Request;

class RegisterUserCommand extends UserCommand
{
    use ImageSelector;

    protected $name = 'register_user';
    protected $description = 'Регистрация';
    protected $usage = 'register_user [параметры]';
    protected $version = '0.4.0';
    protected $need_mysql = true;
    protected $private_only = true;

    protected $conversation;

    public function execute(): ServerResponse
    {
        $message = $this->getMessage();
        $chat = $message->getChat();
        $user = $message->getFrom();
        $text = trim($message->getText(true));
        $chat_id = $chat->getId();
        $user_id = $user->getId();

        // Проверка, зарегистрирован ли уже пользователь
        $registered = DB::table('conversation')
            ->where('user_id', $user_id)
            ->where('status', 'stopped')
            ->first();
        if ($registered) {
            TelegramService::deleteLastMessage($chat_id);
            return Request::sendMessage([
                'chat_id' => $chat_id,
                'text'    => __('telegram.main.exists')
            ]);
        }

        $data = [
            'chat_id'      => $chat_id,
            'reply_markup' => Keyboard::remove(['selective' => true]),
        ];

        $this->conversation = new Conversation($user_id, $chat_id, $this->getName());

        $notes = &$this->conversation->notes;
        !is_array($notes) && $notes = [];

        $state = $notes['state'] ?? 0;
        $result = Request::emptyResponse();

        Log::info('state: ' . $state);

        switch ($state) {
            case 0:
                if ($text === '') {
                    TelegramService::deleteLastMessage($chat_id);
                    $notes['state'] = 0;
                    $this->conversation->update();
                    $data['text'] = __('telegram.main.send_iin');
                    $result = Request::sendMessage($data);
                    break;
                }

                $validator = preg_match('/^\d{12}$/', $text);
                if (strlen($text) != 12 || !$validator) {
                    $data['text'] = __('telegram.main.iin_max_12');
                    $result = Request::sendMessage($data);
                    break;
                }
                $users = User::getUserByIinBin($text);
                if ($users) {
                    return Request::sendMessage([
                        'chat_id' => $chat_id,
                        'text'    => __('telegram.main.iin_exists')
                    ]);
                }

                $notes['iin_bin'] = $text;
                $notes['state'] = 1;
                $this->conversation->update();
                $text = '';

            case 1:
                if ($message->getContact() === null) {
                    $notes['state'] = 1;
                    $this->conversation->update();

                    $data['reply_markup'] = (new Keyboard(
                        (new KeyboardButton(__('telegram.main.share_contact')))->setRequestContact(true)
                    ))
                        ->setOneTimeKeyboard(true)
                        ->setResizeKeyboard(true)
                        ->setSelective(true);

                    $data['text'] = __('telegram.main.your_phone');
                    if ($text !== '') {
                        $data['text'] = __('telegram.main.button_share_contact');
                    }
                    TelegramService::deleteLastMessage($chat_id);
                    $result = Request::sendMessage($data);
                    break;
                }

                $phoneNumber = $message->getContact()->getPhoneNumber();
                $users = User::getUserByPhoneNumber($phoneNumber);
                if ($users) {
                    return Request::sendMessage([
                        'chat_id' => $chat_id,
                        'text'    => __('telegram.main.phone_exists')
                    ]);
                }
                $notes['phone_number'] = $phoneNumber;
                $notes['state'] = 2;
                $this->conversation->update();

                $data['text'] = __('telegram.main.successfully_registered');
                $data['reply_markup'] = Keyboard::remove();
                TelegramService::deleteLastMessage($chat_id);
                $result = Request::sendMessage($data);

                $text = '';

            case 2:
                if ($text === '') {
                    $notes['state'] = 2;
                    $this->conversation->update();
                    if ($user->notes) {
                        $notes = json_decode($user->notes);
                        if (config('setting.with_qr_code')) {
                            $salesRepId = Cache::get("qr_{$chat_id}");
                            if (!$salesRepId) {
                                return Request::sendMessage([
                                    'chat_id' => $chat_id,
                                    'text' => __('telegram.sales_rep.not_fount_in_db')
                                ]);
                            }
                        }
                        if ($notes->state == \App\Models\Conversation::STATE_2) {
                            User::updateIinPhoneNumber($user_id, $notes->iin_bin ?? null, $notes->phone_number ?? null, $salesRepId ?? null);
                        }
                    }

                    $keyboard = Doc24Keyboard::make()->getKeyboard();

                    $data['text'] = __('telegram.main.menu');
                    $data['reply_markup'] = $keyboard;
                    TelegramService::deleteLastMessage($chat_id);
                    $result = Request::sendMessage($data);

                    $this->conversation->stop();
                    break;
                }
        }

        return $result;
    }
}
