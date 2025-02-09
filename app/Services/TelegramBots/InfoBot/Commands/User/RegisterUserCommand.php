<?php

namespace App\Services\TelegramBots\InfoBot\Commands\User;

use App\Models\CertificateRequest;
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
        if ($text == 'Отменить заявку') {
            $this->conversation->stop();
            return Request::sendMessage([
                'chat_id' => $chat_id,
                'text'    => 'Регистрация отменена',
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
                    $data['text'] = 'Пожалуйста, введите вашу фамилию';
                    $data['reply_markup'] = new Keyboard([
                        ['text' => 'Отменить заявку', 'callback_data' => 'Отменить', 'resize_keyboard' => true]
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
                    $data['text'] = 'Пожалуйста, введите ваше имя';
                    $data['reply_markup'] = new Keyboard([
                        ['text' => 'Отменить заявку', 'callback_data' => 'Отменить заявку', 'resize_keyboard' => true]
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
                    $data['text'] = 'Пожалуйста, введите ваше отчество';
                    $data['reply_markup'] = new Keyboard([
                        ['text' => 'Отменить заявку', 'callback_data' => 'Отменить', 'resize_keyboard' => true]
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
                    $data['text'] = 'Пожалуйста, введите ваш ИИН';
                    $data['reply_markup'] = new Keyboard([
                        ['text' => 'Отменить заявку', 'callback_data' => 'Отменить', 'resize_keyboard' => true]
                    ]);
                    $result = Request::sendMessage($data);
                    break;
                }
                if (!preg_match('/^\d{12}$/', $text)) {
                    $data['text'] = 'ИИН должен состоять из 12 цифр. Пожалуйста, введите ваш ИИН снова.';
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
                    $data['text'] = 'Пожалуйста, введите ваш вид деятельности';
                    $data['reply_markup'] = new Keyboard([
                        ['text' => 'Отменить заявку', 'callback_data' => 'Отменить', 'resize_keyboard' => true]
                    ]);
                    $result = Request::sendMessage($data);
                    break;
                }
                $notes['activity_type'] = $text;
                $text = '';
                $notes['state'] = 5;
                $this->conversation->update();
            // no break
            case 5:
                if ($text === '') {
                    $data['text'] = 'Пожалуйста, введите вашу специальность';
                    $data['reply_markup'] = new Keyboard([
                        ['text' => 'Отменить заявку', 'callback_data' => 'Отменить заявку', 'resize_keyboard' => true]
                    ]);
                    $result = Request::sendMessage($data);
                    break;
                }
                $notes['specialty'] = $text;
                $text = '';
                $notes['state'] = 6;
                $this->conversation->update();
            // no break
            case 6:
                if ($text === '') {
                    $data['text'] = 'Пожалуйста, введите ваш контактный телефон';
                    $data['reply_markup'] = new Keyboard([
                        ['text' => 'Отменить заявку', 'callback_data' => 'Отменить', 'resize_keyboard' => true]
                    ]);
                    $result = Request::sendMessage($data);
                    break;
                }
                if (!preg_match('/^\+?\d{10,15}$/', $text)) {
                    $data['text'] = 'Некорректный номер телефона. Пожалуйста, введите ваш контактный телефон снова.';
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
                    $data['text'] = 'Пожалуйста, введите ваше место работы';
                    $data['reply_markup'] = new Keyboard([
                        ['text' => 'Отменить заявку', 'callback_data' => 'Отменить', 'resize_keyboard' => true]
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
                    $data['text'] = 'Пожалуйста, введите имя отправителя';
                    $data['reply_markup'] = new Keyboard([
                        ['text' => 'Отменить заявку', 'callback_data' => 'Отменить', 'resize_keyboard' => true]
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
                    $data['text'] = 'Пожалуйста, отправьте копию документа или нажмите "Пропустить"';
                    $data['reply_markup'] = new Keyboard([
                        ['text' => 'Пропустить', 'callback_data' => 'Пропустить', 'resize_keyboard' => true],
                        ['text' => 'Отменить заявку', 'callback_data' => 'Отменить', 'resize_keyboard' => true]

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
                $data['text'] = 'Регистрация завершена! Ваша заявка принята на обработку. Ожидайте ответа.';
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
}
