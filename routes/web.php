<?php

use Illuminate\Http\Request;

Route::get('/', [\App\Http\Controllers\MainController::class, 'index'])->name('home');

Route::post('cert-request', [\App\Http\Controllers\MainController::class, 'certRequest'])->name('cert_request');

