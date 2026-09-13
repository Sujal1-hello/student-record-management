<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BookIssue;

class LibraryController extends Controller
{
    public function index()
    {
        $totalBooks = Book::count();

        $totalCopies = Book::sum('quantity');

        $availableCopies = Book::sum('available_copies');

        $issuedCopies = BookIssue::where('status', 'Issued')->count();

        $overdueBooks = BookIssue::where('status', 'Issued')
            ->whereDate('due_date', '<', now()->toDateString())
            ->count();

        $returnedBooks = BookIssue::where('status', 'Returned')->count();

        $recentIssues = BookIssue::with(['book', 'student'])
            ->latest('issue_date')
            ->latest('id')
            ->take(5)
            ->get();

        return view('library.index', compact(
            'totalBooks',
            'totalCopies',
            'availableCopies',
            'issuedCopies',
            'overdueBooks',
            'returnedBooks',
            'recentIssues'
        ));
    }
}