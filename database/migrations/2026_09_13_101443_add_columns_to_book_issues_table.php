<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('book_issues', function (Blueprint $table) {
            $table->foreignId('book_id')->after('id')->constrained('books')->cascadeOnDelete();
            $table->foreignId('student_id')->after('book_id')->constrained('students')->cascadeOnDelete();

            $table->date('issue_date')->after('student_id');
            $table->date('due_date')->after('issue_date');
            $table->date('return_date')->nullable()->after('due_date');

            $table->string('status')->default('Issued')->after('return_date');
        });
    }

    public function down(): void
    {
        Schema::table('book_issues', function (Blueprint $table) {
            $table->dropForeign(['book_id']);
            $table->dropForeign(['student_id']);

            $table->dropColumn([
                'book_id',
                'student_id',
                'issue_date',
                'due_date',
                'return_date',
                'status',
            ]);
        });
    }
};