<?php

use Illuminate\Support\Facades\Route;


Route::get('/', [App\Http\Controllers\QrController::class, 'index']);


Route::post('/generateQrCode', [App\Http\Controllers\QrController::class, 'generateQrCode'])->name('generateQrCode');

