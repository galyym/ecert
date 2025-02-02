<?php

use Illuminate\Support\Facades\Route;
use Telegram\Bot\Api;
use Telegram\Bot\Laravel\Facades\Telegram;

Route::get('/', function () {
    $telegram = new Api(env('TELEGRAM_BOT_TOKEN', ''));
    dd($telegram->getUpdates());
});

Route::post('/telegram-webhook', function () {
    Telegram::commandsHandler(true);
    return response()->json(['status' => 'success']);
});