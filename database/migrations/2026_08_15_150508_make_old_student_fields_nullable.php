<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('students', function (Blueprint $table) {
            $table->string('student_id')->nullable()->change();
            $table->string('first_name')->nullable()->change();
            $table->string('last_name')->nullable()->change();
            $table->enum('gender', ['Male', 'Female', 'Other'])->nullable()->change();
            $table->string('course')->nullable()->change();
            $table->integer('semester')->nullable()->change();
        });
    }

    public function down(): void
    {
        Schema::table('students', function (Blueprint $table) {
            $table->string('student_id')->nullable(false)->change();
            $table->string('first_name')->nullable(false)->change();
            $table->string('last_name')->nullable(false)->change();
            $table->enum('gender', ['Male', 'Female', 'Other'])->nullable(false)->change();
            $table->string('course')->nullable(false)->change();
            $table->integer('semester')->nullable(false)->change();
        });
    }
};