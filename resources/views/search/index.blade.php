<x-app-layout>
    <div class="search-container">

        <div class="search-header">
            <div>
                <h1>Global Search</h1>
                <p>Search students, books and book issues.</p>
            </div>
        </div>

        <form method="GET" action="{{ route('search.index') }}" class="search-form">
            <input
                type="text"
                name="q"
                value="{{ $query }}"
                placeholder="Search by name, ID, book title, author..."
            >

            <button type="submit">Search</button>
        </form>

        @if ($query !== '')

            <div class="results-info">
                Search results for:
                <strong>"{{ $query }}"</strong>
            </div>

            {{-- Students --}}
            <section class="result-section">
                <h2>Students</h2>

                @if ($students->count())
                    <div class="result-list">
                        @foreach ($students as $student)
                            <a href="{{ route('students.show', $student) }}" class="result-card">
                                <div>
                                    <strong>{{ $student->name }}</strong>
                                    <span>{{ $student->student_id }}</span>
                                </div>

                                <small>{{ $student->course ?? 'No course' }}</small>
                            </a>
                        @endforeach
                    </div>
                @else
                    <p class="no-results">No students found.</p>
                @endif
            </section>

            {{-- Books --}}
            <section class="result-section">
                <h2>Books</h2>

                @if ($books->count())
                    <div class="result-list">
                        @foreach ($books as $book)
                            <a href="{{ route('books.show', $book) }}" class="result-card">
                                <div>
                                    <strong>{{ $book->title }}</strong>
                                    <span>{{ $book->book_id }}</span>
                                </div>

                                <small>{{ $book->author }}</small>
                            </a>
                        @endforeach
                    </div>
                @else
                    <p class="no-results">No books found.</p>
                @endif
            </section>

            {{-- Book Issues --}}
            <section class="result-section">
                <h2>Book Issues</h2>

                @if ($issues->count())
                    <div class="result-list">
                        @foreach ($issues as $issue)
                            <a href="{{ route('book-issues.show', $issue) }}" class="result-card">
                                <div>
                                    <strong>{{ $issue->book->title }}</strong>
                                    <span>Issued to {{ $issue->student->name }}</span>
                                </div>

                                <small>
                                    {{ $issue->status }}
                                </small>
                            </a>
                        @endforeach
                    </div>
                @else
                    <p class="no-results">No book issues found.</p>
                @endif
            </section>

        @else

            <div class="empty-search">
                <div class="empty-icon">⌕</div>
                <h2>Search your system</h2>
                <p>
                    Find students, books and book issue records from one place.
                </p>
            </div>

        @endif

    </div>

    <style>
        .search-container {
            max-width: 1100px;
            margin: 0 auto;
            padding: 35px 20px;
        }

        .search-header h1 {
            margin: 0;
            font-size: 30px;
            color: #111827;
        }

        .search-header p {
            margin-top: 6px;
            color: #6b7280;
        }

        .search-form {
            display: flex;
            gap: 10px;
            margin: 25px 0;
        }

        .search-form input {
            flex: 1;
            padding: 13px 15px;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            font-size: 15px;
        }

        .search-form input:focus {
            outline: none;
            border-color: #2563eb;
        }

        .search-form button {
            padding: 13px 22px;
            border: none;
            border-radius: 8px;
            background: #2563eb;
            color: white;
            cursor: pointer;
            font-weight: 600;
        }

        .results-info {
            margin-bottom: 20px;
            color: #4b5563;
        }

        .result-section {
            margin-bottom: 30px;
        }

        .result-section h2 {
            font-size: 20px;
            margin-bottom: 12px;
            color: #111827;
        }

        .result-list {
            display: grid;
            gap: 10px;
        }

        .result-card {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 18px;
            background: white;
            border: 1px solid #e5e7eb;
            border-radius: 10px;
            text-decoration: none;
            color: inherit;
            transition: 0.2s;
        }

        .result-card:hover {
            border-color: #2563eb;
            transform: translateY(-1px);
        }

        .result-card div {
            display: flex;
            flex-direction: column;
            gap: 4px;
        }

        .result-card strong {
            color: #111827;
        }

        .result-card span,
        .result-card small {
            color: #6b7280;
        }

        .no-results {
            padding: 15px;
            background: #f9fafb;
            border-radius: 8px;
            color: #6b7280;
        }

        .empty-search {
            text-align: center;
            padding: 80px 20px;
            background: white;
            border-radius: 12px;
            border: 1px solid #e5e7eb;
        }

        .empty-icon {
            font-size: 45px;
            color: #9ca3af;
        }

        .empty-search h2 {
            margin: 10px 0 5px;
            color: #111827;
        }

        .empty-search p {
            color: #6b7280;
        }

        @media (max-width: 640px) {
            .search-container {
                padding: 25px 15px;
            }

            .search-header h1 {
                font-size: 25px;
            }

            .search-form {
                flex-direction: column;
            }

            .search-form button {
                width: 100%;
            }

            .result-card {
                align-items: flex-start;
                gap: 10px;
                flex-direction: column;
            }
        }
    </style>
</x-app-layout>