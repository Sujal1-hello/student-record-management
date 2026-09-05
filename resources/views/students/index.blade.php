<!DOCTYPE html>
<html>

<head>
    <title>Students</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f8;
            margin: 0;
            padding: 40px;
        }

        .container {
            max-width: 1200px;
            margin: auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            margin-bottom: 5px;
            color: #222;
        }

        h2 {
            color: #555;
            margin-bottom: 25px;
        }

        .add-button {
            display: inline-block;
            background-color: #2563eb;
            color: white;
            padding: 10px 16px;
            text-decoration: none;
            border-radius: 6px;
            margin-bottom: 25px;
        }

        .add-button:hover {
            background-color: #1d4ed8;
        }

        .search-box {
            display: grid;
            grid-template-columns: 1fr;
            gap: 10px;
            margin-bottom: 25px;
            align-items: center;
        }

        .search-box input {
            flex: 1;
            padding: 10px 12px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 14px;
        }

        .search-box select {
            padding: 10px 12px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 14px;
            background-color: white;
            min-width: 180px;
        }

        .search-button {
            background-color: #2563eb;
            color: white;
            border: none;
            padding: 10px 18px;
            border-radius: 6px;
            cursor: pointer;
        }

        .search-button:hover {
            background-color: #1d4ed8;
        }

        .clear-button {
            background-color: #6b7280;
            color: white;
            padding: 10px 18px;
            border-radius: 6px;
            text-decoration: none;
            white-space: nowrap;
        }

        .clear-button:hover {
            background-color: #4b5563;
        }

        .success {
            background-color: #dcfce7;
            color: #166534;
            padding: 12px;
            border-radius: 6px;
            margin-bottom: 20px;
        }

        .student-count {
            margin-bottom: 15px;
            color: #666;
            font-size: 14px;
        }

        /* Table wrapper */
        .table-wrapper {
            width: 100%;
            overflow-x: auto;
        }

        table {
            width: 100%;
            min-width: 1100px;
            border-collapse: collapse;
            table-layout: fixed;
        }

        th {
            background-color: #f1f5f9;
            text-align: left;
            padding: 14px;
            border-bottom: 2px solid #ddd;
            white-space: nowrap;
        }

        td {
            padding: 14px;
            border-bottom: 1px solid #ddd;
            vertical-align: middle;
            white-space: nowrap;
        }

        tr:hover {
            background-color: #f8fafc;
        }

        /* Column widths */

        th:nth-child(1),
        td:nth-child(1) {
            width: 10%;
        }

        th:nth-child(2),
        td:nth-child(2) {
            width: 13%;
        }

        th:nth-child(3),
        td:nth-child(3) {
            width: 21%;
        }

        th:nth-child(4),
        td:nth-child(4) {
            width: 14%;
        }

        th:nth-child(5),
        td:nth-child(5) {
            width: 10%;
        }

        th:nth-child(6),
        td:nth-child(6) {
            width: 13%;
        }

        th:nth-child(7),
        td:nth-child(7) {
            width: 10%;
        }

        th:nth-child(8),
        td:nth-child(8) {
            width: 16%;
        }

        /* Actions */

        .actions {
            white-space: nowrap;
        }

        .view {
            color: #2563eb;
            text-decoration: none;
            margin-right: 10px;
        }

        .view:hover {
            text-decoration: underline;
        }

        .edit {
            color: #16a34a;
            text-decoration: none;
            margin-right: 10px;
        }

        .edit:hover {
            text-decoration: underline;
        }

        .delete-form {
            display: inline;
        }

        .delete-button {
            background-color: #dc2626;
            color: white;
            border: none;
            padding: 7px 12px;
            border-radius: 5px;
            cursor: pointer;
            white-space: nowrap;
        }

        .delete-button:hover {
            background-color: #b91c1c;
        }

        .empty {
            text-align: center;
            padding: 40px 20px;
            color: #777;
        }

        .empty h3 {
            margin-bottom: 10px;
            color: #333;
        }

        .empty p {
            margin-bottom: 20px;
        }

        /* Pagination */

        .pagination {
            margin-top: 25px;
            display: flex;
            justify-content: center;
        }

        .pagination nav {
            display: flex;
            justify-content: center;
        }

        .pagination svg {
            width: 20px;
            height: 20px;
        }

        .pagination a,
        .pagination span {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 38px;
            height: 38px;
            margin: 0 3px;
            padding: 0 10px;
            border: 1px solid #ddd;
            border-radius: 6px;
            text-decoration: none;
            color: #2563eb;
            background-color: white;
        }

        .pagination a:hover {
            background-color: #eff6ff;
        }

        .pagination span[aria-current="page"] {
            background-color: #2563eb;
            color: white;
            border-color: #2563eb;
        }

        .pagination span[aria-disabled="true"] {
            color: #999;
            background-color: #f3f4f6;
        }

        /* Mobile */

        @media (max-width: 768px) {

            body {
                padding: 15px;
            }

            .container {
                padding: 20px;
            }

            .search-box {
                flex-direction: column;
            }

            .search-box input,
            .search-box select,
            .search-button,
            .clear-button {
                width: 100%;
                box-sizing: border-box;
            }

            .table-wrapper {
                overflow-x: auto;
            }

            table {
                min-width: 1100px;
            }
        }

        .dashboard-button {
            display: inline-block;
            background-color: #16a34a;
            color: white;
            padding: 10px 16px;
            text-decoration: none;
            border-radius: 6px;
            margin-bottom: 25px;
            margin-right: 10px;
        }

        .dashboard-button:hover {
            background-color: #15803d;
        }
    </style>
