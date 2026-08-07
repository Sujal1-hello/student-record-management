<!DOCTYPE html>
<html>
<head>
    <title>Students</title>
</head>
<body>

    <h1>Student Management System</h1>

    <h2>Students</h2>

    @forelse($students as $student)

        <p>
            {{ $student->name }}
            - {{ $student->email }}
        </p>

    @empty

        <p>No students found.</p>

    @endforelse

</body>
</html>