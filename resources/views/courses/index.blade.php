<x-app-layout>


    <div class="courses-container">

        <div class="courses-top">

            <div>
                <h1>Course Overview</h1>
                <p>Browse all available courses and their enrolled students.</p>
            </div>

        </div>

        <form action="{{ route('courses.index') }}" method="GET" class="search-form">

            <div class="search-input-wrapper">
                <svg xmlns="http://www.w3.org/2000/svg"
                     viewBox="0 0 24 24"
                     fill="none"
                     stroke="currentColor"
                     stroke-width="2">
                    <circle cx="11" cy="11" r="7"></circle>
                    <path d="m20 20-4-4"></path>
                </svg>

                <input
                    type="text"
                    name="search"
                    value="{{ $search ?? '' }}"
                    placeholder="Search courses..."
                >
            </div>

            <button type="submit" class="search-button">
                Search
            </button>

            @if (!empty($search))
                <a href="{{ route('courses.index') }}" class="clear-button">
                    Clear
                </a>
            @endif

        </form>

        @if ($courses->count())

            <div class="course-summary">
                <span>
                    {{ $courses->count() }} {{ $courses->count() === 1 ? 'course' : 'courses' }}
                </span>
                <span class="summary-dot">•</span>
                <span>Available courses</span>
            </div>

            <div class="course-list">

                @foreach ($courses as $course)

                    <div class="course-card">

                        <div class="course-card-top">

                            <div class="course-icon">
                                {{ strtoupper(substr($course->course, 0, 1)) }}
                            </div>

                            <span class="course-label">
                                COURSE
                            </span>

                        </div>

                        <h2>{{ $course->course }}</h2>

                        <div class="student-count">
                            {{ $course->student_count }}
                        </div>

                        <p>
                            {{ $course->student_count == 1 ? 'Student enrolled' : 'Students enrolled' }}
                        </p>

                        <a
                            href="{{ route('students.index', ['course' => $course->course]) }}"
                            class="view-students"
                        >
                            View Students
                            <span>→</span>
                        </a>

                    </div>

                @endforeach

            </div>

        @else

            <div class="empty-state">

                <div class="empty-icon">
                    📚
                </div>

                <h2>No Courses Found</h2>

                <p>
                    @if (!empty($search))
                        No courses match your current search.
                    @else
                        No courses are currently available.
                    @endif
                </p>

                @if (!empty($search))
                    <a href="{{ route('courses.index') }}" class="clear-button">
                        Clear Search
                    </a>
                @endif

            </div>

        @endif

    </div>

    <style>

        .courses-page-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
        }

        .courses-page-header h2 {
            margin: 0;
            font-size: 22px;
            font-weight: 700;
            color: #111827;
        }

        .courses-page-header p {
            margin: 4px 0 0;
            font-size: 13px;
            color: #6b7280;
        }

        .header-action {
            display: inline-flex;
            align-items: center;
            padding: 10px 16px;
            background: #2563eb;
            color: white;
            border-radius: 8px;
            text-decoration: none;
            font-size: 13px;
            font-weight: 600;
            transition: 0.2s ease;
        }

        .header-action:hover {
            background: #1d4ed8;
        }

        .courses-container {
            width: min(1200px, calc(100% - 60px));
            margin: 0 auto;
            padding: 40px 0 60px;
        }

        .courses-top {
            margin-bottom: 28px;
        }

        .courses-top h1 {
            margin: 0;
            font-size: 28px;
            font-weight: 700;
            color: #111827;
        }

        .courses-top p {
            margin: 7px 0 0;
            color: #6b7280;
            font-size: 14px;
        }

        .search-form {
            display: flex;
            gap: 10px;
            margin-bottom: 18px;
        }

        .search-input-wrapper {
            position: relative;
            flex: 1;
        }

        .search-input-wrapper svg {
            position: absolute;
            left: 14px;
            top: 50%;
            width: 18px;
            height: 18px;
            transform: translateY(-50%);
            color: #9ca3af;
            pointer-events: none;
        }

        .search-input-wrapper input {
            width: 100%;
            height: 44px;
            box-sizing: border-box;
            padding: 0 14px 0 42px;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            background: #ffffff;
            color: #111827;
            font-size: 14px;
            outline: none;
            transition: 0.2s ease;
        }

        .search-input-wrapper input:focus {
            border-color: #2563eb;
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
        }

        .search-button,
        .clear-button {
            height: 44px;
            padding: 0 20px;
            border: 0;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 600;
            text-decoration: none;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            box-sizing: border-box;
        }

        .search-button {
            background: #2563eb;
            color: white;
        }

        .search-button:hover {
            background: #1d4ed8;
        }

        .clear-button {
            background: #f3f4f6;
            color: #374151;
            border: 1px solid #e5e7eb;
        }

        .clear-button:hover {
            background: #e5e7eb;
        }

        .course-summary {
            display: flex;
            align-items: center;
            gap: 8px;
            margin: 20px 0;
            font-size: 13px;
            color: #6b7280;
        }

        .course-summary span:first-child {
            color: #374151;
            font-weight: 600;
        }

        .summary-dot {
            color: #9ca3af;
        }

        .course-list {
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: 20px;
        }

        .course-card {
            padding: 24px;
            background: #ffffff;
            border: 1px solid #e5e7eb;
            border-radius: 14px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .course-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 22px rgba(0, 0, 0, 0.08);
        }

        .course-card-top {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .course-icon {
            width: 42px;
            height: 42px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 10px;
            background: #eff6ff;
            color: #2563eb;
            font-size: 17px;
            font-weight: 700;
        }

        .course-label {
            font-size: 10px;
            font-weight: 700;
            letter-spacing: 0.08em;
            color: #9ca3af;
        }

        .course-card h2 {
            margin: 0;
            min-height: 25px;
            font-size: 18px;
            font-weight: 700;
            color: #111827;
            word-break: break-word;
        }

        .student-count {
            margin-top: 18px;
            font-size: 30px;
            line-height: 1;
            font-weight: 700;
            color: #2563eb;
        }

        .course-card p {
            margin: 7px 0 20px;
            font-size: 13px;
            color: #6b7280;
        }

        .view-students {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 10px 13px;
            border-radius: 7px;
            background: #eff6ff;
            color: #2563eb;
            text-decoration: none;
            font-size: 13px;
            font-weight: 600;
            transition: 0.2s ease;
        }

        .view-students:hover {
            background: #dbeafe;
        }

        .view-students span {
            font-size: 16px;
        }

        .empty-state {
            padding: 70px 20px;
            text-align: center;
            background: #ffffff;
            border: 1px solid #e5e7eb;
            border-radius: 14px;
        }

        .empty-icon {
            font-size: 40px;
            margin-bottom: 15px;
        }

        .empty-state h2 {
            margin: 0;
            font-size: 20px;
            color: #111827;
        }

        .empty-state p {
            margin: 8px 0 20px;
            color: #6b7280;
            font-size: 14px;
        }

        @media (max-width: 1000px) {
            .course-list {
                grid-template-columns: repeat(3, minmax(0, 1fr));
            }
        }

        @media (max-width: 750px) {
            .courses-container {
                width: min(100% - 32px, 600px);
                padding: 28px 0 40px;
            }

            .course-list {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            .courses-page-header {
                align-items: flex-start;
            }
        }

        @media (max-width: 550px) {
            .courses-page-header {
                flex-direction: column;
                align-items: stretch;
            }

            .header-action {
                justify-content: center;
            }

            .courses-top h1 {
                font-size: 24px;
            }

            .search-form {
                flex-direction: column;
            }

            .search-button,
            .clear-button {
                width: 100%;
            }

            .course-list {
                grid-template-columns: 1fr;
            }
        }

    </style>

</x-app-layout>