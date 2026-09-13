<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;
        $category = $request->category;

        $books = Book::query()
            ->when($search, function ($query, $search) {
                $query->where(function ($q) use ($search) {
                    $q->where('book_id', 'like', "%{$search}%")
                        ->orWhere('title', 'like', "%{$search}%")
                        ->orWhere('author', 'like', "%{$search}%")
                        ->orWhere('category', 'like', "%{$search}%")
                        ->orWhere('isbn', 'like', "%{$search}%");
                });
            })
            ->when($category, fn($query, $category) => $query->where('category', $category))
            ->latest()
            ->paginate(10)
            ->withQueryString();

        $categories = Book::whereNotNull('category')
            ->distinct()
            ->orderBy('category')
            ->pluck('category');

        return view('books.index', compact('books', 'search', 'category', 'categories'));
    }

    public function create()
    {
        return view('books.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'category' => 'nullable|string|max:255',
            'isbn' => 'nullable|string|max:50',
            'quantity' => 'required|integer|min:1',
        ]);

        $lastBook = Book::orderBy('id', 'desc')->first();

        if ($lastBook && preg_match('/(\d+)$/', $lastBook->book_id, $matches)) {
            $nextNumber = (int) $matches[1] + 1;
        } else {
            $nextNumber = 1;
        }

        $bookId = 'BOOK' . str_pad($nextNumber, 3, '0', STR_PAD_LEFT);

        Book::create([
            'book_id' => $bookId,
            'title' => $validated['title'],
            'author' => $validated['author'],
            'category' => $validated['category'] ?? null,
            'isbn' => $validated['isbn'] ?? null,
            'quantity' => $validated['quantity'],
            'available_copies' => $validated['quantity'],
            'status' => 'Available',
        ]);

        return redirect()
            ->route('books.index')
            ->with('success', 'Book added successfully.');
    }

    public function show(Book $book)
    {
        return view('books.show', compact('book'));
    }

    public function edit(Book $book)
    {
        return view('books.edit', compact('book'));
    }

    public function update(Request $request, Book $book)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'category' => 'nullable|string|max:255',
            'isbn' => 'nullable|string|max:50',
            'quantity' => 'required|integer|min:1',
        ]);

        $issuedCopies = $book->quantity - $book->available_copies;

        if ($validated['quantity'] < $issuedCopies) {
            return back()
                ->withInput()
                ->withErrors([
                    'quantity' => "Quantity cannot be less than the {$issuedCopies} currently issued copies."
                ]);
        }

        $newAvailableCopies = $validated['quantity'] - $issuedCopies;

        $book->update([
            'title' => $validated['title'],
            'author' => $validated['author'],
            'category' => $validated['category'] ?? null,
            'isbn' => $validated['isbn'] ?? null,
            'quantity' => $validated['quantity'],
            'available_copies' => $newAvailableCopies,
            'status' => $newAvailableCopies > 0 ? 'Available' : 'Unavailable',
        ]);

        return redirect()
            ->route('books.index')
            ->with('success', 'Book updated successfully.');
    }

    public function destroy(Book $book)
    {
        $book->delete();

        return redirect()
            ->route('books.index')
            ->with('success', 'Book deleted successfully.');
    }
}