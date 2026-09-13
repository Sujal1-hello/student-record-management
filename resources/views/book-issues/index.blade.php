<x-app-layout>

    <div class="books-container">

        @if (session('success'))
            <div class="success-message">
                <span>✓</span>
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="error-message">
                <span>✕</span>
                {{ session('error') }}
            </div>
        @endif

        <div class="page-intro">
            <div>
                <h1>Book Issues</h1>
                <p>Track issued, overdue and returned books.</p>
            </div>

            <a href="{{ route('book-issues.create') }}" class="add-student-button">
                + Issue a Book
            </a>
        </div>

        <form action="{{ route('book-issues.index') }}" method="GET" class="filter-panel">

            <select name="status" onchange="this.form.submit()">
                <option value="">All Statuses</option>
                <option value="Issued" {{ ($status ?? '') == 'Issued' ? 'selected' : '' }}>Issued</option>
                <option value="Returned" {{ ($status ?? '') == 'Returned' ? 'selected' : '' }}>Returned</option>
            </select>

            @if (!empty($status))
                <a href="{{ route('book-issues.index') }}" class="clear-button">Clear</a>
            @endif

        </form>

        @if ($issues->count())

            <div class="records-header">
                <div>
                    <strong>{{ $issues->total() }} {{ $issues->total() == 1 ? 'Record' : 'Records' }}</strong>
                    <span>Showing {{ $issues->firstItem() }}–{{ $issues->lastItem() }}</span>
                </div>
            </div>

            <div class="students-table-card">
                <div class="table-wrapper">
                    <table>
                        <thead>
                            <tr>
                                <th>Book</th>
                                <th>Student</th>
                                <th>Issue Date</th>
                                <th>Due Date</th>
                                <th>Return Date</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($issues as $issue)
                                <tr>
                                    <td>
                                        <div class="student-name">
                                            <div class="student-avatar">
                                                {{ strtoupper(substr($issue->book->title, 0, 1)) }}
                                            </div>
                                            <div>
                                                <span>{{ $issue->book->title }}</span><br>
                                                <span class="student-id">{{ $issue->book->book_id }}</span>
                                            </div>
                                        </div>
                                    </td>

                                    <td class="email">{{ $issue->student->name }}</td>

                                    <td>{{ $issue->issue_date->format('d M Y') }}</td>

                                    <td>
                                        {{ $issue->due_date->format('d M Y') }}
                                        @if ($issue->status === 'Issued' && $issue->due_date->isPast())
                                            <br><span class="overdue-tag">Overdue</span>
                                        @endif
                                    </td>

                                    <td>
                                        @if ($issue->return_date)
                                            {{ $issue->return_date->format('d M Y') }}
                                        @else
                                            <span class="muted">—</span>
                                        @endif
                                    </td>

                                    <td>
                                        <span class="status-badge {{ strtolower($issue->status) }}">
                                            {{ $issue->status }}
                                        </span>
                                    </td>

                                    <td>
                                        <div class="actions">
                                            @if ($issue->status !== 'Returned')
                                                <form action="{{ route('book-issues.return', $issue->id) }}" method="POST"
                                                    class="delete-form">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button type="submit" class="view-button"
                                                        onclick="return confirm('Mark this book as returned?')">
                                                        Mark Returned
                                                    </button>
                                                </form>
                                            @else
                                                <span class="muted">—</span>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="mobile-student-list">
                @foreach ($issues as $issue)
                    <div class="mobile-student-card">
                        <div class="mobile-card-header">
                            <div class="student-name">
                                <div class="student-avatar">
                                    {{ strtoupper(substr($issue->book->title, 0, 1)) }}
                                </div>
                                <div>
                                    <strong>{{ $issue->book->title }}</strong>
                                    <span>{{ $issue->student->name }}</span>
                                </div>
                            </div>

                            <span class="status-badge {{ strtolower($issue->status) }}">
                                {{ $issue->status }}
                            </span>
                        </div>

                        <div class="mobile-details">
                            <div>
                                <small>Issue Date</small>
                                <span>{{ $issue->issue_date->format('d M Y') }}</span>
                            </div>
                            <div>
                                <small>Due Date</small>
                                <span>
                                    {{ $issue->due_date->format('d M Y') }}
                                    @if ($issue->status === 'Issued' && $issue->due_date->isPast())
                                        (Overdue)
                                    @endif
                                </span>
                            </div>
                            <div>
                                <small>Return Date</small>
                                <span>{{ $issue->return_date ? $issue->return_date->format('d M Y') : 'N/A' }}</span>
                            </div>
                        </div>

                        <div class="mobile-actions">
                            @if ($issue->status !== 'Returned')
                                <form action="{{ route('book-issues.return', $issue->id) }}" method="POST"
                                    style="grid-column: span 3;">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="view-button" style="width:100%;"
                                        onclick="return confirm('Mark this book as returned?')">
                                        Mark Returned
                                    </button>
                                </form>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="pagination">
                {{ $issues->links() }}
            </div>

        @else

            <div class="empty-state">
                <div class="empty-icon">📖</div>

                @if (!empty($status))
                    <h3>No Records Found</h3>
                    <p>No book issues match this filter.</p>
                    <a href="{{ route('book-issues.index') }}" class="clear-button">Clear Filters</a>
                @else
                    <h3>No Book Issues Yet</h3>
                    <p>You haven't issued any books yet.</p>
                    <a href="{{ route('book-issues.create') }}" class="add-student-button">+ Issue Your First Book</a>
                @endif
            </div>

        @endif

    </div>

    <style>
        .books-container {
            width: min(1400px, calc(100% - 60px));
            margin: 0 auto;
            padding: 40px 0 60px;
        }

        .success-message,
        .error-message {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 24px;
            padding: 13px 16px;
            border-radius: 9px;
            font-size: 14px;
            font-weight: 500;
        }

        .success-message {
            background: #ecfdf5;
            border: 1px solid #bbf7d0;
            color: #166534;
        }

        .error-message {
            background: #fef2f2;
            border: 1px solid #fecaca;
            color: #991b1b;
        }

        .success-message span,
        .error-message span {
            font-weight: 700;
        }

        .page-intro {
            display: flex;
            align-items: flex-end;
            justify-content: space-between;
            gap: 20px;
            margin-bottom: 28px;
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

        .add-student-button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 10px 16px;
            border-radius: 8px;
            background: #2563eb;
            color: white;
            text-decoration: none;
            font-size: 13px;
            font-weight: 600;
            transition: 0.2s ease;
        }

        .add-student-button:hover {
            background: #1d4ed8;
        }

        .filter-panel {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 18px;
            margin-bottom: 24px;
            background: #ffffff;
            border: 1px solid #e5e7eb;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
        }

        .filter-panel select {
            height: 44px;
            min-width: 200px;
            box-sizing: border-box;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            background: #ffffff;
            color: #111827;
            font-size: 13px;
            padding: 0 12px;
            outline: none;
        }

        .filter-panel select:focus {
            border-color: #2563eb;
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
        }

        .clear-button {
            height: 44px;
            padding: 0 18px;
            border-radius: 8px;
            font-size: 13px;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border: 1px solid #e5e7eb;
            background: #f3f4f6;
            color: #374151;
            text-decoration: none;
            cursor: pointer;
        }

        .clear-button:hover {
            background: #e5e7eb;
        }

        .records-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 12px;
            color: #6b7280;
            font-size: 13px;
        }

        .records-header strong {
            margin-right: 10px;
            color: #111827;
            font-size: 15px;
        }

        .students-table-card {
            overflow: hidden;
            background: #ffffff;
            border: 1px solid #e5e7eb;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
        }

        .table-wrapper {
            width: 100%;
            overflow-x: auto;
        }

        table {
            width: 100%;
            min-width: 900px;
            border-collapse: collapse;
        }

        th {
            padding: 14px 16px;
            background: #f8fafc;
            border-bottom: 1px solid #e5e7eb;
            color: #6b7280;
            text-align: left;
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 0.04em;
            text-transform: uppercase;
            white-space: nowrap;
        }

        td {
            padding: 15px 16px;
            border-bottom: 1px solid #f1f5f9;
            color: #374151;
            font-size: 13px;
            vertical-align: middle;
        }

        tbody tr:last-child td {
            border-bottom: 0;
        }

        tbody tr:hover {
            background: #f8fafc;
        }

        .student-id {
            display: inline-flex;
            padding: 3px 7px;
            border-radius: 6px;
            background: #eff6ff;
            color: #2563eb;
            font-size: 11px;
            font-weight: 700;
            margin-top: 3px;
        }

        .student-name {
            display: flex;
            align-items: center;
            gap: 10px;
            color: #111827;
            font-weight: 600;
        }

        .student-avatar {
            width: 34px;
            height: 34px;
            flex-shrink: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            background: #eff6ff;
            color: #2563eb;
            font-size: 13px;
            font-weight: 700;
        }

        .email {
            color: #4b5563;
        }

        .muted {
            color: #9ca3af;
        }

        .overdue-tag {
            display: inline-flex;
            margin-top: 3px;
            padding: 2px 7px;
            border-radius: 999px;
            background: #fef2f2;
            color: #dc2626;
            font-size: 10px;
            font-weight: 700;
        }

        .status-badge {
            display: inline-flex;
            padding: 5px 9px;
            border-radius: 999px;
            font-size: 11px;
            font-weight: 600;
        }

        .status-badge.issued {
            background: #fffbeb;
            color: #b45309;
        }

        .status-badge.returned {
            background: #ecfdf5;
            color: #15803d;
        }

        .actions {
            display: flex;
            align-items: center;
            gap: 7px;
            white-space: nowrap;
        }

        .delete-form {
            display: inline;
            margin: 0;
        }

        .view-button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-height: 32px;
            padding: 6px 10px;
            border-radius: 6px;
            font-family: inherit;
            font-size: 12px;
            font-weight: 600;
            text-decoration: none;
            box-sizing: border-box;
            cursor: pointer;
            border: 0;
            background: #eff6ff;
            color: #2563eb;
        }

        .view-button:hover {
            background: #dbeafe;
        }

        .mobile-student-list {
            display: none;
        }

        .pagination {
            display: flex;
            justify-content: center;
            margin-top: 24px;
        }

        .pagination a,
        .pagination span {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 36px;
            height: 36px;
            margin: 0 2px;
            padding: 0 9px;
            border: 1px solid #e5e7eb;
            border-radius: 7px;
            background: #ffffff;
            color: #2563eb;
            text-decoration: none;
            font-size: 13px;
        }

        .pagination a:hover {
            background: #eff6ff;
        }

        .pagination span[aria-current="page"] {
            border-color: #2563eb;
            background: #2563eb;
            color: white;
        }

        .pagination span[aria-disabled="true"] {
            background: #f9fafb;
            color: #9ca3af;
        }

        .empty-state {
            padding: 70px 20px;
            text-align: center;
            background: #ffffff;
            border: 1px solid #e5e7eb;
            border-radius: 12px;
        }

        .empty-icon {
            margin-bottom: 15px;
            font-size: 42px;
        }

        .empty-state h3 {
            margin: 0;
            color: #111827;
            font-size: 20px;
        }

        .empty-state p {
            margin: 8px 0 20px;
            color: #6b7280;
            font-size: 14px;
        }

        @media (max-width: 800px) {
            .books-container {
                width: calc(100% - 32px);
                padding: 28px 0 40px;
            }

            .page-intro {
                align-items: stretch;
                flex-direction: column;
            }

            .add-student-button {
                width: 100%;
            }

            .filter-panel {
                flex-direction: column;
                align-items: stretch;
            }

            .students-table-card {
                display: none;
            }

            .mobile-student-list {
                display: flex;
                flex-direction: column;
                gap: 14px;
            }

            .mobile-student-card {
                padding: 18px;
                background: #ffffff;
                border: 1px solid #e5e7eb;
                border-radius: 12px;
                box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
            }

            .mobile-card-header {
                display: flex;
                align-items: center;
                justify-content: space-between;
                gap: 12px;
                padding-bottom: 16px;
                border-bottom: 1px solid #f1f5f9;
            }

            .mobile-card-header .student-name {
                min-width: 0;
            }

            .mobile-card-header .student-name>div:last-child {
                min-width: 0;
                display: flex;
                flex-direction: column;
                gap: 3px;
            }

            .mobile-card-header strong {
                overflow: hidden;
                text-overflow: ellipsis;
                white-space: nowrap;
            }

            .mobile-card-header .student-name span {
                color: #6b7280;
                font-size: 11px;
                font-weight: 500;
            }

            .mobile-details {
                display: grid;
                grid-template-columns: 1fr 1fr 1fr;
                gap: 16px;
                padding: 16px 0;
            }

            .mobile-details div {
                min-width: 0;
                display: flex;
                flex-direction: column;
                gap: 4px;
            }

            .mobile-details small {
                color: #9ca3af;
                font-size: 10px;
                font-weight: 700;
                letter-spacing: 0.05em;
                text-transform: uppercase;
            }

            .mobile-details span {
                overflow: hidden;
                color: #374151;
                font-size: 12px;
                text-overflow: ellipsis;
                white-space: nowrap;
            }

            .mobile-actions {
                display: grid;
                grid-template-columns: repeat(3, 1fr);
                gap: 7px;
                padding-top: 14px;
                border-top: 1px solid #f1f5f9;
            }
        }

        @media (max-width: 550px) {
            .page-intro h1 {
                font-size: 24px;
            }

            .records-header {
                align-items: flex-start;
                flex-direction: column;
                gap: 4px;
            }

            .mobile-student-card {
                padding: 15px;
            }

            .mobile-details {
                grid-template-columns: 1fr;
            }

            .pagination {
                overflow-x: auto;
                justify-content: flex-start;
                padding-bottom: 5px;
            }
        }
    </style>

</x-app-layout>