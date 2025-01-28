<?php

namespace App\Models;

use App\Casts\Token;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApiToken extends Model
{
    /** @use HasFactory<\Database\Factories\ApiTokenFactory> */
    use HasFactory;

    protected $fillable = ['token', 'expires_at', 'last_used_at'];

    protected $casts = [
        'token' => Token::class,
        'expires_at' => 'datetime',
        'last_used_at' => 'datetime',
    ];
}
