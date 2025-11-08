<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('plan_exercises', function (Blueprint $table) {
            $table->id();
            $table->foreignId('plan_id')->constrained('session_plans')->onDelete('cascade');
            $table->foreignId('exercise_id')->constrained('exercises')->onDelete('cascade');
            $table->date('assigned_date');
            $table->enum('completion_status', ['pending', 'in_progress', 'completed', 'skipped'])->default('pending');
            $table->text('note')->nullable();
            $table->timestamps();

            $table->unique(['plan_id', 'exercise_id']);
            $table->index('completion_status');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('plan_exercises');
    }
};
