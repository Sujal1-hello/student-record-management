<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::latest()->paginate(10);

        return response()->json([
            'success' => true,
            'data' => $students
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email',
            'phone' => [
                'nullable',
                'regex:/^(97|98)[0-9]{8}$/'
            ],
            'date_of_birth' => 'nullable|date',
            'gender' => 'required|in:Male,Female,Other',
            'course' => 'required|string|max:255',
            'semester' => 'required|integer|min:1|max:8',
            'roll_no' => 'nullable|string|max:50',
            'grade' => 'nullable|in:11,12',
            'section' => 'nullable|string|max:50',
            'academic_year' => 'nullable|string|max:50',
            'father_name' => 'nullable|string|max:255',
            'father_phone' => 'nullable|string|max:20',
            'father_occupation' => 'nullable|string|max:255',
            'mother_name' => 'nullable|string|max:255',
            'mother_phone' => 'nullable|string|max:20',
            'mother_occupation' => 'nullable|string|max:255',
            'guardian_name' => 'nullable|string|max:255',
            'guardian_phone' => 'nullable|string|max:20',
            'guardian_relation' => 'nullable|string|max:100',
        ]);

        $lastStudent = Student::orderBy('id', 'desc')->first();

        if ($lastStudent && preg_match('/(\d+)$/', $lastStudent->student_id, $matches)) {
            $nextNumber = (int) $matches[1] + 1;
        } else {
            $nextNumber = 1;
        }

        $validated['student_id'] = 'STU' . str_pad(
            $nextNumber,
            3,
            '0',
            STR_PAD_LEFT
        );

        $student = Student::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Student created successfully.',
            'data' => $student
        ], 201);
    }

    public function show(Student $student)
    {
        return response()->json([
            'success' => true,
            'data' => $student
        ]);
    }

    public function update(Request $request, Student $student)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email,' . $student->id,
            'phone' => [
                'nullable',
                'regex:/^(97|98)[0-9]{8}$/'
            ],
            'date_of_birth' => 'nullable|date',
            'gender' => 'required|in:Male,Female,Other',
            'course' => 'required|string|max:255',
            'semester' => 'required|integer|min:1|max:8',
            'roll_no' => 'nullable|string|max:50',
            'grade' => 'nullable|in:11,12',
            'section' => 'nullable|string|max:50',
            'academic_year' => 'nullable|string|max:50',
            'father_name' => 'nullable|string|max:255',
            'father_phone' => 'nullable|string|max:20',
            'father_occupation' => 'nullable|string|max:255',
            'mother_name' => 'nullable|string|max:255',
            'mother_phone' => 'nullable|string|max:20',
            'mother_occupation' => 'nullable|string|max:255',
            'guardian_name' => 'nullable|string|max:255',
            'guardian_phone' => 'nullable|string|max:20',
            'guardian_relation' => 'nullable|string|max:100',
        ]);

        $student->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Student updated successfully.',
            'data' => $student->fresh()
        ]);
    }

    public function destroy(Student $student)
    {
        $student->delete();

        return response()->json([
            'success' => true,
            'message' => 'Student deleted successfully.'
        ]);
    }
}