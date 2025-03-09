<?php

namespace App\Services\TelegramBots\InfoBot\Commands\User;

use App\Models\CertificateRequest;
use App\Models\Position;
use App\Services\Telegram\TelegramService;
use App\Services\TelegramBots\InfoBot\Keyboards\RegisterKeyboard\ReRegistrationKeyboard;
use App\Services\TelegramBots\InfoBot\Traits\ImageSelector;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Longman\TelegramBot\Commands\UserCommand;
use Longman\TelegramBot\Conversation;
use Longman\TelegramBot\Entities\InlineKeyboard;
use Longman\TelegramBot\Entities\Keyboard;
use Longman\TelegramBot\Entities\KeyboardButton;
use Longman\TelegramBot\Entities\ServerResponse;
use Longman\TelegramBot\Request;

class RegisterUserCommand extends UserCommand
{
    use ImageSelector;

    protected $name = 'register_user';
    protected $description = 'Регистрация';
    protected $usage = 'register_user';
    protected $version = '0.4.0';
    protected $need_mysql = true;
    protected $private_only = true;

    protected $conversation;

    public function execute($reRegister = false): ServerResponse
    {
        Log::info('execute: ' . $this->getName());
        $message = $this->getMessage();
        $callback_query = $this->getCallbackQuery();
        $chat = $message ? $message->getChat() : $callback_query->getMessage()->getChat();
        $user = $message ? $message->getFrom() : $callback_query->getFrom();
        $text = trim($message ? $message->getText(true) : '');
        $chat_id = $chat->getId();
        $user_id = $user->getId();

        // Проверка, зарегистрирован ли уже пользователь
//        $registered = DB::table('conversation')
//            ->where('user_id', $user_id)
//            ->where('status', 'stopped')
//            ->first();
//        if ($registered && !$reRegister) {
//            TelegramService::deleteLastMessage($chat_id);
//            return Request::sendMessage([
//                'chat_id' => $chat_id,
//                'text'    => 'Вы уже зарегистрированы!',
//                'reply_markup' => ReRegistrationKeyboard::make()->getKeyboard(),
//            ]);
//        }

        $data = [
            'chat_id'      => $chat_id,
            'reply_markup' => Keyboard::remove(['selective' => true]),
        ];

        $this->conversation = new Conversation($user_id, $chat_id, $this->getName());
        if ($text == __('certificate.cancel_request')) {
            $this->conversation->stop();
            return Request::sendMessage([
                'chat_id' => $chat_id,
                'text'    => __('certificate.registration_cancelled'),
            ]);
        }

        $notes = &$this->conversation->notes;
        !is_array($notes) && $notes = [];

        $state = $notes['state'] ?? 0;
        $result = Request::emptyResponse();

        Log::info('state: ' . $state);

        switch ($state) {
            case 0:
                if ($text === '') {
                    $notes['state'] = 0;
                    $this->conversation->update();
                    $data['text'] = __('certificate.enter_surname');
                    $data['reply_markup'] = new Keyboard([
                        ['text' => __('certificate.cancel_request'), 'callback_data' => __('certificate.cancel'), 'resize_keyboard' => true]
                    ]);
                    $result = Request::sendMessage($data);
                    break;
                }
                $notes['last_name'] = $text;
                $text = '';
                $notes['state'] = 1;
                $this->conversation->update();
            // no break
            case 1:
                if ($text === '') {
                    $data['text'] = __('certificate.enter_name');
                    $data['reply_markup'] = new Keyboard([
                        ['text' => __('certificate.cancel_request'), 'callback_data' => __('certificate.cancel_request'), 'resize_keyboard' => true]
                    ]);
                    $result = Request::sendMessage($data);
                    break;
                }
                $notes['first_name'] = $text;
                $text = '';
                $notes['state'] = 2;
                $this->conversation->update();
            // no break
            case 2:
                if ($text === '') {
                    $data['text'] = __('certificate.enter_patronymic');
                    $data['reply_markup'] = new Keyboard([
                        ['text' => __('certificate.cancel_request'), 'callback_data' => __('certificate.cancel'), 'resize_keyboard' => true]
                    ]);
                    $result = Request::sendMessage($data);
                    break;
                }
                $notes['middle_name'] = $text;
                $text = '';
                $notes['state'] = 3;
                $this->conversation->update();
            // no break
            case 3:
                if ($text === '') {
                    $data['text'] = __('certificate.enter_iin');
                    $data['reply_markup'] = new Keyboard([
                        ['text' => __('certificate.cancel_request'), 'callback_data' => __('certificate.cancel'), 'resize_keyboard' => true]
                    ]);
                    $result = Request::sendMessage($data);
                    break;
                }
                if (!preg_match('/^\d{12}$/', $text)) {
                    $data['text'] = __('certificate.iin_length_error');
                    $result = Request::sendMessage($data);
                    break;
                }
                $notes['iin'] = $text;
                $text = '';
                $notes['state'] = 4;
                $this->conversation->update();
            // no break
            case 4:
                if ($text === '') {
                    $data['text'] = __('certificate.enter_activity_type');
                    $data['reply_markup'] = new Keyboard([
                        ['text' => __('certificate.cancel_request'), 'callback_data' => __('certificate.cancel'), 'resize_keyboard' => true]
                    ],
                    [
                        ['text' => __('certificate.pd'), 'callback_data' => __('certificate.pd')],
                        ['text' => __('certificate.cmp'), 'callback_data' => __('certificate.cmp')]
                    ]);

                    $result = Request::sendMessage($data);
                    break;
                }

                if  ($text !== __('certificate.pd') && $text !== __('certificate.cmp')) {
                    $data['text'] = __('certificate.invalid_activity_type');
                    $result = Request::sendMessage($data);
                    break;
                }

                $notes['activity_type'] = $text;
                $text = '';
                $notes['state'] = 5;
                $this->conversation->update();
            case 5:
                if ($text === '') {
                    $data['text'] = __('certificate.enter_specialty');
                    $keyboards = $this->getPositions($this->conversation->notes['activity_type']);
                    Log::info('keyboards', $keyboards);
                    $data['reply_markup'] = new Keyboard(...$keyboards);
                    $result = Request::sendMessage($data);
                    break;
                }
                $notes['specialty'] = $text;
                $text = '';
                $notes['state'] = 6;
                $this->conversation->update();
            // no break
            case 6:
                if ($message->getContact() === null) {
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
                    $result = Request::sendMessage($data);
                    break;
                }
                $notes['phone'] = $text;
                $text = '';
                $notes['state'] = 7;
                $this->conversation->update();
            // no break
            case 7:
                if ($text === '') {
                    $data['text'] = __('certificate.enter_workplace');
                    $data['reply_markup'] = new Keyboard([
                        ['text' => __('certificate.cancel_request'), 'callback_data' => __('certificate.cancel'), 'resize_keyboard' => true]
                    ]);
                    $result = Request::sendMessage($data);
                    break;
                }
                $notes['workplace'] = $text;
                $text = '';
                $notes['state'] = 8;
                $this->conversation->update();
            // no break
            case 8:
                if ($text === '') {
                    $data['text'] = __('certificate.enter_sender_name');
                    $data['reply_markup'] = new Keyboard([
                        ['text' => __('certificate.cancel_request'), 'callback_data' => __('certificate.cancel'), 'resize_keyboard' => true]
                    ]);
                    $result = Request::sendMessage($data);
                    break;
                }
                $notes['sender_name'] = $text;
                $text = '';
                $notes['state'] = 9;
                $this->conversation->update();
            // no break
            case 9:
                if ($message->getDocument() === null && $text != 'Пропустить') {
                    $data['text'] = __('certificate.upload_document');
                    $data['reply_markup'] = new Keyboard([
                        ['text' => 'Пропустить', 'callback_data' => 'Пропустить', 'resize_keyboard' => true],
                        ['text' => __('certificate.cancel_request'), 'callback_data' => __('certificate.cancel'), 'resize_keyboard' => true]

                    ]);
                    $result = Request::sendMessage($data);
                    break;
                }
                if ($text === 'Пропустить') {
                    $notes['document'] = null;
                } else {
                    $notes['document'] = $message->getDocument()->getFileId() ?? null;
                }
                $notes['state'] = 10;
                $this->conversation->update();
            case 10:
                $data['text'] = __('certificate.registration_complete');
                $result = Request::sendMessage($data);

                // Сохранение данных пользователя в базу данных
                $certificate = CertificateRequest::updateOrCreate([
                    'iin' => $notes['iin'],
                    'chat_id' => $chat_id,
                    'user_id' => $user_id,
                ],[
                    'last_name' => $notes['last_name'],
                    'first_name' => $notes['first_name'],
                    'middle_name' => $notes['middle_name'],
                    'iin' => $notes['iin'],
                    'activity_type' => $notes['activity_type'],
                    'specialty' => $notes['specialty'],
                    'phone' => $notes['phone'],
                    'workplace' => $notes['workplace'],
                    'sender_name' => $notes['sender_name'],
                    'document' => $notes['document'] ?? null,
                    'chat_id' => $chat_id,
                    'user_id' => $user_id,
                ]);

                if ($certificate) {
                    Log::channel('certificate_log')->info('Certificate request created', [
                        'certificate' => $certificate,
                    ]);
                }

                $this->conversation->stop();
                break;
        }

        return $result;
    }

    private function getPositions($type): array
    {
        $type = $type == __('certificate.pd') ? __('certificate.pd') : __('certificate.cmp');
        $positions = Position::where('type', $type)->get();
        $buttonPositions = [];
        foreach ($positions as $position) {
            $buttonPositions[] = [
                [
                    'text' => $position->name_ru,
                    'callback_data' => $position->name_ru,
                    'resize_keyboard' => true
                ]
            ];
        }
        return $buttonPositions;
    }
}
