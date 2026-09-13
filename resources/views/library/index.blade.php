<x-app-layout>

    <div class="library-container">

        <div class="page-intro">
            <div>
                <h1>Library Dashboard</h1>
                <p>Overview of books, copies and library activity.</p>
            </div>

            <div class="header-actions">
                <a href="{{ route('books.index') }}" class="secondary-button">
                    View Books
                </a>

                <a href="{{ route('book-issues.create') }}" class="primary-button">
                    + Issue Book
                </a>
            </div>
        </div>

        <div class="stats-grid">

            <div class="stat-card">
                <div class="stat-icon blue">📚</div>
                <div>
                    <span>Total Books</span>
                    <strong>{{ $totalBooks }}</strong>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-icon purple">📦</div>
                <div>
                    <span>Total Copies</span>
                    <strong>{{ $totalCopies }}</strong>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-icon green">✓</div>
                <div>
                    <span>Available Copies</span>
                    <strong>{{ $availableCopies }}</strong>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-icon orange">📖</div>
                <div>
                    <span>Currently Issued</span>
                    <strong>{{ $issuedCopies }}</strong>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-icon red">⏰</div>
                <div>
                    <span>Overdue Books</span>
                    <strong>{{ $overdueBooks }}</strong>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-icon teal">↩</div>
                <div>
                    <span>Returned Books</span>
                    <strong>{{ $returnedBooks }}</strong>
                </div>
            </div>

        </div>

        <div class="dashboard-grid">

            <div class="panel">

                <div class="panel-header">
                    <div>
                        <h2>Recent Book Issues</h2>
                        <p>Latest library activity</p>
                    </div>

                    <a href="{{ route('book-issues.index') }}">
                        View All
                    </a>
                </div>

                @if ($recentIssues->count())

                    <div class="issue-list">

                        @foreach ($recentIssues as $issue)

                            <div class="issue-item">

                                <div class="book-avatar">
                                    {{ strtoupper(substr($issue->book->title, 0, 1)) }}
                                </div>

                                <div class="issue-info">

                                    <strong>
                                        {{ $issue->book->title }}
                                    </strong>

                                    <span>
                                        {{ $issue->student->name }}
                                    </span>

                                </div>

                                <div class="issue-date">

                                    <span>
                                        {{ $issue->issue_date->format('d M Y') }}
                                    </span>

                                    @if ($issue->status === 'Issued')

                                        @if ($issue->due_date->isPast())

                                            <small class="overdue">
                                                Overdue
                                            </small>

                                        @else

                                            <small class="issued">
                                                Issued
                                            </small>

                                        @endif

                                    @else

                                        <small class="returned">
                                            Returned
                                        </small>

                                    @endif

                                </div>

                            </div>

                        @endforeach

                    </div>

                @else

                    <div class="empty-state">
                        <div>📖</div>
                        <h3>No Book Issues</h3>
                        <p>No books have been issued yet.</p>

                        <a href="{{ route('book-issues.create') }}">
                            Issue a Book
                        </a>
                    </div>

                @endif

            </div>


            <div class="panel">

                <div class="panel-header">
                    <div>
                        <h2>Quick Actions</h2>
                        <p>Manage your library</p>
                    </div>
                </div>

                <div class="quick-actions">

                    <a href="{{ route('books.create') }}" class="quick-action">
                        <div class="quick-icon blue">+</div>
                        <div>
                            <strong>Add New Book</strong>
                            <span>Add a book to the library</span>
                        </div>
                    </a>

                    <a href="{{ route('books.index') }}" class="quick-action">
                        <div class="quick-icon purple">📚</div>
                        <div>
                            <strong>Manage Books</strong>
                            <span>View and manage all books</span>
                        </div>
                    </a>

                    <a href="{{ route('book-issues.create') }}" class="quick-action">
                        <div class="quick-icon orange">📖</div>
                        <div>
                            <strong>Issue a Book</strong>
                            <span>Assign a book to a student</span>
                        </div>
                    </a>

                    <a href="{{ route('book-issues.index') }}" class="quick-action">
                        <div class="quick-icon green">↩</div>
                        <div>
                            <strong>Book Issues</strong>
                            <span>Track issued and returned books</span>
                        </div>
                    </a>

                </div>

            </div>

        </div>

    </div>


    <style>

        .library-container {
            width: min(1400px, calc(100% - 60px));
            margin: 0 auto;
            padding: 40px 0 60px;
        }

        .page-intro {
            display: flex;
            align-items: flex-end;
            justify-content: space-between;
            gap: 20px;
            margin-bottom: 30px;
        }

        .page-intro h1 {
            margin: 0;
            color: #111827;
            font-size: 28px;
            font-weight: 700;
        }

        .page-intro p {
            margin: 7px 0 0;
            color: #6b7280;
            font-size: 14px;
        }

        .header-actions {
            display: flex;
            gap: 10px;
        }

        .primary-button,
        .secondary-button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            height: 42px;
            padding: 0 16px;
            border-radius: 8px;
            text-decoration: none;
            font-size: 13px;
            font-weight: 600;
        }

        .primary-button {
            background: #2563eb;
            color: white;
        }

        .primary-button:hover {
            background: #1d4ed8;
        }

        .secondary-button {
            background: #f3f4f6;
            border: 1px solid #e5e7eb;
            color: #374151;
        }

        .secondary-button:hover {
            background: #e5e7eb;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 18px;
            margin-bottom: 24px;
        }

        .stat-card {
            display: flex;
            align-items: center;
            gap: 15px;
            padding: 22px;
            background: white;
            border: 1px solid #e5e7eb;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
        }

        .stat-icon {
            width: 46px;
            height: 46px;
            flex-shrink: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 10px;
            font-size: 20px;
            font-weight: 700;
        }

        .stat-icon.blue,
        .quick-icon.blue {
            background: #eff6ff;
            color: #2563eb;
        }

        .stat-icon.purple,
        .quick-icon.purple {
            background: #f5f3ff;
            color: #7c3aed;
        }

        .stat-icon.green,
        .quick-icon.green {
            background: #ecfdf5;
            color: #16a34a;
        }

        .stat-icon.orange,
        .quick-icon.orange {
            background: #fff7ed;
            color: #ea580c;
        }

        .stat-icon.red {
            background: #fef2f2;
            color: #dc2626;
        }

        .stat-icon.teal {
            background: #f0fdfa;
            color: #0f766e;
        }

        .stat-card span {
            display: block;
            margin-bottom: 5px;
            color: #6b7280;
            font-size: 13px;
        }

        .stat-card strong {
            color: #111827;
            font-size: 25px;
            font-weight: 700;
        }

        .dashboard-grid {
            display: grid;
            grid-template-columns: 1.5fr 1fr;
            gap: 24px;
        }

        .panel {
            background: white;
            border: 1px solid #e5e7eb;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
            overflow: hidden;
        }

        .panel-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 20px 22px;
            border-bottom: 1px solid #f1f5f9;
        }

        .panel-header h2 {
            margin: 0;
            color: #111827;
            font-size: 16px;
            font-weight: 700;
        }

        .panel-header p {
            margin: 5px 0 0;
            color: #9ca3af;
            font-size: 12px;
        }

        .panel-header > a {
            color: #2563eb;
            font-size: 12px;
            font-weight: 600;
            text-decoration: none;
        }

        .issue-list {
            padding: 5px 22px;
        }

        .issue-item {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 15px 0;
            border-bottom: 1px solid #f1f5f9;
        }

        .issue-item:last-child {
            border-bottom: 0;
        }

        .book-avatar {
            width: 38px;
            height: 38px;
            flex-shrink: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 9px;
            background: #eff6ff;
            color: #2563eb;
            font-size: 13px;
            font-weight: 700;
        }

        .issue-info {
            min-width: 0;
            flex: 1;
        }

        .issue-info strong {
            display: block;
            overflow: hidden;
            color: #111827;
            font-size: 13px;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .issue-info span {
            display: block;
            margin-top: 4px;
            color: #6b7280;
            font-size: 11px;
        }

        .issue-date {
            display: flex;
            align-items: flex-end;
            flex-direction: column;
            gap: 4px;
            white-space: nowrap;
        }

        .issue-date > span {
            color: #6b7280;
            font-size: 11px;
        }

        .issue-date small {
            padding: 3px 7px;
            border-radius: 999px;
            font-size: 10px;
            font-weight: 700;
        }

        .issue-date .issued {
            background: #fffbeb;
            color: #b45309;
        }

        .issue-date .returned {
            background: #ecfdf5;
            color: #15803d;
        }

        .issue-date .overdue {
            background: #fef2f2;
            color: #dc2626;
        }

        .quick-actions {
            padding: 10px 18px 18px;
        }

        .quick-action {
            display: flex;
            align-items: center;
            gap: 13px;
            padding: 14px 5px;
            border-bottom: 1px solid #f1f5f9;
            text-decoration: none;
        }

        .quick-action:last-child {
            border-bottom: 0;
        }

        .quick-action:hover {
            background: #f8fafc;
        }

        .quick-icon {
            width: 38px;
            height: 38px;
            flex-shrink: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 8px;
            font-size: 15px;
            font-weight: 700;
        }

        .quick-action strong {
            display: block;
            color: #111827;
            font-size: 13px;
        }

        .quick-action span {
            display: block;
            margin-top: 3px;
            color: #9ca3af;
            font-size: 11px;
        }

        .empty-state {
            padding: 50px 20px;
            text-align: center;
        }

        .empty-state > div {
            margin-bottom: 10px;
            font-size: 36px;
        }

        .empty-state h3 {
            margin: 0;
            color: #111827;
            font-size: 16px;
        }

        .empty-state p {
            margin: 6px 0 15px;
            color: #6b7280;
            font-size: 13px;
        }

        .empty-state a {
            color: #2563eb;
            font-size: 13px;
            font-weight: 600;
            text-decoration: none;
        }

        @media (max-width: 1000px) {

            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .dashboard-grid {
                grid-template-columns: 1fr;
            }

        }

        @media (max-width: 650px) {

            .library-container {
                width: calc(100% - 32px);
                padding: 28px 0 40px;
            }

            .page-intro {
                align-items: stretch;
                flex-direction: column;
            }

            .header-actions {
                display: grid;
                grid-template-columns: 1fr 1fr;
            }

            .stats-grid {
                grid-template-columns: 1fr;
            }

            .stat-card {
                padding: 18px;
            }

        }

        @media (max-width: 450px) {

            .header-actions {
                grid-template-columns: 1fr;
            }

            .page-intro h1 {
                font-size: 24px;
            }

            .panel-header {
                padding: 17px;
            }

            .issue-list {
                padding: 5px 17px;
            }

            .issue-item {
                align-items: flex-start;
            }

            .issue-date {
                display: none;
            }

        }

    </style>

</x-app-layout>