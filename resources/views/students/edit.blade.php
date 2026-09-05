<!DOCTYPE html>
<html>
<head>
    <title>Edit Student</title>

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
            color: #222;
        }

        h2 {
            color: #555;
            margin-bottom: 25px;
        }

        .student-id {
            background-color: #f1f5f9;
            padding: 12px;
            border-radius: 6px;
            margin-bottom: 20px;
            color: #333;
        }

        .error {
            background-color: #fee2e2;
            color: #991b1b;
            padding: 15px;
            border-radius: 6px;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 18px;
        }

        label {
            display: block;
            margin-bottom: 6px;
            font-weight: bold;
        }

        input,
        select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 6px;
            box-sizing: border-box;
            font-size: 14px;
        }

        input:focus,
        select:focus {
            outline: none;
            border-color: #16a34a;
        }

        .button {
            background-color: #16a34a;
            color: white;
            border: none;
            padding: 11px 18px;
            border-radius: 6px;
            cursor: pointer;
            font-size: 15px;
        }

        .button:hover {
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

        .optional {
            font-weight: normal;
            color: #777;
            font-size: 13px;
        }
    </style>
</head>

<body>

<div class="container">

    <h1>Student Management System</h1>

    <h2>Edit Student</h2>

    <div class="student-id">
        <strong>Student ID:</strong>
        {{ $student->student_id }}
    </div>

    @if ($errors->any())
        <div class="error">

            <strong>Please fix the following errors:</strong>

            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>

        </div>
    @endif

    <form action="{{ route('students.update', $student->id) }}" method="POST">

        @csrf
        @method('PUT')

        <div class="form-group">
            <label>Name:</label>

            <input
                type="text"
                name="name"
                value="{{ old('name', $student->name) }}"
                required
                maxlength="255"
            >
        </div>

        <div class="form-group">
            <label>Email:</label>

            <input
                type="email"
                name="email"
                value="{{ old('email', $student->email) }}"
                required
            >
        </div>

        <div class="form-group">
            <label>Phone: <span class="optional">(Optional)</span></label>

            <input
                type="text"
                name="phone"
                value="{{ old('phone', $student->phone) }}"
                maxlength="10"
                placeholder="98XXXXXXXX"
            >
        </div>

        <div class="form-group">
            <label>Date of Birth: <span class="optional">(Optional)</span></label>

            <input
                type="date"
                name="date_of_birth"
                value="{{ old('date_of_birth', $student->date_of_birth) }}"
            >
        </div>

        <div class="form-group">
            <label>Gender: <span class="optional">(Optional)</span></label>

            <select name="gender">
                <option value="">Select Gender</option>

                <option value="Male"
                    {{ old('gender', $student->gender) == 'Male' ? 'selected' : '' }}>
                    Male
                </option>

                <option value="Female"
                    {{ old('gender', $student->gender) == 'Female' ? 'selected' : '' }}>
                    Female
                </option>

                <option value="Other"
                    {{ old('gender', $student->gender) == 'Other' ? 'selected' : '' }}>
                    Other
                </option>
            </select>
        </div>

        <div class="form-group">
            <label>Course:</label>

            <input
                type="text"
                name="course"
                value="{{ old('course', $student->course) }}"
                required
                maxlength="255"
            >
        </div>

        <div class="form-group">
            <label>Semester: <span class="optional">(Optional)</span></label>

            <select name="semester">

                <option value="">Select Semester</option>

                @for ($i = 1; $i <= 8; $i++)
                    <option value="{{ $i }}"
                        {{ old('semester', $student->semester) == $i ? 'selected' : '' }}>
                        Semester {{ $i }}
                    </option>
                @endfor

            </select>
        </div>

        <button type="submit" class="button">
            Update Student
        </button>

    </form>

    <a href="{{ route('students.index') }}" class="back">
        ← Back to Students
    </a>

</div>

</body>
</html>