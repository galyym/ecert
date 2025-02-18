<?php

use Illuminate\Http\Request;

Route::get('/', function (){
    return view('welcome');
})->name('home');

Route::post('cert-request', function (Request $request){
    Log::info('cert-request', $request->all());
    return response()->json(['success' => true]);
})->name('cert_request');

