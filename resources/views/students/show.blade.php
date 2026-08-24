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
            max-width: 650px;
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

        .student-id {
            background-color: #eff6ff;
            border: 1px solid #bfdbfe;
            color: #1d4ed8;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
            text-align: center;
        }

        .student-id span {
            display: block;
            font-size: 13px;
            color: #64748b;
            margin-bottom: 5px;
        }

        .student-id strong {
            font-size: 24px;
        }

        .student-info {
            border: 1px solid #ddd;
            border-radius: 8px;
            overflow: hidden;
        }

        .info-row {
            display: flex;
            justify-content: space-between;
            gap: 20px;
            padding: 14px 18px;
            border-bottom: 1px solid #eee;
        }

        .info-row:last-child {
            border-bottom: none;
        }

        .label {
            font-weight: bold;
            color: #555;
        }

        .value {
            color: #222;
            text-align: right;
        }

        .actions {
            margin-top: 25px;
        }

        .edit-button {
            display: inline-block;
            background-color: #16a34a;
            color: white;
            padding: 10px 16px;
            border-radius: 6px;
            text-decoration: none;
        }

        .edit-button:hover {
            background-color: #15803d;
        }

        .back {
            display: inline-block;
            margin-top: 20px;
            color: #2563eb;
            text-decoration: none;
        }

        .back:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>

<div class="container">

    <h1>Student Management System</h1>

    <h2>Student Details</h2>

    <div class="student-id">
        <span>Student ID</span>
        <strong>{{ $student->student_id }}</strong>
    </div>

    <div class="student-info">

        <div class="info-row">
            <span class="label">Name</span>
            <span class="value">{{ $student->name }}</span>
        </div>

        <div class="info-row">
            <span class="label">Email</span>
            <span class="value">{{ $student->email }}</span>
        </div>

        <div class="info-row">
            <span class="label">Phone</span>
            <span class="value">{{ $student->phone ?? 'N/A' }}</span>
        </div>

        <div class="info-row">
            <span class="label">Course</span>
            <span class="value">{{ $student->course }}</span>
        </div>

    </div>

    <div class="actions">

        <a href="{{ route('students.edit', $student->id) }}"
           class="edit-button">
            Edit Student
        </a>

    </div>

    <a href="{{ route('students.index') }}"
       class="back">
        ← Back to Students
    </a>

</div>

</body>
</html>