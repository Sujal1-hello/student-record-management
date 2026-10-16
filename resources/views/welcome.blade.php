
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A simple, secure, and efficient student record management system.">
    <title>Student Management System</title>

    <style>
        :root {
            --primary: #315ee8;
            --primary-dark: #2449c6;
            --primary-soft: #edf2ff;
            --ink: #172033;
            --muted: #65718a;
            --line: #e5eaf3;
            --page: #f7f9fd;
            --success: #15966a;
            --shadow: 0 18px 55px rgba(28, 48, 94, 0.08);
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            min-height: 100vh;
            color: var(--ink);
            background:
                radial-gradient(circle at 88% 10%, rgba(207, 221, 255, 0.65), transparent 26rem),
                radial-gradient(circle at 5% 80%, rgba(225, 234, 255, 0.55), transparent 25rem),
                var(--page);
            font-family: Inter, Arial, Helvetica, sans-serif;
            line-height: 1.6;
            -webkit-font-smoothing: antialiased;
        }

        a {
            color: inherit;
        }

        .navbar {
            position: relative;
            z-index: 2;
            width: 100%;
            border-bottom: 1px solid var(--line);
            background: rgba(255, 255, 255, 0.9);
        }

        .nav-container {
            width: min(1160px, calc(100% - 48px));
            min-height: 82px;
            margin: 0 auto;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 24px;
        }

        .logo {
            display: inline-flex;
            align-items: center;
            gap: 12px;
            text-decoration: none;
            font-size: 16px;
            font-weight: 800;
            letter-spacing: -0.35px;
        }

        .logo-icon {
            display: grid;
            width: 43px;
            height: 43px;
            place-items: center;
            border-radius: 14px;
            color: #fff;
            background: linear-gradient(145deg, #4776ff, #2449c6);
            box-shadow: 0 8px 18px rgba(49, 94, 232, 0.24);
            font-size: 19px;
        }

        .logo-copy {
            display: grid;
            line-height: 1.25;
        }

        .logo-copy small {
            margin-top: 4px;
            color: var(--muted);
            font-size: 11px;
            font-weight: 600;
            letter-spacing: 0.7px;
            text-transform: uppercase;
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .nav-link {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-height: 42px;
            padding: 0 16px;
            border: 1px solid transparent;
            border-radius: 10px;
            color: #47536b;
            text-decoration: none;
            font-size: 14px;
            font-weight: 700;
            transition: 0.2s ease;
        }

        .nav-link:hover {
            color: var(--primary);
            background: var(--primary-soft);
        }

        .nav-link.register,
        .button.primary {
            color: #fff;
            background: var(--primary);
            box-shadow: 0 8px 18px rgba(49, 94, 232, 0.18);
        }

        .nav-link.register:hover,
        .button.primary:hover {
            background: var(--primary-dark);
            color: #fff;
            transform: translateY(-2px);
        }

        .hero {
            width: min(1160px, calc(100% - 48px));
            margin: 0 auto;
            padding: 88px 0 56px;
        }

        .hero-content {
            max-width: 850px;
            margin: 0 auto;
            text-align: center;
        }

        .eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 9px;
            padding: 8px 13px;
            margin-bottom: 25px;
            border: 1px solid #dce5ff;
            border-radius: 999px;
            background: rgba(255, 255, 255, 0.8);
            color: var(--primary);
            font-size: 12px;
            font-weight: 800;
            letter-spacing: 0.55px;
            text-transform: uppercase;
        }

        .eyebrow-dot {
            width: 7px;
            height: 7px;
            border-radius: 50%;
            background: var(--success);
            box-shadow: 0 0 0 4px #dff7ed;
        }

        h1 {
            max-width: 820px;
            margin: 0 auto 22px;
            font-size: clamp(2.55rem, 5.6vw, 4.55rem);
            font-weight: 850;
            line-height: 1.08;
            letter-spacing: -0.065em;
        }

        h1 span {
            color: var(--primary);
            background: linear-gradient(100deg, #315ee8, #6c82f7);
            background-clip: text;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .description {
            max-width: 680px;
            margin: 0 auto;
            color: var(--muted);
            font-size: clamp(15px, 1.8vw, 18px);
            line-height: 1.85;
        }

        .actions {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-wrap: wrap;
            gap: 13px;
            margin: 32px 0 58px;
        }

        .button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            min-height: 51px;
            padding: 0 22px;
            border: 1px solid var(--line);
            border-radius: 12px;
            text-decoration: none;
            font-size: 14px;
            font-weight: 800;
            transition: 0.2s ease;
        }

        .button.secondary {
            background: #fff;
            color: #34415a;
            box-shadow: 0 5px 15px rgba(28, 48, 94, 0.04);
        }

        .button.secondary:hover {
            border-color: #c8d5fb;
            background: #fdfdff;
            transform: translateY(-2px);
        }

        .feature-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 18px;
            text-align: left;
        }

        .feature {
            min-height: 220px;
            padding: 27px;
            border: 1px solid var(--line);
            border-radius: 19px;
            background: rgba(255, 255, 255, 0.92);
            box-shadow: var(--shadow);
            transition: transform 0.25s ease, border-color 0.25s ease, box-shadow 0.25s ease;
        }

        .feature:hover {
            transform: translateY(-5px);
            border-color: #cbd8ff;
            box-shadow: 0 22px 48px rgba(28, 48, 94, 0.12);
        }

        .feature-icon {
            display: grid;
            width: 49px;
            height: 49px;
            place-items: center;
            margin-bottom: 21px;
            border-radius: 15px;
            background: var(--primary-soft);
            font-size: 23px;
        }

        .feature h2 {
            margin-bottom: 9px;
            font-size: 17px;
            letter-spacing: -0.25px;
        }

        .feature p {
            color: var(--muted);
            font-size: 14px;
            line-height: 1.8;
        }

        .system-info {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-wrap: wrap;
            gap: 24px;
            margin-top: 25px;
            padding: 19px 24px;
            border: 1px solid var(--line);
            border-radius: 16px;
            background: rgba(255, 255, 255, 0.85);
        }

        .info-item {
            display: flex;
            align-items: center;
            gap: 7px;
            color: var(--muted);
            font-size: 13px;
        }

        .info-item strong {
            color: var(--ink);
            font-weight: 800;
        }

        .info-separator {
            width: 1px;
            height: 20px;
            background: var(--line);
        }

        .footer {
            padding: 26px 12px 0;
            color: #8791a5;
            text-align: center;
            font-size: 12px;
        }

        a:focus-visible {
            outline: 3px solid #9bb3ff;
            outline-offset: 3px;
        }

        @media (max-width: 760px) {
            .hero {
                padding-top: 65px;
            }

            .feature-grid {
                grid-template-columns: 1fr;
            }

            .feature {
                min-height: auto;
            }
        }

        @media (max-width: 520px) {
            .nav-container {
                width: calc(100% - 30px);
                min-height: 72px;
                gap: 10px;
            }

            .logo {
                gap: 8px;
                font-size: 14px;
            }

            .logo-icon {
                width: 38px;
                height: 38px;
                border-radius: 12px;
            }

            .logo-copy small {
                font-size: 9px;
                letter-spacing: 0.4px;
            }

            .nav-links {
                gap: 4px;
            }

            .nav-link {
                min-height: 38px;
                padding: 0 10px;
                font-size: 12px;
            }

            .hero {
                width: calc(100% - 30px);
                padding-top: 54px;
            }

            .eyebrow {
                margin-bottom: 20px;
                font-size: 10px;
            }

            .actions {
                flex-direction: column;
                margin: 27px 0 42px;
            }

            .button {
                width: 100%;
                max-width: 300px;
            }

            .system-info {
                gap: 12px;
                padding: 17px;
            }

            .info-separator {
                display: none;
            }
        }

        @media (prefers-reduced-motion: reduce) {
            *,
            *::before,
            *::after {
                scroll-behavior: auto !important;
                transition: none !important;
            }
        }
    </style>
</head>

<body>
    <nav class="navbar" aria-label="Main navigation">
        <div class="nav-container">
            <a href="{{ url('/') }}" class="logo" aria-label="Student Management System home">
                <span class="logo-icon" aria-hidden="true">S</span>
                <span class="logo-copy">
                    Student Management
                    <small>Record Management System</small>
                </span>
            </a>

            <div class="nav-links">
                @auth
                    <a href="{{ route('dashboard') }}" class="nav-link">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="nav-link">Log in</a>
                    <a href="{{ route('register') }}" class="nav-link register">
                        Get started <span aria-hidden="true">→</span>
                    </a>
                @endauth
            </div>
        </div>
    </nav>

    <main class="hero">
        <div class="hero-content">
            <div class="eyebrow">
                <span class="eyebrow-dot" aria-hidden="true"></span>
                Simple. Organised. Efficient.
            </div>

            <h1>
                Manage student records
                <span>with confidence.</span>
            </h1>

            <p class="description">
                Keep student information, course details, and academic records
                organised in one convenient place. Spend less time managing
                paperwork and more time focusing on what matters.
            </p>

            <div class="actions">
                @auth
                    <a href="{{ route('dashboard') }}" class="button primary">
                        Open dashboard <span aria-hidden="true">→</span>
                    </a>
                @else
                    <a href="{{ route('register') }}" class="button primary">
                        Create an account <span aria-hidden="true">→</span>
                    </a>
                    <a href="{{ route('login') }}" class="button secondary">
                        Log in to your account
                    </a>
                @endauth
            </div>
        </div>

        <section class="feature-grid" aria-label="Key features">
            <article class="feature">
                <div class="feature-icon" aria-hidden="true">🎓</div>
                <h2>Student Records</h2>
                <p>
                    Create, view, update, search, filter, and manage student
                    information through a clear, organised interface.
                </p>
            </article>

            <article class="feature">
                <div class="feature-icon" aria-hidden="true">📚</div>
                <h2>Course Overview</h2>
                <p>
                    Explore available courses and review enrolment information
                    to make academic records easier to navigate.
                </p>
            </article>

            <article class="feature">
                <div class="feature-icon" aria-hidden="true">🔐</div>
                <h2>Account Security</h2>
                <p>
                    Authentication and protected routes help ensure that
                    management features are available to authorised users.
                </p>
            </article>
        </section>

        <section class="system-info" aria-label="Technology information">
            <div class="info-item">
                <strong>Laravel</strong>
                <span>Framework</span>
            </div>

            <span class="info-separator" aria-hidden="true"></span>

            <div class="info-item">
                <strong>Blade</strong>
                <span>Templating</span>
            </div>

            <span class="info-separator" aria-hidden="true"></span>

            <div class="info-item">
                <strong>MySQL</strong>
                <span>Database</span>
            </div>

            <span class="info-separator" aria-hidden="true"></span>

            <div class="info-item">
                <strong>Responsive</strong>
                <span>Layout</span>
            </div>
        </section>

        <footer class="footer">
            Student Record Management System
            <span aria-hidden="true">·</span>
            Built with Laravel
        </footer>
    </main>
</body>
</html>
