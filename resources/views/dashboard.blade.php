<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f8;
            margin: 0;
            padding: 40px;
        }

        .container {
            max-width: 1100px;
            margin: auto;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        h1 {
            color: #222;
            margin: 0 0 6px;
            font-size: 30px;
        }

        h2 {
            color: #666;
            margin: 0;
            font-size: 18px;
            font-weight: normal;
        }

        .cards {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
        }

        .card {
            background-color: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
            text-decoration: none;
            display: block;
            transition: 0.2s;
        }

        .card:hover {
            transform: translateY(-4px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.12);
        }

        .card h3 {
            margin: 0 0 12px;
            color: #666;
            font-size: 16px;
        }

        .card p {
            margin: 0;
            font-size: 32px;
            font-weight: bold;
            color: #2563eb;
        }

        .card:nth-child(2) p {
            color: #16a34a;
        }

        .card:nth-child(3) p {
            color: #db2777;
        }

        .card:nth-child(4) p {
            color: #9333ea;
        }

        .card:nth-child(5) p {
            color: #ea580c;
        }

        .quick-actions {
            margin-top: 35px;
        }

        .quick-actions h3 {
            color: #333;
            margin-bottom: 15px;
            font-size: 20px;
        }

        .links {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        .links a {
            display: inline-block;
            color: white;
            padding: 11px 18px;
            border-radius: 6px;
            text-decoration: none;
            transition: 0.2s;
        }

        .dashboard-link {
            background-color: #16a34a;
        }

        .dashboard-link:hover {
            background-color: #15803d;
        }

        .students-link {
            background-color: #2563eb;
        }

        .students-link:hover {
            background-color: #1d4ed8;
        }

        .courses-link {
            background-color: #ea580c;
        }

        .courses-link:hover {
            background-color: #c2410c;
        }

        .add-link {
            background-color: #9333ea;
        }

        .add-link:hover {
            background-color: #7e22ce;
        }

        .home-link {
            background-color: #0e41a8;
        }

        .home-link:hover {
            background-color: #4b5563;
        }

        @media (max-width: 800px) {
            .cards {
                grid-template-columns: repeat(2, 1fr);
            }

            .header {
                display: block;
            }
        }

        @media (max-width: 500px) {
            body {
                padding: 20px;
            }

            h1 {
                font-size: 25px;
            }

            h2 {
                font-size: 16px;
            }

            .cards {
                grid-template-columns: 1fr;
            }

            .card {
                padding: 20px;
            }

            .links {
                flex-direction: column;
            }

            .links a {
                width: 100%;
                text-align: center;
            }
        }
    </style>
</head>

<body>

<div class="container">

    <div class="header">
        <div>
            <h1>Student Management System</h1>
            <h2>Dashboard</h2>
        </div>
    </div>

    <div class="cards">

        <a href="{{ route('students.index') }}" class="card">
            <h3>Total Students</h3>
            <p>{{ $totalStudents }}</p>
        </a>

        <a href="{{ route('students.index', ['gender' => 'Male']) }}" class="card">
            <h3>Male Students</h3>
            <p>{{ $maleStudents }}</p>
        </a>

        <a href="{{ route('students.index', ['gender' => 'Female']) }}" class="card">
            <h3>Female Students</h3>
            <p>{{ $femaleStudents }}</p>
        </a>

        <a href="{{ route('students.index', ['gender' => 'Other']) }}" class="card">
            <h3>Other Students</h3>
            <p>{{ $otherStudents }}</p>
        </a>

        <a href="{{ route('courses.index') }}" class="card">
            <h3>Total Courses</h3>
            <p>{{ $totalCourses }}</p>
        </a>

    </div>

    <div class="quick-actions">

        <h3>Quick Actions</h3>

        <div class="links">

            <a href="{{ route('dashboard') }}" class="dashboard-link">
                Dashboard
            </a>

            <a href="{{ route('students.create') }}" class="add-link">
                + Add Student
            </a>

            <a href="{{ route('students.index') }}" class="students-link">
                View Students
            </a>

            <a href="{{ route('courses.index') }}" class="courses-link">
                View Courses
            </a>

            <a href="{{ url('/') }}" class="home-link">
                Home
            </a>

        </div>

    </div>

</div>

</body>
</html>