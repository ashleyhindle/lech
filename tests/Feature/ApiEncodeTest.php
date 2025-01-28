<?php

use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('last_used_at is updated when API token is used', function () {
    $rawToken = Illuminate\Support\Str::random(8);
    $token = App\Models\ApiToken::factory()->withToken($rawToken)->create();
    $this->postJson('/api/encode', ['url' => 'https://google.com'], ['X-Api-Token' => $rawToken]);
    $token->refresh();

    $this->assertNotNull($token->last_used_at);
});

test('returns 401 when no API token is provided', function () {
    $response = $this->postJson('/api/encode');

    $response->assertStatus(401);
});

test('returns 401 when invalid API token is provided', function () {
    $response = $this->postJson('/api/encode', ['url' => 'https://google.com'], ['X-Api-Token' => 'i-am-not-a-valid-token']);

    $response->assertStatus(401);
});

test('returns 401 when expired API token is provided', function () {
    $token = App\Models\ApiToken::factory()->create(['expires_at' => now()->subMinutes(1)]);
    $response = $this->postJson('/api/encode', ['url' => 'https://google.com'], ['X-Api-Token' => $token->token]);

    $response->assertStatus(401);
});

test('receive 422 without url', function () {
    $response = $this->postJsonValid('/api/encode');

    $response->assertStatus(422);
});

test('receive 422 with an invalid url', function () {
    $response = $this->postJsonValid('/api/encode', ['url' => 'i-am-definitely-not-a-url']);

    $response->assertStatus(422);
});

test('encodes valid URL successfully', function () {
    $response = $this->postJsonValid('/api/encode', ['url' => 'https://google.com']);

    $response->assertStatus(201);
    $response->assertExactJsonStructure(['short_url']);

    $short_url = $response->json('short_url');
    $this->assertStringStartsWith(config('app.url').'/', $short_url);
});
