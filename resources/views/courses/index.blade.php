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

        .search-form {
            display: flex;
            gap: 10px;
            margin-bottom: 30px;
        }

        .search-form input {
            flex: 1;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 14px;
            box-sizing: border-box;
        }

        .search-form button {
            padding: 10px 18px;
            border: none;
            border-radius: 6px;
            background: #007bff;
            color: white;
            cursor: pointer;
        }

        .search-form button:hover {
            background: #0056b3;
        }

        .search-form a {
            display: inline-block;
            padding: 10px 18px;
            background: #6b7280;
            color: white;
            text-decoration: none;
            border-radius: 6px;
        }

        .search-form a:hover {
            background: #4b5563;
        }

        @media (max-width: 600px) {
            .courses-container {
                margin: 20px auto;
                padding: 15px;
            }

            .courses-header {
                flex-direction: column;
                align-items: stretch;
                gap: 15px;
                margin-bottom: 25px;
            }

            .search-form {
                flex-direction: column;
            }

            .search-form input,
            .search-form button,
            .search-form a {
                width: 100%;
                box-sizing: border-box;
                text-align: center;
            }

            .courses-header h1 {
                font-size: 26px;
                text-align: center;
            }

            .dashboard-link {
                text-align: center;
                padding: 10px;
            }

            .course-list {
                grid-template-columns: 1fr;
                gap: 15px;
            }

            .course-card {
                padding: 20px;
            }

            .course-card h2 {
                font-size: 19px;
            }

            .student-count {
                font-size: 26px;
            }

            .view-students {
                width: 100%;
                box-sizing: border-box;
                text-align: center;
            }
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

          <form action="{{ route('courses.index') }}" method="GET" class="search-form">

            <input
                type="text"
                name="search"
                value="{{ $search ?? '' }}"
                placeholder="Search course..."
            >

            <button type="submit">
                Search
            </button>

            @if (!empty($search))
                <a href="{{ route('courses.index') }}">
                    Clear
                </a>
            @endif

        </form>

        <div class="course-list">
            

            @forelse ($courses as $course)

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

            @empty

                <div class="course-card">
                    <h2>No Courses Found</h2>
                    <p>No courses are currently available.</p>
                </div>

            @endforelse

        </div>

    </div>

</body>

</html>