<x-app-layout>

    <div class="courses-page">

        <div class="courses-container">

            {{-- =========================================
                 PAGE HEADER
            ========================================== --}}
            <div class="page-header">

                <div class="header-content">

                    <div class="title-icon">
                        <svg viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="1.8"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20" />
                            <path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2Z" />
                        </svg>
                    </div>

                    <div>
                        <span class="page-label">ACADEMIC</span>
                        <h1>Courses</h1>
                        <p>Browse courses and view enrolled students.</p>
                    </div>

                </div>

                @if ($courses->count())
                    <div class="header-stat">
                        <span class="stat-number">{{ $courses->count() }}</span>
                        <span class="stat-label">
                            {{ $courses->count() === 1 ? 'Course' : 'Courses' }}
                        </span>
                    </div>
                @endif

            </div>


            {{-- =========================================
                 SEARCH
            ========================================== --}}
            <div class="search-card">

                <div class="search-heading">
                    <div class="search-heading-icon">
                        <svg viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="1.8"
                            stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="11" cy="11" r="7"></circle>
                            <path d="m20 20-4-4"></path>
                        </svg>
                    </div>

                    <div>
                        <h2>Find a course</h2>
                        <p>Search by course name to quickly find what you need.</p>
                    </div>
                </div>

                <form action="{{ route('courses.index') }}"
                    method="GET"
                    class="search-form">

                    <div class="search-box">

                        <svg viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="11" cy="11" r="7"></circle>
                            <path d="m20 20-4-4"></path>
                        </svg>

                        <input
                            type="text"
                            name="search"
                            value="{{ $search ?? '' }}"
                            placeholder="Search course name..."
                            autocomplete="off"
                        >

                    </div>

                    <button type="submit" class="search-button">

                        <svg viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="11" cy="11" r="7"></circle>
                            <path d="m20 20-4-4"></path>
                        </svg>

                        <span>Search</span>

                    </button>

                    @if (!empty($search))

                        <a href="{{ route('courses.index') }}"
                            class="clear-button">

                            <svg viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2"
                                stroke-linecap="round"
                                stroke-linejoin="round">
                                <path d="M18 6 6 18"></path>
                                <path d="m6 6 12 12"></path>
                            </svg>

                            Clear

                        </a>

                    @endif

                </form>

            </div>


            {{-- =========================================
                 COURSE RESULTS
            ========================================== --}}
            @if ($courses->count())

                <div class="results-header">

                    <div>
                        <span class="section-label">COURSE DIRECTORY</span>

                        <h2>Available Courses</h2>

                        <p>
                            Showing
                            <strong>{{ $courses->count() }}</strong>
                            {{ $courses->count() === 1 ? 'course' : 'courses' }}
                            currently available.
                        </p>
                    </div>

                </div>


                {{-- =========================================
                     COURSE GRID
                ========================================== --}}
                <div class="course-grid">

                    @foreach ($courses as $course)

                        <div class="course-card">

                            {{-- Decorative top --}}
                            <div class="card-decoration"></div>

                            <div class="card-content">

                                {{-- Card Header --}}
                                <div class="card-top">

                                    <div class="course-icon">
                                        {{ strtoupper(substr($course->course, 0, 1)) }}
                                    </div>

                                    <span class="course-badge">
                                        COURSE
                                    </span>

                                </div>


                                {{-- Course Name --}}
                                <div class="course-info">

                                    <span class="course-label">
                                        PROGRAMME
                                    </span>

                                    <h3>
                                        {{ $course->course }}
                                    </h3>

                                </div>


                                {{-- Enrollment --}}
                                <div class="enrollment">

                                    <div class="student-icon">

                                        <svg viewBox="0 0 24 24"
                                            fill="none"
                                            stroke="currentColor"
                                            stroke-width="1.8"
                                            stroke-linecap="round"
                                            stroke-linejoin="round">

                                            <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2" />
                                            <circle cx="9" cy="7" r="4" />
                                            <path d="M22 21v-2a4 4 0 0 0-3-3.87" />
                                            <path d="M16 3.13a4 4 0 0 1 0 7.75" />

                                        </svg>

                                    </div>

                                    <div class="enrollment-info">

                                        <strong>
                                            {{ $course->student_count }}
                                        </strong>

                                        <span>
                                            {{ $course->student_count == 1
                                                ? 'Student enrolled'
                                                : 'Students enrolled' }}
                                        </span>

                                    </div>

                                </div>

                            </div>


                            {{-- Card Footer --}}
                            <div class="card-footer">

                                <a
                                    href="{{ route('students.index', ['course' => $course->course]) }}"
                                    class="view-button"
                                >

                                    <span>View students</span>

                                    <span class="arrow">

                                        <svg viewBox="0 0 24 24"
                                            fill="none"
                                            stroke="currentColor"
                                            stroke-width="2"
                                            stroke-linecap="round"
                                            stroke-linejoin="round">

                                            <path d="M5 12h14" />
                                            <path d="m13 6 6 6-6 6" />

                                        </svg>

                                    </span>

                                </a>

                            </div>

                        </div>

                    @endforeach

                </div>


            @else

                {{-- =========================================
                     EMPTY STATE
                ========================================== --}}
                <div class="empty-state">

                    <div class="empty-icon">

                        <svg viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="1.5"
                            stroke-linecap="round"
                            stroke-linejoin="round">

                            <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20" />
                            <path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2Z" />

                        </svg>

                    </div>

                    <span class="empty-label">COURSE DIRECTORY</span>

                    <h2>No Courses Found</h2>

                    <p>

                        @if (!empty($search))

                            We couldn't find any courses matching
                            <strong>"{{ $search }}"</strong>.

                        @else

                            There are currently no courses available.

                        @endif

                    </p>

                    @if (!empty($search))

                        <a
                            href="{{ route('courses.index') }}"
                            class="empty-button"
                        >
                            Clear Search
                        </a>

                    @endif

                </div>

            @endif

        </div>

    </div>


    <style>

        /* =========================================================
           BASE
        ========================================================= */

        .courses-page {
            min-height: calc(100vh - 64px);
            background:
                linear-gradient(
                    180deg,
                    #f8fafc 0%,
                    #f1f5f9 100%
                );
            color: #0f172a;
        }


        .courses-container {
            width: min(1280px, calc(100% - 48px));
            margin: 0 auto;
            padding: 42px 0 80px;
        }


        /* =========================================================
           PAGE HEADER
        ========================================================= */

        .page-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 25px;
            margin-bottom: 28px;
        }


        .header-content {
            display: flex;
            align-items: center;
            gap: 16px;
        }


        .title-icon {
            width: 54px;
            height: 54px;

            display: flex;
            align-items: center;
            justify-content: center;

            flex-shrink: 0;

            background: linear-gradient(
                135deg,
                #eff6ff,
                #dbeafe
            );

            border: 1px solid #bfdbfe;
            border-radius: 15px;

            color: #2563eb;

            box-shadow:
                0 4px 12px rgba(37, 99, 235, 0.08);
        }


        .title-icon svg {
            width: 26px;
            height: 26px;
        }


        .page-label,
        .section-label,
        .empty-label {
            display: block;

            margin-bottom: 5px;

            font-size: 10px;
            line-height: 1;

            font-weight: 800;
            letter-spacing: 0.12em;

            color: #64748b;
        }


        .page-header h1 {
            margin: 0;

            font-size: 30px;
            line-height: 1.15;

            font-weight: 800;
            letter-spacing: -0.035em;

            color: #0f172a;
        }


        .page-header p {
            margin: 6px 0 0;

            font-size: 14px;
            color: #64748b;
        }


        .header-stat {
            display: flex;
            align-items: center;
            gap: 10px;

            padding: 10px 15px;

            background: #ffffff;

            border: 1px solid #e2e8f0;
            border-radius: 12px;

            box-shadow:
                0 2px 6px rgba(15, 23, 42, 0.04);
        }


        .stat-number {
            font-size: 20px;
            font-weight: 800;
            color: #2563eb;
        }


        .stat-label {
            font-size: 12px;
            font-weight: 650;
            color: #64748b;
        }


        /* =========================================================
           SEARCH CARD
        ========================================================= */

        .search-card {
            padding: 20px;

            background: rgba(255, 255, 255, 0.95);

            border: 1px solid #e2e8f0;
            border-radius: 16px;

            box-shadow:
                0 2px 5px rgba(15, 23, 42, 0.03),
                0 10px 30px rgba(15, 23, 42, 0.035);

            margin-bottom: 34px;
        }


        .search-heading {
            display: flex;
            align-items: center;
            gap: 12px;

            margin-bottom: 17px;
        }


        .search-heading-icon {
            width: 36px;
            height: 36px;

            display: flex;
            align-items: center;
            justify-content: center;

            background: #f8fafc;

            border: 1px solid #e2e8f0;
            border-radius: 9px;

            color: #64748b;
        }


        .search-heading-icon svg {
            width: 18px;
            height: 18px;
        }


        .search-heading h2 {
            margin: 0;

            font-size: 14px;
            font-weight: 750;

            color: #0f172a;
        }


        .search-heading p {
            margin: 3px 0 0;

            font-size: 12px;
            color: #94a3b8;
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
            border-radius: 10px;

            color: #0f172a;

            font-size: 13px;

            outline: none;

            transition:
                border-color .2s ease,
                background .2s ease,
                box-shadow .2s ease;
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
            border-color: #60a5fa;

            box-shadow:
                0 0 0 4px rgba(37, 99, 235, 0.08);
        }


        .search-button,
        .clear-button {
            height: 46px;

            padding: 0 17px;

            display: inline-flex;
            align-items: center;
            justify-content: center;

            gap: 8px;

            border-radius: 10px;

            font-size: 12px;
            font-weight: 700;

            cursor: pointer;

            text-decoration: none;

            transition:
                transform .15s ease,
                background .2s ease,
                border-color .2s ease;
        }


        .search-button {
            border: 1px solid #2563eb;

            background: #2563eb;
            color: #ffffff;

            box-shadow:
                0 4px 10px rgba(37, 99, 235, 0.15);
        }


        .search-button svg {
            width: 16px;
            height: 16px;
        }


        .search-button:hover {
            background: #1d4ed8;
            border-color: #1d4ed8;
            transform: translateY(-1px);
        }


        .clear-button {
            border: 1px solid #e2e8f0;

            background: #ffffff;
            color: #475569;
        }


        .clear-button svg {
            width: 15px;
            height: 15px;
        }


        .clear-button:hover {
            background: #f8fafc;
            border-color: #cbd5e1;
        }


        /* =========================================================
           RESULTS
        ========================================================= */

        .results-header {
            margin-bottom: 18px;
        }


        .results-header h2 {
            margin: 0;

            font-size: 19px;
            font-weight: 800;
            letter-spacing: -0.02em;

            color: #0f172a;
        }


        .results-header p {
            margin: 5px 0 0;

            font-size: 12px;
            color: #64748b;
        }


        .results-header p strong {
            color: #334155;
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
            position: relative;

            display: flex;
            flex-direction: column;

            min-height: 285px;

            overflow: hidden;

            background: #ffffff;

            border: 1px solid #e2e8f0;
            border-radius: 16px;

            box-shadow:
                0 2px 5px rgba(15, 23, 42, 0.025);

            transition:
                transform .22s ease,
                border-color .22s ease,
                box-shadow .22s ease;
        }


        .course-card:hover {
            transform: translateY(-4px);

            border-color: #bfdbfe;

            box-shadow:
                0 12px 30px rgba(15, 23, 42, 0.08);
        }


        .card-decoration {
            height: 3px;

            background: linear-gradient(
                90deg,
                #2563eb,
                #60a5fa
            );

            opacity: .9;
        }


        .card-content {
            flex: 1;

            padding: 20px;
        }


        .card-top {
            display: flex;
            align-items: center;
            justify-content: space-between;

            margin-bottom: 23px;
        }


        .course-icon {
            width: 46px;
            height: 46px;

            display: flex;
            align-items: center;
            justify-content: center;

            background:
                linear-gradient(
                    135deg,
                    #eff6ff,
                    #dbeafe
                );

            border: 1px solid #bfdbfe;
            border-radius: 12px;

            color: #2563eb;

            font-size: 17px;
            font-weight: 800;

            box-shadow:
                0 4px 10px rgba(37, 99, 235, 0.07);
        }


        .course-badge {
            padding: 5px 8px;

            background: #f8fafc;

            border: 1px solid #e2e8f0;
            border-radius: 6px;

            color: #64748b;

            font-size: 9px;
            font-weight: 800;

            letter-spacing: .09em;
        }


        .course-info {
            min-height: 70px;
        }


        .course-label {
            display: block;

            margin-bottom: 7px;

            font-size: 9px;
            font-weight: 750;

            letter-spacing: .1em;

            color: #94a3b8;
        }


        .course-info h3 {
            margin: 0;

            font-size: 17px;
            line-height: 1.4;

            font-weight: 750;

            letter-spacing: -.015em;

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

            margin-top: 24px;
            padding-top: 17px;

            border-top: 1px solid #f1f5f9;
        }


        .student-icon {
            width: 38px;
            height: 38px;

            display: flex;
            align-items: center;
            justify-content: center;

            flex-shrink: 0;

            background: #f8fafc;

            border: 1px solid #e2e8f0;
            border-radius: 10px;

            color: #64748b;
        }


        .student-icon svg {
            width: 18px;
            height: 18px;
        }


        .enrollment-info {
            display: flex;
            flex-direction: column;
            gap: 3px;
        }


        .enrollment strong {
            font-size: 19px;
            line-height: 1;

            font-weight: 800;

            color: #0f172a;
        }


        .enrollment span {
            font-size: 11px;
            color: #64748b;
        }


        /* =========================================================
           FOOTER
        ========================================================= */

        .card-footer {
            padding: 0 20px 20px;
        }


        .view-button {
            width: 100%;

            display: flex;
            align-items: center;
            justify-content: space-between;

            box-sizing: border-box;

            padding: 11px 13px;

            background: #f8fafc;

            border: 1px solid #e2e8f0;
            border-radius: 10px;

            color: #334155;

            font-size: 12px;
            font-weight: 700;

            text-decoration: none;

            transition:
                background .2s ease,
                border-color .2s ease,
                color .2s ease;
        }


        .view-button .arrow {
            width: 26px;
            height: 26px;

            display: flex;
            align-items: center;
            justify-content: center;

            background: #ffffff;

            border: 1px solid #e2e8f0;
            border-radius: 7px;
        }


        .view-button svg {
            width: 14px;
            height: 14px;

            transition: transform .2s ease;
        }


        .view-button:hover {
            background: #eff6ff;

            border-color: #bfdbfe;

            color: #2563eb;
        }


        .view-button:hover .arrow {
            border-color: #bfdbfe;
        }


        .view-button:hover svg {
            transform: translateX(2px);
        }


        /* =========================================================
           EMPTY STATE
        ========================================================= */

        .empty-state {
            padding: 85px 25px;

            text-align: center;

            background: #ffffff;

            border: 1px solid #e2e8f0;
            border-radius: 16px;

            box-shadow:
                0 2px 5px rgba(15, 23, 42, 0.025);
        }


        .empty-icon {
            width: 68px;
            height: 68px;

            margin: 0 auto 20px;

            display: flex;
            align-items: center;
            justify-content: center;

            background: #f8fafc;

            border: 1px solid #e2e8f0;
            border-radius: 16px;

            color: #94a3b8;
        }


        .empty-icon svg {
            width: 32px;
            height: 32px;
        }


        .empty-state h2 {
            margin: 0;

            font-size: 20px;
            font-weight: 800;

            color: #0f172a;
        }


        .empty-state p {
            max-width: 440px;

            margin: 9px auto 22px;

            font-size: 13px;
            line-height: 1.6;

            color: #64748b;
        }


        .empty-button {
            display: inline-flex;
            align-items: center;
            justify-content: center;

            height: 40px;

            padding: 0 17px;

            background: #2563eb;
            color: #ffffff;

            border-radius: 9px;

            font-size: 12px;
            font-weight: 700;

            text-decoration: none;

            box-shadow:
                0 4px 10px rgba(37, 99, 235, 0.15);

            transition:
                background .2s ease,
                transform .15s ease;
        }


        .empty-button:hover {
            background: #1d4ed8;
            transform: translateY(-1px);
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


            .header-stat {
                display: none;
            }

        }


        /* =========================================================
           MOBILE
        ========================================================= */

        @media (max-width: 560px) {

            .courses-container {
                width: calc(100% - 24px);

                padding: 24px 0 50px;
            }


            .page-header {
                margin-bottom: 22px;
            }


            .header-content {
                align-items: flex-start;
            }


            .title-icon {
                width: 45px;
                height: 45px;

                border-radius: 12px;
            }


            .title-icon svg {
                width: 22px;
                height: 22px;
            }


            .page-header h1 {
                font-size: 25px;
            }


            .page-header p {
                font-size: 13px;
            }


            .search-card {
                padding: 15px;

                border-radius: 14px;
            }


            .search-heading {
                align-items: flex-start;
            }


            .search-heading p {
                line-height: 1.5;
            }


            .search-form {
                flex-direction: column;
                align-items: stretch;
            }


            .search-button,
            .clear-button {
                width: 100%;
            }


            .results-header h2 {
                font-size: 18px;
            }


            .course-grid {
                grid-template-columns: 1fr;

                gap: 14px;
            }


            .course-card {
                min-height: 0;
            }


            .empty-state {
                padding: 65px 20px;
            }

        }


        /* =========================================================
           VERY SMALL MOBILE
        ========================================================= */

        @media (max-width: 380px) {

            .courses-container {
                width: calc(100% - 20px);
            }


            .header-content {
                gap: 11px;
            }


            .page-header h1 {
                font-size: 23px;
            }


            .page-header p {
                font-size: 12px;
            }


            .title-icon {
                width: 42px;
                height: 42px;
            }


            .search-heading-icon {
                display: none;
            }

        }

    </style>

</x-app-layout>