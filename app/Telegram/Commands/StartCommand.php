<?php

namespace App\Telegram\Commands;

use Telegram\Bot\Commands\Command;

class StartCommand extends Command
{
    protected string $name = "start";
    protected string $description = "Запуск бота и информация о сертификации";

    public function handle() {
        // Получаем информацию о сертификациях из БД
        $certifications = [
            (object) ['name' => 'PHP', 'price' => 1000],
            (object) ['name' => 'JavaScript', 'price' => 1500],
            (object) ['name' => 'Python', 'price' => 2000],
        ];

        // Формируем сообщение
        $message = "🔐 *Добро пожаловать в бот сертификации!*\n\n";
        $message .= "Мы помогаем пройти сертификацию по направлениям:\n";
        
        foreach ($certifications as $cert) {
            $message .= "— {$cert->name} ({$cert->price} руб.)\n";
        }

        $message .= "\nВыберите действие:";

        // Отправляем сообщение с кнопками
        $this->replyWithMessage([
            'text' => $message,
            'parse_mode' => 'Markdown',
            'reply_markup' => json_encode([
                'inline_keyboard' => [
                    [
                        ['text' => '📚 Каталог курсов', 'url' => 'https://example.com/courses'],
                        ['text' => '📝 Начать тест', 'callback_data' => 'start_test']
                    ]
                ]
            ])
        ]);
    }
}
