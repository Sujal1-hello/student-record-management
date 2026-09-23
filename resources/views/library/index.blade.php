<x-app-layout>

    <div class="library-container">

        {{-- Page Header --}}
        <div class="page-header">
            <div class="page-heading">
                <div class="heading-icon">
                    <span>📚</span>
                </div>

                <div>
                    <span class="eyebrow">Library Management</span>
                    <h1>Library Dashboard</h1>
                    <p>Monitor books, copies and borrowing activity from one place.</p>
                </div>
            </div>

            <div class="header-actions">
                <a href="{{ route('books.index') }}" class="secondary-button">
                    <span>View Books</span>
                </a>

                <a href="{{ route('book-issues.create') }}" class="primary-button">
                    <span>+</span>
                    Issue Book
                </a>
            </div>
        </div>


        {{-- Statistics --}}
        <div class="stats-grid">

            <div class="stat-card">
                <div class="stat-icon blue">
                    📚
                </div>

                <div class="stat-content">
                    <span>Total Books</span>
                    <strong>{{ $totalBooks }}</strong>
                    <small>Books in catalogue</small>
                </div>
            </div>


            <div class="stat-card">
                <div class="stat-icon purple">
                    📦
                </div>

                <div class="stat-content">
                    <span>Total Copies</span>
                    <strong>{{ $totalCopies }}</strong>
                    <small>Physical copies</small>
                </div>
            </div>


            <div class="stat-card">
                <div class="stat-icon green">
                    ✓
                </div>

                <div class="stat-content">
                    <span>Available Copies</span>
                    <strong>{{ $availableCopies }}</strong>
                    <small>Ready to issue</small>
                </div>
            </div>


            <div class="stat-card">
                <div class="stat-icon orange">
                    📖
                </div>

                <div class="stat-content">
                    <span>Currently Issued</span>
                    <strong>{{ $issuedCopies }}</strong>
                    <small>Currently borrowed</small>
                </div>
            </div>


            <div class="stat-card">
                <div class="stat-icon red">
                    ⏰
                </div>

                <div class="stat-content">
                    <span>Overdue Books</span>
                    <strong>{{ $overdueBooks }}</strong>
                    <small>Require attention</small>
                </div>
            </div>


            <div class="stat-card">
                <div class="stat-icon teal">
                    ↩
                </div>

                <div class="stat-content">
                    <span>Returned Books</span>
                    <strong>{{ $returnedBooks }}</strong>
                    <small>Successfully returned</small>
                </div>
            </div>

        </div>


        {{-- Main Dashboard --}}
        <div class="dashboard-grid">

            {{-- Recent Issues --}}
            <div class="panel">

                <div class="panel-header">
                    <div>
                        <h2>Recent Book Issues</h2>
                        <p>Latest borrowing activity</p>
                    </div>

                    <a href="{{ route('book-issues.index') }}" class="view-all">
                        View All →
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

                                    <strong title="{{ $issue->book->title }}">
                                        {{ $issue->book->title }}
                                    </strong>

                                    <span>
                                        Issued to {{ $issue->student->name }}
                                    </span>

                                </div>


                                <div class="issue-date">

                                    <span>
                                        {{ $issue->issue_date->format('d M Y') }}
                                    </span>


                                    @if ($issue->status === 'Issued')

                                        @if ($issue->due_date->isPast())

                                            <small class="status-badge overdue">
                                                <span></span>
                                                Overdue
                                            </small>

                                        @else

                                            <small class="status-badge issued">
                                                <span></span>
                                                Issued
                                            </small>

                                        @endif

                                    @else

                                        <small class="status-badge returned">
                                            <span></span>
                                            Returned
                                        </small>

                                    @endif

                                </div>

                            </div>

                        @endforeach

                    </div>

                @else

                    <div class="empty-state">

                        <div class="empty-icon">📖</div>

                        <h3>No Book Issues</h3>

                        <p>
                            No books have been issued yet.
                        </p>

                        <a href="{{ route('book-issues.create') }}">
                            Issue your first book →
                        </a>

                    </div>

                @endif

            </div>


            {{-- Quick Actions --}}
            <div class="panel">

                <div class="panel-header">

                    <div>
                        <h2>Quick Actions</h2>
                        <p>Common library tasks</p>
                    </div>

                </div>


                <div class="quick-actions">

                    <a href="{{ route('books.create') }}" class="quick-action">

                        <div class="quick-icon blue">
                            +
                        </div>

                        <div class="quick-content">
                            <strong>Add New Book</strong>
                            <span>Add a new book to the catalogue</span>
                        </div>

                        <div class="action-arrow">→</div>

                    </a>


                    <a href="{{ route('books.index') }}" class="quick-action">

                        <div class="quick-icon purple">
                            📚
                        </div>

                        <div class="quick-content">
                            <strong>Manage Books</strong>
                            <span>View and manage your books</span>
                        </div>

                        <div class="action-arrow">→</div>

                    </a>


                    <a href="{{ route('book-issues.create') }}" class="quick-action">

                        <div class="quick-icon orange">
                            📖
                        </div>

                        <div class="quick-content">
                            <strong>Issue a Book</strong>
                            <span>Assign a book to a student</span>
                        </div>

                        <div class="action-arrow">→</div>

                    </a>


                    <a href="{{ route('book-issues.index') }}" class="quick-action">

                        <div class="quick-icon green">
                            ↩
                        </div>

                        <div class="quick-content">
                            <strong>Book Issues</strong>
                            <span>Track issued and returned books</span>
                        </div>

                        <div class="action-arrow">→</div>

                    </a>

                </div>

            </div>

        </div>

    </div>


    <style>

        /* ========================================
           LIBRARY DASHBOARD
           ======================================== */

        .library-container {
            width: min(1380px, calc(100% - 64px));
            margin: 0 auto;
            padding: 42px 0 70px;
        }


        /* ========================================
           PAGE HEADER
           ======================================== */

        .page-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 30px;
            margin-bottom: 32px;
        }


        .page-heading {
            display: flex;
            align-items: center;
            gap: 16px;
        }


        .heading-icon {
            width: 52px;
            height: 52px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            background: #eff6ff;
            border: 1px solid #dbeafe;
            border-radius: 14px;
            font-size: 23px;
        }


        .eyebrow {
            display: block;
            margin-bottom: 4px;
            color: #2563eb;
            font-size: 11px;
            font-weight: 700;
            letter-spacing: .08em;
            text-transform: uppercase;
        }


        .page-header h1 {
            margin: 0;
            color: #111827;
            font-size: 29px;
            line-height: 1.2;
            font-weight: 750;
            letter-spacing: -.025em;
        }


        .page-header p {
            margin: 6px 0 0;
            color: #6b7280;
            font-size: 13px;
        }


        .header-actions {
            display: flex;
            align-items: center;
            gap: 10px;
        }


        .primary-button,
        .secondary-button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 7px;
            height: 42px;
            padding: 0 17px;
            border-radius: 9px;
            text-decoration: none;
            font-size: 13px;
            font-weight: 650;
            transition: all .2s ease;
        }


        .primary-button {
            background: #2563eb;
            color: #ffffff;
            box-shadow: 0 3px 8px rgba(37, 99, 235, .18);
        }


        .primary-button:hover {
            background: #1d4ed8;
            transform: translateY(-1px);
            box-shadow: 0 6px 14px rgba(37, 99, 235, .22);
        }


        .secondary-button {
            background: #ffffff;
            border: 1px solid #e5e7eb;
            color: #374151;
        }


        .secondary-button:hover {
            background: #f8fafc;
            border-color: #d1d5db;
        }


        /* ========================================
           STATISTICS
           ======================================== */

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 16px;
            margin-bottom: 25px;
        }


        .stat-card {
            position: relative;
            display: flex;
            align-items: center;
            gap: 15px;
            min-height: 104px;
            padding: 20px;
            background: #ffffff;
            border: 1px solid #e5e7eb;
            border-radius: 14px;
            box-shadow: 0 2px 6px rgba(15, 23, 42, .035);
            transition: transform .2s ease, box-shadow .2s ease,
                        border-color .2s ease;
        }


        .stat-card:hover {
            transform: translateY(-2px);
            border-color: #dbe3ef;
            box-shadow: 0 8px 22px rgba(15, 23, 42, .07);
        }


        .stat-icon {
            width: 47px;
            height: 47px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            border-radius: 12px;
            font-size: 20px;
            font-weight: 700;
        }


        .stat-icon.blue {
            background: #eff6ff;
            color: #2563eb;
        }


        .stat-icon.purple {
            background: #f5f3ff;
            color: #7c3aed;
        }


        .stat-icon.green {
            background: #ecfdf5;
            color: #16a34a;
        }


        .stat-icon.orange {
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


        .stat-content {
            min-width: 0;
        }


        .stat-content span {
            display: block;
            margin-bottom: 3px;
            color: #6b7280;
            font-size: 12px;
            font-weight: 550;
        }


        .stat-content strong {
            display: block;
            color: #111827;
            font-size: 25px;
            line-height: 1.1;
            font-weight: 750;
        }


        .stat-content small {
            display: block;
            margin-top: 4px;
            color: #9ca3af;
            font-size: 10px;
        }


        /* ========================================
           MAIN GRID
           ======================================== */

        .dashboard-grid {
            display: grid;
            grid-template-columns: minmax(0, 1.55fr) minmax(320px, 1fr);
            gap: 24px;
        }


        /* ========================================
           PANELS
           ======================================== */

        .panel {
            min-width: 0;
            overflow: hidden;
            background: #ffffff;
            border: 1px solid #e5e7eb;
            border-radius: 14px;
            box-shadow: 0 2px 6px rgba(15, 23, 42, .035);
        }


        .panel-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 15px;
            padding: 20px 22px;
            border-bottom: 1px solid #f1f5f9;
        }


        .panel-header h2 {
            margin: 0;
            color: #111827;
            font-size: 15px;
            font-weight: 700;
            letter-spacing: -.01em;
        }


        .panel-header p {
            margin: 5px 0 0;
            color: #9ca3af;
            font-size: 11px;
        }


        .view-all {
            color: #2563eb;
            font-size: 11px;
            font-weight: 650;
            text-decoration: none;
            white-space: nowrap;
            transition: color .2s ease;
        }


        .view-all:hover {
            color: #1d4ed8;
        }


        /* ========================================
           RECENT ISSUES
           ======================================== */

        .issue-list {
            padding: 4px 22px;
        }


        .issue-item {
            display: flex;
            align-items: center;
            gap: 13px;
            padding: 15px 0;
            border-bottom: 1px solid #f1f5f9;
        }


        .issue-item:last-child {
            border-bottom: 0;
        }


        .book-avatar {
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            border: 1px solid #dbeafe;
            border-radius: 10px;
            background: #eff6ff;
            color: #2563eb;
            font-size: 13px;
            font-weight: 750;
        }


        .issue-info {
            min-width: 0;
            flex: 1;
        }


        .issue-info strong {
            display: block;
            overflow: hidden;
            color: #111827;
            font-size: 12px;
            font-weight: 650;
            text-overflow: ellipsis;
            white-space: nowrap;
        }


        .issue-info span {
            display: block;
            overflow: hidden;
            margin-top: 4px;
            color: #6b7280;
            font-size: 11px;
            text-overflow: ellipsis;
            white-space: nowrap;
        }


        .issue-date {
            display: flex;
            align-items: flex-end;
            flex-direction: column;
            gap: 5px;
            flex-shrink: 0;
            white-space: nowrap;
        }


        .issue-date > span {
            color: #6b7280;
            font-size: 10px;
        }


        .status-badge {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            padding: 4px 8px;
            border-radius: 999px;
            font-size: 9px;
            font-weight: 700;
        }


        .status-badge span {
            width: 5px;
            height: 5px;
            margin: 0;
            border-radius: 50%;
        }


        .status-badge.issued {
            background: #fffbeb;
            color: #b45309;
        }


        .status-badge.issued span {
            background: #f59e0b;
        }


        .status-badge.returned {
            background: #ecfdf5;
            color: #15803d;
        }


        .status-badge.returned span {
            background: #22c55e;
        }


        .status-badge.overdue {
            background: #fef2f2;
            color: #dc2626;
        }


        .status-badge.overdue span {
            background: #ef4444;
        }


        /* ========================================
           QUICK ACTIONS
           ======================================== */

        .quick-actions {
            padding: 8px 18px 14px;
        }


        .quick-action {
            display: flex;
            align-items: center;
            gap: 13px;
            padding: 14px 5px;
            border-bottom: 1px solid #f1f5f9;
            text-decoration: none;
            border-radius: 8px;
            transition: background .2s ease, padding-left .2s ease;
        }


        .quick-action:last-child {
            border-bottom: 0;
        }


        .quick-action:hover {
            padding-left: 9px;
            background: #f8fafc;
        }


        .quick-icon {
            width: 39px;
            height: 39px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            border-radius: 10px;
            font-size: 15px;
            font-weight: 700;
        }


        .quick-icon.blue {
            background: #eff6ff;
            color: #2563eb;
        }


        .quick-icon.purple {
            background: #f5f3ff;
            color: #7c3aed;
        }


        .quick-icon.orange {
            background: #fff7ed;
            color: #ea580c;
        }


        .quick-icon.green {
            background: #ecfdf5;
            color: #16a34a;
        }


        .quick-content {
            min-width: 0;
            flex: 1;
        }


        .quick-action strong {
            display: block;
            color: #111827;
            font-size: 12px;
            font-weight: 650;
        }


        .quick-action span {
            display: block;
            overflow: hidden;
            margin-top: 3px;
            color: #9ca3af;
            font-size: 10px;
            text-overflow: ellipsis;
            white-space: nowrap;
        }


        .action-arrow {
            color: #cbd5e1;
            font-size: 15px;
            transition: transform .2s ease, color .2s ease;
        }


        .quick-action:hover .action-arrow {
            color: #2563eb;
            transform: translateX(3px);
        }


        /* ========================================
           EMPTY STATE
           ======================================== */

        .empty-state {
            padding: 55px 20px;
            text-align: center;
        }


        .empty-icon {
            width: 56px;
            height: 56px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 14px;
            border-radius: 14px;
            background: #f8fafc;
            font-size: 27px;
        }


        .empty-state h3 {
            margin: 0;
            color: #111827;
            font-size: 15px;
            font-weight: 700;
        }


        .empty-state p {
            margin: 6px 0 15px;
            color: #6b7280;
            font-size: 12px;
        }


        .empty-state a {
            color: #2563eb;
            font-size: 12px;
            font-weight: 650;
            text-decoration: none;
        }


        .empty-state a:hover {
            color: #1d4ed8;
        }


        /* ========================================
           TABLET
           ======================================== */

        @media (max-width: 1050px) {

            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
            }


            .dashboard-grid {
                grid-template-columns: 1fr;
            }

        }


        /* ========================================
           MOBILE
           ======================================== */

        @media (max-width: 680px) {

            .library-container {
                width: calc(100% - 32px);
                padding: 28px 0 45px;
            }


            .page-header {
                align-items: stretch;
                flex-direction: column;
                gap: 20px;
            }


            .page-heading {
                align-items: flex-start;
            }


            .page-header h1 {
                font-size: 25px;
            }


            .header-actions {
                display: grid;
                grid-template-columns: 1fr 1fr;
            }


            .stats-grid {
                grid-template-columns: 1fr;
                gap: 12px;
            }


            .stat-card {
                min-height: 88px;
                padding: 17px;
            }


            .dashboard-grid {
                gap: 16px;
            }


            .panel-header {
                padding: 18px;
            }


            .issue-list {
                padding: 4px 18px;
            }

        }


        /* ========================================
           SMALL MOBILE
           ======================================== */

        @media (max-width: 450px) {

            .library-container {
                width: calc(100% - 24px);
            }


            .header-actions {
                grid-template-columns: 1fr;
            }


            .heading-icon {
                width: 45px;
                height: 45px;
                font-size: 19px;
            }


            .page-header h1 {
                font-size: 23px;
            }


            .page-header p {
                line-height: 1.5;
            }


            .panel-header {
                padding: 16px;
            }


            .issue-list {
                padding: 4px 16px;
            }


            .issue-item {
                align-items: flex-start;
            }


            .issue-date {
                display: none;
            }


            .quick-actions {
                padding-left: 14px;
                padding-right: 14px;
            }

        }

    </style>

</x-app-layout>

