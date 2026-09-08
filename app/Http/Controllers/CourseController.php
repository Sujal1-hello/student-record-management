<?php

namespace App\Http\Controllers;

use App\Models\Student;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Student::select('course')
            ->selectRaw('COUNT(*) as student_count')
            ->whereNotNull('course')
            ->groupBy('course')
            ->orderBy('course')
            ->get();

        return view('courses.index', compact('courses'));
    }
}