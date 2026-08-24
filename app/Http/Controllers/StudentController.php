<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $course = $request->input('course');

        $students = Student::when($search, function ($query, $search) {

            $query->where(function ($query) use ($search) {

                $query->where('student_id', 'like', "%{$search}%")
                    ->orWhere('name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%")
                    ->orWhere('phone', 'like', "%{$search}%")
                    ->orWhere('course', 'like', "%{$search}%");

            });

        })
            ->when($course, function ($query, $course) {
                $query->where('course', $course);
            })
            ->paginate(10)
            ->withQueryString();

        $courses = Student::select('course')
            ->distinct()
            ->orderBy('course')
            ->pluck('course');

        return view('students.index', compact(
            'students',
            'search',
            'course',
            'courses'
        ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('students.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
                'regex:/^[A-Za-z\s\'-]+$/',
            ],
            'email' => 'required|email|unique:students,email',
            'phone' => [
                'nullable',
                'regex:/^(97|98)\d{8}$/',
            ],
            'course' => [
                'required',
                'string',
                'max:255',
                'regex:/^[A-Za-z0-9\s&().,-]+$/',
            ],
        ]);

        // Get the student with the highest Student ID number
        $lastStudent = Student::whereNotNull('student_id')
            ->get()
            ->sortByDesc(function ($student) {
                return (int) str_replace('STU', '', $student->student_id);
            })
            ->first();

        // Generate the next Student ID
        if ($lastStudent) {
            $lastNumber = (int) str_replace('STU', '', $lastStudent->student_id);
            $nextNumber = $lastNumber + 1;
        } else {
            $nextNumber = 1;
        }

        $validated['student_id'] = 'STU' . str_pad(
            $nextNumber,
            3,
            '0',
            STR_PAD_LEFT
        );

        Student::create($validated);

        return redirect()
            ->route('students.index')
            ->with('success', 'Student created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $student = Student::findOrFail($id);

        return view('students.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $student = Student::findOrFail($id);

        return view('students.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $student = Student::findOrFail($id);

        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
                'regex:/^[A-Za-z\s\'-]+$/',
            ],
            'email' => 'required|email|unique:students,email,' . $student->id,
            'phone' => [
                'nullable',
                'regex:/^(97|98)\d{8}$/',
            ],
            'course' => [
                'required',
                'string',
                'max:255',
                'regex:/^[A-Za-z0-9\s&().,-]+$/',
            ],
        ]);

        $student->update($validated);

        return redirect()
            ->route('students.index')
            ->with('success', 'Student updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $student = Student::findOrFail($id);

        $student->delete();

        return redirect()
            ->route('students.index')
            ->with('success', 'Student deleted successfully.');
    }
}