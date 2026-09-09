<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $courses = Student::select('course')
            ->selectRaw('COUNT(*) as student_count')
            ->whereNotNull('course')
            ->when($search, function ($query, $search) {
                $query->where('course', 'like', "%{$search}%");
            })
            ->groupBy('course')
            ->orderBy('course')
            ->get();

        return view('courses.index', compact('courses', 'search'));
    }
}