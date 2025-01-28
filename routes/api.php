<?php

use App\Http\Controllers\Api\DecodeController;
use App\Http\Controllers\Api\EncodeController;
use App\Http\Middleware\EnsureApiTokenIsValid;
use Illuminate\Support\Facades\Route;

Route::middleware([EnsureApiTokenIsValid::class, 'throttle:api'])->group(function () {
    Route::post('/encode', EncodeController::class);
    Route::post('/decode', DecodeController::class);
});
