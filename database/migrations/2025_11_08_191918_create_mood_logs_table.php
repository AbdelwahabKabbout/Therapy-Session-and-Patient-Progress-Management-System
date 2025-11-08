<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('mood_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('patient_id')->constrained('users')->onDelete('cascade');
            $table->date('log_date');
            $table->integer('mood_rating'); // 1-10 scale
            $table->text('reflection')->nullable();
            $table->json('tags')->nullable(); // e.g., ['anxious', 'happy', 'stressed']
            $table->timestamps();

            $table->unique(['patient_id', 'log_date']);
            $table->index('log_date');
            $table->index('mood_rating');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('mood_logs');
    }
};
