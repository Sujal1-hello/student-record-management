<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management System</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f8fafc;
            color: #1f2937;
        }

        .hero {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px 20px;
        }

        .hero-container {
            max-width: 1000px;
            width: 100%;
            text-align: center;
        }

        .badge {
            display: inline-block;
            padding: 8px 16px;
            background: #dbeafe;
            color: #2563eb;
            border-radius: 20px;
            font-size: 14px;
            font-weight: 600;
            margin-bottom: 20px;
        }

        h1 {
            font-size: 52px;
            line-height: 1.1;
            margin-bottom: 20px;
            color: #111827;
        }

        .description {
            max-width: 650px;
            margin: 0 auto 30px;
            color: #6b7280;
            font-size: 18px;
            line-height: 1.7;
        }

        .buttons {
            display: flex;
            justify-content: center;
            gap: 12px;
            flex-wrap: wrap;
            margin-bottom: 60px;
        }

        .button {
            display: inline-block;
            padding: 13px 24px;
            border-radius: 7px;
            text-decoration: none;
            font-size: 15px;
            font-weight: 600;
            transition: 0.2s ease;
        }

        .primary {
            background: #2563eb;
            color: white;
        }

        .primary:hover {
            background: #1d4ed8;
        }

        .secondary {
            background: white;
            color: #374151;
            border: 1px solid #d1d5db;
        }

        .secondary:hover {
            background: #f3f4f6;
        }

        .features {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            text-align: left;
        }

        .feature {
            background: white;
            padding: 25px;
            border-radius: 12px;
            border: 1px solid #e5e7eb;
        }

        .feature h2 {
            font-size: 18px;
            margin-bottom: 10px;
        }

        .feature p {
            color: #6b7280;
            font-size: 14px;
            line-height: 1.6;
        }

        .tech {
            margin-top: 35px;
            color: #6b7280;
            font-size: 14px;
        }

        @media (max-width: 700px) {
            h1 {
                font-size: 38px;
            }

            .description {
                font-size: 16px;
            }

            .features {
                grid-template-columns: 1fr;
            }

            .hero {
                padding: 30px 16px;
            }
        }
    </style>
</head>

<body>

    <section class="hero">
        <div class="hero-container">

            <span class="badge">Student Management System</span>

            <h1>Manage Students Easily</h1>

            <p class="description">
                A modern student record management system for managing
                students, courses, academic information, and records
                through a simple and organized interface.
            </p>

            <div class="buttons">

                @auth
                    <a href="{{ route('dashboard') }}" class="button primary">
                        Go to Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}" class="button primary">
                        Login
                    </a>

                    <a href="{{ route('register') }}" class="button secondary">
                        Create Account
                    </a>
                @endauth

            </div>

            <div class="features">

                <div class="feature">
                    <h2>Student Management</h2>
                    <p>
                        Add, view, edit, search, filter, and delete
                        student records efficiently.
                    </p>
                </div>

                <div class="feature">
                    <h2>Course Management</h2>
                    <p>
                        View available courses, student counts,
                        and students enrolled in each course.
                    </p>
                </div>

                <div class="feature">
                    <h2>Secure Access</h2>
                    <p>
                        Authentication and protected pages keep
                        student management features accessible only
                        to authorized users.
                    </p>
                </div>

            </div>

            <p class="tech">
                Built with Laravel · Blade · Tailwind CSS · MySQL
            </p>

        </div>
    </section>

</body>
</html>