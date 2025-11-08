<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('feedback', function (Blueprint $table) {
            $table->id();
            $table->foreignId('patient_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('therapist_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('appointment_id')->nullable()->constrained('appointments')->onDelete('set null');
            $table->date('date');
            $table->integer('rating'); // 1-5 scale
            $table->text('comment')->nullable();
            $table->boolean('is_anonymous')->default(false);
            $table->timestamps();

            $table->index(['therapist_id', 'rating']);
            $table->index('date');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('feedback');
    }
};