</head>

<body>

    <div class="container">

        <h1>Student Management System</h1>

        <a href="{{ route('dashboard') }}" class="dashboard-button">
            Dashboard
        </a>

        <h2>Students</h2>

        @if (session('success'))
            <div class="success">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('students.create') }}" class="add-button">
            + Add New Student
        </a>

        <form action="{{ route('students.index') }}" method="GET" class="search-box">

            <input type="text" name="search" placeholder="Search by ID, name, email, phone or course..."
                value="{{ $search ?? '' }}">

            <select name="course">

                <option value="">All Courses</option>

                @foreach ($courses as $courseOption)

                    <option value="{{ $courseOption }}" {{ ($course ?? '') == $courseOption ? 'selected' : '' }}>
                        {{ $courseOption }}
                    </option>

                @endforeach

            </select>

            <select name="gender">
                <option value="">All Genders</option>

                <option value="Male" {{ ($gender ?? '') == 'Male' ? 'selected' : '' }}>
                    Male
                </option>

                <option value="Female" {{ ($gender ?? '') == 'Female' ? 'selected' : '' }}>
                    Female
                </option>

                <option value="Other" {{ ($gender ?? '') == 'Other' ? 'selected' : '' }}>
                    Other
                </option>
            </select>

            <select name="semester">
                <option value="">All Semesters</option>

                @for ($i = 1; $i <= 8; $i++)
                    <option value="{{ $i }}" {{ ($semester ?? '') == $i ? 'selected' : '' }}>
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

            <div class="student-count">

                Showing
                {{ $students->firstItem() }}–{{ $students->lastItem() }}
                of {{ $students->total() }} students

            </div>


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
                                            {{ $student->student_id }}
                                        </td>

                                        <td>
                                            {{ $student->name }}
                                        </td>

                                        <td>
                                            {{ $student->email }}
                                        </td>

                                        <td>
                                            {{ $student->phone ?? 'N/A' }}
                                        </td>

                                        <td>
                                            {{ $student->gender ?? 'N/A' }}
                                        </td>

                                        <td>
                                            {{ $student->course }}
                                        </td>

                                        <td>
                                            {{ $student->semester
                            ? 'Semester ' . $student->semester
                            : 'N/A'
                                                                                                                    }}
                                        </td>

                                        <td class="actions">

                                            <a href="{{ route('students.show', $student->id) }}" class="view">
                                                View
                                            </a>

                                            <a href="{{ route('students.edit', $student->id) }}" class="edit">
                                                Edit
                                            </a>

                                            <form action="{{ route('students.destroy', $student->id) }}" method="POST"
                                                class="delete-form">

                                                @csrf

                                                @method('DELETE')

                                                <button type="submit" class="delete-button"
                                                    onclick="return confirm('Are you sure you want to delete this student?')">
                                                    Delete
                                                </button>

                                            </form>

                                        </td>

                                    </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>


            <div class="pagination">

                {{ $students->links() }}

            </div>


        @else

            <div class="empty">

                @if (!empty($search) || !empty($course))

                    <h3>No students found</h3>

                    <p>
                        No students match your current search or filter.
                    </p>

                    <a href="{{ route('students.index') }}" class="clear-button">
                        Clear Search
                    </a>

                @else

                    <h3>No students available</h3>

                    <p>
                        You haven't added any students yet.
                    </p>

                    <a href="{{ route('students.create') }}" class="add-button">
                        + Add Your First Student
                    </a>

                @endif

            </div>

        @endif

    </div>

</body>

</html>