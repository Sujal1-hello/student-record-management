<!DOCTYPE html>
<html>

<head>
    <title>Courses</title>

    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f5f7fb;
            color: #333;
        }

        .courses-container {
            max-width: 1000px;
            margin: 50px auto;
            padding: 20px;
        }

        .courses-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .courses-header h1 {
            margin: 0;
            font-size: 30px;
        }

        .dashboard-link {
            text-decoration: none;
            background: #007bff;
            color: white;
            padding: 10px 18px;
            border-radius: 6px;
        }

        .dashboard-link:hover {
            background: #0056b3;
        }

        .course-list {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 20px;
        }

        .course-card {
            background: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
        }

        .course-card h2 {
            margin: 0 0 10px;
            font-size: 20px;
        }

        .student-count {
            font-size: 28px;
            font-weight: bold;
            color: #007bff;
            margin-bottom: 5px;
        }

        .course-card p {
            margin: 0;
            color: #666;
            font-size: 15px;
        }

        .view-students {
            display: inline-block;
            margin-top: 15px;
            padding: 8px 14px;
            background: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-size: 14px;
        }

        .view-students:hover {
            background: #0056b3;
        }
    </style>
</head>

<body>

    <div class="courses-container">

        <div class="courses-header">
            <h1>Courses</h1>

            <a href="{{ route('dashboard') }}" class="dashboard-link">
                Dashboard
            </a>
        </div>

        <div class="course-list">

            @foreach ($courses as $course)

                <div class="course-card">

                    <h2>{{ $course->course }}</h2>

                    <div class="student-count">
                        {{ $course->student_count }}
                    </div>

                    <p>Students enrolled</p>

                    <a href="{{ route('students.index', ['course' => $course->course]) }}" class="view-students">
                        View Students
                    </a>

                </div>

            @endforeach

        </div>

    </div>

</body>

</html>