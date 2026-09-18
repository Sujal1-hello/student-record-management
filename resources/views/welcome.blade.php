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

        :root {
            --primary: #2563eb;
            --primary-dark: #1d4ed8;
            --primary-light: #eff6ff;
            --text: #111827;
            --text-light: #6b7280;
            --border: #e5e7eb;
            --background: #f8fafc;
            --white: #ffffff;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: var(--background);
            color: var(--text);
            line-height: 1.6;
        }

        /* =========================
           NAVIGATION
        ========================= */

        .navbar {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            padding: 22px 30px;
            z-index: 10;
        }

        .nav-container {
            max-width: 1150px;
            margin: auto;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 10px;
            text-decoration: none;
            color: var(--text);
            font-size: 17px;
            font-weight: 700;
        }

        .logo-icon {
            width: 40px;
            height: 40px;
            background: var(--primary);
            color: white;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 17px;
            font-weight: 700;
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .nav-link {
            text-decoration: none;
            color: #4b5563;
            font-size: 14px;
            font-weight: 600;
            padding: 9px 14px;
            border-radius: 7px;
            transition: 0.2s ease;
        }

        .nav-link:hover {
            background: #eef2ff;
            color: var(--primary);
        }

        .nav-register {
            background: var(--primary);
            color: white;
        }

        .nav-register:hover {
            background: var(--primary-dark);
            color: white;
        }

        /* =========================
           HERO
        ========================= */

        .hero {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 120px 20px 70px;
            position: relative;
            overflow: hidden;
        }

        .hero::before {
            content: "";
            position: absolute;
            width: 500px;
            height: 500px;
            border-radius: 50%;
            background: #dbeafe;
            top: -280px;
            right: -180px;
            opacity: 0.55;
        }

        .hero::after {
            content: "";
            position: absolute;
            width: 350px;
            height: 350px;
            border-radius: 50%;
            background: #e0e7ff;
            bottom: -220px;
            left: -160px;
            opacity: 0.45;
        }

        .hero-container {
            max-width: 1100px;
            width: 100%;
            text-align: center;
            position: relative;
            z-index: 2;
        }

        /* =========================
           BADGE
        ========================= */

        .badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 8px 15px;
            background: var(--primary-light);
            color: var(--primary);
            border: 1px solid #dbeafe;
            border-radius: 30px;
            font-size: 13px;
            font-weight: 700;
            margin-bottom: 22px;
        }

        .badge-dot {
            width: 7px;
            height: 7px;
            background: #22c55e;
            border-radius: 50%;
        }

        /* =========================
           HERO HEADING
        ========================= */

        h1 {
            max-width: 850px;
            margin: 0 auto 22px;
            font-size: 58px;
            line-height: 1.08;
            letter-spacing: -1.5px;
            color: var(--text);
        }

        h1 span {
            color: var(--primary);
        }

        .description {
            max-width: 680px;
            margin: 0 auto 32px;
            color: var(--text-light);
            font-size: 17px;
            line-height: 1.8;
        }

        /* =========================
           BUTTONS
        ========================= */

        .buttons {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 12px;
            flex-wrap: wrap;
            margin-bottom: 65px;
        }

        .button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 13px 23px;
            border-radius: 8px;
            text-decoration: none;
            font-size: 14px;
            font-weight: 700;
            transition: all 0.2s ease;
        }

        .primary {
            background: var(--primary);
            color: white;
            box-shadow: 0 5px 15px rgba(37, 99, 235, 0.20);
        }

        .primary:hover {
            background: var(--primary-dark);
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(37, 99, 235, 0.25);
        }

        .secondary {
            background: white;
            color: #374151;
            border: 1px solid #d1d5db;
        }

        .secondary:hover {
            background: #f9fafb;
            border-color: #9ca3af;
            transform: translateY(-2px);
        }

        /* =========================
           FEATURES
        ========================= */

        .features {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 18px;
            text-align: left;
        }

        .feature {
            background: rgba(255, 255, 255, 0.96);
            padding: 26px;
            border-radius: 14px;
            border: 1px solid var(--border);
            box-shadow: 0 5px 20px rgba(15, 23, 42, 0.04);
            transition: all 0.25s ease;
        }

        .feature:hover {
            transform: translateY(-5px);
            border-color: #bfdbfe;
            box-shadow: 0 12px 30px rgba(15, 23, 42, 0.08);
        }

        .feature-icon {
            width: 46px;
            height: 46px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: var(--primary-light);
            border-radius: 11px;
            font-size: 20px;
            margin-bottom: 18px;
        }

        .feature h2 {
            font-size: 17px;
            margin-bottom: 9px;
            color: var(--text);
        }

        .feature p {
            color: var(--text-light);
            font-size: 14px;
            line-height: 1.7;
        }

        /* =========================
           SYSTEM INFORMATION
        ========================= */

        .system-info {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-wrap: wrap;
            gap: 25px;
            margin-top: 30px;
            padding: 17px 25px;
            background: white;
            border: 1px solid var(--border);
            border-radius: 12px;
        }

        .info-item {
            display: flex;
            align-items: center;
            gap: 6px;
            color: var(--text-light);
            font-size: 13px;
        }

        .info-item strong {
            color: var(--text);
        }

        .divider {
            width: 1px;
            height: 20px;
            background: var(--border);
        }

        /* =========================
           FOOTER
        ========================= */

        .footer {
            margin-top: 35px;
            color: #9ca3af;
            font-size: 12px;
        }

        /* =========================
           RESPONSIVE
        ========================= */

        @media (max-width: 850px) {

            h1 {
                font-size: 46px;
            }

            .features {
                grid-template-columns: 1fr;
            }

            .feature {
                text-align: center;
            }

            .feature-icon {
                margin-left: auto;
                margin-right: auto;
            }
        }

        @media (max-width: 600px) {

            .navbar {
                padding: 18px 16px;
            }

            .logo {
                font-size: 14px;
            }

            .logo-icon {
                width: 35px;
                height: 35px;
            }

            .nav-link {
                padding: 7px 9px;
                font-size: 12px;
            }

            .hero {
                padding: 105px 16px 50px;
            }

            h1 {
                font-size: 38px;
                letter-spacing: -0.8px;
            }

            .description {
                font-size: 15px;
            }

            .buttons {
                margin-bottom: 45px;
            }

            .button {
                width: 100%;
                max-width: 270px;
            }

            .system-info {
                flex-direction: column;
                gap: 11px;
            }

            .divider {
                display: none;
            }
        }
    </style>
