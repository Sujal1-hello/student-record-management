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
        $gender = $request->input('gender');
        $semester = $request->input('semester');

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

            ->when($gender, function ($query, $gender) {
                $query->where('gender', $gender);
            })

            ->when($semester, function ($query, $semester) {
                $query->where('semester', $semester);
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
            'gender',
            'semester',
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

        'date_of_birth' => [
            'nullable',
            'date',
            'before:today',
        ],

        'gender' => [
            'nullable',
            'in:Male,Female,Other',
        ],

        'roll_no' => [
            'required',
            'string',
            'max:50',
        ],

        'grade' => [
            'required',
            'in:11,12',
        ],

        'section' => [
            'required',
            'string',
            'max:20',
        ],

        'academic_year' => [
            'required',
            'string',
            'max:20',
        ],

        'course' => [
            'required',
            'string',
            'max:255',
            'regex:/^[A-Za-z0-9\s&().,-]+$/',
        ],

        'semester' => [
            'nullable',
            'integer',
            'min:1',
            'max:8',
        ],

        'father_name' => [
            'nullable',
            'string',
            'max:255',
        ],

        'father_phone' => [
            'nullable',
            'regex:/^(97|98)\d{8}$/',
        ],

        'father_occupation' => [
            'nullable',
            'string',
            'max:255',
        ],

        'mother_name' => [
            'nullable',
            'string',
            'max:255',
        ],

        'mother_phone' => [
            'nullable',
            'regex:/^(97|98)\d{8}$/',
        ],

        'mother_occupation' => [
            'nullable',
            'string',
            'max:255',
        ],

        'guardian_name' => [
            'nullable',
            'string',
            'max:255',
        ],

        'guardian_phone' => [
            'nullable',
            'regex:/^(97|98)\d{8}$/',
        ],

        'guardian_relation' => [
            'nullable',
            'string',
            'max:100',
        ],
    ]);

    $lastStudent = Student::whereNotNull('student_id')
        ->get()
        ->sortByDesc(function ($student) {
            return (int) str_replace('STU', '', $student->student_id);
        })
        ->first();

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

        'roll_no' => [
            'required',
            'string',
            'max:50',
        ],

        'email' => [
            'required',
            'email',
            'unique:students,email,' . $student->id,
        ],

        'phone' => [
            'nullable',
            'regex:/^(97|98)\d{8}$/',
        ],

        'date_of_birth' => [
            'nullable',
            'date',
            'before:today',
        ],

        'gender' => [
            'nullable',
            'in:Male,Female,Other',
        ],

        'grade' => [
            'required',
            'in:11,12',
        ],

        'section' => [
            'required',
            'string',
            'max:20',
        ],

        'academic_year' => [
            'required',
            'string',
            'max:20',
        ],

        'course' => [
            'required',
            'string',
            'max:255',
            'regex:/^[A-Za-z0-9\s&().,-]+$/',
        ],

        'semester' => [
            'nullable',
            'integer',
            'min:1',
            'max:8',
        ],

        'father_name' => [
            'nullable',
            'string',
            'max:255',
        ],

        'father_phone' => [
            'nullable',
            'regex:/^(97|98)\d{8}$/',
        ],

        'father_occupation' => [
            'nullable',
            'string',
            'max:255',
        ],

        'mother_name' => [
            'nullable',
            'string',
            'max:255',
        ],

        'mother_phone' => [
            'nullable',
            'regex:/^(97|98)\d{8}$/',
        ],

        'mother_occupation' => [
            'nullable',
            'string',
            'max:255',
        ],

        'guardian_name' => [
            'nullable',
            'string',
            'max:255',
        ],

        'guardian_phone' => [
            'nullable',
            'regex:/^(97|98)\d{8}$/',
        ],

        'guardian_relation' => [
            'nullable',
            'string',
            'max:100',
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