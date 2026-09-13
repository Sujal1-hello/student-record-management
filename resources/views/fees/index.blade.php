<x-app-layout>

    <style>
        .fee-management-page {
            background: #f3f4f6;
            min-height: 100vh;
            padding: 32px 20px 50px;
        }

        .fee-management-container {
            max-width: 1250px;
            margin: 0 auto;
        }

        .fee-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
            margin-bottom: 24px;
        }

        .fee-title {
            margin: 0;
            color: #111827;
            font-size: 28px;
            font-weight: 700;
            letter-spacing: -0.02em;
        }

        .fee-subtitle {
            margin: 6px 0 0;
            color: #6b7280;
            font-size: 14px;
        }

        .add-fee-button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 7px;
            padding: 11px 18px;
            background: #2563eb;
            color: white;
            border: 1px solid #2563eb;
            border-radius: 8px;
            text-decoration: none;
            font-size: 14px;
            font-weight: 600;
            transition: 0.2s;
            white-space: nowrap;
        }

        .add-fee-button:hover {
            background: #1d4ed8;
            border-color: #1d4ed8;
        }

        .success-message {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 20px;
            padding: 13px 16px;
            background: #f0fdf4;
            border: 1px solid #bbf7d0;
            border-radius: 9px;
            color: #15803d;
            font-size: 14px;
            font-weight: 500;
        }

        .success-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 24px;
            height: 24px;
            border-radius: 50%;
            background: #dcfce7;
            font-size: 13px;
        }

        .search-card {
            background: white;
            border: 1px solid #e5e7eb;
            border-radius: 12px;
            padding: 18px;
            margin-bottom: 20px;
            box-shadow: 0 2px 7px rgba(0, 0, 0, 0.03);
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
            left: 13px;
            top: 50%;
            transform: translateY(-50%);
            color: #9ca3af;
            font-size: 15px;
            pointer-events: none;
        }

        .search-input {
            width: 100%;
            min-height: 44px;
            box-sizing: border-box;
            padding: 10px 14px 10px 38px;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            background: white;
            color: #111827;
            font-size: 14px;
            outline: none;
            transition: 0.2s;
        }

        .search-input::placeholder {
            color: #9ca3af;
        }

        .search-input:focus {
            border-color: #2563eb;
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
        }

        .search-button,
        .clear-button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-height: 44px;
            padding: 10px 17px;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 600;
            text-decoration: none;
            cursor: pointer;
            transition: 0.2s;
        }

        .search-button {
            border: 1px solid #111827;
            background: #111827;
            color: white;
        }

        .search-button:hover {
            background: #1f2937;
        }

        .clear-button {
            border: 1px solid #d1d5db;
            background: #f9fafb;
            color: #374151;
        }

        .clear-button:hover {
            background: #f3f4f6;
        }

        .table-card {
            background: white;
            border: 1px solid #e5e7eb;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 2px 7px rgba(0, 0, 0, 0.03);
        }

        .table-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 18px 20px;
            border-bottom: 1px solid #e5e7eb;
        }

        .table-header-title {
            margin: 0;
            color: #111827;
            font-size: 16px;
            font-weight: 650;
        }

        .table-header-count {
            color: #6b7280;
            font-size: 13px;
        }

        .table-wrapper {
            overflow-x: auto;
        }

        .fee-table {
            width: 100%;
            min-width: 950px;
            border-collapse: collapse;
        }

        .fee-table thead {
            background: #f9fafb;
        }

        .fee-table th {
            padding: 13px 18px;
            border-bottom: 1px solid #e5e7eb;
            color: #6b7280;
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 0.05em;
            text-align: left;
            text-transform: uppercase;
            white-space: nowrap;
        }

        .fee-table td {
            padding: 16px 18px;
            border-bottom: 1px solid #f0f0f0;
            vertical-align: middle;
        }

        .fee-table tbody tr {
            transition: 0.15s;
        }

        .fee-table tbody tr:hover {
            background: #f9fafb;
        }

        .fee-table tbody tr:last-child td {
            border-bottom: none;
        }

        .student-name {
            color: #111827;
            font-size: 14px;
            font-weight: 600;
        }

        .student-id {
            margin-top: 3px;
            color: #6b7280;
            font-size: 12px;
        }

        .fee-type {
            color: #374151;
            font-size: 13px;
            font-weight: 500;
        }

        .amount {
            color: #374151;
            font-size: 13px;
            font-weight: 500;
            white-space: nowrap;
        }

        .paid-amount {
            color: #15803d;
            font-weight: 600;
        }

        .remaining-amount {
            color: #dc2626;
            font-weight: 600;
        }

        .status-badge {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 68px;
            padding: 5px 10px;
            border-radius: 999px;
            font-size: 11px;
            font-weight: 700;
        }

        .status-paid {
            background: #dcfce7;
            color: #15803d;
        }

        .status-partial {
            background: #fef3c7;
            color: #b45309;
        }

        .status-pending {
            background: #fee2e2;
            color: #b91c1c;
        }

        .actions {
            display: flex;
            align-items: center;
            justify-content: flex-end;
            gap: 7px;
        }

        .action-button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-height: 34px;
            padding: 7px 11px;
            border-radius: 7px;
            font-size: 12px;
            font-weight: 600;
            text-decoration: none;
            border: 1px solid transparent;
            cursor: pointer;
            transition: 0.2s;
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

        .empty-state {
            padding: 70px 20px;
            text-align: center;
        }

        .empty-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 58px;
            height: 58px;
            margin: 0 auto 16px;
            background: #f3f4f6;
            border-radius: 50%;
            color: #9ca3af;
            font-size: 26px;
        }

        .empty-title {
            margin: 0;
            color: #374151;
            font-size: 17px;
            font-weight: 650;
        }

        .empty-text {
            margin: 6px 0 0;
            color: #9ca3af;
            font-size: 13px;
        }

        .pagination-area {
            padding: 16px 20px;
            border-top: 1px solid #e5e7eb;
            background: #fff;
        }

        @media (max-width: 768px) {

            .fee-management-page {
                padding: 24px 14px 40px;
            }

            .fee-header {
                flex-direction: column;
                align-items: flex-start;
            }

            .fee-title {
                font-size: 24px;
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
                padding: 16px;
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
    </style>

    <div class="fee-management-page">

        <div class="fee-management-container">

            {{-- Header --}}
            <div class="fee-header">

                <div>
                    <h1 class="fee-title">
                        Fee Management
                    </h1>

                    <p class="fee-subtitle">
                        Manage student fees and payments
                    </p>
                </div>

                <a
                    href="{{ route('fees.create') }}"
                    class="add-fee-button"
                >
                    <span>+</span>
                    <span>Add Fee</span>
                </a>

            </div>

            {{-- Success Message --}}
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

            {{-- Search --}}
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
                            placeholder="Search student, ID or fee type..."
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

            {{-- Fee Table --}}
            <div class="table-card">

                <div class="table-header">

                    <h2 class="table-header-title">
                        Fee Records
                    </h2>

                    <span class="table-header-count">
                        {{ $fees->total() }} record{{ $fees->total() == 1 ? '' : 's' }}
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

                                        <div class="student-name">
                                            {{ $fee->student->name }}
                                        </div>

                                        <div class="student-id">
                                            {{ $fee->student->student_id }}
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
                                                Add a fee record to get started.
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