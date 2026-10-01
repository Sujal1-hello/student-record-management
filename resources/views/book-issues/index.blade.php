<x-app-layout>

    <div class="books-container">

        {{-- Flash Messages --}}
        @if (session('success'))
            <div class="alert alert-success">
                <span class="alert-icon">✓</span>
                <div>
                    <strong>Success</strong>
                    <span>{{ session('success') }}</span>
                </div>
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-error">
                <span class="alert-icon">!</span>
                <div>
                    <strong>Error</strong>
                    <span>{{ session('error') }}</span>
                </div>
            </div>
        @endif


        {{-- Page Header --}}
        <div class="page-header">

            <div class="page-heading">
                <div class="heading-icon">
                    📚
                </div>

                <div>
                    <h1>Book Issues</h1>
                    <p>Manage issued books, due dates and returns.</p>
                </div>
            </div>

            <a href="{{ route('book-issues.create') }}" class="primary-button">
                <span class="button-icon">+</span>
                <span>Issue a Book</span>
            </a>

        </div>


        {{-- Filter Section --}}
        <div class="filter-card">

            <div class="filter-heading">
                <span class="filter-icon">☰</span>

                <div>
                    <strong>Filter Records</strong>
                    <span>View book issues by status</span>
                </div>
            </div>

            <form
                action="{{ route('book-issues.index') }}"
                method="GET"
                class="filter-form"
            >

                <div class="select-wrapper">

                    <label for="status">Status</label>

                    <select
                        id="status"
                        name="status"
                        onchange="this.form.submit()"
                    >
                        <option value="">All Statuses</option>

                        <option
                            value="Issued"
                            {{ ($status ?? '') == 'Issued' ? 'selected' : '' }}
                        >
                            Issued
                        </option>

                        <option
                            value="Returned"
                            {{ ($status ?? '') == 'Returned' ? 'selected' : '' }}
                        >
                            Returned
                        </option>
                    </select>

                </div>

                @if (!empty($status))

                    <a
                        href="{{ route('book-issues.index') }}"
                        class="secondary-button"
                    >
                        Clear Filter
                    </a>

                @endif

            </form>

        </div>


        {{-- Records --}}
        @if ($issues->count())

            {{-- Records Summary --}}
            <div class="records-header">

                <div class="records-summary">

                    <strong>
                        {{ $issues->total() }}
                        {{ $issues->total() == 1 ? 'Record' : 'Records' }}
                    </strong>

                    <span>
                        Showing
                        {{ $issues->firstItem() }}
                        –
                        {{ $issues->lastItem() }}
                    </span>

                </div>

            </div>


            {{-- Desktop Table --}}
            <div class="table-card">

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
                                <th class="actions-column">Actions</th>
                            </tr>

                        </thead>

                        <tbody>

                            @foreach ($issues as $issue)

                                <tr>

                                    {{-- Book --}}
                                    <td>

                                        <div class="book-info">

                                            <div class="book-avatar">
                                                {{ strtoupper(substr($issue->book->title, 0, 1)) }}
                                            </div>

                                            <div class="book-details">

                                                <strong>
                                                    {{ $issue->book->title }}
                                                </strong>

                                                <span>
                                                    {{ $issue->book->book_id }}
                                                </span>

                                            </div>

                                        </div>

                                    </td>


                                    {{-- Student --}}
                                    <td>

                                        <div class="student-info">

                                            <span class="student-name-text">
                                                {{ $issue->student->name }}
                                            </span>

                                        </div>

                                    </td>


                                    {{-- Issue Date --}}
                                    <td>

                                        <span class="date-value">
                                            {{ $issue->issue_date->format('d M Y') }}
                                        </span>

                                    </td>


                                    {{-- Due Date --}}
                                    <td>

                                        <div class="date-container">

                                            <span class="date-value">
                                                {{ $issue->due_date->format('d M Y') }}
                                            </span>

                                            @if (
                                                $issue->status === 'Issued'
                                                && $issue->due_date->isPast()
                                            )

                                                <span class="overdue-tag">
                                                    Overdue
                                                </span>

                                            @endif

                                        </div>

                                    </td>


                                    {{-- Return Date --}}
                                    <td>

                                        @if ($issue->return_date)

                                            <span class="date-value">
                                                {{ $issue->return_date->format('d M Y') }}
                                            </span>

                                        @else

                                            <span class="not-returned">
                                                Not returned
                                            </span>

                                        @endif

                                    </td>


                                    {{-- Status --}}
                                    <td>

                                        <span
                                            class="status-badge {{ strtolower($issue->status) }}"
                                        >

                                            <span class="status-dot"></span>

                                            {{ $issue->status }}

                                        </span>

                                    </td>


                                    {{-- Actions --}}
                                    <td>

                                        @if ($issue->status !== 'Returned')

                                            <form
                                                action="{{ route('book-issues.return', $issue->id) }}"
                                                method="POST"
                                                class="return-form"
                                            >

                                                @csrf
                                                @method('PATCH')

                                                <button
                                                    type="submit"
                                                    class="return-button"
                                                    onclick="return confirm('Mark this book as returned?')"
                                                >
                                                    ✓ Mark Returned
                                                </button>

                                            </form>

                                        @else

                                            <span class="completed-label">
                                                Completed
                                            </span>

                                        @endif

                                    </td>

                                </tr>

                            @endforeach

                        </tbody>

                    </table>

                </div>

            </div>


            {{-- Mobile Cards --}}
            <div class="mobile-list">

                @foreach ($issues as $issue)

                    <div class="mobile-card">

                        {{-- Mobile Header --}}
                        <div class="mobile-card-header">

                            <div class="book-info">

                                <div class="book-avatar">
                                    {{ strtoupper(substr($issue->book->title, 0, 1)) }}
                                </div>

                                <div class="book-details">

                                    <strong>
                                        {{ $issue->book->title }}
                                    </strong>

                                    <span>
                                        {{ $issue->book->book_id }}
                                    </span>

                                </div>

                            </div>

                            <span
                                class="status-badge {{ strtolower($issue->status) }}"
                            >
                                <span class="status-dot"></span>
                                {{ $issue->status }}
                            </span>

                        </div>


                        {{-- Student --}}
                        <div class="mobile-student">

                            <span class="detail-label">
                                Student
                            </span>

                            <strong>
                                {{ $issue->student->name }}
                            </strong>

                        </div>


                        {{-- Dates --}}
                        <div class="mobile-details">

                            <div class="detail-item">

                                <span class="detail-label">
                                    Issue Date
                                </span>

                                <strong>
                                    {{ $issue->issue_date->format('d M Y') }}
                                </strong>

                            </div>


                            <div class="detail-item">

                                <span class="detail-label">
                                    Due Date
                                </span>

                                <strong>
                                    {{ $issue->due_date->format('d M Y') }}
                                </strong>

                                @if (
                                    $issue->status === 'Issued'
                                    && $issue->due_date->isPast()
                                )

                                    <span class="overdue-tag">
                                        Overdue
                                    </span>

                                @endif

                            </div>


                            <div class="detail-item">

                                <span class="detail-label">
                                    Return Date
                                </span>

                                <strong>

                                    @if ($issue->return_date)

                                        {{ $issue->return_date->format('d M Y') }}

                                    @else

                                        <span class="not-returned">
                                            Not returned
                                        </span>

                                    @endif

                                </strong>

                            </div>

                        </div>


                        {{-- Mobile Action --}}
                        @if ($issue->status !== 'Returned')

                            <div class="mobile-action">

                                <form
                                    action="{{ route('book-issues.return', $issue->id) }}"
                                    method="POST"
                                >

                                    @csrf
                                    @method('PATCH')

                                    <button
                                        type="submit"
                                        class="return-button"
                                        onclick="return confirm('Mark this book as returned?')"
                                    >
                                        ✓ Mark Book as Returned
                                    </button>

                                </form>

                            </div>

                        @endif

                    </div>

                @endforeach

            </div>


            {{-- Pagination --}}
            <div class="pagination">

                {{ $issues->links() }}

            </div>


        @else

            {{-- Empty State --}}
            <div class="empty-state">

                <div class="empty-icon">
                    📚
                </div>

                @if (!empty($status))

                    <h3>No Records Found</h3>

                    <p>
                        No book issues match the selected status.
                    </p>

                    <a
                        href="{{ route('book-issues.index') }}"
                        class="secondary-button"
                    >
                        Clear Filter
                    </a>

                @else

                    <h3>No Book Issues Yet</h3>

                    <p>
                        Start by issuing a book to a student.
                    </p>

                    <a
                        href="{{ route('book-issues.create') }}"
                        class="primary-button"
                    >
                        <span class="button-icon">+</span>
                        Issue Your First Book
                    </a>

                @endif

            </div>

        @endif

    </div>


    <style>

        /* =========================================================
           BASE
        ========================================================= */

        .books-container {
            width: min(1400px, calc(100% - 64px));
            margin: 0 auto;
            padding: 40px 0 70px;
            color: #1f2937;
        }


        /* =========================================================
           ALERTS
        ========================================================= */

        .alert {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            margin-bottom: 24px;
            padding: 14px 16px;
            border-radius: 10px;
            border: 1px solid;
            font-size: 13px;
        }

        .alert-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 24px;
            height: 24px;
            flex-shrink: 0;
            border-radius: 50%;
            font-size: 12px;
            font-weight: 800;
        }

        .alert > div {
            display: flex;
            flex-direction: column;
            gap: 2px;
        }

        .alert strong {
            font-size: 13px;
        }

        .alert span:last-child {
            font-size: 12px;
        }

        .alert-success {
            background: #f0fdf4;
            border-color: #bbf7d0;
            color: #166534;
        }

        .alert-success .alert-icon {
            background: #dcfce7;
        }

        .alert-error {
            background: #fef2f2;
            border-color: #fecaca;
            color: #991b1b;
        }

        .alert-error .alert-icon {
            background: #fee2e2;
        }


        /* =========================================================
           PAGE HEADER
        ========================================================= */

        .page-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 24px;
            margin-bottom: 28px;
        }

        .page-heading {
            display: flex;
            align-items: center;
            gap: 14px;
        }

        .heading-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 48px;
            height: 48px;
            flex-shrink: 0;
            border-radius: 12px;
            background: #eff6ff;
            font-size: 22px;
        }

        .page-heading h1 {
            margin: 0;
            color: #111827;
            font-size: 28px;
            line-height: 1.2;
            font-weight: 750;
            letter-spacing: -0.02em;
        }

        .page-heading p {
            margin: 6px 0 0;
            color: #6b7280;
            font-size: 14px;
        }


        /* =========================================================
           BUTTONS
        ========================================================= */

        .primary-button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            min-height: 42px;
            padding: 0 16px;
            border: 1px solid #2563eb;
            border-radius: 8px;
            background: #2563eb;
            color: #ffffff;
            text-decoration: none;
            font-size: 13px;
            font-weight: 650;
            white-space: nowrap;
            transition:
                background 0.18s ease,
                border-color 0.18s ease,
                transform 0.18s ease;
        }

        .primary-button:hover {
            background: #1d4ed8;
            border-color: #1d4ed8;
            color: #ffffff;
            transform: translateY(-1px);
        }

        .button-icon {
            font-size: 18px;
            line-height: 1;
            font-weight: 400;
        }

        .secondary-button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-height: 42px;
            padding: 0 15px;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            background: #ffffff;
            color: #374151;
            text-decoration: none;
            font-size: 13px;
            font-weight: 600;
            transition:
                background 0.18s ease,
                border-color 0.18s ease;
        }

        .secondary-button:hover {
            background: #f9fafb;
            border-color: #9ca3af;
            color: #111827;
        }


        /* =========================================================
           FILTER CARD
        ========================================================= */

        .filter-card {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 24px;
            margin-bottom: 26px;
            padding: 18px 20px;
            background: #ffffff;
            border: 1px solid #e5e7eb;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(15, 23, 42, 0.04);
        }

        .filter-heading {
            display: flex;
            align-items: center;
            gap: 11px;
        }

        .filter-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 34px;
            height: 34px;
            border-radius: 8px;
            background: #f3f4f6;
            color: #4b5563;
            font-size: 15px;
        }

        .filter-heading div {
            display: flex;
            flex-direction: column;
            gap: 2px;
        }

        .filter-heading strong {
            color: #111827;
            font-size: 13px;
            font-weight: 650;
        }

        .filter-heading span:last-child {
            color: #9ca3af;
            font-size: 11px;
        }

        .filter-form {
            display: flex;
            align-items: flex-end;
            gap: 10px;
        }

        .select-wrapper {
            display: flex;
            flex-direction: column;
            gap: 5px;
        }

        .select-wrapper label {
            color: #6b7280;
            font-size: 10px;
            font-weight: 700;
            letter-spacing: 0.05em;
            text-transform: uppercase;
        }

        .filter-form select {
            min-width: 190px;
            height: 40px;
            padding: 0 34px 0 12px;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            background: #ffffff;
            color: #374151;
            font-family: inherit;
            font-size: 13px;
            outline: none;
            cursor: pointer;
            transition:
                border-color 0.18s ease,
                box-shadow 0.18s ease;
        }

        .filter-form select:focus {
            border-color: #2563eb;
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.10);
        }


        /* =========================================================
           RECORD SUMMARY
        ========================================================= */

        .records-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 10px;
        }

        .records-summary {
            display: flex;
            align-items: center;
            gap: 9px;
        }

        .records-summary strong {
            color: #111827;
            font-size: 14px;
            font-weight: 700;
        }

        .records-summary span {
            color: #9ca3af;
            font-size: 12px;
        }


        /* =========================================================
           TABLE
        ========================================================= */

        .table-card {
            overflow: hidden;
            background: #ffffff;
            border: 1px solid #e5e7eb;
            border-radius: 12px;
            box-shadow: 0 3px 10px rgba(15, 23, 42, 0.04);
        }

        .table-wrapper {
            width: 100%;
            overflow-x: auto;
        }

        table {
            width: 100%;
            min-width: 980px;
            border-collapse: collapse;
        }

        thead th {
            padding: 13px 16px;
            background: #f8fafc;
            border-bottom: 1px solid #e5e7eb;
            color: #64748b;
            text-align: left;
            font-size: 10px;
            font-weight: 750;
            letter-spacing: 0.06em;
            text-transform: uppercase;
            white-space: nowrap;
        }

        tbody td {
            padding: 15px 16px;
            border-bottom: 1px solid #f1f5f9;
            color: #374151;
            font-size: 13px;
            vertical-align: middle;
        }

        tbody tr:last-child td {
            border-bottom: 0;
        }

        tbody tr {
            transition: background 0.15s ease;
        }

        tbody tr:hover {
            background: #fafcff;
        }

        .actions-column {
            text-align: right;
        }


        /* =========================================================
           BOOK INFORMATION
        ========================================================= */

        .book-info {
            display: flex;
            align-items: center;
            gap: 11px;
            min-width: 210px;
        }

        .book-avatar {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 38px;
            height: 38px;
            flex-shrink: 0;
            border-radius: 9px;
            background: #eff6ff;
            color: #2563eb;
            font-size: 13px;
            font-weight: 750;
        }

        .book-details {
            display: flex;
            flex-direction: column;
            min-width: 0;
            gap: 4px;
        }

        .book-details strong {
            max-width: 260px;
            overflow: hidden;
            color: #111827;
            font-size: 13px;
            font-weight: 650;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .book-details span {
            display: inline-flex;
            width: fit-content;
            padding: 2px 6px;
            border-radius: 5px;
            background: #f1f5f9;
            color: #64748b;
            font-size: 10px;
            font-weight: 650;
        }


        /* =========================================================
           STUDENT
        ========================================================= */

        .student-name-text {
            color: #374151;
            font-weight: 550;
            white-space: nowrap;
        }


        /* =========================================================
           DATES
        ========================================================= */

        .date-container {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            gap: 4px;
        }

        .date-value {
            color: #374151;
            white-space: nowrap;
        }

        .not-returned {
            color: #9ca3af;
            font-size: 12px;
        }

        .overdue-tag {
            display: inline-flex;
            align-items: center;
            width: fit-content;
            padding: 3px 7px;
            border-radius: 999px;
            background: #fef2f2;
            color: #dc2626;
            font-size: 9px;
            font-weight: 750;
            letter-spacing: 0.03em;
            text-transform: uppercase;
        }


        /* =========================================================
           STATUS
        ========================================================= */

        .status-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 5px 9px;
            border-radius: 999px;
            font-size: 10px;
            font-weight: 700;
            white-space: nowrap;
        }

        .status-dot {
            width: 6px;
            height: 6px;
            border-radius: 50%;
        }

        .status-badge.issued {
            background: #fffbeb;
            color: #b45309;
        }

        .status-badge.issued .status-dot {
            background: #f59e0b;
        }

        .status-badge.returned {
            background: #ecfdf5;
            color: #15803d;
        }

        .status-badge.returned .status-dot {
            background: #22c55e;
        }


        /* =========================================================
           ACTIONS
        ========================================================= */

        .return-form {
            display: flex;
            justify-content: flex-end;
            margin: 0;
        }

        .return-button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-height: 34px;
            padding: 0 11px;
            border: 1px solid #dbeafe;
            border-radius: 7px;
            background: #eff6ff;
            color: #2563eb;
            font-family: inherit;
            font-size: 11px;
            font-weight: 650;
            white-space: nowrap;
            cursor: pointer;
            transition:
                background 0.18s ease,
                border-color 0.18s ease,
                transform 0.18s ease;
        }

        .return-button:hover {
            background: #dbeafe;
            border-color: #bfdbfe;
            transform: translateY(-1px);
        }

        .completed-label {
            display: block;
            color: #9ca3af;
            font-size: 11px;
            text-align: right;
        }


        /* =========================================================
           MOBILE LIST
        ========================================================= */

        .mobile-list {
            display: none;
        }


        /* =========================================================
           PAGINATION
        ========================================================= */

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
            font-size: 12px;
            transition:
                background 0.18s ease,
                border-color 0.18s ease;
        }

        .pagination a:hover {
            background: #eff6ff;
            border-color: #bfdbfe;
        }

        .pagination span[aria-current="page"] {
            border-color: #2563eb;
            background: #2563eb;
            color: #ffffff;
        }

        .pagination span[aria-disabled="true"] {
            background: #f9fafb;
            color: #9ca3af;
        }


        /* =========================================================
           EMPTY STATE
        ========================================================= */

        .empty-state {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 320px;
            padding: 50px 20px;
            text-align: center;
            background: #ffffff;
            border: 1px solid #e5e7eb;
            border-radius: 12px;
            box-shadow: 0 3px 10px rgba(15, 23, 42, 0.03);
        }

        .empty-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 64px;
            height: 64px;
            margin-bottom: 18px;
            border-radius: 16px;
            background: #eff6ff;
            font-size: 28px;
        }

        .empty-state h3 {
            margin: 0;
            color: #111827;
            font-size: 19px;
            font-weight: 700;
        }

        .empty-state p {
            max-width: 380px;
            margin: 8px 0 20px;
            color: #6b7280;
            font-size: 13px;
            line-height: 1.6;
        }


        /* =========================================================
           RESPONSIVE - TABLET
        ========================================================= */

        @media (max-width: 900px) {

            .books-container {
                width: calc(100% - 40px);
            }

            .filter-card {
                align-items: stretch;
                flex-direction: column;
            }

            .filter-form {
                align-items: flex-end;
            }

        }


        /* =========================================================
           RESPONSIVE - MOBILE
        ========================================================= */

        @media (max-width: 700px) {

            .books-container {
                width: calc(100% - 30px);
                padding: 28px 0 50px;
            }

            .page-header {
                align-items: stretch;
                flex-direction: column;
                gap: 18px;
            }

            .page-heading h1 {
                font-size: 25px;
            }

            .primary-button {
                width: 100%;
            }

            .filter-card {
                padding: 16px;
            }

            .filter-form {
                align-items: stretch;
                flex-direction: column;
            }

            .select-wrapper,
            .filter-form select,
            .filter-form .secondary-button {
                width: 100%;
                box-sizing: border-box;
            }

            .table-card {
                display: none;
            }

            .mobile-list {
                display: flex;
                flex-direction: column;
                gap: 12px;
            }

            .mobile-card {
                padding: 17px;
                background: #ffffff;
                border: 1px solid #e5e7eb;
                border-radius: 12px;
                box-shadow: 0 3px 10px rgba(15, 23, 42, 0.04);
            }

            .mobile-card-header {
                display: flex;
                align-items: center;
                justify-content: space-between;
                gap: 12px;
                padding-bottom: 15px;
                border-bottom: 1px solid #f1f5f9;
            }

            .mobile-card-header .book-info {
                min-width: 0;
            }

            .mobile-card-header .book-details strong {
                max-width: 180px;
            }

            .mobile-student {
                display: flex;
                flex-direction: column;
                gap: 4px;
                padding: 15px 0;
                border-bottom: 1px solid #f1f5f9;
            }

            .mobile-student strong {
                color: #374151;
                font-size: 13px;
            }

            .mobile-details {
                display: grid;
                grid-template-columns: repeat(3, 1fr);
                gap: 12px;
                padding: 15px 0;
            }

            .detail-item {
                display: flex;
                flex-direction: column;
                gap: 5px;
                min-width: 0;
            }

            .detail-label {
                color: #9ca3af;
                font-size: 9px;
                font-weight: 750;
                letter-spacing: 0.05em;
                text-transform: uppercase;
            }

            .detail-item strong {
                overflow: hidden;
                color: #374151;
                font-size: 11px;
                font-weight: 600;
                text-overflow: ellipsis;
                white-space: nowrap;
            }

            .mobile-action {
                padding-top: 14px;
                border-top: 1px solid #f1f5f9;
            }

            .mobile-action form,
            .mobile-action .return-button {
                width: 100%;
            }

            .records-summary {
                align-items: flex-start;
                flex-direction: column;
                gap: 3px;
            }

            .pagination {
                overflow-x: auto;
                justify-content: flex-start;
                padding-bottom: 5px;
            }

        }


        /* =========================================================
           RESPONSIVE - SMALL MOBILE
        ========================================================= */

        @media (max-width: 480px) {

            .books-container {
                width: calc(100% - 24px);
            }

            .heading-icon {
                width: 42px;
                height: 42px;
                font-size: 19px;
            }

            .page-heading {
                gap: 11px;
            }

            .page-heading h1 {
                font-size: 23px;
            }

            .page-heading p {
                font-size: 12px;
            }

            .mobile-card {
                padding: 14px;
            }

            .mobile-details {
                grid-template-columns: 1fr;
                gap: 12px;
            }

            .mobile-card-header {
                align-items: flex-start;
            }

            .mobile-card-header .status-badge {
                flex-shrink: 0;
            }

            .empty-state {
                min-height: 280px;
                padding: 40px 16px;
            }

        }

    </style>

</x-app-layout>

