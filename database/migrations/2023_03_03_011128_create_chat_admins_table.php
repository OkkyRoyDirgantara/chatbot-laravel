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
        Schema::create('chat_admins', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_admin');
            $table->unsignedBigInteger('id_user');
            $table->string('message', 5000);
            $table->boolean('is_send')->default(false)->nullable();
            $table->timestamps();
            $table->foreign('id_user')->references('id_user')->on('users_telegram')->onDelete('cascade');
            $table->foreign('id_admin')->references('id_admin')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chat_admins');
    }
};
