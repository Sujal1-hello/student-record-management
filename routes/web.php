<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Models\Student;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('students', StudentController::class);

Route::get('/dashboard', function () {

    $totalStudents = Student::count();

    $maleStudents = Student::where('gender', 'Male')->count();

    $femaleStudents = Student::where('gender', 'Female')->count();

    $otherStudents = Student::where('gender', 'Other')->count();

    $totalCourses = Student::distinct('course')->count('course');

    return view('dashboard', compact(
        'totalStudents',
        'maleStudents',
        'femaleStudents',
        'otherStudents',
        'totalCourses'
    ));

})->name('dashboard');