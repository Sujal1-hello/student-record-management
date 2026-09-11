<x-app-layout>


    <div class="students-container">

        @if (session('success'))
            <div class="success-message">
                <span>✓</span>
                {{ session('success') }}
            </div>
        @endif

        <div class="page-intro">
            <div>
                <h1>Student Records</h1>
                <p>View, search, filter and manage all students.</p>
            </div>

            <a href="{{ route('students.create') }}" class="add-student-button">
                + Add New Student
            </a>
        </div>

        <form action="{{ route('students.index') }}" method="GET" class="filter-panel">

            <div class="search-field">

                <svg xmlns="http://www.w3.org/2000/svg"
                     viewBox="0 0 24 24"
                     fill="none"
                     stroke="currentColor"
                     stroke-width="2">
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
                    <option value="{{ $courseOption }}"
                        {{ ($course ?? '') == $courseOption ? 'selected' : '' }}>
                        {{ $courseOption }}
                    </option>
                @endforeach
            </select>

            <select name="gender">
                <option value="">All Genders</option>

                <option value="Male"
                    {{ ($gender ?? '') == 'Male' ? 'selected' : '' }}>
                    Male
                </option>

                <option value="Female"
                    {{ ($gender ?? '') == 'Female' ? 'selected' : '' }}>
                    Female
                </option>

                <option value="Other"
                    {{ ($gender ?? '') == 'Other' ? 'selected' : '' }}>
                    Other
                </option>
            </select>

            <select name="semester">
                <option value="">All Semesters</option>

                @for ($i = 1; $i <= 8; $i++)
                    <option value="{{ $i }}"
                        {{ ($semester ?? '') == $i ? 'selected' : '' }}>
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

        @if ($students->count())

            <div class="records-header">
                <div>
                    <strong>
                        {{ $students->total() }}
                        {{ $students->total() == 1 ? 'Student' : 'Students' }}
                    </strong>

                    <span>
                        Showing {{ $students->firstItem() }}–{{ $students->lastItem() }}
                    </span>
                </div>
            </div>

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

                                    <td>
                                        <span class="student-id">
                                            {{ $student->student_id }}
                                        </span>
                                    </td>

                                    <td>
                                        <div class="student-name">
                                            <div class="student-avatar">
                                                {{ strtoupper(substr($student->name, 0, 1)) }}
                                            </div>

                                            <span>{{ $student->name }}</span>
                                        </div>
                                    </td>

                                    <td>
                                        <span class="email">
                                            {{ $student->email }}
                                        </span>
                                    </td>

                                    <td>
                                        {{ $student->phone ?? 'N/A' }}
                                    </td>

                                    <td>
                                        @if ($student->gender)
                                            <span class="gender-badge {{ strtolower($student->gender) }}">
                                                {{ $student->gender }}
                                            </span>
                                        @else
                                            <span class="muted">N/A</span>
                                        @endif
                                    </td>

                                    <td>
                                        <span class="course-name">
                                            {{ $student->course }}
                                        </span>
                                    </td>

                                    <td>
                                        @if ($student->semester)
                                            Semester {{ $student->semester }}
                                        @else
                                            <span class="muted">N/A</span>
                                        @endif
                                    </td>

                                    <td>

                                        <div class="actions">

                                            <a
                                                href="{{ route('students.show', $student->id) }}"
                                                class="view-button">
                                                View
                                            </a>

                                            <a
                                                href="{{ route('students.edit', $student->id) }}"
                                                class="edit-button">
                                                Edit
                                            </a>

                                            <form
                                                action="{{ route('students.destroy', $student->id) }}"
                                                method="POST"
                                                class="delete-form">

                                                @csrf
                                                @method('DELETE')

                                                <button
                                                    type="submit"
                                                    class="delete-button"
                                                    onclick="return confirm('Are you sure you want to delete this student?')">
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

            <div class="mobile-student-list">

                @foreach ($students as $student)

                    <div class="mobile-student-card">

                        <div class="mobile-card-header">

                            <div class="student-name">

                                <div class="student-avatar">
                                    {{ strtoupper(substr($student->name, 0, 1)) }}
                                </div>

                                <div>
                                    <strong>{{ $student->name }}</strong>

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
                                class="view-button">
                                View
                            </a>

                            <a
                                href="{{ route('students.edit', $student->id) }}"
                                class="edit-button">
                                Edit
                            </a>

                            <form
                                action="{{ route('students.destroy', $student->id) }}"
                                method="POST">

                                @csrf
                                @method('DELETE')

                                <button
                                    type="submit"
                                    class="delete-button"
                                    onclick="return confirm('Are you sure you want to delete this student?')">
                                    Delete
                                </button>

                            </form>

                        </div>

                    </div>

                @endforeach

            </div>

            <div class="pagination">
                {{ $students->links() }}
            </div>

        @else

            <div class="empty-state">

                <div class="empty-icon">
                    👨‍🎓
                </div>

                @if (!empty($search) || !empty($course) || !empty($gender) || !empty($semester))

                    <h3>No Students Found</h3>

                    <p>
                        No students match your current search or filters.
                    </p>

                    <a href="{{ route('students.index') }}" class="clear-button">
                        Clear Filters
                    </a>

                @else

                    <h3>No Students Available</h3>

                    <p>
                        You haven't added any students yet.
                    </p>

                    <a href="{{ route('students.create') }}" class="add-student-button">
                        + Add Your First Student
                    </a>

                @endif

            </div>

        @endif

    </div>

    <style>

        .students-page-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
        }

        .students-page-header h2 {
            margin: 0;
            font-size: 22px;
            font-weight: 700;
            color: #111827;
        }

        .students-page-header p {
            margin: 4px 0 0;
            color: #6b7280;
            font-size: 13px;
        }

        .header-add-button,
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

        .header-add-button:hover,
        .add-student-button:hover {
            background: #1d4ed8;
        }

        .students-container {
            width: min(1400px, calc(100% - 60px));
            margin: 0 auto;
            padding: 40px 0 60px;
        }

        .success-message {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 24px;
            padding: 13px 16px;
            background: #ecfdf5;
            border: 1px solid #bbf7d0;
            border-radius: 9px;
            color: #166534;
            font-size: 14px;
            font-weight: 500;
        }

        .success-message span {
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

        .filter-panel {
            display: grid;
            grid-template-columns: minmax(280px, 2fr) repeat(3, minmax(150px, 1fr)) auto auto;
            gap: 10px;
            padding: 18px;
            margin-bottom: 24px;
            background: #ffffff;
            border: 1px solid #e5e7eb;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
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
            color: #9ca3af;
            pointer-events: none;
        }

        .search-field input,
        .filter-panel select {
            width: 100%;
            height: 44px;
            box-sizing: border-box;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            background: #ffffff;
            color: #111827;
            font-size: 13px;
            outline: none;
        }

        .search-field input {
            padding: 0 13px 0 40px;
        }

        .filter-panel select {
            padding: 0 12px;
        }

        .search-field input:focus,
        .filter-panel select:focus {
            border-color: #2563eb;
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
        }

        .search-button,
        .clear-button {
            height: 44px;
            padding: 0 18px;
            border-radius: 8px;
            font-size: 13px;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            box-sizing: border-box;
            text-decoration: none;
            cursor: pointer;
        }

        .search-button {
            border: 0;
            background: #2563eb;
            color: white;
        }

        .search-button:hover {
            background: #1d4ed8;
        }

        .clear-button {
            border: 1px solid #e5e7eb;
            background: #f3f4f6;
            color: #374151;
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
            min-width: 1000px;
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
            padding: 5px 8px;
            border-radius: 6px;
            background: #eff6ff;
            color: #2563eb;
            font-size: 12px;
            font-weight: 700;
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

        .course-name {
            color: #374151;
            font-weight: 500;
        }

        .muted {
            color: #9ca3af;
        }

        .gender-badge {
            display: inline-flex;
            padding: 5px 9px;
            border-radius: 999px;
            font-size: 11px;
            font-weight: 600;
        }

        .gender-badge.male {
            background: #ecfdf5;
            color: #15803d;
        }

        .gender-badge.female {
            background: #fdf2f8;
            color: #be185d;
        }

        .gender-badge.other {
            background: #f5f3ff;
            color: #7e22ce;
        }

        .actions {
            display: flex;
            align-items: center;
            gap: 7px;
            white-space: nowrap;
        }

        .view-button,
        .edit-button,
        .delete-button {
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
        }

        .view-button {
            background: #eff6ff;
            color: #2563eb;
        }

        .view-button:hover {
            background: #dbeafe;
        }

        .edit-button {
            background: #f0fdf4;
            color: #16a34a;
        }

        .edit-button:hover {
            background: #dcfce7;
        }

        .delete-form {
            display: inline;
            margin: 0;
        }

        .delete-button {
            border: 0;
            background: #fef2f2;
            color: #dc2626;
        }

        .delete-button:hover {
            background: #fee2e2;
        }

        .mobile-student-list {
            display: none;
        }

        .pagination {
            display: flex;
            justify-content: center;
            margin-top: 24px;
        }

        .pagination svg {
            width: 18px;
            height: 18px;
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

        @media (max-width: 1200px) {

            .students-container {
                width: min(100% - 40px, 1200px);
            }

            .filter-panel {
                grid-template-columns: 1fr 1fr;
            }

            .search-field {
                grid-column: span 2;
            }

        }

        @media (max-width: 800px) {

            .students-container {
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
                grid-template-columns: 1fr;
                padding: 14px;
            }

            .search-field {
                grid-column: auto;
            }

            .filter-panel select,
            .search-field input,
            .search-button,
            .clear-button {
                width: 100%;
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

            .mobile-card-header .student-name > div:last-child {
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
                grid-template-columns: 1fr 1fr;
                gap: 16px;
                padding: 16px 0;
            }

            .mobile-details div {
                min-width: 0;
                display: flex;
                flex-direction: column;
                gap: 4px;
            }

            .mobile-details div:first-child {
                grid-column: span 2;
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
                font-size: 13px;
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

            .mobile-actions .view-button,
            .mobile-actions .edit-button,
            .mobile-actions .delete-button {
                width: 100%;
            }

            .mobile-actions form {
                margin: 0;
            }

            .students-page-header {
                align-items: flex-start;
            }

        }

        @media (max-width: 550px) {

            .students-page-header {
                flex-direction: column;
                align-items: stretch;
            }

            .header-add-button {
                width: 100%;
            }

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

            .mobile-card-header {
                align-items: flex-start;
            }

            .mobile-card-header .gender-badge {
                flex-shrink: 0;
            }

            .mobile-details {
                grid-template-columns: 1fr;
            }

            .mobile-details div:first-child {
                grid-column: auto;
            }

            .pagination {
                overflow-x: auto;
                justify-content: flex-start;
                padding-bottom: 5px;
            }

        }

    </style>

</x-app-layout>