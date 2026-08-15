<!DOCTYPE html>
<html>
<head>
    <title>Add Student</title>
</head>
<body>

    <h1>Student Management System</h1>

    <h2>Add Student</h2>

    <form action="{{ route('students.store') }}" method="POST">

        @csrf

        <div>
            <label>Name:</label>
            <input type="text" name="name" value="{{ old('name') }}">
        </div>

        <br>

        <div>
            <label>Email:</label>
            <input type="email" name="email" value="{{ old('email') }}">
        </div>

        <br>

        <div>
            <label>Phone:</label>
            <input type="text" name="phone" value="{{ old('phone') }}">
        </div>

        <br>

        <div>
            <label>Course:</label>
            <input type="text" name="course" value="{{ old('course') }}">
        </div>

        <br>

        <button type="submit">Add Student</button>

    </form>

    <br>

    <a href="{{ route('students.index') }}">Back to Students</a>

</body>
</html>