<?php

use Illuminate\Support\Facades\Route;

Route::get('set/webhook', [\App\Http\Controllers\TelegramController::class, 'setWebhook']);
Route::post('webhook', [\App\Http\Controllers\TelegramController::class, 'webhook'])->name('webhook.telegram');
