
<x-app-layout>

    <div class="details-container">

        {{-- =========================
             PROFILE HEADER
        ========================== --}}
        <div class="student-profile-card">

            <div class="profile-top">

                <div class="profile-avatar">
                    {{ strtoupper(substr($student->name, 0, 1)) }}
                </div>

                <div class="profile-main">

                    <div class="profile-label">
                        STUDENT PROFILE
                    </div>

                    <h1>{{ $student->name }}</h1>

                    <div class="profile-meta">

                        <span class="student-id">
                            {{ $student->student_id }}
                        </span>

                        @if ($student->grade)
                            <span class="meta-divider">•</span>

                            <span>
                                Grade {{ $student->grade }}
                            </span>
                        @endif

                        @if ($student->section)
                            <span class="meta-divider">•</span>

                            <span>
                                Section {{ $student->section }}
                            </span>
                        @endif

                    </div>

                </div>

            </div>

        </div>


        {{-- =========================
             PERSONAL INFORMATION
        ========================== --}}
        <div class="details-card">

            <div class="card-title">

                <div>
                    <h2>Personal Information</h2>
                    <p>Basic information about the student.</p>
                </div>

            </div>


            <div class="info-grid">

                {{-- STUDENT ID --}}
                <div class="info-item">
                    <span class="label">Student ID</span>

                    <span class="value highlight-value">
                        {{ $student->student_id }}
                    </span>
                </div>


                {{-- ROLL NUMBER --}}
                <div class="info-item">
                    <span class="label">Roll No</span>

                    <span class="value">
                        {{ $student->roll_no ?: 'N/A' }}
                    </span>
                </div>


                {{-- NAME --}}
                <div class="info-item">
                    <span class="label">Name</span>

                    <span class="value">
                        {{ $student->name }}
                    </span>
                </div>


                {{-- EMAIL --}}
                <div class="info-item">
                    <span class="label">Email</span>

                    @if ($student->email)

                        <a
                            href="mailto:{{ $student->email }}"
                            class="value value-link"
                        >
                            {{ $student->email }}
                        </a>

                    @else

                        <span class="value muted-value">
                            N/A
                        </span>

                    @endif

                </div>


                {{-- PHONE --}}
                <div class="info-item">
                    <span class="label">Phone</span>

                    @if ($student->phone)

                        <a
                            href="tel:{{ $student->phone }}"
                            class="value value-link"
                        >
                            {{ $student->phone }}
                        </a>

                    @else

                        <span class="value muted-value">
                            N/A
                        </span>

                    @endif

                </div>


                {{-- DATE OF BIRTH --}}
                <div class="info-item">
                    <span class="label">Date of Birth</span>

                    <span class="value">
                        @if ($student->date_of_birth)
                            {{ \Carbon\Carbon::parse($student->date_of_birth)->format('F d, Y') }}
                        @else
                            N/A
                        @endif
                    </span>
                </div>


                {{-- GENDER --}}
                <div class="info-item">
                    <span class="label">Gender</span>

                    <span class="value">

                        @if ($student->gender)

                            <span class="gender-badge {{ strtolower($student->gender) }}">
                                {{ $student->gender }}
                            </span>

                        @else

                            <span class="muted-value">
                                N/A
                            </span>

                        @endif

                    </span>

                </div>

            </div>

        </div>



        {{-- =========================
             ACADEMIC INFORMATION
        ========================== --}}
        <div class="details-card">

            <div class="card-title">

                <div>
                    <h2>Academic Information</h2>
                    <p>Grade, section, course and academic details.</p>
                </div>

            </div>


            <div class="info-grid">

                {{-- GRADE --}}
                <div class="info-item">

                    <span class="label">
                        Grade
                    </span>

                    <span class="value">
                        {{ $student->grade ? 'Grade ' . $student->grade : 'N/A' }}
                    </span>

                </div>


                {{-- SECTION --}}
                <div class="info-item">

                    <span class="label">
                        Section
                    </span>

                    <span class="value">
                        {{ $student->section ?: 'N/A' }}
                    </span>

                </div>


                {{-- ACADEMIC YEAR --}}
                <div class="info-item">

                    <span class="label">
                        Academic Year
                    </span>

                    <span class="value">
                        {{ $student->academic_year ?: 'N/A' }}
                    </span>

                </div>


                {{-- COURSE --}}
                <div class="info-item">

                    <span class="label">
                        Course
                    </span>

                    <span class="value">
                        {{ $student->course ?: 'N/A' }}
                    </span>

                </div>


                {{-- SEMESTER --}}
                <div class="info-item">

                    <span class="label">
                        Semester
                    </span>

                    <span class="value">
                        {{ $student->semester ? 'Semester ' . $student->semester : 'N/A' }}
                    </span>

                </div>


                {{-- ADDED ON --}}
                <div class="info-item">

                    <span class="label">
                        Added On
                    </span>

                    <span class="value">

                        @if ($student->created_at)
                            {{ $student->created_at->format('F d, Y') }}
                        @else
                            N/A
                        @endif

                    </span>

                </div>

            </div>

        </div>



        {{-- =========================
             PARENT DETAILS
        ========================== --}}
        <div class="details-card">

            <div class="card-title">

                <div>
                    <h2>Parent Details</h2>
                    <p>Parent and guardian contact information.</p>
                </div>

            </div>


            {{-- FATHER --}}
            <div class="parent-section">

                <div class="parent-heading">

                    <div class="parent-icon">
                        F
                    </div>

                    <div>
                        <h3>Father's Information</h3>
                    </div>

                </div>


                <div class="info-grid">

                    <div class="info-item">
                        <span class="label">Name</span>

                        <span class="value">
                            {{ $student->father_name ?: 'N/A' }}
                        </span>
                    </div>


                    <div class="info-item">
                        <span class="label">Phone</span>

                        @if ($student->father_phone)

                            <a
                                href="tel:{{ $student->father_phone }}"
                                class="value value-link"
                            >
                                {{ $student->father_phone }}
                            </a>

                        @else

                            <span class="value muted-value">
                                N/A
                            </span>

                        @endif

                    </div>


                    <div class="info-item">
                        <span class="label">Occupation</span>

                        <span class="value">
                            {{ $student->father_occupation ?: 'N/A' }}
                        </span>
                    </div>

                </div>

            </div>



            {{-- MOTHER --}}
            <div class="parent-section">

                <div class="parent-heading">

                    <div class="parent-icon">
                        M
                    </div>

                    <div>
                        <h3>Mother's Information</h3>
                    </div>

                </div>


                <div class="info-grid">

                    <div class="info-item">
                        <span class="label">Name</span>

                        <span class="value">
                            {{ $student->mother_name ?: 'N/A' }}
                        </span>
                    </div>


                    <div class="info-item">
                        <span class="label">Phone</span>

                        @if ($student->mother_phone)

                            <a
                                href="tel:{{ $student->mother_phone }}"
                                class="value value-link"
                            >
                                {{ $student->mother_phone }}
                            </a>

                        @else

                            <span class="value muted-value">
                                N/A
                            </span>

                        @endif

                    </div>


                    <div class="info-item">
                        <span class="label">Occupation</span>

                        <span class="value">
                            {{ $student->mother_occupation ?: 'N/A' }}
                        </span>
                    </div>

                </div>

            </div>



            {{-- GUARDIAN --}}
            <div class="parent-section">

                <div class="parent-heading">

                    <div class="parent-icon">
                        G
                    </div>

                    <div>
                        <h3>Guardian Information</h3>
                    </div>

                </div>


                <div class="info-grid">

                    <div class="info-item">
                        <span class="label">Name</span>

                        <span class="value">
                            {{ $student->guardian_name ?: 'N/A' }}
                        </span>
                    </div>


                    <div class="info-item">
                        <span class="label">Phone</span>

                        @if ($student->guardian_phone)

                            <a
                                href="tel:{{ $student->guardian_phone }}"
                                class="value value-link"
                            >
                                {{ $student->guardian_phone }}
                            </a>

                        @else

                            <span class="value muted-value">
                                N/A
                            </span>

                        @endif

                    </div>


                    <div class="info-item">
                        <span class="label">Relation</span>

                        <span class="value">
                            {{ $student->guardian_relation ?: 'N/A' }}
                        </span>
                    </div>

                </div>

            </div>

        </div>



        {{-- =========================
             ACTION BUTTONS
        ========================== --}}
        <div class="details-actions">

            <a
                href="{{ route('students.index') }}"
                class="back-button"
            >
                ← Back to Students
            </a>


            <a
                href="{{ route('students.edit', $student->id) }}"
                class="edit-button"
            >
                Edit Student
            </a>

        </div>

    </div>



    {{-- =========================
         STYLES
    ========================== --}}
    <style>

        * {
            box-sizing: border-box;
        }


        /* =========================
           CONTAINER
        ========================== */

        .details-container {
            width: min(100% - 40px, 1100px);
            margin: 0 auto;
            padding: 40px 0 70px;
        }


        /* =========================
           COMMON CARD
        ========================== */

        .student-profile-card,
        .details-card {
            background: #ffffff;
            border: 1px solid #e5e7eb;
            border-radius: 16px;
            box-shadow: 0 4px 18px rgba(0, 0, 0, 0.04);
        }


        /* =========================
           PROFILE
        ========================== */

        .student-profile-card {
            margin-bottom: 20px;
            padding: 28px;
        }


        .profile-top {
            display: flex;
            align-items: center;
            gap: 18px;
        }


        .profile-avatar {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 70px;
            height: 70px;
            flex-shrink: 0;
            border-radius: 50%;
            background: #eff6ff;
            color: #2563eb;
            font-size: 27px;
            font-weight: 750;
            border: 4px solid #dbeafe;
        }


        .profile-main {
            min-width: 0;
        }


        .profile-label {
            margin-bottom: 5px;
            color: #9ca3af;
            font-size: 10px;
            font-weight: 800;
            letter-spacing: 0.08em;
        }


        .profile-main h1 {
            margin: 0;
            color: #111827;
            font-size: 26px;
            line-height: 1.25;
            font-weight: 750;
            overflow-wrap: anywhere;
        }


        .profile-meta {
            display: flex;
            align-items: center;
            flex-wrap: wrap;
            gap: 8px;
            margin-top: 9px;
            color: #6b7280;
            font-size: 12px;
        }


        .student-id {
            display: inline-flex;
            align-items: center;
            padding: 5px 9px;
            border-radius: 6px;
            background: #eff6ff;
            color: #2563eb;
            font-size: 11px;
            font-weight: 750;
        }


        .meta-divider {
            color: #d1d5db;
        }


        /* =========================
           DETAILS CARD
        ========================== */

        .details-card {
            margin-bottom: 20px;
            overflow: hidden;
        }


        .card-title {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 22px 26px;
            border-bottom: 1px solid #e5e7eb;
        }


        .card-title h2 {
            margin: 0;
            color: #111827;
            font-size: 18px;
            font-weight: 700;
        }


        .card-title p {
            margin: 5px 0 0;
            color: #6b7280;
            font-size: 13px;
        }


        /* =========================
           INFORMATION GRID
        ========================== */

        .info-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }


        .info-item {
            display: flex;
            flex-direction: column;
            gap: 7px;
            min-width: 0;
            padding: 19px 26px;
            border-bottom: 1px solid #f1f5f9;
        }


        .info-item:nth-child(odd) {
            border-right: 1px solid #f1f5f9;
        }


        .info-item:nth-last-child(-n + 2) {
            border-bottom: 0;
        }


        /* =========================
           LABEL & VALUE
        ========================== */

        .label {
            color: #9ca3af;
            font-size: 10px;
            font-weight: 750;
            letter-spacing: 0.07em;
            text-transform: uppercase;
        }


        .value {
            overflow-wrap: anywhere;
            color: #374151;
            font-size: 14px;
            line-height: 1.5;
            font-weight: 550;
        }


        .highlight-value {
            color: #2563eb;
            font-weight: 700;
        }


        .muted-value {
            color: #9ca3af;
        }


        .value-link {
            color: #2563eb;
            text-decoration: none;
            transition: color 0.2s ease;
        }


        .value-link:hover {
            color: #1d4ed8;
            text-decoration: underline;
        }


        /* =========================
           GENDER BADGES
        ========================== */

        .gender-badge {
            display: inline-flex;
            width: fit-content;
            padding: 5px 10px;
            border-radius: 999px;
            font-size: 11px;
            font-weight: 650;
        }


        .gender-badge.male {
            background: #ecfdf5;
            color: #15803d;
        }


        .gender-badge.female {
            background: #fdf2f8;
            color: #be185d;
        }


        .gender-badge.other {
            background: #f5f3ff;
            color: #7e22ce;
        }


        /* =========================
           PARENT SECTIONS
        ========================== */

        .parent-section {
            border-bottom: 1px solid #e5e7eb;
        }


        .parent-section:last-child {
            border-bottom: none;
        }


        .parent-heading {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 20px 26px 4px;
        }


        .parent-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 34px;
            height: 34px;
            flex-shrink: 0;
            border-radius: 9px;
            border: 1px solid #e5e7eb;
            background: #f9fafb;
            color: #4b5563;
            font-size: 12px;
            font-weight: 800;
        }


        .parent-heading h3 {
            margin: 0;
            color: #374151;
            font-size: 14px;
            font-weight: 700;
        }


        .parent-section .info-grid {
            margin-top: 4px;
        }


        /* =========================
           ACTIONS
        ========================== */

        .details-actions {
            display: flex;
            justify-content: flex-end;
            align-items: center;
            gap: 10px;
            margin-top: 26px;
        }


        .back-button,
        .edit-button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-height: 44px;
            padding: 0 19px;
            border-radius: 8px;
            font-family: inherit;
            font-size: 13px;
            font-weight: 650;
            text-decoration: none;
            transition: 0.2s ease;
        }


        .back-button {
            border: 1px solid #d1d5db;
            background: #ffffff;
            color: #374151;
        }


        .back-button:hover {
            background: #f3f4f6;
            border-color: #9ca3af;
        }


        .edit-button {
            border: 1px solid #2563eb;
            background: #2563eb;
            color: #ffffff;
        }


        .edit-button:hover {
            background: #1d4ed8;
            border-color: #1d4ed8;
        }


        /* =========================
           TABLET
        ========================== */

        @media (max-width: 760px) {

            .details-container {
                width: calc(100% - 24px);
                padding: 25px 0 45px;
            }


            .student-profile-card {
                padding: 22px;
            }


            .profile-avatar {
                width: 58px;
                height: 58px;
                font-size: 22px;
            }


            .profile-main h1 {
                font-size: 22px;
            }


            .card-title {
                padding: 20px;
            }


            .info-item {
                padding: 16px 20px;
            }


            .parent-heading {
                padding-left: 20px;
                padding-right: 20px;
            }

        }


        /* =========================
           MOBILE
        ========================== */

        @media (max-width: 600px) {

            .info-grid {
                grid-template-columns: 1fr;
            }


            .info-item {
                border-right: 0 !important;
            }


            .info-item:last-child {
                border-bottom: 0;
            }


            .details-actions {
                flex-direction: column-reverse;
                align-items: stretch;
            }


            .back-button,
            .edit-button {
                width: 100%;
            }

        }


        /* =========================
           SMALL MOBILE
        ========================== */

        @media (max-width: 420px) {

            .details-container {
                width: calc(100% - 16px);
            }


            .student-profile-card {
                padding: 18px;
            }


            .profile-top {
                align-items: flex-start;
            }


            .profile-avatar {
                width: 52px;
                height: 52px;
                font-size: 20px;
            }


            .profile-main h1 {
                font-size: 20px;
            }


            .card-title {
                padding: 18px;
            }


            .card-title h2 {
                font-size: 16px;
            }


            .info-item {
                padding: 15px 18px;
            }


            .parent-heading {
                padding-left: 18px;
                padding-right: 18px;
            }

        }

    </style>

</x-app-layout>

