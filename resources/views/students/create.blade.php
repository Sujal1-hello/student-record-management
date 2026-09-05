<!DOCTYPE html>
<html>

<head>
    <title>Add Student</title>

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

        input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 6px;
            box-sizing: border-box;
        }

        input:focus {
            outline: none;
            border-color: #2563eb;
        }

        .button {
            background-color: #2563eb;
            color: white;
            border: none;
            padding: 11px 18px;
            border-radius: 6px;
            cursor: pointer;
            font-size: 15px;
        }

        .button:hover {
            background-color: #1d4ed8;
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

        <h2>Add Student</h2>

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

        <form action="{{ route('students.store') }}" method="POST">

            @csrf

            <div class="form-group">
                <label>Name:</label>

                <input type="text" name="name" value="{{ old('name') }}" required maxlength="255">
            </div>

            <div class="form-group">
                <label>Email:</label>

                <input type="email" name="email" value="{{ old('email') }}" required>
            </div>

            <div class="form-group">
                <label>Phone:</label>

                <input type="text" name="phone" value="{{ old('phone') }}" maxlength="20">
            </div>

            <div class="form-group">
                <label>Date of birth: <span class="optional">(Optional)</span></label>

                <input type="date" name="date_of_birth" value="{{ old('date_of_birth') }}">
            </div>

            <div class="form-group">
                <label>Gender: <span class="optional">(Optional)</span></label>

                <select name="gender">
                    optiona value="">Select Gender</option>

                    <option value="Male" {{ old('gender') }}=='Male' ? 'selected' : '' }}>
                        Male
                    </option>

                    <option value="Female" {{ old('gender') }}=='Female' ? 'selected' : '' }}>
                        Female
                    </option>

                    <option value="Other" {{ old('gender') }}=='Other' ? 'selected' : '' }}>
                        Other
                    </option>

                </select>
            </div>

            <div class="form-group">
                <label>Course:</label>

                <input type="text" name="course" value="{{ old('course') }}" required maxlength="255">
            </div>
            
            <div class="form-group">
                <label>Semester: <span class="optional">(Optional)</span></label>

                <select name="semester">
                    @for ($i = 1; $i <= 8; $i++)
                        <option value="{{ $i }}"
                            {{ old('semester') == $i ? 'selected' : '' }}>
                            Semester {{ $i }}
                        </option>
                    @endfor
                </select>

            <button type="submit" class="button">
                Add Student
            </button>

        </form>

        <a href="{{ route('students.index') }}" class="back">
            ← Back to Students
        </a>

    </div>

</body>

</html>