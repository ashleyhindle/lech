<?php

use App\Models\Url;

test('returns 401 when no API token is provided', function () {
    $response = $this->postJson('/api/decode');

    $response->assertStatus(401);
});

test('returns 401 when invalid API token is provided', function () {
    $response = $this->postJson('/api/decode', ['url' => 'https://lech.test/abc1234'], ['X-Api-Token' => 'i-am-not-a-valid-token']);

    $response->assertStatus(401);
});

test('returns 401 when expired API token is provided', function () {
    $token = App\Models\ApiToken::factory()->create(['expires_at' => now()->subMinutes(1)]);
    $response = $this->postJson('/api/decode', ['url' => 'https://lech.test/abc1234'], ['X-Api-Token' => $token->token]);

    $response->assertStatus(401);
});

test('decode 400s with invalid nanoid', function () {
    $response = $this->postJsonValid('/api/decode', ['url' => 'i-definitely-dont-exist']);
    $response->assertStatus(422);
});

test('decodes valid short URL successfully', function () {
    /* Decode short URL to original URL */
    $url = Url::factory()->create();
    $response = $this->postJsonValid('/api/decode', ['url' => 'https://lech.test/'.$url->nanoid]);
    $response->assertStatus(200);
    $response->assertExactJson(['original_url' => $url->url]);
});
