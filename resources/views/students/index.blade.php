<!DOCTYPE html>
<html>
<head>
    <title>Students</title>
</head>
<body>

    <h1>Student Management System</h1>

    <h2>Students</h2>

    <a href="{{ route('students.create') }}">Add New Student</a>

    <br><br>

    @forelse($students as $student)

        <div>

            <p>
                {{ $student->name }}
                - {{ $student->email }}
            </p>

            <!-- View Student -->
            <a href="{{ route('students.show', $student->id) }}">
                View
            </a>

            &nbsp;

            <!-- Edit Student -->
            <a href="{{ route('students.edit', $student->id) }}">
                Edit
            </a>

            &nbsp;

            <!-- Delete Student -->
            <form action="{{ route('students.destroy', $student->id) }}"
                  method="POST"
                  style="display: inline;">

                @csrf
                @method('DELETE')

                <button type="submit"
                        onclick="return confirm('Are you sure you want to delete this student?')">
                    Delete
                </button>

            </form>

        </div>

        <hr>

    @empty

        <p>No students found.</p>

    @endforelse

</body>
</html>