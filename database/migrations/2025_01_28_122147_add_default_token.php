<?php

use App\Models\ApiToken;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public const TOKEN = 'lech_E64ujZycu1lDYIeO3jeIeTff0Jz0pH5lqFWbUzR97caaca42';

    public function up(): void
    {
        ApiToken::create([
            'token' => self::TOKEN,
            'expires_at' => now()->addYear(),
        ]);
    }

    public function down(): void
    {
        ApiToken::where('token', self::TOKEN)->delete();
    }
};
