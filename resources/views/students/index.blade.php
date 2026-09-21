<x-app-layout>

    <div class="students-container">

        {{-- Success Message --}}
        @if (session('success'))
            <div class="success-message">
                <span class="success-icon">✓</span>
                <span>{{ session('success') }}</span>
            </div>
        @endif


        {{-- Page Header --}}
        <div class="page-intro">
            <div>
                <span class="page-label">STUDENT MANAGEMENT</span>
                <h1>Student Records</h1>
                <p>View, search, filter and manage all students.</p>
            </div>

            <a href="{{ route('students.create') }}" class="add-student-button">
                <span>+</span>
                Add New Student
            </a>
        </div>


        {{-- Filters --}}
        <form action="{{ route('students.index') }}" method="GET" class="filter-panel">

            <div class="search-field">

                <svg viewBox="0 0 24 24" fill="none">
                    <circle cx="11" cy="11" r="7"></circle>
                    <path d="m20 20-4-4"></path>
                </svg>

                <input
                    type="text"
                    name="search"
                    value="{{ $search ?? '' }}"
                    placeholder="Search by ID, name, email, phone or course..."
                >

            </div>


            <select name="course">
                <option value="">All Courses</option>

                @foreach ($courses as $courseOption)
                    <option
                        value="{{ $courseOption }}"
                        {{ ($course ?? '') == $courseOption ? 'selected' : '' }}
                    >
                        {{ $courseOption }}
                    </option>
                @endforeach
            </select>


            <select name="gender">
                <option value="">All Genders</option>

                <option
                    value="Male"
                    {{ ($gender ?? '') == 'Male' ? 'selected' : '' }}
                >
                    Male
                </option>

                <option
                    value="Female"
                    {{ ($gender ?? '') == 'Female' ? 'selected' : '' }}
                >
                    Female
                </option>

                <option
                    value="Other"
                    {{ ($gender ?? '') == 'Other' ? 'selected' : '' }}
                >
                    Other
                </option>
            </select>


            <select name="semester">
                <option value="">All Semesters</option>

                @for ($i = 1; $i <= 8; $i++)
                    <option
                        value="{{ $i }}"
                        {{ ($semester ?? '') == $i ? 'selected' : '' }}
                    >
                        Semester {{ $i }}
                    </option>
                @endfor
            </select>


            <button type="submit" class="search-button">
                Search
            </button>


            @if (!empty($search) || !empty($course) || !empty($gender) || !empty($semester))
                <a href="{{ route('students.index') }}" class="clear-button">
                    Clear
                </a>
            @endif

        </form>


        {{-- Student Records --}}
        @if ($students->count())

            {{-- Results Header --}}
            <div class="records-header">

                <div class="results-info">

                    <strong>
                        {{ $students->total() }}
                        {{ $students->total() == 1 ? 'Student' : 'Students' }}
                    </strong>

                    <span>
                        Showing
                        {{ $students->firstItem() }}
                        –
                        {{ $students->lastItem() }}
                    </span>

                </div>

            </div>


            {{-- Desktop Table --}}
            <div class="students-table-card">

                <div class="table-wrapper">

                    <table>

                        <thead>
                            <tr>
                                <th>Student ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Gender</th>
                                <th>Course</th>
                                <th>Semester</th>
                                <th>Actions</th>
                            </tr>
                        </thead>


                        <tbody>

                            @foreach ($students as $student)

                                <tr>

                                    {{-- Student ID --}}
                                    <td>
                                        <span class="student-id">
                                            {{ $student->student_id }}
                                        </span>
                                    </td>


                                    {{-- Name --}}
                                    <td>

                                        <div class="student-name">

                                            <div class="student-avatar">
                                                {{ strtoupper(substr($student->name, 0, 1)) }}
                                            </div>

                                            <span>
                                                {{ $student->name }}
                                            </span>

                                        </div>

                                    </td>


                                    {{-- Email --}}
                                    <td>
                                        <span class="email">
                                            {{ $student->email }}
                                        </span>
                                    </td>


                                    {{-- Phone --}}
                                    <td>
                                        {{ $student->phone ?? 'N/A' }}
                                    </td>


                                    {{-- Gender --}}
                                    <td>

                                        @if ($student->gender)

                                            <span class="gender-badge {{ strtolower($student->gender) }}">
                                                {{ $student->gender }}
                                            </span>

                                        @else

                                            <span class="muted">
                                                N/A
                                            </span>

                                        @endif

                                    </td>


                                    {{-- Course --}}
                                    <td>

                                        <span class="course-name">
                                            {{ $student->course }}
                                        </span>

                                    </td>


                                    {{-- Semester --}}
                                    <td>

                                        @if ($student->semester)

                                            Semester {{ $student->semester }}

                                        @else

                                            <span class="muted">
                                                N/A
                                            </span>

                                        @endif

                                    </td>


                                    {{-- Actions --}}
                                    <td>

                                        <div class="actions">

                                            <a
                                                href="{{ route('students.show', $student->id) }}"
                                                class="view-button"
                                            >
                                                View
                                            </a>


                                            <a
                                                href="{{ route('students.edit', $student->id) }}"
                                                class="edit-button"
                                            >
                                                Edit
                                            </a>


                                            <form
                                                action="{{ route('students.destroy', $student->id) }}"
                                                method="POST"
                                                class="delete-form"
                                            >

                                                @csrf
                                                @method('DELETE')

                                                <button
                                                    type="submit"
                                                    class="delete-button"
                                                    onclick="return confirm('Are you sure you want to delete this student?')"
                                                >
                                                    Delete
                                                </button>

                                            </form>

                                        </div>

                                    </td>

                                </tr>

                            @endforeach

                        </tbody>

                    </table>

                </div>

            </div>


            {{-- Mobile Cards --}}
            <div class="mobile-student-list">

                @foreach ($students as $student)

                    <div class="mobile-student-card">

                        <div class="mobile-card-header">

                            <div class="student-name">

                                <div class="student-avatar">
                                    {{ strtoupper(substr($student->name, 0, 1)) }}
                                </div>

                                <div>

                                    <strong>
                                        {{ $student->name }}
                                    </strong>

                                    <span>
                                        {{ $student->student_id }}
                                    </span>

                                </div>

                            </div>


                            @if ($student->gender)

                                <span class="gender-badge {{ strtolower($student->gender) }}">
                                    {{ $student->gender }}
                                </span>

                            @endif

                        </div>


                        <div class="mobile-details">

                            <div>
                                <small>Email</small>
                                <span>{{ $student->email }}</span>
                            </div>

                            <div>
                                <small>Phone</small>
                                <span>{{ $student->phone ?? 'N/A' }}</span>
                            </div>

                            <div>
                                <small>Course</small>
                                <span>{{ $student->course }}</span>
                            </div>

                            <div>
                                <small>Semester</small>
                                <span>
                                    {{ $student->semester ? 'Semester ' . $student->semester : 'N/A' }}
                                </span>
                            </div>

                        </div>


                        <div class="mobile-actions">

                            <a
                                href="{{ route('students.show', $student->id) }}"
                                class="view-button"
                            >
                                View
                            </a>

                            <a
                                href="{{ route('students.edit', $student->id) }}"
                                class="edit-button"
                            >
                                Edit
                            </a>

                            <form
                                action="{{ route('students.destroy', $student->id) }}"
                                method="POST"
                            >

                                @csrf
                                @method('DELETE')

                                <button
                                    type="submit"
                                    class="delete-button"
                                    onclick="return confirm('Are you sure you want to delete this student?')"
                                >
                                    Delete
                                </button>

                            </form>

                        </div>

                    </div>

                @endforeach

            </div>


            {{-- Professional Pagination --}}
            <div class="pagination-wrapper">

                <div class="pagination-summary">

                    <span>
                        Showing
                        <strong>{{ $students->firstItem() }}</strong>
                        to
                        <strong>{{ $students->lastItem() }}</strong>
                        of
                        <strong>{{ $students->total() }}</strong>
                        results
                    </span>

                </div>


                <div class="pagination-links">

                    {{-- Previous --}}
                    @if ($students->onFirstPage())

                        <span class="pagination-button disabled">
                            <svg viewBox="0 0 24 24" fill="none">
                                <path d="m15 18-6-6 6-6"></path>
                            </svg>

                            Previous
                        </span>

                    @else

                        <a
                            href="{{ $students->previousPageUrl() }}"
                            class="pagination-button"
                        >
                            <svg viewBox="0 0 24 24" fill="none">
                                <path d="m15 18-6-6 6-6"></path>
                            </svg>

                            Previous
                        </a>

                    @endif


                    {{-- Page Numbers --}}
                    @foreach ($students->getUrlRange(1, $students->lastPage()) as $page => $url)

                        @if ($page == $students->currentPage())

                            <span class="pagination-number active">
                                {{ $page }}
                            </span>

                        @else

                            <a
                                href="{{ $url }}"
                                class="pagination-number"
                            >
                                {{ $page }}
                            </a>

                        @endif

                    @endforeach


                    {{-- Next --}}
                    @if ($students->hasMorePages())

                        <a
                            href="{{ $students->nextPageUrl() }}"
                            class="pagination-button"
                        >
                            Next

                            <svg viewBox="0 0 24 24" fill="none">
                                <path d="m9 18 6-6-6-6"></path>
                            </svg>

                        </a>

                    @else

                        <span class="pagination-button disabled">

                            Next

                            <svg viewBox="0 0 24 24" fill="none">
                                <path d="m9 18 6-6-6-6"></path>
                            </svg>

                        </span>

                    @endif

                </div>

            </div>


        @else

            {{-- Empty State --}}
            <div class="empty-state">

                <div class="empty-icon">
                    👨‍🎓
                </div>

                @if (!empty($search) || !empty($course) || !empty($gender) || !empty($semester))

                    <h3>
                        No Students Found
                    </h3>

                    <p>
                        No students match your current search or filters.
                    </p>

                    <a
                        href="{{ route('students.index') }}"
                        class="clear-button"
                    >
                        Clear Filters
                    </a>

                @else

                    <h3>
                        No Students Available
                    </h3>

                    <p>
                        You haven't added any students yet.
                    </p>

                    <a
                        href="{{ route('students.create') }}"
                        class="add-student-button"
                    >
                        + Add Your First Student
                    </a>

                @endif

            </div>

        @endif

    </div>


    <style>

        /* ================================
           MAIN CONTAINER
        ================================= */

        .students-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 32px 24px 50px;
        }


        /* ================================
           SUCCESS MESSAGE
        ================================= */

        .success-message {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 13px 16px;
            margin-bottom: 24px;
            background: #f0fdf4;
            border: 1px solid #bbf7d0;
            color: #166534;
            border-radius: 10px;
            font-size: 14px;
            font-weight: 500;
        }

        .success-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 22px;
            height: 22px;
            background: #22c55e;
            color: white;
            border-radius: 50%;
            font-size: 13px;
            font-weight: 700;
        }


        /* ================================
           PAGE HEADER
        ================================= */

        .page-intro {
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
            gap: 20px;
            margin-bottom: 28px;
        }

        .page-label {
            display: block;
            margin-bottom: 8px;
            color: #2563eb;
            font-size: 12px;
            font-weight: 700;
            letter-spacing: 0.08em;
        }

        .page-intro h1 {
            margin: 0;
            color: #111827;
            font-size: 30px;
            line-height: 1.2;
            font-weight: 700;
        }

        .page-intro p {
            margin: 8px 0 0;
            color: #6b7280;
            font-size: 14px;
        }


        /* ================================
           ADD BUTTON
        ================================= */

        .add-student-button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 11px 17px;
            background: #2563eb;
            color: white;
            border-radius: 9px;
            text-decoration: none;
            font-size: 14px;
            font-weight: 600;
            border: 1px solid #2563eb;
            transition: 0.2s ease;
        }

        .add-student-button span {
            font-size: 20px;
            line-height: 1;
        }

        .add-student-button:hover {
            background: #1d4ed8;
            border-color: #1d4ed8;
        }


        /* ================================
           FILTER PANEL
        ================================= */

        .filter-panel {
            display: grid;
            grid-template-columns: minmax(240px, 1fr) 180px 160px 160px auto auto;
            gap: 10px;
            align-items: center;
            padding: 16px;
            margin-bottom: 20px;
            background: #ffffff;
            border: 1px solid #e5e7eb;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.03);
        }

        .search-field {
            position: relative;
        }

        .search-field svg {
            position: absolute;
            left: 13px;
            top: 50%;
            width: 18px;
            height: 18px;
            transform: translateY(-50%);
            stroke: #9ca3af;
            stroke-width: 2;
        }

        .search-field input {
            width: 100%;
            height: 42px;
            padding: 0 14px 0 40px;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            outline: none;
            color: #111827;
            background: #ffffff;
            font-size: 14px;
        }

        .search-field input:focus,
        .filter-panel select:focus {
            border-color: #2563eb;
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
        }

        .filter-panel select {
            width: 100%;
            height: 42px;
            padding: 0 12px;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            background: #ffffff;
            color: #374151;
            font-size: 14px;
            outline: none;
        }

        .search-button {
            height: 42px;
            padding: 0 17px;
            border: 0;
            border-radius: 8px;
            background: #111827;
            color: white;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: 0.2s ease;
        }

        .search-button:hover {
            background: #1f2937;
        }

        .clear-button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            height: 42px;
            padding: 0 15px;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            background: white;
            color: #374151;
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
            transition: 0.2s ease;
        }

        .clear-button:hover {
            background: #f9fafb;
            border-color: #9ca3af;
        }


        /* ================================
           RESULTS HEADER
        ================================= */

        .records-header {
            margin-bottom: 12px;
        }

        .results-info {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .results-info strong {
            color: #111827;
            font-size: 15px;
        }

        .results-info span {
            color: #9ca3af;
            font-size: 13px;
        }


        /* ================================
           TABLE
        ================================= */

        .students-table-card {
            background: #ffffff;
            border: 1px solid #e5e7eb;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.03);
        }

        .table-wrapper {
            width: 100%;
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        thead {
            background: #f9fafb;
        }

        th {
            padding: 13px 16px;
            border-bottom: 1px solid #e5e7eb;
            color: #6b7280;
            text-align: left;
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.04em;
            white-space: nowrap;
        }

        td {
            padding: 15px 16px;
            border-bottom: 1px solid #f3f4f6;
            color: #374151;
            font-size: 13px;
            white-space: nowrap;
        }

        tbody tr:last-child td {
            border-bottom: none;
        }

        tbody tr:hover {
            background: #fafafa;
        }


        /* ================================
           STUDENT NAME
        ================================= */

        .student-name {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .student-avatar {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            width: 34px;
            height: 34px;
            border-radius: 50%;
            background: #eff6ff;
            color: #2563eb;
            font-size: 13px;
            font-weight: 700;
        }

        .student-name > span {
            color: #111827;
            font-weight: 600;
        }

        .student-id {
            color: #2563eb;
            font-weight: 600;
        }

        .email {
            color: #6b7280;
        }

        .course-name {
            color: #374151;
            font-weight: 500;
        }

        .muted {
            color: #9ca3af;
        }


        /* ================================
           GENDER BADGES
        ================================= */

        .gender-badge {
            display: inline-flex;
            align-items: center;
            padding: 4px 9px;
            border-radius: 999px;
            font-size: 11px;
            font-weight: 600;
        }

        .gender-badge.male {
            background: #eff6ff;
            color: #2563eb;
        }

        .gender-badge.female {
            background: #fdf2f8;
            color: #be185d;
        }

        .gender-badge.other {
            background: #f3f4f6;
            color: #4b5563;
        }


        /* ================================
           ACTIONS
        ================================= */

        .actions {
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .view-button,
        .edit-button,
        .delete-button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 52px;
            height: 32px;
            padding: 0 9px;
            border-radius: 7px;
            font-size: 12px;
            font-weight: 600;
            text-decoration: none;
            cursor: pointer;
            transition: 0.2s ease;
        }

        .view-button {
            border: 1px solid #dbeafe;
            background: #eff6ff;
            color: #2563eb;
        }

        .view-button:hover {
            background: #dbeafe;
        }

        .edit-button {
            border: 1px solid #e5e7eb;
            background: #ffffff;
            color: #374151;
        }

        .edit-button:hover {
            background: #f9fafb;
        }

        .delete-button {
            border: 1px solid #fee2e2;
            background: #fef2f2;
            color: #dc2626;
        }

        .delete-button:hover {
            background: #fee2e2;
        }

        .delete-form {
            margin: 0;
        }


        /* ================================
           PROFESSIONAL PAGINATION
        ================================= */

        .pagination-wrapper {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
            margin-top: 20px;
            padding: 15px 2px;
        }

        .pagination-summary {
            color: #6b7280;
            font-size: 13px;
            white-space: nowrap;
        }

        .pagination-summary strong {
            color: #374151;
            font-weight: 600;
        }

        .pagination-links {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 5px;
        }

        .pagination-button,
        .pagination-number {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            height: 36px;
            min-width: 36px;
            padding: 0 10px;
            border: 1px solid #e5e7eb;
            border-radius: 8px;
            background: #ffffff;
            color: #374151;
            text-decoration: none;
            font-size: 13px;
            font-weight: 500;
            transition: all 0.2s ease;
        }

        .pagination-button {
            gap: 6px;
        }

        .pagination-button svg {
            width: 15px;
            height: 15px;
            stroke: currentColor;
            stroke-width: 2;
            stroke-linecap: round;
            stroke-linejoin: round;
        }

        .pagination-number {
            padding: 0;
        }

        .pagination-button:hover,
        .pagination-number:hover {
            background: #f9fafb;
            border-color: #d1d5db;
            color: #111827;
        }

        .pagination-number.active {
            background: #2563eb;
            border-color: #2563eb;
            color: #ffffff;
            font-weight: 600;
        }

        .pagination-number.active:hover {
            background: #1d4ed8;
            border-color: #1d4ed8;
            color: #ffffff;
        }

        .pagination-button.disabled {
            background: #f9fafb;
            border-color: #f3f4f6;
            color: #c4c8ce;
            cursor: not-allowed;
        }


        /* ================================
           MOBILE STUDENTS
        ================================= */

        .mobile-student-list {
            display: none;
        }


        /* ================================
           EMPTY STATE
        ================================= */

        .empty-state {
            padding: 70px 20px;
            background: #ffffff;
            border: 1px solid #e5e7eb;
            border-radius: 12px;
            text-align: center;
        }

        .empty-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 60px;
            height: 60px;
            margin: 0 auto 16px;
            background: #eff6ff;
            border-radius: 50%;
            font-size: 28px;
        }

        .empty-state h3 {
            margin: 0;
            color: #111827;
            font-size: 18px;
        }

        .empty-state p {
            margin: 8px 0 20px;
            color: #6b7280;
            font-size: 14px;
        }


        /* ================================
           TABLET
        ================================= */

        @media (max-width: 1100px) {

            .filter-panel {
                grid-template-columns: 1fr 1fr 1fr;
            }

            .search-field {
                grid-column: span 3;
            }

            .search-button,
            .clear-button {
                width: 100%;
            }

        }


        /* ================================
           MOBILE
        ================================= */

        @media (max-width: 768px) {

            .students-container {
                padding: 24px 16px 40px;
            }

            .page-intro {
                align-items: flex-start;
                flex-direction: column;
                margin-bottom: 22px;
            }

            .page-intro h1 {
                font-size: 26px;
            }

            .add-student-button {
                width: 100%;
            }

            .filter-panel {
                grid-template-columns: 1fr;
                gap: 9px;
            }

            .search-field {
                grid-column: span 1;
            }

            .students-table-card {
                display: none;
            }

            .mobile-student-list {
                display: flex;
                flex-direction: column;
                gap: 12px;
            }

            .mobile-student-card {
                padding: 16px;
                background: #ffffff;
                border: 1px solid #e5e7eb;
                border-radius: 12px;
                box-shadow: 0 2px 8px rgba(0, 0, 0, 0.03);
            }

            .mobile-card-header {
                display: flex;
                align-items: flex-start;
                justify-content: space-between;
                gap: 12px;
                padding-bottom: 14px;
                border-bottom: 1px solid #f3f4f6;
            }

            .mobile-card-header .student-name > div:last-child {
                display: flex;
                flex-direction: column;
                gap: 3px;
            }

            .mobile-card-header strong {
                color: #111827;
                font-size: 14px;
            }

            .mobile-card-header .student-name span {
                color: #9ca3af;
                font-size: 12px;
                font-weight: 500;
            }

            .mobile-details {
                display: grid;
                grid-template-columns: 1fr 1fr;
                gap: 14px;
                padding: 15px 0;
            }

            .mobile-details div {
                display: flex;
                flex-direction: column;
                gap: 4px;
                min-width: 0;
            }

            .mobile-details small {
                color: #9ca3af;
                font-size: 10px;
                font-weight: 700;
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
                grid-template-columns: 1fr 1fr 1fr;
                gap: 7px;
            }

            .mobile-actions .view-button,
            .mobile-actions .edit-button,
            .mobile-actions .delete-button {
                width: 100%;
            }

            .pagination-wrapper {
                flex-direction: column;
                gap: 12px;
                align-items: center;
            }

            .pagination-links {
                width: 100%;
                justify-content: center;
            }

            .pagination-button {
                font-size: 12px;
            }

        }


        /* ================================
           SMALL MOBILE
        ================================= */

        @media (max-width: 480px) {

            .students-container {
                padding: 20px 12px 32px;
            }

            .page-intro h1 {
                font-size: 23px;
            }

            .results-info {
                align-items: flex-start;
                flex-direction: column;
                gap: 3px;
            }

            .pagination-summary {
                font-size: 12px;
            }

            .pagination-button {
                min-width: 34px;
                padding: 0 8px;
            }

            .pagination-number {
                min-width: 34px;
            }

            .pagination-button svg {
                width: 14px;
                height: 14px;
            }

        }

    </style>

</x-app-layout>