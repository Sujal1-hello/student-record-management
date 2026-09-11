<x-app-layout>

    <div class="student-edit-container">

        <div class="student-edit-header">
            <div>
                <h1>Edit Student</h1>
                <p>Update this student's information below.</p>
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

        @if ($errors->any())
            <div class="error-box">
                <strong>Please fix the following errors:</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="edit-card">
            <form action="{{ route('students.update', $student->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label>Name</label>
                    <input
                        type="text"
                        name="name"
                        value="{{ old('name', $student->name) }}"
                        required
                        maxlength="255"
                    >
                </div>

                <div class="form-group">
                    <label>Email</label>
                    <input
                        type="email"
                        name="email"
                        value="{{ old('email', $student->email) }}"
                        required
                    >
                </div>

                <div class="form-group">
                    <label>Phone <span class="optional">(Optional)</span></label>
                    <input
                        type="text"
                        name="phone"
                        value="{{ old('phone', $student->phone) }}"
                        maxlength="10"
                        placeholder="98XXXXXXXX"
                    >
                </div>

                <div class="form-group">
                    <label>Date of Birth <span class="optional">(Optional)</span></label>
                    <input
                        type="date"
                        name="date_of_birth"
                        value="{{ old('date_of_birth', $student->date_of_birth) }}"
                    >
                </div>

                <div class="form-group">
                    <label>Gender <span class="optional">(Optional)</span></label>
                    <select name="gender">
                        <option value="">Select Gender</option>

                        <option value="Male"
                            {{ old('gender', $student->gender) == 'Male' ? 'selected' : '' }}>
                            Male
                        </option>

                        <option value="Female"
                            {{ old('gender', $student->gender) == 'Female' ? 'selected' : '' }}>
                            Female
                        </option>

                        <option value="Other"
                            {{ old('gender', $student->gender) == 'Other' ? 'selected' : '' }}>
                            Other
                        </option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Course</label>
                    <input
                        type="text"
                        name="course"
                        value="{{ old('course', $student->course) }}"
                        required
                        maxlength="255"
                    >
                </div>

                <div class="form-group">
                    <label>Semester <span class="optional">(Optional)</span></label>
                    <select name="semester">
                        <option value="">Select Semester</option>

                        @for ($i = 1; $i <= 8; $i++)
                            <option value="{{ $i }}"
                                {{ old('semester', $student->semester) == $i ? 'selected' : '' }}>
                                Semester {{ $i }}
                            </option>
                        @endfor
                    </select>
                </div>

                <div class="actions">
                    <button type="submit" class="update-button">
                        Update Student
                    </button>
                </div>

            </form>
        </div>

    </div>

    <style>
        .student-edit-container {
            max-width: 700px;
            margin: 0 auto;
            padding: 35px 24px;
        }

        .student-edit-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
            margin-bottom: 25px;
        }

        .student-edit-header h1 {
            margin: 0;
            font-size: 28px;
            font-weight: 700;
            color: #222;
        }

        .student-edit-header p {
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

        .error-box {
            background-color: #fee2e2;
            color: #991b1b;
            padding: 15px 20px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .error-box ul {
            margin: 8px 0 0;
            padding-left: 20px;
        }

        .edit-card {
            background: white;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 24px;
        }

        .form-group {
            margin-bottom: 18px;
        }

        .form-group label {
            display: block;
            margin-bottom: 6px;
            font-weight: 600;
            color: #555;
        }

        .optional {
            font-weight: normal;
            color: #777;
            font-size: 13px;
        }

        .form-group input,
        .form-group select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 6px;
            box-sizing: border-box;
            font-size: 14px;
            color: #222;
            background: white;
        }

        .form-group input:focus,
        .form-group select:focus {
            outline: none;
            border-color: #16a34a;
        }

        .actions {
            margin-top: 25px;
        }

        .update-button {
            display: inline-block;
            background-color: #16a34a;
            color: white;
            border: none;
            padding: 10px 18px;
            border-radius: 6px;
            font-size: 14px;
            cursor: pointer;
        }

        .update-button:hover {
            background-color: #15803d;
        }

        html.dark .student-edit-header h1 {
            color: #f3f4f6;
        }

        html.dark .student-edit-header p {
            color: #9ca3af;
        }

        html.dark .back-button {
            background: #374151;
            color: #f3f4f6;
        }

        html.dark .back-button:hover {
            background: #4b5563;
        }

        html.dark .edit-card {
            background: #1f2937;
            border-color: #374151;
        }

        html.dark .form-group label {
            color: #9ca3af;
        }

        html.dark .form-group input,
        html.dark .form-group select {
            background: #111827;
            border-color: #374151;
            color: #f3f4f6;
        }

        html.dark .error-box {
            background-color: #450a0a;
            color: #fecaca;
        }

        @media (max-width: 650px) {
            .student-edit-container {
                padding: 25px 16px;
            }

            .student-edit-header {
                flex-direction: column;
                align-items: flex-start;
            }

            .back-button {
                width: 100%;
                text-align: center;
            }

            .update-button {
                width: 100%;
                text-align: center;
            }
        }
    </style>

</x-app-layout>