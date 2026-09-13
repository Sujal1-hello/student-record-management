<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BookIssue;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class BookIssueController extends Controller
{
    // List all issued/overdue/returned records
    public function index(Request $request)
    {
        $status = $request->status; // optional filter: Issued, Returned, Overdue

        $issues = BookIssue::with(['book', 'student'])
            ->when($status, fn ($query, $status) => $query->where('status', $status))
            ->latest('issue_date')
            ->paginate(10)
            ->withQueryString();

        return view('book-issues.index', compact('issues', 'status'));
    }

    // Show the "issue a book" form
    public function create()
    {
        $books = Book::where('available_copies', '>', 0)->orderBy('title')->get();
        $students = Student::orderBy('name')->get();

        return view('book-issues.create', compact('books', 'students'));
    }

    // Handle issuing a book
    public function store(Request $request)
    {
        $validated = $request->validate([
            'book_id' => 'required|exists:books,id',
            'student_id' => 'required|exists:students,id',
            'due_date' => 'required|date|after:today',
        ]);

        $book = Book::findOrFail($validated['book_id']);

        if ($book->available_copies < 1) {
            return back()
                ->withInput()
                ->withErrors(['book_id' => 'No available copies of this book left.']);
        }

        BookIssue::create([
            'book_id' => $book->id,
            'student_id' => $validated['student_id'],
            'issue_date' => Carbon::today(),
            'due_date' => $validated['due_date'],
            'status' => 'Issued',
        ]);

        $book->decrement('available_copies');

        if ($book->available_copies == 0) {
            $book->update(['status' => 'Unavailable']);
        }

        return redirect()
            ->route('book-issues.index')
            ->with('success', 'Book issued successfully.');
    }

    // Mark a book as returned
    public function returnBook(BookIssue $bookIssue)
    {
        if ($bookIssue->status === 'Returned') {
            return back()->with('error', 'This book has already been returned.');
        }

        $bookIssue->update([
            'return_date' => Carbon::today(),
            'status' => 'Returned',
        ]);

        $book = $bookIssue->book;
        $book->increment('available_copies');

        if ($book->available_copies > 0) {
            $book->update(['status' => 'Available']);
        }

        return redirect()
            ->route('book-issues.index')
            ->with('success', 'Book returned successfully.');
    }
}