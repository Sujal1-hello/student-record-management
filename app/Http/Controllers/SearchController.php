<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Book;
use App\Models\BookIssue;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $query = trim($request->input('q', ''));

        $students = collect();
        $books = collect();
        $issues = collect();

        if ($query !== '') {

            $students = Student::where('student_id', 'like', "%{$query}%")
                ->orWhere('name', 'like', "%{$query}%")
                ->orWhere('email', 'like', "%{$query}%")
                ->orWhere('course', 'like', "%{$query}%")
                ->take(5)
                ->get();

            $books = Book::where('book_id', 'like', "%{$query}%")
                ->orWhere('title', 'like', "%{$query}%")
                ->orWhere('author', 'like', "%{$query}%")
                ->orWhere('category', 'like', "%{$query}%")
                ->orWhere('isbn', 'like', "%{$query}%")
                ->take(5)
                ->get();

            $issues = BookIssue::with(['book', 'student'])
                ->whereHas('book', function ($q) use ($query) {
                    $q->where('title', 'like', "%{$query}%")
                        ->orWhere('book_id', 'like', "%{$query}%");
                })
                ->orWhereHas('student', function ($q) use ($query) {
                    $q->where('name', 'like', "%{$query}%")
                        ->orWhere('student_id', 'like', "%{$query}%");
                })
                ->take(5)
                ->get();
        }

        return view('search.index', compact(
            'query',
            'students',
            'books',
            'issues'
        ));
    }
}