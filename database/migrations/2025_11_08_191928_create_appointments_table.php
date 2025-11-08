<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('patient_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('therapist_id')->constrained('users')->onDelete('cascade');
            $table->dateTime('appointment_date');
            $table->integer('duration_minutes')->default(60);
            $table->enum('status', ['scheduled', 'completed', 'cancelled', 'no_show', 'rescheduled'])->default('scheduled');
            $table->text('notes')->nullable();
            $table->string('meeting_link')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->index(['therapist_id', 'appointment_date']);
            $table->index(['patient_id', 'appointment_date']);
            $table->index('status');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
