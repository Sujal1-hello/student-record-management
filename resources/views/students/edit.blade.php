<!DOCTYPE html>
<html>
<head>
    <title>Edit Student</title>
</head>
<body>

    <h1>Student Management System</h1>

    <h2>Edit Student</h2>
    @if ($errors->any())
    <div>
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

        <div>
            <label>Name:</label>
            <input type="text" name="name" value="{{ old('name', $student->name) }}">
        </div>

        <br>

        <div>
            <label>Email:</label>
            <input type="email" name="email" value="{{ old('email', $student->email) }}">
        </div>

        <br>

        <div>
            <label>Phone:</label>
            <input type="text" name="phone" value="{{ old('phone', $student->phone) }}">
        </div>

        <br>

        <div>
            <label>Course:</label>
            <input type="text" name="course" value="{{ old('course', $student->course) }}">
        </div>

        <br>

        <button type="submit">Update Student</button>

    </form>

    <br>

    <a href="{{ route('students.index') }}">Back to Students</a>

</body>
</html>