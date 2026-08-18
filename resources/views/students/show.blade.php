<!DOCTYPE html>
<html>
<head>
    <title>Student Details</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f8;
            margin: 0;
            padding: 40px;
        }

        .container {
            max-width: 600px;
            margin: auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            margin-bottom: 5px;
        }

        h2 {
            color: #555;
            margin-bottom: 25px;
        }

        .student-info {
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 20px;
        }

        .student-info p {
            padding: 10px 0;
            margin: 0;
            border-bottom: 1px solid #eee;
        }

        .student-info p:last-child {
            border-bottom: none;
        }

        .edit-button {
            display: inline-block;
            background-color: #16a34a;
            color: white;
            padding: 10px 16px;
            border-radius: 6px;
            text-decoration: none;
            margin-top: 20px;
        }

        .back {
            display: inline-block;
            margin-top: 20px;
            color: #2563eb;
            text-decoration: none;
        }
    </style>
</head>

<body>

<div class="container">

    <h1>Student Management System</h1>

    <h2>Student Details</h2>

    <div class="student-info">

        <p>
            <strong>Name:</strong>
            {{ $student->name }}
        </p>

        <p>
            <strong>Email:</strong>
            {{ $student->email }}
        </p>

        <p>
            <strong>Phone:</strong>
            {{ $student->phone ?? 'N/A' }}
        </p>

        <p>
            <strong>Course:</strong>
            {{ $student->course }}
        </p>

    </div>

    <a href="{{ route('students.edit', $student->id) }}"
       class="edit-button">
        Edit Student
    </a>

    <br>

    <a href="{{ route('students.index') }}"
       class="back">
        ← Back to Students
    </a>

</div>

</body>
</html>