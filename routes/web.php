<?php

use Illuminate\Http\Request;

Route::get('/', [\App\Http\Controllers\MainController::class, 'index'])->name('home');

Route::post('cert-request', [\App\Http\Controllers\MainController::class, 'certRequest'])->name('cert_request');
Route::get('check-cert', [\App\Http\Controllers\MainController::class, 'checkCert']);
Route::get('/refresh-csrf-token', function() {
    return response()->json(['token' => csrf_token()]);
});
