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


                <div class="section-title">
                    <h2>General Information</h2>
                    <p>Basic information about the student.</p>
                </div>


                <div class="form-grid">

                    <div class="form-group">

                        <label>
                            Name <span class="required">*</span>
                        </label>

                        <input
                            type="text"
                            name="name"
                            value="{{ old('name', $student->name) }}"
                            required
                            maxlength="255"
                        >

                    </div>


                    <div class="form-group">

                        <label>
                            Roll No <span class="required">*</span>
                        </label>

                        <input
                            type="text"
                            name="roll_no"
                            value="{{ old('roll_no', $student->roll_no) }}"
                            required
                            maxlength="50"
                            placeholder="Enter roll number"
                        >

                    </div>


                    <div class="form-group">

                        <label>
                            Email <span class="required">*</span>
                        </label>

                        <input
                            type="email"
                            name="email"
                            value="{{ old('email', $student->email) }}"
                            required
                        >

                    </div>


                    <div class="form-group">

                        <label>
                            Phone <span class="optional">(Optional)</span>
                        </label>

                        <input
                            type="text"
                            name="phone"
                            value="{{ old('phone', $student->phone) }}"
                            maxlength="10"
                            placeholder="98XXXXXXXX"
                        >

                    </div>


                    <div class="form-group">

                        <label>
                            Date of Birth <span class="optional">(Optional)</span>
                        </label>

                        <input
                            type="date"
                            name="date_of_birth"
                            value="{{ old('date_of_birth', $student->date_of_birth) }}"
                        >

                    </div>


                    <div class="form-group">

                        <label>
                            Gender <span class="optional">(Optional)</span>
                        </label>

                        <select name="gender">

                            <option value="">Select Gender</option>

                            <option
                                value="Male"
                                {{ old('gender', $student->gender) == 'Male' ? 'selected' : '' }}
                            >
                                Male
                            </option>

                            <option
                                value="Female"
                                {{ old('gender', $student->gender) == 'Female' ? 'selected' : '' }}
                            >
                                Female
                            </option>

                            <option
                                value="Other"
                                {{ old('gender', $student->gender) == 'Other' ? 'selected' : '' }}
                            >
                                Other
                            </option>

                        </select>

                    </div>

                </div>


                <div class="section-title">
                    <h2>Academic Information</h2>
                    <p>Grade, section and academic details.</p>
                </div>


                <div class="form-grid">

                    <div class="form-group">

                        <label>
                            Grade <span class="required">*</span>
                        </label>

                        <select name="grade" required>

                            <option value="">Select Grade</option>

                            <option
                                value="11"
                                {{ old('grade', $student->grade) == '11' ? 'selected' : '' }}
                            >
                                Grade 11
                            </option>

                            <option
                                value="12"
                                {{ old('grade', $student->grade) == '12' ? 'selected' : '' }}
                            >
                                Grade 12
                            </option>

                        </select>

                    </div>


                    <div class="form-group">

                        <label>
                            Section <span class="required">*</span>
                        </label>

                        <input
                            type="text"
                            name="section"
                            value="{{ old('section', $student->section) }}"
                            required
                            maxlength="20"
                            placeholder="e.g. A"
                        >

                    </div>


                    <div class="form-group">

                        <label>
                            Academic Year <span class="required">*</span>
                        </label>

                        <input
                            type="text"
                            name="academic_year"
                            value="{{ old('academic_year', $student->academic_year) }}"
                            required
                            maxlength="20"
                            placeholder="e.g. 2082/83"
                        >

                    </div>


                    <div class="form-group">

                        <label>
                            Course <span class="required">*</span>
                        </label>

                        <input
                            type="text"
                            name="course"
                            value="{{ old('course', $student->course) }}"
                            required
                            maxlength="255"
                        >

                    </div>


                    <div class="form-group">

                        <label>
                            Semester <span class="optional">(Optional)</span>
                        </label>

                        <select name="semester">

                            <option value="">Select Semester</option>

                            @for ($i = 1; $i <= 8; $i++)

                                <option
                                    value="{{ $i }}"
                                    {{ old('semester', $student->semester) == $i ? 'selected' : '' }}
                                >
                                    Semester {{ $i }}
                                </option>

                            @endfor

                        </select>

                    </div>

                </div>


                <div class="section-title">
                    <h2>Parent Details</h2>
                    <p>Parent and guardian contact information.</p>
                </div>


                <div class="parent-box">

                    <h3>Father's Information</h3>

                    <div class="form-grid">

                        <div class="form-group">

                            <label>Father's Name</label>

                            <input
                                type="text"
                                name="father_name"
                                value="{{ old('father_name', $student->father_name) }}"
                                maxlength="255"
                                placeholder="Father's full name"
                            >

                        </div>


                        <div class="form-group">

                            <label>Father's Phone</label>

                            <input
                                type="text"
                                name="father_phone"
                                value="{{ old('father_phone', $student->father_phone) }}"
                                maxlength="20"
                                placeholder="98XXXXXXXX"
                            >

                        </div>


                        <div class="form-group full-width">

                            <label>Father's Occupation</label>

                            <input
                                type="text"
                                name="father_occupation"
                                value="{{ old('father_occupation', $student->father_occupation) }}"
                                maxlength="255"
                                placeholder="Father's occupation"
                            >

                        </div>

                    </div>

                </div>


                <div class="parent-box">

                    <h3>Mother's Information</h3>

                    <div class="form-grid">

                        <div class="form-group">

                            <label>Mother's Name</label>

                            <input
                                type="text"
                                name="mother_name"
                                value="{{ old('mother_name', $student->mother_name) }}"
                                maxlength="255"
                                placeholder="Mother's full name"
                            >

                        </div>


                        <div class="form-group">

                            <label>Mother's Phone</label>

                            <input
                                type="text"
                                name="mother_phone"
                                value="{{ old('mother_phone', $student->mother_phone) }}"
                                maxlength="20"
                                placeholder="98XXXXXXXX"
                            >

                        </div>


                        <div class="form-group full-width">

                            <label>Mother's Occupation</label>

                            <input
                                type="text"
                                name="mother_occupation"
                                value="{{ old('mother_occupation', $student->mother_occupation) }}"
                                maxlength="255"
                                placeholder="Mother's occupation"
                            >

                        </div>

                    </div>

                </div>


                <div class="parent-box">

                    <h3>Guardian Information</h3>

                    <div class="form-grid">

                        <div class="form-group">

                            <label>Guardian's Name</label>

                            <input
                                type="text"
                                name="guardian_name"
                                value="{{ old('guardian_name', $student->guardian_name) }}"
                                maxlength="255"
                                placeholder="Guardian's full name"
                            >

                        </div>


                        <div class="form-group">

                            <label>Guardian's Phone</label>

                            <input
                                type="text"
                                name="guardian_phone"
                                value="{{ old('guardian_phone', $student->guardian_phone) }}"
                                maxlength="20"
                                placeholder="98XXXXXXXX"
                            >

                        </div>


                        <div class="form-group full-width">

                            <label>Guardian's Relation</label>

                            <input
                                type="text"
                                name="guardian_relation"
                                value="{{ old('guardian_relation', $student->guardian_relation) }}"
                                maxlength="100"
                                placeholder="e.g. Uncle, Aunt, Brother"
                            >

                        </div>

                    </div>

                </div>


                <div class="actions">

                    <a
                        href="{{ route('students.index') }}"
                        class="cancel-button"
                    >
                        Cancel
                    </a>

                    <button type="submit" class="update-button">
                        Update Student
                    </button>

                </div>

            </form>

        </div>

    </div>


    <style>

        .student-edit-container {
            width: min(100% - 60px, 1000px);
            margin: 0 auto;
            padding: 40px 0 60px;
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
            color: #111827;
        }

        .student-edit-header p {
            margin: 6px 0 0;
            color: #64748b;
            font-size: 14px;
        }

        .back-button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 10px 16px;
            border-radius: 8px;
            background: #f3f4f6;
            border: 1px solid #e5e7eb;
            color: #374151;
            text-decoration: none;
            font-size: 14px;
            font-weight: 600;
            white-space: nowrap;
        }

        .back-button:hover {
            background: #e5e7eb;
        }

        .student-id {
            background: #eff6ff;
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
            background: #fee2e2;
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
            background: #ffffff;
            border: 1px solid #e5e7eb;
            border-radius: 12px;
            padding: 28px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
        }

        .section-title {
            margin: 0 0 20px;
            padding-bottom: 12px;
            border-bottom: 1px solid #e5e7eb;
        }

        .section-title:not(:first-child) {
            margin-top: 32px;
        }

        .section-title h2 {
            margin: 0;
            color: #111827;
            font-size: 17px;
            font-weight: 700;
        }

        .section-title p {
            margin: 4px 0 0;
            color: #6b7280;
            font-size: 12px;
        }

        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 18px 20px;
        }

        .form-group {
            min-width: 0;
        }

        .full-width {
            grid-column: 1 / -1;
        }

        .form-group label {
            display: block;
            margin-bottom: 6px;
            font-weight: 600;
            color: #374151;
            font-size: 13px;
        }

        .required {
            color: #dc2626;
        }

        .optional {
            font-weight: normal;
            color: #9ca3af;
            font-size: 11px;
        }

        .form-group input,
        .form-group select {
            width: 100%;
            height: 44px;
            padding: 0 12px;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            box-sizing: border-box;
            font-size: 14px;
            color: #111827;
            background: #ffffff;
            outline: none;
        }

        .form-group input:focus,
        .form-group select:focus {
            border-color: #2563eb;
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
        }

        .parent-box {
            margin-top: 18px;
            padding: 20px;
            background: #f9fafb;
            border: 1px solid #e5e7eb;
            border-radius: 10px;
        }

        .parent-box h3 {
            margin: 0 0 18px;
            color: #374151;
            font-size: 14px;
            font-weight: 700;
        }

        .actions {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
            margin-top: 30px;
            padding-top: 22px;
            border-top: 1px solid #e5e7eb;
        }

        .update-button,
        .cancel-button {
            min-height: 42px;
            padding: 0 20px;
            border-radius: 8px;
            font-size: 13px;
            font-weight: 600;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            box-sizing: border-box;
            cursor: pointer;
        }

        .update-button {
            border: none;
            background: #16a34a;
            color: #ffffff;
        }

        .update-button:hover {
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

            .student-edit-container {
                width: calc(100% - 32px);
                padding: 28px 0 40px;
            }

            .student-edit-header {
                flex-direction: column;
                align-items: flex-start;
            }

            .back-button {
                width: 100%;
            }

            .edit-card {
                padding: 20px;
            }

            .form-grid {
                grid-template-columns: 1fr;
            }

            .full-width {
                grid-column: auto;
            }

            .parent-box {
                padding: 16px;
            }

            .actions {
                flex-direction: column;
            }

            .update-button,
            .cancel-button {
                width: 100%;
            }

        }

    </style>

</x-app-layout>