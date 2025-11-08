<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('resources', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->enum('resource_type', ['article', 'video', 'pdf', 'audio', 'link', 'book'])->default('article');
            $table->string('url')->nullable();
            $table->string('file_path')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->index('resource_type');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('resources');
    }
};
