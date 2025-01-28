<?php

declare(strict_types=1);

namespace App\Actions;

use Illuminate\Support\Str;

class GenerateToken
{
    public function __invoke(): string
    {
        // Partially borrowed from sanctum - https://github.com/laravel/sanctum/blob/4.x/src/HasApiTokens.php
        return sprintf(
            'lech_%s%s',
            $tokenEntropy = Str::random(40),
            hash('crc32b', $tokenEntropy)
        );
    }
}
