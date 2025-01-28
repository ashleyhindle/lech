<?php

use App\Livewire\HomeShorten;
use App\Models\Url;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeShorten::class);

Route::get('/{url}', function (Url $url) {
    return response()->redirectTo($url->url, 301);
})->name('redirect');
