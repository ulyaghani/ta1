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
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // ID pengirim pesan (user atau admin)
            $table->unsignedBigInteger('adminchat_id')->nullable(); // ID admin penerima pesan
            $table->text('message'); // Isi pesan
            $table->enum('sender', ['user', 'AdminChat', 'SuperAdmin']); // Siapa yang mengirim pesan
            $table->timestamps();

            // Foreign keys
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('adminchat_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('messages');
    }
};
