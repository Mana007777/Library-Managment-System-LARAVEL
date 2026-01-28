<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('isbn')->unique();
            $table->string('title')->index();
            $table->text('description')->nullable();

            $table->foreignId('publisher_id')->nullable()->constrained()->nullOnDelete();

            $table->year('publication_year')->nullable();
            $table->string('language', 50)->nullable();
            $table->unsignedInteger('pages')->nullable();
            $table->string('cover_image')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
