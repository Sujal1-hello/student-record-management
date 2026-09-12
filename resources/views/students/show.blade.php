<x-app-layout>

    <div class="details-container">

        <div class="student-profile-card">

            <div class="profile-top">

                <div class="profile-avatar">
                    {{ strtoupper(substr($student->name, 0, 1)) }}
                </div>

                <div class="profile-main">
                    <h1>{{ $student->name }}</h1>

                    <span class="student-id">
                        {{ $student->student_id }}
                    </span>
                </div>

            </div>

        </div>


        <div class="details-card">

            <div class="card-title">
                <h2>Personal Information</h2>
                <p>Basic information about the student.</p>
            </div>

            <div class="info-grid">

                <div class="info-item">
                    <span class="label">Student ID</span>
                    <span class="value">{{ $student->student_id }}</span>
                </div>

                <div class="info-item">
                    <span class="label">Roll No</span>
                    <span class="value">
                        {{ $student->roll_no ?: 'N/A' }}
                    </span>
                </div>

                <div class="info-item">
                    <span class="label">Name</span>
                    <span class="value">{{ $student->name }}</span>
                </div>

                <div class="info-item">
                    <span class="label">Email</span>
                    <span class="value">{{ $student->email }}</span>
                </div>

                <div class="info-item">
                    <span class="label">Phone</span>
                    <span class="value">
                        {{ $student->phone ?: 'N/A' }}
                    </span>
                </div>

                <div class="info-item">
                    <span class="label">Date of Birth</span>
                    <span class="value">
                        {{ $student->date_of_birth ?: 'N/A' }}
                    </span>
                </div>

                <div class="info-item">
                    <span class="label">Gender</span>

                    <span class="value">

                        @if ($student->gender)

                            <span class="gender-badge {{ strtolower($student->gender) }}">
                                {{ $student->gender }}
                            </span>

                        @else

                            N/A

                        @endif

                    </span>

                </div>

            </div>

        </div>


        <div class="details-card">

            <div class="card-title">
                <h2>Academic Information</h2>
                <p>Grade, section, course and academic details.</p>
            </div>

            <div class="info-grid">

                <div class="info-item">
                    <span class="label">Grade</span>
                    <span class="value">
                        {{ $student->grade ? 'Grade ' . $student->grade : 'N/A' }}
                    </span>
                </div>

                <div class="info-item">
                    <span class="label">Section</span>
                    <span class="value">
                        {{ $student->section ?: 'N/A' }}
                    </span>
                </div>

                <div class="info-item">
                    <span class="label">Academic Year</span>
                    <span class="value">
                        {{ $student->academic_year ?: 'N/A' }}
                    </span>
                </div>

                <div class="info-item">
                    <span class="label">Course</span>
                    <span class="value">
                        {{ $student->course ?: 'N/A' }}
                    </span>
                </div>

                <div class="info-item">
                    <span class="label">Semester</span>
                    <span class="value">
                        {{ $student->semester ? 'Semester ' . $student->semester : 'N/A' }}
                    </span>
                </div>

                <div class="info-item">
                    <span class="label">Added On</span>
                    <span class="value">
                        {{ $student->created_at->format('F d, Y') }}
                    </span>
                </div>

            </div>

        </div>


        <div class="details-card">

            <div class="card-title">
                <h2>Parent Details</h2>
                <p>Parent and guardian contact information.</p>
            </div>


            <div class="parent-section">

                <h3>Father's Information</h3>

                <div class="info-grid">

                    <div class="info-item">
                        <span class="label">Name</span>
                        <span class="value">
                            {{ $student->father_name ?: 'N/A' }}
                        </span>
                    </div>

                    <div class="info-item">
                        <span class="label">Phone</span>
                        <span class="value">
                            {{ $student->father_phone ?: 'N/A' }}
                        </span>
                    </div>

                    <div class="info-item">
                        <span class="label">Occupation</span>
                        <span class="value">
                            {{ $student->father_occupation ?: 'N/A' }}
                        </span>
                    </div>

                </div>

            </div>


            <div class="parent-section">

                <h3>Mother's Information</h3>

                <div class="info-grid">

                    <div class="info-item">
                        <span class="label">Name</span>
                        <span class="value">
                            {{ $student->mother_name ?: 'N/A' }}
                        </span>
                    </div>

                    <div class="info-item">
                        <span class="label">Phone</span>
                        <span class="value">
                            {{ $student->mother_phone ?: 'N/A' }}
                        </span>
                    </div>

                    <div class="info-item">
                        <span class="label">Occupation</span>
                        <span class="value">
                            {{ $student->mother_occupation ?: 'N/A' }}
                        </span>
                    </div>

                </div>

            </div>


            <div class="parent-section">

                <h3>Guardian Information</h3>

                <div class="info-grid">

                    <div class="info-item">
                        <span class="label">Name</span>
                        <span class="value">
                            {{ $student->guardian_name ?: 'N/A' }}
                        </span>
                    </div>

                    <div class="info-item">
                        <span class="label">Phone</span>
                        <span class="value">
                            {{ $student->guardian_phone ?: 'N/A' }}
                        </span>
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


        <div class="details-actions">

            <a
                href="{{ route('students.edit', $student->id) }}"
                class="edit-button"
            >
                Edit Student
            </a>

            <a
                href="{{ route('students.index') }}"
                class="cancel-button"
            >
                Back to Students
            </a>

        </div>

    </div>


    <style>

        .details-container {
            width: min(100% - 60px, 1000px);
            margin: 0 auto;
            padding: 40px 0 60px;
        }

        .student-profile-card,
        .details-card {
            background: #ffffff;
            border: 1px solid #e5e7eb;
            border-radius: 14px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
        }

        .student-profile-card {
            padding: 28px;
            margin-bottom: 20px;
        }

        .profile-top {
            display: flex;
            align-items: center;
            gap: 18px;
        }

        .profile-avatar {
            width: 64px;
            height: 64px;
            flex-shrink: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            background: #eff6ff;
            color: #2563eb;
            font-size: 25px;
            font-weight: 700;
        }

        .profile-main h1 {
            margin: 0 0 7px;
            color: #111827;
            font-size: 25px;
            font-weight: 700;
        }

        .student-id {
            display: inline-flex;
            padding: 5px 9px;
            border-radius: 6px;
            background: #eff6ff;
            color: #2563eb;
            font-size: 12px;
            font-weight: 700;
        }

        .details-card {
            margin-bottom: 20px;
            overflow: hidden;
        }

        .card-title {
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

        .info-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
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

        .label {
            color: #9ca3af;
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 0.05em;
            text-transform: uppercase;
        }

        .value {
            overflow-wrap: anywhere;
            color: #374151;
            font-size: 14px;
            font-weight: 500;
        }

        .gender-badge {
            display: inline-flex;
            width: fit-content;
            padding: 5px 9px;
            border-radius: 999px;
            font-size: 11px;
            font-weight: 600;
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

        .parent-section {
            padding: 20px 26px;
            border-bottom: 1px solid #e5e7eb;
        }

        .parent-section:last-child {
            border-bottom: none;
        }

        .parent-section h3 {
            margin: 0 0 16px;
            color: #374151;
            font-size: 14px;
            font-weight: 700;
        }

        .details-actions {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
            margin-top: 25px;
        }

        .edit-button,
        .cancel-button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-height: 42px;
            padding: 0 18px;
            border-radius: 8px;
            font-size: 13px;
            font-weight: 600;
            text-decoration: none;
            box-sizing: border-box;
        }

        .edit-button {
            background: #16a34a;
            color: white;
        }

        .edit-button:hover {
            background: #15803d;
        }

        .cancel-button {
            border: 1px solid #d1d5db;
            background: #ffffff;
            color: #374151;
        }

        .cancel-button:hover {
            background: #f3f4f6;
        }

        @media (max-width: 700px) {

            .details-container {
                width: calc(100% - 32px);
                padding: 28px 0 40px;
            }

            .student-profile-card {
                padding: 22px;
            }

            .profile-avatar {
                width: 54px;
                height: 54px;
                font-size: 21px;
            }

            .profile-main h1 {
                font-size: 21px;
            }

            .info-grid {
                grid-template-columns: 1fr;
            }

            .info-item {
                padding: 16px 20px;
            }

            .info-item:nth-child(odd) {
                border-right: 0;
            }

            .info-item:last-child {
                border-bottom: 0;
            }

            .card-title {
                padding: 20px;
            }

            .parent-section {
                padding: 18px 20px;
            }

            .details-actions {
                flex-direction: column;
            }

            .edit-button,
            .cancel-button {
                width: 100%;
            }

        }

    </style>

</x-app-layout>