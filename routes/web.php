<?php

use Illuminate\Http\Request;
use App\Http\Controllers\MainController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ContactController;

// Главная страница
Route::get('/', [MainController::class, 'index'])->name('home');

// Основные страницы
Route::get('/about', [MainController::class, 'about'])->name('about');
Route::get('/services', [MainController::class, 'services'])->name('services');
Route::get('/contact', [MainController::class, 'contact'])->name('contact');

// Новости
Route::prefix('news')->name('news.')->group(function () {
    Route::get('/', [NewsController::class, 'index'])->name('index');
    Route::get('/{slug}', [NewsController::class, 'show'])->name('show');
});

// Проекты
Route::prefix('projects')->name('projects.')->group(function () {
    Route::get('/', [ProjectController::class, 'index'])->name('index');
    Route::get('/{slug}', [ProjectController::class, 'show'])->name('show');
});

// Отдельные страницы
Route::get('/page/{slug}', [PageController::class, 'show'])->name('page.show');

// API маршруты (сохраняем существующий функционал)
Route::post('cert-request', [MainController::class, 'certRequest'])->name('cert_request');
Route::get('check-cert', [MainController::class, 'checkCert']);
Route::get('/refresh-csrf-token', function () {
    return response()->json(['token' => csrf_token()]);
});

// Смена языка
Route::get('lang/{locale}', function ($locale) {
    if (in_array($locale, ['ru', 'kk'])) {
        session(['locale' => $locale]);
    }
    return redirect()->back();
})->name('lang.switch');

// Контактная форма
Route::post('/contact-message', [ContactController::class, 'store'])->name('contact.store');
