<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Testing\TestResponse;

abstract class TestCase extends BaseTestCase
{
    public string $validApiToken = 'lech_E64ujZycu1lDYIeO3jeIeTff0Jz0pH5lqFWbUzR97caaca42';

    public function postJsonValid(string $endpoint, array $data = []): TestResponse
    {
        return $this->postJson($endpoint, $data, ['X-Api-Token' => $this->validApiToken]);
    }
}
