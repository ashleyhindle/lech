<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('urls', function (Blueprint $table) {
            $table->string('nanoid')->primary(); // Primary also makes it unique which we require
            $table->string('url');
            $table->timestamps(); // We only need created_at but HasTimestamps trait makes it easier to keep updated_at too, and maybe we'll need it later
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('urls');
    }
};
