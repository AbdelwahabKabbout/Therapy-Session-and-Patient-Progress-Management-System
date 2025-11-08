<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('exercises', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->enum('difficulty_level', ['beginner', 'intermediate', 'advanced'])->default('beginner');
            $table->integer('duration_minutes')->default(10);
            $table->string('category')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->index('difficulty_level');
            $table->index('category');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('exercises');
    }
};
