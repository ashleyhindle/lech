<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/howdy', function (Request $request) {
    return response()->json(['message' => 'Howdy!']);
});
