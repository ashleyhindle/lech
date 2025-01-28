<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Url>
 */
class UrlFactory extends Factory
{
    public function definition(): array
    {
        return [
            'url' => fake()->url(),
            'nanoid' => Str::random(7),
        ];
    }
}
