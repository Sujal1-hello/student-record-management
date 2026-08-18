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
            padding: 30px;
            color: #777;
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

    @if ($students->count())

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

    @else

        <div class="empty">
            No students found.
        </div>

    @endif

</div>

</body>
</html>