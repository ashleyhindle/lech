<?php

namespace Database\Factories;

use App\Actions\GenerateToken;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ApiToken>
 */
class ApiTokenFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $token = (new GenerateToken)();

        return [
            'token' => $token,
            'expires_at' => now()->addMinutes(1440),
        ];
    }

    public function expired(): self
    {
        return $this->state(function (array $attributes) {
            return ['expires_at' => now()->subMinutes(1)];
        });
    }
}
