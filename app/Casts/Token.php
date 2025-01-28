<?php

namespace App\Casts;

use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use Illuminate\Database\Eloquent\Model;

/**
 * @implements CastsAttributes<string, string>
 */
class Token implements CastsAttributes
{
    public function get(Model $model, string $key, mixed $value, array $attributes): string
    {
        return $value;
    }

    public function set(Model $model, string $key, mixed $value, array $attributes): string
    {
        return hash('sha256', $value);
    }
}
