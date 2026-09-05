<!DOCTYPE html>
<html>

<head>
    <title>Dashboard</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f8;
            margin: 0;
            padding: 40px;
        }

        .container {
            max-width: 1000px;
            margin: auto;
        }

        h1 {
            color: #222;
            margin-bottom: 5px;
        }

        h2 {
            color: #555;
            margin-bottom: 30px;
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
        }

        .card h3 {
            margin: 0 0 10px;
            color: #666;
            font-size: 16px;
        }

        .card p {
            margin: 0;
            font-size: 32px;
            font-weight: bold;
            color: #2563eb;
        }

        .links {
            margin-top: 30px;
        }

        .links a {
            display: inline-block;
            color: white;
            padding: 10px 16px;
            border-radius: 6px;
            text-decoration: none;
            margin-right: 10px;
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

        .links a:hover {
            background-color: #1d4ed8;
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
        }

        @media (max-width: 500px) {
            body {
                padding: 20px;
            }

            .cards {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>

    <div class="container">

        <h1>Student Management System</h1>

        <h2>Dashboard</h2>

        <div class="cards">

            <div class="card">
                <h3>Total Students</h3>
                <p>{{ $totalStudents }}</p>
            </div>

            <div class="card">
                <h3>Male Students</h3>
                <p>{{ $maleStudents }}</p>
            </div>

            <div class="card">
                <h3>Female Students</h3>
                <p>{{ $femaleStudents }}</p>
            </div>

            <div class="card">
                <h3>Other Students</h3>
                <p>{{ $otherStudents }}</p>
            </div>

            <div class="card">
                <h3>Total Courses</h3>
                <p>{{ $totalCourses }}</p>
            </div>

        </div>

        <div class="links">

            <a href="{{ route('dashboard') }}" class="dashboard-link">
                Dashboard
            </a>

            <a href="{{ route('students.index') }}" class="students-link">
                View Students
            </a>

            <a href="{{ url('/') }}" class="home-link">
                Home
            </a>

        </div>


    </div>

</body>

</html>