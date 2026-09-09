<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Student Details
        </h2>
    </x-slot>

    <div class="student-details-container">

        <div class="student-details-header">

            <div>
                <h1>Student Details</h1>
                <p>View complete information about this student.</p>
            </div>

            <a href="{{ route('students.index') }}" class="back-button">
                ← Back to Students
            </a>

        </div>

        <div class="student-id">

            <span>Student ID</span>

            <strong>
                {{ $student->student_id }}
            </strong>

        </div>

        <div class="student-info">

            <div class="info-row">
                <span class="label">Name</span>
                <span class="value">
                    {{ $student->name }}
                </span>
            </div>

            <div class="info-row">
                <span class="label">Email</span>
                <span class="value">
                    {{ $student->email }}
                </span>
            </div>

            <div class="info-row">
                <span class="label">Phone</span>
                <span class="value">
                    {{ $student->phone ?: 'N/A' }}
                </span>
            </div>

            <div class="info-row">
                <span class="label">Date of Birth</span>
                <span class="value">
                    {{ $student->date_of_birth ?: 'N/A' }}
                </span>
            </div>

            <div class="info-row">
                <span class="label">Gender</span>
                <span class="value">
                    {{ $student->gender ?: 'N/A' }}
                </span>
            </div>

            <div class="info-row">
                <span class="label">Course</span>
                <span class="value">
                    {{ $student->course }}
                </span>
            </div>

            <div class="info-row">
                <span class="label">Semester</span>
                <span class="value">
                    {{ $student->semester ? 'Semester ' . $student->semester : 'N/A' }}
                </span>
            </div>

            <div class="info-row">
                <span class="label">Added On</span>
                <span class="value">
                    {{ $student->created_at->format('F d, Y') }}
                </span>
            </div>

        </div>

        <div class="actions">

            <a href="{{ route('students.edit', $student->id) }}"
               class="edit-button">
                Edit Student
            </a>

        </div>

    </div>

    <style>

        .student-details-container {
            max-width: 850px;
            margin: 0 auto;
            padding: 35px 24px;
        }

        .student-details-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
            margin-bottom: 25px;
        }

        .student-details-header h1 {
            margin: 0;
            font-size: 28px;
            font-weight: 700;
            color: #222;
        }

        .student-details-header p {
            margin: 6px 0 0;
            color: #64748b;
            font-size: 14px;
        }

        .back-button {
            display: inline-block;
            padding: 10px 16px;
            border-radius: 6px;
            background: #e5e7eb;
            color: #374151;
            text-decoration: none;
            font-size: 14px;
            white-space: nowrap;
        }

        .back-button:hover {
            background: #d1d5db;
        }

        .student-id {
            background-color: #eff6ff;
            border: 1px solid #bfdbfe;
            color: #1d4ed8;
            padding: 18px;
            border-radius: 8px;
            margin-bottom: 20px;
            text-align: center;
        }

        .student-id span {
            display: block;
            font-size: 13px;
            color: #64748b;
            margin-bottom: 5px;
        }

        .student-id strong {
            font-size: 24px;
        }

        .student-info {
            background: white;
            border: 1px solid #ddd;
            border-radius: 8px;
            overflow: hidden;
        }

        .info-row {
            display: flex;
            justify-content: space-between;
            gap: 20px;
            padding: 16px 20px;
            border-bottom: 1px solid #eee;
        }

        .info-row:last-child {
            border-bottom: none;
        }

        .label {
            font-weight: 600;
            color: #555;
        }

        .value {
            color: #222;
            text-align: right;
        }

        .actions {
            margin-top: 25px;
        }

        .edit-button {
            display: inline-block;
            background-color: #16a34a;
            color: white;
            padding: 10px 18px;
            border-radius: 6px;
            text-decoration: none;
            font-size: 14px;
        }

        .edit-button:hover {
            background-color: #15803d;
        }

        html.dark .student-details-header h1 {
            color: #f3f4f6;
        }

        html.dark .student-details-header p {
            color: #9ca3af;
        }

        html.dark .student-info {
            background: #1f2937;
            border-color: #374151;
        }

        html.dark .info-row {
            border-color: #374151;
        }

        html.dark .label {
            color: #9ca3af;
        }

        html.dark .value {
            color: #f3f4f6;
        }

        html.dark .back-button {
            background: #374151;
            color: #f3f4f6;
        }

        html.dark .back-button:hover {
            background: #4b5563;
        }

        @media (max-width: 650px) {

            .student-details-container {
                padding: 25px 16px;
            }

            .student-details-header {
                flex-direction: column;
                align-items: flex-start;
            }

            .back-button {
                width: 100%;
                text-align: center;
            }

            .info-row {
                flex-direction: column;
                gap: 5px;
            }

            .value {
                text-align: left;
            }

            .edit-button {
                width: 100%;
                text-align: center;
            }

        }

    </style>

</x-app-layout>