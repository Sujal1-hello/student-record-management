<?php

use App\Http\Controllers\BookIssueController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\FeeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use App\Models\Student;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/dashboard', function () {
        $totalStudents = Student::count();

        $maleStudents = Student::where('gender', 'Male')->count();

        $femaleStudents = Student::where('gender', 'Female')->count();

        $otherStudents = Student::where('gender', 'Other')->count();

        $totalCourses = Student::whereNotNull('course')
            ->distinct('course')
            ->count('course');

        return view('dashboard', compact(
            'totalStudents',
            'maleStudents',
            'femaleStudents',
            'otherStudents',
            'totalCourses'
        ));
    })->name('dashboard');

    Route::resource('students', StudentController::class);

    Route::resource('courses', CourseController::class);

    Route::resource('fees', FeeController::class);

    Route::resource('books', BookController::class);

    Route::get('book-issues', [BookIssueController::class, 'index'])->name('book-issues.index');
    Route::get('book-issues/create', [BookIssueController::class, 'create'])->name('book-issues.create');
    Route::post('book-issues', [BookIssueController::class, 'store'])->name('book-issues.store');
    Route::patch('book-issues/{bookIssue}/return', [BookIssueController::class, 'returnBook'])->name('book-issues.return');

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
});

require __DIR__ . '/auth.php';