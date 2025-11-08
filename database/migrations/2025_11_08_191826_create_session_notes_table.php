<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('session_notes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('plan_id')->constrained('session_plans')->onDelete('cascade');
            $table->foreignId('therapist_id')->constrained('users')->onDelete('cascade');
            $table->date('session_date');
            $table->text('summary');
            $table->text('therapist_comments')->nullable();
            $table->text('next_steps')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->index(['plan_id', 'session_date']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('session_notes');
    }
};
