<x-app-layout>
    <div class="search-page"> {{-- Header --}} <div class="page-header">
            <div>
                <div class="breadcrumb">Dashboard / Search</div>
                <h1>Global Search</h1>
                <p> Search students, books, and book issue records from one place. </p>
            </div>
        </div> {{-- Search Box --}} <div class="search-box">
            <form method="GET" action="{{ route('search.index') }}">
                <div class="search-input-wrapper"> <span class="search-icon">⌕</span> <input type="text" name="q"
                        value="{{ $query }}" placeholder="Search by student name, ID, book title, author..."
                        autocomplete="off"> @if ($query !== '') <a href="{{ route('search.index') }}"
                        class="clear-search"> × </a> @endif </div> <button type="submit" class="search-button"> Search
                </button>
            </form>
        </div> @if ($query !== '') {{-- Search Summary --}} <div class="search-summary">
                <div> <span class="summary-label">Search results for</span> <strong>"{{ $query }}"</strong> </div> <a
                    href="{{ route('search.index') }}" class="new-search"> New Search </a>
            </div> {{-- Students --}} <section class="result-section">
                <div class="section-header">
                    <div class="section-title">
                        <div class="section-icon student-icon"> 👤 </div>
                        <div>
                            <h2>Students</h2>
                            <p>Student records matching your search</p>
                        </div>
                    </div> <span class="result-count"> {{ $students->count() }} </span>
                </div> @if ($students->count())
                    <div class="result-grid"> @foreach ($students as $student) <a href="{{ route('students.show', $student) }}"
                        class="result-card">
                        <div class="card-main">
                            <div class="avatar"> {{ strtoupper(substr($student->name, 0, 1)) }} </div>
                            <div class="card-content"> <strong> {{ $student->name }} </strong> <span> ID:
                                    {{ $student->student_id }} </span> </div>
                        </div>
                        <div class="card-right"> <small> {{ $student->course ?? 'No course' }} </small> <span
                                class="arrow">→</span> </div>
                </a> @endforeach </div> @else <div class="no-results"> <span>⌕</span>
                        <div> <strong>No students found</strong>
                            <p>Try searching with a different name or student ID.</p>
                        </div>
                    </div> @endif
            </section> {{-- Books --}} <section class="result-section">
                <div class="section-header">
                    <div class="section-title">
                        <div class="section-icon book-icon"> 📚 </div>
                        <div>
                            <h2>Books</h2>
                            <p>Books matching your search</p>
                        </div>
                    </div> <span class="result-count"> {{ $books->count() }} </span>
                </div> @if ($books->count())
                    <div class="result-grid"> @foreach ($books as $book) <a href="{{ route('books.show', $book) }}"
                        class="result-card">
                        <div class="card-main">
                            <div class="avatar book-avatar"> 📖 </div>
                            <div class="card-content"> <strong> {{ $book->title }} </strong> <span> Book ID:
                                    {{ $book->book_id }} </span> </div>
                        </div>
                        <div class="card-right"> <small> {{ $book->author }} </small> <span class="arrow">→</span> </div>
                </a> @endforeach </div> @else <div class="no-results"> <span>📚</span>
                        <div> <strong>No books found</strong>
                            <p>Try searching with a different title or author.</p>
                        </div>
                    </div> @endif
            </section> {{-- Book Issues --}} <section class="result-section">
                <div class="section-header">
                    <div class="section-title">
                        <div class="section-icon issue-icon"> ↗ </div>
                        <div>
                            <h2>Book Issues</h2>
                            <p>Issue records matching your search</p>
                        </div>
                    </div> <span class="result-count"> {{ $issues->count() }} </span>
                </div> @if ($issues->count())
                    <div class="result-grid"> @foreach ($issues as $issue) <a href="{{ route('book-issues.show', $issue) }}"
                        class="result-card">
                        <div class="card-main">
                            <div class="avatar issue-avatar"> ↗ </div>
                            <div class="card-content"> <strong> {{ $issue->book->title }} </strong> <span> Issued to
                                    {{ $issue->student->name }} </span> </div>
                        </div>
                        <div class="card-right"> <span
                                class="status-badge {{ strtolower($issue->status) === 'returned' ? 'status-returned' : 'status-issued' }}">
                                {{ $issue->status }} </span> <span class="arrow">→</span> </div>
                </a> @endforeach </div> @else <div class="no-results"> <span>↗</span>
                        <div> <strong>No book issues found</strong>
                            <p>No issue records match your search.</p>
                        </div>
                    </div> @endif
        </section> @else {{-- Empty Search State --}} <div class="empty-state">
            <div class="empty-icon"> ⌕ </div>
            <h2>Search your system</h2>
            <p> Quickly find students, books, and book issue records. </p>
            <div class="search-tips">
                <div> <span>👤</span> Student name or ID </div>
                <div> <span>📚</span> Book title or author </div>
                <div> <span>↗</span> Book issue records </div>
            </div>
        </div> @endif </div>
    <style>
        /* ========================================= PAGE ========================================= */
        .search-page {
            max-width: 1150px;
            margin: 0 auto;
            padding: 40px 24px 60px;
            color: #111827;
        }

        /* ========================================= HEADER ========================================= */
        .page-header {
            margin-bottom: 25px;
        }

        .breadcrumb {
            font-size: 13px;
            color: #6b7280;
            margin-bottom: 8px;
        }

        .page-header h1 {
            margin: 0;
            font-size: 32px;
            font-weight: 700;
            letter-spacing: -0.5px;
        }

        .page-header p {
            margin: 7px 0 0;
            color: #6b7280;
            font-size: 15px;
        }

        /* ========================================= SEARCH BOX ========================================= */
        .search-box {
            background: white;
            border: 1px solid #e5e7eb;
            border-radius: 14px;
            padding: 14px;
            margin-bottom: 25px;
            box-shadow: 0 3px 12px rgba(0, 0, 0, 0.04);
        }

        .search-box form {
            display: flex;
            gap: 10px;
        }

        .search-input-wrapper {
            position: relative;
            flex: 1;
        }

        .search-icon {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 22px;
            color: #9ca3af;
        }

        .search-input-wrapper input {
            width: 100%;
            box-sizing: border-box;
            height: 48px;
            padding: 0 45px;
            border: 1px solid #d1d5db;
            border-radius: 9px;
            font-size: 14px;
            color: #111827;
            background: #f9fafb;
            transition: 0.2s;
        }

        .search-input-wrapper input:focus {
            outline: none;
            background: white;
            border-color: #2563eb;
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
        }

        .clear-search {
            position: absolute;
            right: 14px;
            top: 50%;
            transform: translateY(-50%);
            text-decoration: none;
            color: #9ca3af;
            font-size: 22px;
        }

        .clear-search:hover {
            color: #111827;
        }

        .search-button {
            height: 48px;
            padding: 0 25px;
            border: none;
            border-radius: 9px;
            background: #2563eb;
            color: white;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: 0.2s;
        }

        .search-button:hover {
            background: #1d4ed8;
            transform: translateY(-1px);
        }

        /* ========================================= SEARCH SUMMARY ========================================= */
        .search-summary {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 30px;
            padding: 15px 18px;
            background: #f8fafc;
            border: 1px solid #e5e7eb;
            border-radius: 10px;
        }

        .summary-label {
            color: #6b7280;
            margin-right: 5px;
            font-size: 14px;
        }

        .search-summary strong {
            font-size: 14px;
            color: #111827;
        }

        .new-search {
            text-decoration: none;
            color: #2563eb;
            font-size: 13px;
            font-weight: 600;
        }

        .new-search:hover {
            text-decoration: underline;
        }

        /* ========================================= RESULT SECTIONS ========================================= */
        .result-section {
            margin-bottom: 38px;
        }

        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 13px;
        }

        .section-title {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .section-title h2 {
            margin: 0;
            font-size: 18px;
            font-weight: 700;
        }

        .section-title p {
            margin: 3px 0 0;
            font-size: 12px;
            color: #6b7280;
        }

        .section-icon {
            width: 38px;
            height: 38px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 9px;
            font-size: 17px;
            background: #eff6ff;
        }

        .result-count {
            min-width: 27px;
            height: 27px;
            padding: 0 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 20px;
            background: #f3f4f6;
            color: #4b5563;
            font-size: 12px;
            font-weight: 700;
        }

        /* ========================================= RESULT CARDS ========================================= */
        .result-grid {
            display: grid;
            gap: 9px;
        }

        .result-card {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 15px;
            padding: 14px 17px;
            background: white;
            border: 1px solid #e5e7eb;
            border-radius: 10px;
            text-decoration: none;
            color: inherit;
            transition: all 0.2s ease;
        }

        .result-card:hover {
            border-color: #bfdbfe;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            transform: translateY(-1px);
        }

        .card-main {
            display: flex;
            align-items: center;
            gap: 12px;
            min-width: 0;
        }

        .avatar {
            width: 40px;
            height: 40px;
            flex-shrink: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 9px;
            background: #eff6ff;
            color: #2563eb;
            font-size: 14px;
            font-weight: 700;
        }

        .book-avatar {
            background: #f0fdf4;
        }

        .issue-avatar {
            background: #fff7ed;
        }

        .card-content {
            display: flex;
            flex-direction: column;
            gap: 4px;
            min-width: 0;
        }

        .card-content strong {
            font-size: 14px;
            font-weight: 600;
            color: #111827;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .card-content span {
            color: #6b7280;
            font-size: 12px;
        }

        .card-right {
            display: flex;
            align-items: center;
            gap: 15px;
            flex-shrink: 0;
        }

        .card-right small {
            color: #6b7280;
            font-size: 12px;
        }

        .arrow {
            color: #9ca3af;
            font-size: 18px;
            transition: 0.2s;
        }

        .result-card:hover .arrow {
            color: #2563eb;
            transform: translateX(3px);
        }

        /* ========================================= STATUS ========================================= */
        .status-badge {
            padding: 5px 9px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 600;
        }

        .status-issued {
            background: #fff7ed;
            color: #c2410c;
        }

        .status-returned {
            background: #f0fdf4;
            color: #15803d;
        }

        /* ========================================= NO RESULTS ========================================= */
        .no-results {
            display: flex;
            align-items: center;
            gap: 13px;
            padding: 18px;
            background: #f9fafb;
            border: 1px dashed #d1d5db;
            border-radius: 10px;
            color: #6b7280;
        }

        .no-results>span {
            font-size: 22px;
        }

        .no-results strong {
            display: block;
            color: #374151;
            font-size: 13px;
        }

        .no-results p {
            margin: 3px 0 0;
            font-size: 12px;
        }

        /* ========================================= EMPTY SEARCH ========================================= */
        .empty-state {
            text-align: center;
            padding: 75px 25px;
            background: white;
            border: 1px solid #e5e7eb;
            border-radius: 14px;
            box-shadow: 0 3px 12px rgba(0, 0, 0, 0.03);
        }

        .empty-icon {
            width: 65px;
            height: 65px;
            margin: 0 auto 18px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            background: #eff6ff;
            color: #2563eb;
            font-size: 32px;
        }

        .empty-state h2 {
            margin: 0;
            font-size: 20px;
        }

        .empty-state>p {
            margin: 8px 0 25px;
            color: #6b7280;
            font-size: 14px;
        }

        .search-tips {
            display: flex;
            justify-content: center;
            gap: 10px;
            flex-wrap: wrap;
        }

        .search-tips div {
            display: flex;
            align-items: center;
            gap: 7px;
            padding: 8px 12px;
            background: #f9fafb;
            border: 1px solid #e5e7eb;
            border-radius: 7px;
            color: #6b7280;
            font-size: 12px;
        }

        /* ========================================= MOBILE ========================================= */
        @media (max-width: 700px) {
            .search-page {
                padding: 25px 15px 40px;
            }

            .page-header h1 {
                font-size: 27px;
            }

            .search-box form {
                flex-direction: column;
            }

            .search-button {
                width: 100%;
            }

            .search-summary {
                align-items: flex-start;
                gap: 10px;
                flex-direction: column;
            }

            .result-card {
                align-items: flex-start;
            }

            .card-right {
                gap: 8px;
            }

            .card-right small {
                max-width: 100px;
                text-align: right;
                white-space: normal;
            }
        }

        @media (max-width: 480px) {
            .section-title p {
                display: none;
            }

            .result-card {
                padding: 12px;
            }

            .card-right small {
                display: none;
            }

            .empty-state {
                padding: 55px 15px;
            }

            .search-tips {
                flex-direction: column;
            }

            .search-tips div {
                justify-content: center;
            }
        }
    </style>
</x-app-layout>