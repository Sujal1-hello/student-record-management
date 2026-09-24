```blade
<x-app-layout>

    <style>

        /* ========================================
           FEE MANAGEMENT
           ======================================== */

        .fee-management-page {
            min-height: 100vh;
            background: #f8fafc;
            padding: 42px 0 70px;
        }

        .fee-management-container {
            width: min(1380px, calc(100% - 64px));
            margin: 0 auto;
        }


        /* ========================================
           PAGE HEADER
           ======================================== */

        .fee-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 30px;
            margin-bottom: 30px;
        }

        .fee-heading {
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

        .fee-title {
            margin: 0;
            color: #111827;
            font-size: 29px;
            line-height: 1.2;
            font-weight: 750;
            letter-spacing: -.025em;
        }

        .fee-subtitle {
            margin: 6px 0 0;
            color: #6b7280;
            font-size: 13px;
        }


        /* ========================================
           ADD FEE BUTTON
           ======================================== */

        .add-fee-button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            height: 42px;
            padding: 0 17px;
            background: #2563eb;
            border: 1px solid #2563eb;
            border-radius: 9px;
            color: #ffffff;
            text-decoration: none;
            font-size: 13px;
            font-weight: 650;
            box-shadow: 0 3px 8px rgba(37, 99, 235, .18);
            transition: all .2s ease;
            white-space: nowrap;
        }

        .add-fee-button span:first-child {
            font-size: 17px;
            line-height: 1;
        }

        .add-fee-button:hover {
            background: #1d4ed8;
            border-color: #1d4ed8;
            transform: translateY(-1px);
            box-shadow: 0 6px 14px rgba(37, 99, 235, .22);
        }


        /* ========================================
           SUCCESS MESSAGE
           ======================================== */

        .success-message {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 20px;
            padding: 13px 16px;
            background: #f0fdf4;
            border: 1px solid #bbf7d0;
            border-radius: 10px;
            color: #15803d;
            font-size: 13px;
            font-weight: 550;
        }

        .success-icon {
            width: 25px;
            height: 25px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            border-radius: 50%;
            background: #dcfce7;
            font-size: 12px;
            font-weight: 700;
        }


        /* ========================================
           SEARCH
           ======================================== */

        .search-card {
            margin-bottom: 20px;
            padding: 17px;
            background: #ffffff;
            border: 1px solid #e5e7eb;
            border-radius: 14px;
            box-shadow: 0 2px 6px rgba(15, 23, 42, .035);
        }

        .search-form {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .search-input-wrapper {
            position: relative;
            flex: 1;
        }

        .search-icon {
            position: absolute;
            top: 50%;
            left: 14px;
            transform: translateY(-50%);
            color: #9ca3af;
            font-size: 14px;
            pointer-events: none;
        }

        .search-input {
            width: 100%;
            min-height: 44px;
            box-sizing: border-box;
            padding: 10px 14px 10px 39px;
            border: 1px solid #d1d5db;
            border-radius: 9px;
            background: #ffffff;
            color: #111827;
            font-size: 13px;
            outline: none;
            transition: all .2s ease;
        }

        .search-input::placeholder {
            color: #9ca3af;
        }

        .search-input:hover {
            border-color: #cbd5e1;
        }

        .search-input:focus {
            border-color: #2563eb;
            box-shadow: 0 0 0 3px rgba(37, 99, 235, .10);
        }

        .search-button,
        .clear-button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-height: 44px;
            padding: 10px 17px;
            border-radius: 9px;
            font-size: 13px;
            font-weight: 650;
            text-decoration: none;
            cursor: pointer;
            transition: all .2s ease;
            white-space: nowrap;
        }

        .search-button {
            border: 1px solid #111827;
            background: #111827;
            color: #ffffff;
        }

        .search-button:hover {
            background: #1f2937;
            border-color: #1f2937;
        }

        .clear-button {
            border: 1px solid #d1d5db;
            background: #ffffff;
            color: #374151;
        }

        .clear-button:hover {
            background: #f8fafc;
            border-color: #cbd5e1;
        }


        /* ========================================
           TABLE CARD
           ======================================== */

        .table-card {
            overflow: hidden;
            background: #ffffff;
            border: 1px solid #e5e7eb;
            border-radius: 14px;
            box-shadow: 0 2px 6px rgba(15, 23, 42, .035);
        }

        .table-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 15px;
            padding: 20px 22px;
            border-bottom: 1px solid #f1f5f9;
        }

        .table-heading {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .table-heading-icon {
            width: 34px;
            height: 34px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 9px;
            background: #eff6ff;
            color: #2563eb;
            font-size: 15px;
        }

        .table-header-title {
            margin: 0;
            color: #111827;
            font-size: 15px;
            font-weight: 700;
        }

        .table-header-count {
            padding: 5px 9px;
            border-radius: 999px;
            background: #f3f4f6;
            color: #6b7280;
            font-size: 10px;
            font-weight: 650;
        }


        /* ========================================
           TABLE
           ======================================== */

        .table-wrapper {
            overflow-x: auto;
        }

        .fee-table {
            width: 100%;
            min-width: 950px;
            border-collapse: collapse;
        }

        .fee-table thead {
            background: #f8fafc;
        }

        .fee-table th {
            padding: 13px 18px;
            border-bottom: 1px solid #e5e7eb;
            color: #64748b;
            font-size: 10px;
            font-weight: 700;
            letter-spacing: .06em;
            text-align: left;
            text-transform: uppercase;
            white-space: nowrap;
        }

        .fee-table td {
            padding: 16px 18px;
            border-bottom: 1px solid #f1f5f9;
            vertical-align: middle;
        }

        .fee-table tbody tr {
            transition: background .15s ease;
        }

        .fee-table tbody tr:hover {
            background: #f8fafc;
        }

        .fee-table tbody tr:last-child td {
            border-bottom: none;
        }


        /* ========================================
           STUDENT
           ======================================== */

        .student-cell {
            display: flex;
            align-items: center;
            gap: 11px;
            min-width: 160px;
        }

        .student-avatar {
            width: 37px;
            height: 37px;
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

        .student-name {
            color: #111827;
            font-size: 12px;
            font-weight: 650;
        }

        .student-id {
            margin-top: 3px;
            color: #94a3b8;
            font-size: 10px;
        }


        /* ========================================
           FEE DETAILS
           ======================================== */

        .fee-type {
            color: #374151;
            font-size: 12px;
            font-weight: 550;
        }

        .amount {
            color: #374151;
            font-size: 12px;
            font-weight: 550;
            white-space: nowrap;
        }

        .paid-amount {
            color: #15803d;
            font-weight: 650;
        }

        .remaining-amount {
            color: #dc2626;
            font-weight: 650;
        }


        /* ========================================
           STATUS
           ======================================== */

        .status-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            min-width: 70px;
            padding: 5px 9px;
            border-radius: 999px;
            font-size: 10px;
            font-weight: 700;
        }

        .status-badge::before {
            content: "";
            width: 5px;
            height: 5px;
            border-radius: 50%;
        }

        .status-paid {
            background: #ecfdf5;
            color: #15803d;
        }

        .status-paid::before {
            background: #22c55e;
        }

        .status-partial {
            background: #fffbeb;
            color: #b45309;
        }

        .status-partial::before {
            background: #f59e0b;
        }

        .status-pending {
            background: #fef2f2;
            color: #b91c1c;
        }

        .status-pending::before {
            background: #ef4444;
        }


        /* ========================================
           ACTIONS
           ======================================== */

        .actions {
            display: flex;
            align-items: center;
            justify-content: flex-end;
            gap: 6px;
        }

        .action-button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-height: 33px;
            padding: 6px 10px;
            border-radius: 7px;
            border: 1px solid transparent;
            font-size: 11px;
            font-weight: 650;
            text-decoration: none;
            cursor: pointer;
            transition: all .18s ease;
        }

        .view-button {
            background: #eff6ff;
            border-color: #dbeafe;
            color: #2563eb;
        }

        .view-button:hover {
            background: #dbeafe;
        }

        .edit-button {
            background: #fffbeb;
            border-color: #fef3c7;
            color: #b45309;
        }

        .edit-button:hover {
            background: #fef3c7;
        }

        .delete-button {
            background: #fef2f2;
            border-color: #fee2e2;
            color: #dc2626;
        }

        .delete-button:hover {
            background: #fee2e2;
        }


        /* ========================================
           EMPTY STATE
           ======================================== */

        .empty-state {
            padding: 70px 20px;
            text-align: center;
        }

        .empty-icon {
            width: 58px;
            height: 58px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 15px;
            border-radius: 15px;
            background: #f8fafc;
            border: 1px solid #e5e7eb;
            font-size: 25px;
        }

        .empty-title {
            margin: 0;
            color: #374151;
            font-size: 16px;
            font-weight: 700;
        }

        .empty-text {
            margin: 6px 0 0;
            color: #9ca3af;
            font-size: 12px;
        }


        /* ========================================
           PAGINATION
           ======================================== */

        .pagination-area {
            padding: 17px 22px;
            border-top: 1px solid #e5e7eb;
            background: #ffffff;
        }


        /* ========================================
           RESPONSIVE
           ======================================== */

        @media (max-width: 768px) {

            .fee-management-page {
                padding: 28px 0 45px;
            }

            .fee-management-container {
                width: calc(100% - 32px);
            }

            .fee-header {
                align-items: stretch;
                flex-direction: column;
                gap: 20px;
            }

            .fee-title {
                font-size: 25px;
            }

            .add-fee-button {
                width: 100%;
            }

            .search-form {
                flex-direction: column;
                align-items: stretch;
            }

            .search-button,
            .clear-button {
                width: 100%;
            }

            .table-header {
                padding: 17px;
            }

            .fee-table th,
            .fee-table td {
                padding-left: 14px;
                padding-right: 14px;
            }

            .actions {
                justify-content: flex-start;
            }

        }


        @media (max-width: 450px) {

            .fee-management-container {
                width: calc(100% - 24px);
            }

            .fee-heading {
                align-items: flex-start;
            }

            .heading-icon {
                width: 45px;
                height: 45px;
                font-size: 19px;
            }

            .fee-title {
                font-size: 23px;
            }

            .fee-subtitle {
                line-height: 1.5;
            }

            .table-heading-icon {
                display: none;
            }

            .table-header {
                padding: 15px;
            }

            .pagination-area {
                padding: 15px;
            }

        }

    </style>


    <div class="fee-management-page">

        <div class="fee-management-container">


            {{-- ========================================
                 HEADER
                 ======================================== --}}

            <div class="fee-header">

                <div class="fee-heading">

                    <div class="heading-icon">
                        💰
                    </div>

                    <div>

                        <span class="eyebrow">
                            Finance Management
                        </span>

                        <h1 class="fee-title">
                            Fee Management
                        </h1>

                        <p class="fee-subtitle">
                            Manage student fees, payments and outstanding balances.
                        </p>

                    </div>

                </div>


                <a
                    href="{{ route('fees.create') }}"
                    class="add-fee-button"
                >
                    <span>+</span>
                    <span>Add Fee</span>
                </a>

            </div>


            {{-- ========================================
                 SUCCESS MESSAGE
                 ======================================== --}}

            @if(session('success'))

                <div class="success-message">

                    <span class="success-icon">
                        ✓
                    </span>

                    <span>
                        {{ session('success') }}
                    </span>

                </div>

            @endif


            {{-- ========================================
                 SEARCH
                 ======================================== --}}

            <div class="search-card">

                <form
                    method="GET"
                    action="{{ route('fees.index') }}"
                    class="search-form"
                >

                    <div class="search-input-wrapper">

                        <span class="search-icon">
                            🔍
                        </span>

                        <input
                            type="text"
                            name="search"
                            value="{{ $search }}"
                            placeholder="Search student, student ID or fee type..."
                            class="search-input"
                        >

                    </div>


                    <button
                        type="submit"
                        class="search-button"
                    >
                        Search
                    </button>


                    @if($search)

                        <a
                            href="{{ route('fees.index') }}"
                            class="clear-button"
                        >
                            Clear
                        </a>

                    @endif

                </form>

            </div>


            {{-- ========================================
                 FEE RECORDS
                 ======================================== --}}

            <div class="table-card">

                <div class="table-header">

                    <div class="table-heading">

                        <div class="table-heading-icon">
                            💳
                        </div>

                        <h2 class="table-header-title">
                            Fee Records
                        </h2>

                    </div>


                    <span class="table-header-count">

                        {{ $fees->total() }}

                        record{{ $fees->total() == 1 ? '' : 's' }}

                    </span>

                </div>


                <div class="table-wrapper">

                    <table class="fee-table">

                        <thead>

                            <tr>

                                <th>
                                    Student
                                </th>

                                <th>
                                    Fee Type
                                </th>

                                <th>
                                    Total
                                </th>

                                <th>
                                    Paid
                                </th>

                                <th>
                                    Remaining
                                </th>

                                <th>
                                    Status
                                </th>

                                <th style="text-align: right;">
                                    Actions
                                </th>

                            </tr>

                        </thead>


                        <tbody>

                            @forelse($fees as $fee)

                                <tr>


                                    {{-- Student --}}

                                    <td>

                                        <div class="student-cell">

                                            <div class="student-avatar">

                                                {{ strtoupper(substr($fee->student->name, 0, 1)) }}

                                            </div>

                                            <div>

                                                <div class="student-name">
                                                    {{ $fee->student->name }}
                                                </div>

                                                <div class="student-id">
                                                    {{ $fee->student->student_id }}
                                                </div>

                                            </div>

                                        </div>

                                    </td>


                                    {{-- Fee Type --}}

                                    <td>

                                        <span class="fee-type">
                                            {{ $fee->fee_type }}
                                        </span>

                                    </td>


                                    {{-- Total --}}

                                    <td>

                                        <span class="amount">
                                            Rs. {{ number_format($fee->total_amount, 2) }}
                                        </span>

                                    </td>


                                    {{-- Paid --}}

                                    <td>

                                        <span class="amount paid-amount">
                                            Rs. {{ number_format($fee->paid_amount, 2) }}
                                        </span>

                                    </td>


                                    {{-- Remaining --}}

                                    <td>

                                        <span class="amount remaining-amount">
                                            Rs. {{ number_format($fee->remaining_amount, 2) }}
                                        </span>

                                    </td>


                                    {{-- Status --}}

                                    <td>

                                        @if($fee->payment_status === 'Paid')

                                            <span class="status-badge status-paid">
                                                Paid
                                            </span>

                                        @elseif($fee->payment_status === 'Partial')

                                            <span class="status-badge status-partial">
                                                Partial
                                            </span>

                                        @else

                                            <span class="status-badge status-pending">
                                                Pending
                                            </span>

                                        @endif

                                    </td>


                                    {{-- Actions --}}

                                    <td>

                                        <div class="actions">

                                            <a
                                                href="{{ route('fees.show', $fee->id) }}"
                                                class="action-button view-button"
                                            >
                                                View
                                            </a>


                                            <a
                                                href="{{ route('fees.edit', $fee->id) }}"
                                                class="action-button edit-button"
                                            >
                                                Edit
                                            </a>


                                            <form
                                                action="{{ route('fees.destroy', $fee->id) }}"
                                                method="POST"
                                                onsubmit="return confirm('Are you sure you want to delete this fee?');"
                                            >

                                                @csrf

                                                @method('DELETE')

                                                <button
                                                    type="submit"
                                                    class="action-button delete-button"
                                                >
                                                    Delete
                                                </button>

                                            </form>

                                        </div>

                                    </td>

                                </tr>


                            @empty

                                <tr>

                                    <td colspan="7">

                                        <div class="empty-state">

                                            <div class="empty-icon">
                                                💰
                                            </div>

                                            <h3 class="empty-title">
                                                No Fees Found
                                            </h3>

                                            <p class="empty-text">
                                                No fee records match your current search.
                                            </p>

                                        </div>

                                    </td>

                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>


                {{-- Pagination --}}

                @if($fees->hasPages())

                    <div class="pagination-area">

                        {{ $fees->links() }}

                    </div>

                @endif

            </div>

        </div>

    </div>

</x-app-layout>
```
