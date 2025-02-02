<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Telegram\Bot\Laravel\Facades\Telegram;
use App\Telegram\Commands\StartCommand;

class TelegramBotServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Telegram::addCommand([
                StartCommand::class
        ]);
    }
}
