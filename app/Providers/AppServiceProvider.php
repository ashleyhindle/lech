<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        // Separate rate limit for each API token
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->header('X-Api-Token') ?? $request->ip());
        });
    }
}
