<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('books', function (Blueprint $table) {

            $table->id();

            $table->string('book_id')->unique();

            $table->string('title');

            $table->string('author');

            $table->string('category')->nullable();

            $table->string('isbn')->nullable();

            $table->unsignedInteger('quantity')->default(1);

            $table->unsignedInteger('available_copies')->default(1);

            $table->string('status')->default('Available');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};