<?php

use App\Models\Url;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('redirects to the original url with valid nanoid', function () {
    $url = Url::factory()->create();

    $response = $this->get(route('redirect', ['url' => $url->nanoid]));

    $response->assertRedirect($url->url);
});

test('returns 404 with an invalid nanoid', function () {
    $response = $this->get(route('redirect', ['url' => 'invalid']));

    $response->assertNotFound();
});