</head>

<body>

    <!-- =========================
         NAVIGATION
    ========================== -->

    <nav class="navbar">

        <div class="nav-container">

            <a href="{{ url('/') }}" class="logo">

                <div class="logo-icon">
                    S
                </div>

                <span>
                    Student Management
                </span>

            </a>

            <div class="nav-links">

                @auth

                    <a href="{{ route('dashboard') }}" class="nav-link">
                        Dashboard
                    </a>

                @else

                    <a href="{{ route('login') }}" class="nav-link">
                        Login
                    </a>

                    <a href="{{ route('register') }}" class="nav-link nav-register">
                        Register
                    </a>

                @endauth

            </div>

        </div>

    </nav>


    <!-- =========================
         HERO SECTION
    ========================== -->

    <section class="hero">

        <div class="hero-container">

            <div class="badge">

                <span class="badge-dot"></span>

                Student Management System

            </div>


            <h1>

                Manage Student Records

                <span>
                    Easily
                </span>

            </h1>


            <p class="description">

                A modern student record management system for organising
                student information, courses, academic records, and
                related details through a simple and efficient interface.

            </p>


            <!-- Buttons -->

            <div class="buttons">

                @auth

                    <a href="{{ route('dashboard') }}" class="button primary">
                        Go to Dashboard →
                    </a>

                @else

                    <a href="{{ route('login') }}" class="button primary">
                        Login →
                    </a>

                    <a href="{{ route('register') }}" class="button secondary">
                        Create Account
                    </a>

                @endauth

            </div>


            <!-- =========================
                 FEATURES
            ========================== -->

            <div class="features">


                <!-- Student Management -->

                <div class="feature">

                    <div class="feature-icon">
                        👨‍🎓
                    </div>

                    <h2>
                        Student Management
                    </h2>

                    <p>
                        Add, view, edit, search, filter, and delete
                        student records efficiently from one place.
                    </p>

                </div>


                <!-- Course Management -->

                <div class="feature">

                    <div class="feature-icon">
                        📚
                    </div>

                    <h2>
                        Course Management
                    </h2>

                    <p>
                        View available courses, student counts,
                        and students enrolled in each course.
                    </p>

                </div>


                <!-- Secure Access -->

                <div class="feature">

                    <div class="feature-icon">
                        🔐
                    </div>

                    <h2>
                        Secure Access
                    </h2>

                    <p>
                        Authentication helps protect student management
                        features and restrict access to authorised users.
                    </p>

                </div>

            </div>


            <!-- =========================
                 SYSTEM INFORMATION
            ========================== -->

            <div class="system-info">

                <div class="info-item">
                    <strong>Laravel</strong>
                    <span>Framework</span>
                </div>

                <div class="divider"></div>

                <div class="info-item">
                    <strong>Blade</strong>
                    <span>Views</span>
                </div>

                <div class="divider"></div>

                <div class="info-item">
                    <strong>MySQL</strong>
                    <span>Database</span>
                </div>

                <div class="divider"></div>

                <div class="info-item">
                    <strong>Responsive</strong>
                    <span>Design</span>
                </div>

            </div>


            <div class="footer">

                Student Management System · Built with Laravel

            </div>

        </div>

    </section>

</body>

</html>