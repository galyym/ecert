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

class CheckCertCommand extends UserCommand
{
    use ImageSelector;

    protected $name = 'check_cert';
    protected $description = 'Проверка сертификата';
    protected $usage = 'check_cert';
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

                $certificate = CertificateRequest::where('iin', $text)
                    ->orderByDesc('created_at')
                    ->first();

                if ($certificate->certificate_file && $certificate->status == 'confirmed') {
                    Request::sendDocument([
                        'chat_id'       => $chat_id,
                        'document'      => \Storage::disk('public')->path($certificate->certificate_file),
                        'caption' => __('certificate.certificate_number') .$certificate->certificate_number,
                    ]);
                } else {
//                    if ($certificate->status == 'reject')
                    $data["text"] = __('certificate.request_reject');
                    Request::sendMessage($data);
                }

                $this->conversation->update();
                $this->conversation->stop();
                break;
        }

        return $result;
    }
}
