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
            max-width: 1000px;
            margin: auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
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

        .search-box {
    display: flex;
    gap: 10px;
    margin-bottom: 25px;
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
}

.clear-button:hover {
    background-color: #4b5563;
}

        .add-button:hover {
            background-color: #1d4ed8;
        }

        .success {
            background-color: #dcfce7;
            color: #166534;
            padding: 12px;
            border-radius: 6px;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            background-color: #f1f5f9;
            text-align: left;
            padding: 14px;
            border-bottom: 2px solid #ddd;
        }

        td {
            padding: 14px;
            border-bottom: 1px solid #ddd;
        }

        tr:hover {
            background-color: #f8fafc;
        }

        .view {
            color: #2563eb;
            text-decoration: none;
            margin-right: 10px;
        }

        .edit {
            color: #16a34a;
            text-decoration: none;
            margin-right: 10px;
        }

        .delete-button {
            background-color: #dc2626;
            color: white;
            border: none;
            padding: 7px 12px;
            border-radius: 5px;
            cursor: pointer;
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

.student-count {
    margin-bottom: 15px;
    color: #666;
    font-size: 14px;
}

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

    </style>
</head>

<body>

<div class="container">

    <h1>Student Management System</h1>

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

    <input
        type="text"
        name="search"
        placeholder="Search by name, email, phone or course..."
        value="{{ $search ?? '' }}"
    >

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

    <button type="submit" class="search-button">
        Search
    </button>

    @if (!empty($search) || !empty($course))
        <a href="{{ route('students.index') }}" class="clear-button">
            Clear
        </a>
    @endif

</form>

   @if ($students->count())

    <div class="student-count">
        Showing {{ $students->firstItem() }}–{{ $students->lastItem() }}
        of {{ $students->total() }} students
    </div>

    <table>

        <table>

            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Course</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>

                @foreach($students as $student)

                    <tr>

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
                            {{ $student->course }}
                        </td>

                        <td>

                            <a href="{{ route('students.show', $student->id) }}"
                               class="view">
                                View
                            </a>

                            <a href="{{ route('students.edit', $student->id) }}"
                               class="edit">
                                Edit
                            </a>

                            <form action="{{ route('students.destroy', $student->id) }}"
                                  method="POST"
                                  style="display: inline;">

                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        class="delete-button"
                                        onclick="return confirm('Are you sure you want to delete this student?')">
                                    Delete
                                </button>

                            </form>

                        </td>

                    </tr>

                @endforeach

            </tbody>

        </table>

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