<x-app-layout>

```
<div class="library-dashboard">

    {{-- =========================
        HEADER
    ========================== --}}
    <div class="dashboard-header">

        <div class="header-left">
            <div class="header-icon">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                    <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/>
                    <path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2Z"/>
                    <path d="M8 6h8M8 10h8M8 14h5"/>
                </svg>
            </div>

            <div>
                <div class="breadcrumb">LIBRARY MANAGEMENT</div>
                <h1>Library Dashboard</h1>
                <p>Overview of books, copies and borrowing activity.</p>
            </div>
        </div>

        <div class="header-actions">

            <a href="{{ route('books.index') }}" class="btn btn-secondary">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/>
                    <path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2Z"/>
                </svg>
                View Books
            </a>

            <a href="{{ route('book-issues.create') }}" class="btn btn-primary">
                <span class="plus-icon">+</span>
                Issue Book
            </a>

        </div>

    </div>


    {{-- =========================
        STATISTICS
    ========================== --}}
    <div class="stats-grid">

        <div class="stat-card">
            <div class="stat-top">
                <div class="stat-icon blue">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                        <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/>
                        <path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2Z"/>
                    </svg>
                </div>
                <span class="stat-label">CATALOGUE</span>
            </div>

            <div class="stat-value">{{ $totalBooks }}</div>
            <div class="stat-title">Total Books</div>
            <div class="stat-description">Books in catalogue</div>
        </div>


        <div class="stat-card">
            <div class="stat-top">
                <div class="stat-icon violet">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                        <path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16Z"/>
                        <path d="m3.27 6.96 8.73 5.05 8.73-5.05M12 22.08V12"/>
                    </svg>
                </div>
                <span class="stat-label">INVENTORY</span>
            </div>

            <div class="stat-value">{{ $totalCopies }}</div>
            <div class="stat-title">Total Copies</div>
            <div class="stat-description">Physical copies</div>
        </div>


        <div class="stat-card">
            <div class="stat-top">
                <div class="stat-icon green">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="m5 12 4 4L19 6"/>
                    </svg>
                </div>
                <span class="stat-label">AVAILABLE</span>
            </div>

            <div class="stat-value">{{ $availableCopies }}</div>
            <div class="stat-title">Available Copies</div>
            <div class="stat-description">Ready to issue</div>
        </div>


        <div class="stat-card">
            <div class="stat-top">
                <div class="stat-icon orange">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                        <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/>
                        <path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2Z"/>
                    </svg>
                </div>
                <span class="stat-label">BORROWED</span>
            </div>

            <div class="stat-value">{{ $issuedCopies }}</div>
            <div class="stat-title">Currently Issued</div>
            <div class="stat-description">Currently borrowed</div>
        </div>


        <div class="stat-card">
            <div class="stat-top">
                <div class="stat-icon red">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                        <circle cx="12" cy="12" r="9"/>
                        <path d="M12 7v5l3 2"/>
                    </svg>
                </div>
                <span class="stat-label">ATTENTION</span>
            </div>

            <div class="stat-value">{{ $overdueBooks }}</div>
            <div class="stat-title">Overdue Books</div>
            <div class="stat-description">Require attention</div>
        </div>


        <div class="stat-card">
            <div class="stat-top">
                <div class="stat-icon teal">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                        <path d="M3 12a9 9 0 0 0 15.5 6.3"/>
                        <path d="M21 12a9 9 0 0 0-15.5-6.3"/>
                        <path d="M18 18v-4h-4M6 6v4h4"/>
                    </svg>
                </div>
                <span class="stat-label">COMPLETED</span>
            </div>

            <div class="stat-value">{{ $returnedBooks }}</div>
            <div class="stat-title">Returned Books</div>
            <div class="stat-description">Successfully returned</div>
        </div>

    </div>


    {{-- =========================
        MAIN CONTENT
    ========================== --}}
    <div class="content-grid">

        {{-- Recent Issues --}}
        <section class="dashboard-card activity-card">

            <div class="card-header">

                <div>
                    <div class="card-title-row">
                        <h2>Recent Book Issues</h2>
                        <span class="live-dot"></span>
                    </div>

                    <p>Latest borrowing activity</p>
                </div>

                <a href="{{ route('book-issues.index') }}" class="view-link">
                    View all
                    <span>→</span>
                </a>

            </div>


            @if ($recentIssues->count())

                <div class="activity-list">

                    @foreach ($recentIssues as $issue)

                        <div class="activity-item">

                            <div class="book-avatar">
                                {{ strtoupper(substr($issue->book->title, 0, 1)) }}
                            </div>

                            <div class="activity-details">

                                <div class="book-title"
                                     title="{{ $issue->book->title }}">
                                    {{ $issue->book->title }}
                                </div>

                                <div class="student-name">
                                    <span class="student-dot"></span>
                                    {{ $issue->student->name }}
                                </div>

                            </div>

                            <div class="activity-meta">

                                <div class="issue-date">
                                    {{ $issue->issue_date->format('d M Y') }}
                                </div>

                                @if ($issue->status === 'Issued')

                                    @if ($issue->due_date->isPast())

                                        <span class="status overdue">
                                            <span></span>
                                            Overdue
                                        </span>

                                    @else

                                        <span class="status issued">
                                            <span></span>
                                            Issued
                                        </span>

                                    @endif

                                @else

                                    <span class="status returned">
                                        <span></span>
                                        Returned
                                    </span>

                                @endif

                            </div>

                        </div>

                    @endforeach

                </div>

            @else

                <div class="empty-state">

                    <div class="empty-state-icon">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6">
                            <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/>
                            <path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2Z"/>
                        </svg>
                    </div>

                    <h3>No book issues yet</h3>

                    <p>
                        Start by issuing a book to a student.
                    </p>

                    <a href="{{ route('book-issues.create') }}">
                        Issue your first book →
                    </a>

                </div>

            @endif

        </section>


        {{-- Quick Actions --}}
        <section class="dashboard-card">

            <div class="card-header">

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

                    <div class="quick-info">
                        <strong>Add New Book</strong>
                        <span>Add a book to the catalogue</span>
                    </div>

                    <div class="quick-arrow">→</div>

                </a>


                <a href="{{ route('books.index') }}" class="quick-action">

                    <div class="quick-icon violet">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                            <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/>
                            <path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2Z"/>
                        </svg>
                    </div>

                    <div class="quick-info">
                        <strong>Manage Books</strong>
                        <span>View and manage books</span>
                    </div>

                    <div class="quick-arrow">→</div>

                </a>


                <a href="{{ route('book-issues.create') }}" class="quick-action">

                    <div class="quick-icon orange">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                            <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/>
                            <path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2Z"/>
                            <path d="M12 7v6M9 10h6"/>
                        </svg>
                    </div>

                    <div class="quick-info">
                        <strong>Issue a Book</strong>
                        <span>Assign a book to a student</span>
                    </div>

                    <div class="quick-arrow">→</div>

                </a>


                <a href="{{ route('book-issues.index') }}" class="quick-action">

                    <div class="quick-icon green">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                            <path d="M3 12a9 9 0 0 0 15.5 6.3"/>
                            <path d="M21 12a9 9 0 0 0-15.5-6.3"/>
                            <path d="M18 18v-4h-4M6 6v4h4"/>
                        </svg>
                    </div>

                    <div class="quick-info">
                        <strong>Book Issues</strong>
                        <span>Track issued and returned books</span>
                    </div>

                    <div class="quick-arrow">→</div>

                </a>

            </div>

        </section>

    </div>

</div>


<style>

    /* ==========================================
       BASE
    ========================================== */

    .library-dashboard {
        width: min(1400px, calc(100% - 64px));
        margin: 0 auto;
        padding: 36px 0 70px;
        color: #111827;
    }


    /* ==========================================
       HEADER
    ========================================== */

    .dashboard-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 30px;
        margin-bottom: 30px;
    }

    .header-left {
        display: flex;
        align-items: center;
        gap: 15px;
    }

    .header-icon {
        width: 52px;
        height: 52px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #f0f6ff;
        color: #2563eb;
        border: 1px solid #dbeafe;
        border-radius: 13px;
    }

    .header-icon svg {
        width: 24px;
        height: 24px;
    }

    .breadcrumb {
        margin-bottom: 4px;
        color: #2563eb;
        font-size: 10px;
        font-weight: 750;
        letter-spacing: .12em;
    }

    .dashboard-header h1 {
        margin: 0;
        font-size: 27px;
        line-height: 1.2;
        font-weight: 750;
        letter-spacing: -.035em;
    }

    .dashboard-header p {
        margin: 6px 0 0;
        color: #6b7280;
        font-size: 12px;
    }

    .header-actions {
        display: flex;
        gap: 10px;
    }


    /* ==========================================
       BUTTONS
    ========================================== */

    .btn {
        height: 40px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        padding: 0 15px;
        border-radius: 9px;
        text-decoration: none;
        font-size: 12px;
        font-weight: 650;
        transition: .2s ease;
    }

    .btn svg {
        width: 16px;
        height: 16px;
    }

    .btn-secondary {
        color: #374151;
        background: #ffffff;
        border: 1px solid #e5e7eb;
    }

    .btn-secondary:hover {
        background: #f8fafc;
        border-color: #d1d5db;
    }

    .btn-primary {
        color: #ffffff;
        background: #2563eb;
        box-shadow: 0 4px 10px rgba(37, 99, 235, .18);
    }

    .btn-primary:hover {
        background: #1d4ed8;
        transform: translateY(-1px);
        box-shadow: 0 7px 16px rgba(37, 99, 235, .22);
    }

    .plus-icon {
        font-size: 17px;
        line-height: 1;
    }


    /* ==========================================
       STATISTICS
    ========================================== */

    .stats-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 15px;
        margin-bottom: 24px;
    }

    .stat-card {
        padding: 18px 19px;
        background: #ffffff;
        border: 1px solid #e5e7eb;
        border-radius: 13px;
        box-shadow: 0 2px 5px rgba(15, 23, 42, .025);
        transition: .2s ease;
    }

    .stat-card:hover {
        transform: translateY(-2px);
        border-color: #d9e1ec;
        box-shadow: 0 8px 20px rgba(15, 23, 42, .06);
    }

    .stat-top {
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .stat-icon {
        width: 38px;
        height: 38px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 10px;
    }

    .stat-icon svg {
        width: 19px;
        height: 19px;
    }

    .stat-label {
        color: #9ca3af;
        font-size: 9px;
        font-weight: 750;
        letter-spacing: .08em;
    }

    .stat-value {
        margin-top: 16px;
        color: #111827;
        font-size: 26px;
        line-height: 1;
        font-weight: 750;
        letter-spacing: -.035em;
    }

    .stat-title {
        margin-top: 6px;
        color: #374151;
        font-size: 12px;
        font-weight: 650;
    }

    .stat-description {
        margin-top: 3px;
        color: #9ca3af;
        font-size: 10px;
    }


    /* ==========================================
       ICON COLORS
    ========================================== */

    .blue {
        background: #eff6ff;
        color: #2563eb;
    }

    .violet {
        background: #f5f3ff;
        color: #7c3aed;
    }

    .green {
        background: #ecfdf5;
        color: #16a34a;
    }

    .orange {
        background: #fff7ed;
        color: #ea580c;
    }

    .red {
        background: #fef2f2;
        color: #dc2626;
    }

    .teal {
        background: #f0fdfa;
        color: #0f766e;
    }


    /* ==========================================
       CONTENT GRID
    ========================================== */

    .content-grid {
        display: grid;
        grid-template-columns: minmax(0, 1.55fr) minmax(320px, 1fr);
        gap: 20px;
    }

    .dashboard-card {
        min-width: 0;
        overflow: hidden;
        background: #ffffff;
        border: 1px solid #e5e7eb;
        border-radius: 13px;
        box-shadow: 0 2px 5px rgba(15, 23, 42, .025);
    }


    /* ==========================================
       CARD HEADER
    ========================================== */

    .card-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 15px;
        padding: 19px 21px;
        border-bottom: 1px solid #f1f5f9;
    }

    .card-header h2 {
        margin: 0;
        color: #111827;
        font-size: 14px;
        font-weight: 700;
    }

    .card-header p {
        margin: 5px 0 0;
        color: #9ca3af;
        font-size: 10px;
    }

    .card-title-row {
        display: flex;
        align-items: center;
        gap: 7px;
    }

    .live-dot {
        width: 6px;
        height: 6px;
        border-radius: 50%;
        background: #22c55e;
    }

    .view-link {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        color: #2563eb;
        font-size: 11px;
        font-weight: 650;
        text-decoration: none;
    }

    .view-link:hover {
        color: #1d4ed8;
    }

    .view-link span {
        font-size: 14px;
        transition: transform .2s ease;
    }

    .view-link:hover span {
        transform: translateX(3px);
    }


    /* ==========================================
       ACTIVITY
    ========================================== */

    .activity-list {
        padding: 3px 21px;
    }

    .activity-item {
        display: flex;
        align-items: center;
        gap: 12px;
        min-height: 68px;
        border-bottom: 1px solid #f1f5f9;
    }

    .activity-item:last-child {
        border-bottom: 0;
    }

    .book-avatar {
        width: 38px;
        height: 38px;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        border-radius: 10px;
        background: #eff6ff;
        border: 1px solid #dbeafe;
        color: #2563eb;
        font-size: 12px;
        font-weight: 750;
    }

    .activity-details {
        min-width: 0;
        flex: 1;
    }

    .book-title {
        overflow: hidden;
        color: #1f2937;
        font-size: 11px;
        font-weight: 650;
        text-overflow: ellipsis;
        white-space: nowrap;
    }

    .student-name {
        display: flex;
        align-items: center;
        gap: 6px;
        margin-top: 5px;
        color: #9ca3af;
        font-size: 10px;
    }

    .student-dot {
        width: 5px;
        height: 5px;
        border-radius: 50%;
        background: #cbd5e1;
    }

    .activity-meta {
        display: flex;
        align-items: flex-end;
        flex-direction: column;
        gap: 5px;
        flex-shrink: 0;
    }

    .issue-date {
        color: #9ca3af;
        font-size: 9px;
    }

    .status {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        padding: 4px 7px;
        border-radius: 999px;
        font-size: 8px;
        font-weight: 700;
    }

    .status > span {
        width: 5px;
        height: 5px;
        border-radius: 50%;
    }

    .status.issued {
        color: #b45309;
        background: #fffbeb;
    }

    .status.issued > span {
        background: #f59e0b;
    }

    .status.returned {
        color: #15803d;
        background: #ecfdf5;
    }

    .status.returned > span {
        background: #22c55e;
    }

    .status.overdue {
        color: #dc2626;
        background: #fef2f2;
    }

    .status.overdue > span {
        background: #ef4444;
    }


    /* ==========================================
       QUICK ACTIONS
    ========================================== */

    .quick-actions {
        padding: 5px 16px 12px;
    }

    .quick-action {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 13px 5px;
        border-bottom: 1px solid #f1f5f9;
        text-decoration: none;
        border-radius: 8px;
        transition: .2s ease;
    }

    .quick-action:last-child {
        border-bottom: 0;
    }

    .quick-action:hover {
        padding-left: 9px;
        background: #f8fafc;
    }

    .quick-icon {
        width: 37px;
        height: 37px;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        border-radius: 10px;
        font-size: 16px;
        font-weight: 700;
    }

    .quick-icon svg {
        width: 17px;
        height: 17px;
    }

    .quick-info {
        min-width: 0;
        flex: 1;
    }

    .quick-info strong {
        display: block;
        color: #1f2937;
        font-size: 11px;
        font-weight: 650;
    }

    .quick-info span {
        display: block;
        overflow: hidden;
        margin-top: 3px;
        color: #9ca3af;
        font-size: 9px;
        text-overflow: ellipsis;
        white-space: nowrap;
    }

    .quick-arrow {
        color: #cbd5e1;
        font-size: 15px;
        transition: .2s ease;
    }

    .quick-action:hover .quick-arrow {
        color: #2563eb;
        transform: translateX(3px);
    }


    /* ==========================================
       EMPTY STATE
    ========================================== */

    .empty-state {
        padding: 55px 20px;
        text-align: center;
    }

    .empty-state-icon {
        width: 52px;
        height: 52px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 13px;
        border-radius: 13px;
        background: #f8fafc;
        color: #94a3b8;
    }

    .empty-state-icon svg {
        width: 24px;
        height: 24px;
    }

    .empty-state h3 {
        margin: 0;
        color: #1f2937;
        font-size: 14px;
        font-weight: 700;
    }

    .empty-state p {
        margin: 6px 0 14px;
        color: #9ca3af;
        font-size: 11px;
    }

    .empty-state a {
        color: #2563eb;
        font-size: 11px;
        font-weight: 650;
        text-decoration: none;
    }


    /* ==========================================
       TABLET
    ========================================== */

    @media (max-width: 1050px) {

        .stats-grid {
            grid-template-columns: repeat(2, 1fr);
        }

        .content-grid {
            grid-template-columns: 1fr;
        }

    }


    /* ==========================================
       MOBILE
    ========================================== */

    @media (max-width: 680px) {

        .library-dashboard {
            width: calc(100% - 30px);
            padding: 26px 0 45px;
        }

        .dashboard-header {
            align-items: stretch;
            flex-direction: column;
            gap: 18px;
        }

        .header-actions {
            display: grid;
            grid-template-columns: 1fr 1fr;
        }

        .stats-grid {
            grid-template-columns: 1fr;
            gap: 11px;
        }

        .content-grid {
            gap: 15px;
        }

        .activity-list {
            padding: 3px 16px;
        }

        .card-header {
            padding: 17px;
        }

    }


    /* ==========================================
       SMALL MOBILE
    ========================================== */

    @media (max-width: 450px) {

        .library-dashboard {
            width: calc(100% - 22px);
        }

        .header-left {
            align-items: flex-start;
        }

        .header-icon {
            width: 45px;
            height: 45px;
        }

        .dashboard-header h1 {
            font-size: 23px;
        }

        .header-actions {
            grid-template-columns: 1fr;
        }

        .activity-item {
            min-height: 64px;
        }

        .activity-meta {
            display: none;
        }

    }

</style>
```

</x-app-layout>
