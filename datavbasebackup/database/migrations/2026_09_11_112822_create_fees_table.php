<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('fees', function (Blueprint $table) {

            $table->id();

            $table->foreignId('student_id')
                ->constrained('students')
                ->cascadeOnDelete();

            $table->string('academic_year');

            $table->string('grade');

            $table->string('fee_type');

            $table->decimal('total_amount', 10, 2);

            $table->decimal('discount', 10, 2)
                ->default(0);

            $table->decimal('paid_amount', 10, 2)
                ->default(0);

            $table->decimal('remaining_amount', 10, 2)
                ->default(0);

            $table->date('payment_date')
                ->nullable();

            $table->string('payment_method')
                ->nullable();

            $table->string('payment_status')
                ->default('Pending');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('fees');
    }
};