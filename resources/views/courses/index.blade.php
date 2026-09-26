<x-app-layout>

    <div class="courses-page">

        <div class="courses-container">

            {{-- Page Header --}}
            <div class="page-header">
                <div>
                    <div class="page-title-row">
                        <div class="title-icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20" />
                                <path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2Z" />
                            </svg>
                        </div>

                        <div>
                            <h1>Courses</h1>
                            <p>Manage courses and view enrolled students.</p>
                        </div>
                    </div>
                </div>
            </div>


            {{-- Search Section --}}
            <div class="search-card">

                <form action="{{ route('courses.index') }}" method="GET" class="search-form">

                    <div class="search-box">

                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="11" cy="11" r="7"></circle>
                            <path d="m20 20-4-4"></path>
                        </svg>

                        <input type="text" name="search" value="{{ $search ?? '' }}" placeholder="Search courses...">

                    </div>

                    <button type="submit" class="search-button">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="11" cy="11" r="7"></circle>
                            <path d="m20 20-4-4"></path>
                        </svg>
                        Search
                    </button>

                    @if (!empty($search))
                        <a href="{{ route('courses.index') }}" class="clear-button">
                            Clear
                        </a>
                    @endif

                </form>

            </div>


            {{-- Results Header --}}
            @if ($courses->count())

                <div class="results-header">

                    <div>
                        <h2>Available Courses</h2>

                        <p>
                            Showing
                            <strong>{{ $courses->count() }}</strong>
                            {{ $courses->count() === 1 ? 'course' : 'courses' }}
                        </p>
                    </div>

                    <div class="course-count">
                        <span>{{ $courses->count() }}</span>
                        <small>Courses</small>
                    </div>

                </div>


                {{-- Course Grid --}}
                <div class="course-grid">

                    @foreach ($courses as $course)

                        <div class="course-card">

                            {{-- Card Top --}}
                            <div class="card-top">

                                <div class="course-icon">
                                    {{ strtoupper(substr($course->course, 0, 1)) }}
                                </div>

                                <span class="course-badge">
                                    COURSE
                                </span>

                            </div>


                            {{-- Course Information --}}
                            <div class="course-content">

                                <h3>
                                    {{ $course->course }}
                                </h3>

                                <div class="enrollment">

                                    <div class="student-icon">

                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"
                                            stroke-linecap="round" stroke-linejoin="round">

                                            <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2" />
                                            <circle cx="9" cy="7" r="4" />
                                            <path d="M22 21v-2a4 4 0 0 0-3-3.87" />
                                            <path d="M16 3.13a4 4 0 0 1 0 7.75" />

                                        </svg>

                                    </div>

                                    <div>
                                        <strong>{{ $course->student_count }}</strong>

                                        <span>
                                            {{ $course->student_count == 1 ? 'Student enrolled' : 'Students enrolled' }}
                                        </span>
                                    </div>

                                </div>

                            </div>


                            {{-- Card Footer --}}
                            <div class="card-footer">

                                <a href="{{ route('students.index', ['course' => $course->course]) }}" class="view-button">
                                    <span>View Students</span>

                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round">

                                        <path d="M5 12h14" />
                                        <path d="m13 6 6 6-6 6" />

                                    </svg>

                                </a>

                            </div>

                        </div>

                    @endforeach

                </div>


            @else

                {{-- Empty State --}}
                <div class="empty-state">

                    <div class="empty-icon">

                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                            stroke-linejoin="round">

                            <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20" />
                            <path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2Z" />

                        </svg>

                    </div>

                    <h2>No Courses Found</h2>

                    <p>
                        @if (!empty($search))
                            We couldn't find any courses matching
                            "<strong>{{ $search }}</strong>".
                        @else
                            There are currently no courses available.
                        @endif
                    </p>

                    @if (!empty($search))

                        <a href="{{ route('courses.index') }}" class="empty-button">
                            Clear Search
                        </a>

                    @endif

                </div>

            @endif

        </div>

    </div>


    <style>
        /* =========================================================
           COURSES PAGE
        ========================================================= */

        .courses-page {
            min-height: calc(100vh - 64px);
            background: #f8fafc;
            color: #0f172a;
        }


        .courses-container {
            width: min(1250px, calc(100% - 48px));
            margin: 0 auto;
            padding: 42px 0 70px;
        }


        /* =========================================================
           PAGE HEADER
        ========================================================= */

        .page-header {
            margin-bottom: 28px;
        }


        .page-title-row {
            display: flex;
            align-items: center;
            gap: 15px;
        }


        .title-icon {
            width: 48px;
            height: 48px;

            display: flex;
            align-items: center;
            justify-content: center;

            background: #eff6ff;
            color: #2563eb;

            border: 1px solid #dbeafe;
            border-radius: 12px;

            flex-shrink: 0;
        }


        .title-icon svg {
            width: 24px;
            height: 24px;
        }


        .page-header h1 {
            margin: 0;

            font-size: 28px;
            line-height: 1.2;
            font-weight: 750;

            letter-spacing: -0.025em;
            color: #0f172a;
        }


        .page-header p {
            margin: 6px 0 0;

            font-size: 14px;
            line-height: 1.5;

            color: #64748b;
        }


        /* =========================================================
           SEARCH
        ========================================================= */

        .search-card {
            padding: 18px;

            background: #ffffff;

            border: 1px solid #e2e8f0;
            border-radius: 14px;

            box-shadow:
                0 1px 2px rgba(15, 23, 42, 0.03),
                0 4px 12px rgba(15, 23, 42, 0.03);

            margin-bottom: 30px;
        }


        .search-form {
            display: flex;
            align-items: center;
            gap: 10px;
        }


        .search-box {
            position: relative;
            flex: 1;
        }


        .search-box svg {
            position: absolute;

            left: 15px;
            top: 50%;

            width: 18px;
            height: 18px;

            transform: translateY(-50%);

            color: #94a3b8;

            pointer-events: none;
        }


        .search-box input {
            width: 100%;
            height: 46px;

            box-sizing: border-box;

            padding: 0 15px 0 44px;

            background: #f8fafc;

            border: 1px solid #e2e8f0;
            border-radius: 9px;

            color: #0f172a;

            font-size: 14px;

            outline: none;

            transition:
                border-color 0.2s ease,
                box-shadow 0.2s ease,
                background 0.2s ease;
        }


        .search-box input::placeholder {
            color: #94a3b8;
        }


        .search-box input:hover {
            background: #ffffff;
            border-color: #cbd5e1;
        }


        .search-box input:focus {
            background: #ffffff;
            border-color: #2563eb;

            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.10);
        }


        .search-button,
        .clear-button {
            height: 46px;

            padding: 0 18px;

            border-radius: 9px;

            font-size: 13px;
            font-weight: 650;

            display: inline-flex;
            align-items: center;
            justify-content: center;

            gap: 8px;

            cursor: pointer;

            text-decoration: none;

            transition:
                background 0.2s ease,
                border-color 0.2s ease,
                transform 0.15s ease;
        }


        .search-button {
            border: 1px solid #2563eb;

            background: #2563eb;
            color: #ffffff;
        }


        .search-button svg {
            width: 16px;
            height: 16px;
        }


        .search-button:hover {
            background: #1d4ed8;
            border-color: #1d4ed8;
        }


        .search-button:active,
        .clear-button:active {
            transform: translateY(1px);
        }


        .clear-button {
            border: 1px solid #e2e8f0;

            background: #ffffff;
            color: #475569;
        }


        .clear-button:hover {
            background: #f8fafc;
            border-color: #cbd5e1;
        }


        /* =========================================================
           RESULTS HEADER
        ========================================================= */

        .results-header {
            display: flex;
            align-items: center;
            justify-content: space-between;

            margin-bottom: 18px;
        }


        .results-header h2 {
            margin: 0;

            font-size: 17px;
            font-weight: 700;

            color: #0f172a;
        }


        .results-header p {
            margin: 4px 0 0;

            font-size: 13px;
            color: #64748b;
        }


        .results-header p strong {
            color: #334155;
        }


        .course-count {
            display: flex;
            align-items: center;
            gap: 8px;

            padding: 7px 11px;

            background: #ffffff;

            border: 1px solid #e2e8f0;
            border-radius: 8px;

            color: #475569;
        }


        .course-count span {
            font-size: 13px;
            font-weight: 700;

            color: #2563eb;
        }


        .course-count small {
            font-size: 11px;
            font-weight: 600;

            color: #64748b;
        }


        /* =========================================================
           COURSE GRID
        ========================================================= */

        .course-grid {
            display: grid;

            grid-template-columns:
                repeat(4, minmax(0, 1fr));

            gap: 18px;
        }


        /* =========================================================
           COURSE CARD
        ========================================================= */

        .course-card {
            display: flex;
            flex-direction: column;

            min-height: 245px;

            background: #ffffff;

            border: 1px solid #e2e8f0;
            border-radius: 14px;

            overflow: hidden;

            box-shadow:
                0 1px 2px rgba(15, 23, 42, 0.03);

            transition:
                transform 0.2s ease,
                border-color 0.2s ease,
                box-shadow 0.2s ease;
        }


        .course-card:hover {
            transform: translateY(-3px);

            border-color: #cbd5e1;

            box-shadow:
                0 10px 25px rgba(15, 23, 42, 0.08);
        }


        .card-top {
            display: flex;
            align-items: center;
            justify-content: space-between;

            padding: 20px 20px 0;
        }


        .course-icon {
            width: 44px;
            height: 44px;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 11px;

            background: #eff6ff;
            color: #2563eb;

            border: 1px solid #dbeafe;

            font-size: 16px;
            font-weight: 750;
        }


        .course-badge {
            padding: 5px 8px;

            background: #f8fafc;

            border: 1px solid #e2e8f0;
            border-radius: 6px;

            color: #64748b;

            font-size: 9px;
            font-weight: 750;

            letter-spacing: 0.08em;
        }


        .course-content {
            flex: 1;

            padding: 20px;
        }


        .course-content h3 {
            margin: 0;

            min-height: 46px;

            font-size: 17px;
            line-height: 1.4;

            font-weight: 700;

            color: #0f172a;

            word-break: break-word;
        }


        /* =========================================================
           ENROLLMENT
        ========================================================= */

        .enrollment {
            display: flex;
            align-items: center;

            gap: 11px;

            margin-top: 20px;
        }


        .student-icon {
            width: 36px;
            height: 36px;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 9px;

            background: #f8fafc;

            border: 1px solid #e2e8f0;

            color: #64748b;
        }


        .student-icon svg {
            width: 18px;
            height: 18px;
        }


        .enrollment div:last-child {
            display: flex;
            flex-direction: column;
            gap: 2px;
        }


        .enrollment strong {
            font-size: 20px;
            line-height: 1;

            font-weight: 750;

            color: #0f172a;
        }


        .enrollment span {
            font-size: 11px;
            color: #64748b;
        }


        /* =========================================================
           CARD FOOTER
        ========================================================= */

        .card-footer {
            padding: 0 20px 20px;
        }


        .view-button {
            display: flex;
            align-items: center;
            justify-content: space-between;

            width: 100%;

            box-sizing: border-box;

            padding: 11px 13px;

            background: #f8fafc;

            border: 1px solid #e2e8f0;
            border-radius: 8px;

            color: #334155;

            font-size: 12px;
            font-weight: 650;

            text-decoration: none;

            transition:
                background 0.2s ease,
                border-color 0.2s ease,
                color 0.2s ease;
        }


        .view-button svg {
            width: 16px;
            height: 16px;

            transition: transform 0.2s ease;
        }


        .view-button:hover {
            background: #eff6ff;

            border-color: #bfdbfe;

            color: #2563eb;
        }


        .view-button:hover svg {
            transform: translateX(3px);
        }


        /* =========================================================
           EMPTY STATE
        ========================================================= */

        .empty-state {
            padding: 75px 25px;

            text-align: center;

            background: #ffffff;

            border: 1px solid #e2e8f0;
            border-radius: 14px;

            box-shadow:
                0 1px 2px rgba(15, 23, 42, 0.03);
        }


        .empty-icon {
            width: 64px;
            height: 64px;

            margin: 0 auto 18px;

            display: flex;
            align-items: center;
            justify-content: center;

            background: #f8fafc;

            border: 1px solid #e2e8f0;
            border-radius: 14px;

            color: #94a3b8;
        }


        .empty-icon svg {
            width: 30px;
            height: 30px;
        }


        .empty-state h2 {
            margin: 0;

            font-size: 19px;
            font-weight: 700;

            color: #0f172a;
        }


        .empty-state p {
            max-width: 430px;

            margin: 8px auto 20px;

            font-size: 13px;
            line-height: 1.6;

            color: #64748b;
        }


        .empty-button {
            display: inline-flex;
            align-items: center;
            justify-content: center;

            height: 40px;

            padding: 0 16px;

            background: #2563eb;
            color: #ffffff;

            border-radius: 8px;

            font-size: 12px;
            font-weight: 650;

            text-decoration: none;

            transition: background 0.2s ease;
        }


        .empty-button:hover {
            background: #1d4ed8;
        }


        /* =========================================================
           TABLET
        ========================================================= */

        @media (max-width: 1100px) {

            .course-grid {
                grid-template-columns:
                    repeat(3, minmax(0, 1fr));
            }

        }


        /* =========================================================
           SMALL TABLET
        ========================================================= */

        @media (max-width: 800px) {

            .courses-container {
                width: min(100% - 32px, 700px);

                padding-top: 30px;
            }


            .course-grid {
                grid-template-columns:
                    repeat(2, minmax(0, 1fr));
            }

        }


        /* =========================================================
           MOBILE
        ========================================================= */

        @media (max-width: 560px) {

            .courses-container {
                width: calc(100% - 24px);

                padding: 24px 0 45px;
            }


            .page-header h1 {
                font-size: 24px;
            }


            .title-icon {
                width: 43px;
                height: 43px;
            }


            .title-icon svg {
                width: 21px;
                height: 21px;
            }


            .search-card {
                padding: 12px;
            }


            .search-form {
                flex-direction: column;
                align-items: stretch;
            }


            .search-button,
            .clear-button {
                width: 100%;
            }


            .results-header {
                align-items: flex-start;
            }


            .course-count {
                display: none;
            }


            .course-grid {
                grid-template-columns: 1fr;
            }


            .course-card {
                min-height: 0;
            }

        }


        /* =========================================================
           VERY SMALL MOBILE
        ========================================================= */

        @media (max-width: 380px) {

            .page-title-row {
                align-items: flex-start;
            }


            .page-header h1 {
                font-size: 22px;
            }


            .page-header p {
                font-size: 13px;
            }

        }
    </style>

</x-app-layout>