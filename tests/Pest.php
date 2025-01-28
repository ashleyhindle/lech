<?php

use App\Models\ApiToken;

pest()->extend(Tests\TestCase::class)
 // ->use(Illuminate\Foundation\Testing\RefreshDatabase::class)
    ->in('Feature');

arch()->preset()->security();

expect()->extend('toBeOne', function () {
    return $this->toBe(1);
});

beforeAll(function () {
    ApiToken::create([
        'token' => 'lech_E64ujZycu1lDYIeO3jeIeTff0Jz0pH5lqFWbUzR97caaca42',
        'expires_at' => now()->addYear(),
    ]);
});
