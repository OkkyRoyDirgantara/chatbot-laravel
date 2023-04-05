<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('bot_status', function (Blueprint $table) {
            $table->id();
            $table->boolean('is_run')->default(false)->nullable();
            $table->dateTime('run_at')->nullable();
            $table->dateTime('stop_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bot_status');
    }
};
