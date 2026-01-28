<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('book_copies', function (Blueprint $table) {
            $table->id();

            $table->foreignId('book_id')->constrained()->cascadeOnDelete();

            $table->string('barcode')->unique();
            $table->string('shelf_location')->nullable();

            $table->enum('condition', ['new', 'good', 'damaged'])->default('good');
            $table->enum('status', ['available', 'borrowed', 'lost', 'maintenance'])->default('available');

            $table->timestamps();

            $table->index(['book_id', 'status']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('book_copies');
    }
};
