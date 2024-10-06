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
        Schema::create('rating', function (Blueprint $table) {
            $table->id();
            $table->integer('stars');
            $table->text('comment');
            $table->foreignId('users_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('rooms_id')->constrained('rooms')->cascadeOnDelete();
            $table->foreignId('booking_id')->constrained('booking')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rating');
    }
};
