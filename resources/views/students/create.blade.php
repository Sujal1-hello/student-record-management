<x-app-layout>


    <div class="create-container">

        <div class="form-card">

            <div class="form-card-header">
                <h1>Student Registration</h1>
                <p>Enter the student's general, academic and parent information.</p>
            </div>

            @if ($errors->any())
                <div class="error-box">
                    <div class="error-title">
                        Please fix the following errors:
                    </div>

                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('students.store') }}" method="POST">
                @csrf

                <div class="section-title">
                    <h2>General Information</h2>
                    <p>Basic information about the student.</p>
                </div>

                <div class="form-grid">

                    <div class="form-group">
                        <label for="name">
                            Name <span class="required">*</span>
                        </label>

                        <input
                            id="name"
                            type="text"
                            name="name"
                            value="{{ old('name') }}"
                            placeholder="Enter student's full name"
                            required
                            maxlength="255"
                        >
                    </div>

                    <div class="form-group">
                        <label for="roll_no">
                            Roll No <span class="required">*</span>
                        </label>

                        <input
                            id="roll_no"
                            type="text"
                            name="roll_no"
                            value="{{ old('roll_no') }}"
                            placeholder="Enter roll number"
                            required
                            maxlength="50"
                        >
                    </div>

                    <div class="form-group">
                        <label for="email">
                            Email <span class="required">*</span>
                        </label>

                        <input
                            id="email"
                            type="email"
                            name="email"
                            value="{{ old('email') }}"
                            placeholder="student@example.com"
                            required
                        >
                    </div>

                    <div class="form-group">
                        <label for="phone">
                            Phone <span class="optional">(Optional)</span>
                        </label>

                        <input
                            id="phone"
                            type="text"
                            name="phone"
                            value="{{ old('phone') }}"
                            placeholder="98XXXXXXXX"
                            maxlength="20"
                        >
                    </div>

                    <div class="form-group">
                        <label for="date_of_birth">
                            Date of Birth <span class="optional">(Optional)</span>
                        </label>

                        <input
                            id="date_of_birth"
                            type="date"
                            name="date_of_birth"
                            value="{{ old('date_of_birth') }}"
                        >
                    </div>

                    <div class="form-group">
                        <label for="gender">
                            Gender <span class="optional">(Optional)</span>
                        </label>

                        <select id="gender" name="gender">
                            <option value="">Select Gender</option>
                            <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>
                                Male
                            </option>
                            <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>
                                Female
                            </option>
                            <option value="Other" {{ old('gender') == 'Other' ? 'selected' : '' }}>
                                Other
                            </option>
                        </select>
                    </div>

                </div>


                <div class="section-title">
                    <h2>Academic Information</h2>
                    <p>Student's grade, section and academic details.</p>
                </div>

                <div class="form-grid">

                    <div class="form-group">
                        <label for="grade">
                            Grade <span class="required">*</span>
                        </label>

                        <select id="grade" name="grade" required>
                            <option value="">Select Grade</option>

                            <option value="11" {{ old('grade') == '11' ? 'selected' : '' }}>
                                Grade 11
                            </option>

                            <option value="12" {{ old('grade') == '12' ? 'selected' : '' }}>
                                Grade 12
                            </option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="section">
                            Section <span class="required">*</span>
                        </label>

                        <input
                            id="section"
                            type="text"
                            name="section"
                            value="{{ old('section') }}"
                            placeholder="e.g. A"
                            required
                            maxlength="20"
                        >
                    </div>

                    <div class="form-group">
                        <label for="academic_year">
                            Academic Year <span class="required">*</span>
                        </label>

                        <input
                            id="academic_year"
                            type="text"
                            name="academic_year"
                            value="{{ old('academic_year') }}"
                            placeholder="e.g. 2082/83"
                            required
                            maxlength="20"
                        >
                    </div>

                    <div class="form-group">
                        <label for="course">
                            Course <span class="required">*</span>
                        </label>

                        <input
                            id="course"
                            type="text"
                            name="course"
                            value="{{ old('course') }}"
                            placeholder="e.g. Science"
                            required
                            maxlength="255"
                        >
                    </div>

                    <div class="form-group">
                        <label for="semester">
                            Semester <span class="optional">(Optional)</span>
                        </label>

                        <select id="semester" name="semester">
                            <option value="">Select Semester</option>

                            @for ($i = 1; $i <= 8; $i++)
                                <option
                                    value="{{ $i }}"
                                    {{ old('semester') == $i ? 'selected' : '' }}
                                >
                                    Semester {{ $i }}
                                </option>
                            @endfor
                        </select>
                    </div>

                </div>


                <div class="section-title">
                    <h2>Parent Details</h2>
                    <p>Contact information for parents or guardians.</p>
                </div>

                <div class="parent-box">

                    <h3>Father's Information</h3>

                    <div class="form-grid">

                        <div class="form-group">
                            <label for="father_name">Father's Name</label>

                            <input
                                id="father_name"
                                type="text"
                                name="father_name"
                                value="{{ old('father_name') }}"
                                placeholder="Father's full name"
                                maxlength="255"
                            >
                        </div>

                        <div class="form-group">
                            <label for="father_phone">Father's Phone</label>

                            <input
                                id="father_phone"
                                type="text"
                                name="father_phone"
                                value="{{ old('father_phone') }}"
                                placeholder="98XXXXXXXX"
                                maxlength="20"
                            >
                        </div>

                        <div class="form-group full-width">
                            <label for="father_occupation">Father's Occupation</label>

                            <input
                                id="father_occupation"
                                type="text"
                                name="father_occupation"
                                value="{{ old('father_occupation') }}"
                                placeholder="Father's occupation"
                                maxlength="255"
                            >
                        </div>

                    </div>

                </div>


                <div class="parent-box">

                    <h3>Mother's Information</h3>

                    <div class="form-grid">

                        <div class="form-group">
                            <label for="mother_name">Mother's Name</label>

                            <input
                                id="mother_name"
                                type="text"
                                name="mother_name"
                                value="{{ old('mother_name') }}"
                                placeholder="Mother's full name"
                                maxlength="255"
                            >
                        </div>

                        <div class="form-group">
                            <label for="mother_phone">Mother's Phone</label>

                            <input
                                id="mother_phone"
                                type="text"
                                name="mother_phone"
                                value="{{ old('mother_phone') }}"
                                placeholder="98XXXXXXXX"
                                maxlength="20"
                            >
                        </div>

                        <div class="form-group full-width">
                            <label for="mother_occupation">Mother's Occupation</label>

                            <input
                                id="mother_occupation"
                                type="text"
                                name="mother_occupation"
                                value="{{ old('mother_occupation') }}"
                                placeholder="Mother's occupation"
                                maxlength="255"
                            >
                        </div>

                    </div>

                </div>


                <div class="parent-box">

                    <h3>Guardian Information</h3>

                    <div class="form-grid">

                        <div class="form-group">
                            <label for="guardian_name">Guardian's Name</label>

                            <input
                                id="guardian_name"
                                type="text"
                                name="guardian_name"
                                value="{{ old('guardian_name') }}"
                                placeholder="Guardian's full name"
                                maxlength="255"
                            >
                        </div>

                        <div class="form-group">
                            <label for="guardian_phone">Guardian's Phone</label>

                            <input
                                id="guardian_phone"
                                type="text"
                                name="guardian_phone"
                                value="{{ old('guardian_phone') }}"
                                placeholder="98XXXXXXXX"
                                maxlength="20"
                            >
                        </div>

                        <div class="form-group full-width">
                            <label for="guardian_relation">Guardian's Relation</label>

                            <input
                                id="guardian_relation"
                                type="text"
                                name="guardian_relation"
                                value="{{ old('guardian_relation') }}"
                                placeholder="e.g. Uncle, Aunt, Brother"
                                maxlength="100"
                            >
                        </div>

                    </div>

                </div>


                <div class="form-actions">

                    <a
                        href="{{ route('students.index') }}"
                        class="cancel-button"
                    >
                        Cancel
                    </a>

                    <button type="submit" class="submit-button">
                        Add Student
                    </button>

                </div>

            </form>

        </div>

    </div>


    <style>

        .create-page-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
        }

        .create-page-header h2 {
            margin: 0;
            color: #111827;
            font-size: 22px;
            font-weight: 700;
        }

        .create-page-header p {
            margin: 4px 0 0;
            color: #6b7280;
            font-size: 13px;
        }

        .back-button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 10px 16px;
            border: 1px solid #e5e7eb;
            border-radius: 8px;
            background: #ffffff;
            color: #374151;
            text-decoration: none;
            font-size: 13px;
            font-weight: 600;
        }

        .back-button:hover {
            background: #f3f4f6;
        }

        .create-container {
            width: min(100% - 60px, 1000px);
            margin: 0 auto;
            padding: 40px 0 60px;
        }

        .form-card {
            padding: 30px;
            background: #ffffff;
            border: 1px solid #e5e7eb;
            border-radius: 14px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
        }

        .form-card-header {
            margin-bottom: 30px;
        }

        .form-card-header h1 {
            margin: 0;
            color: #111827;
            font-size: 24px;
            font-weight: 700;
        }

        .form-card-header p {
            margin: 6px 0 0;
            color: #6b7280;
            font-size: 14px;
        }

        .section-title {
            margin: 30px 0 18px;
            padding-bottom: 12px;
            border-bottom: 1px solid #e5e7eb;
        }

        .section-title:first-of-type {
            margin-top: 0;
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
            gap: 20px;
        }

        .form-group {
            min-width: 0;
        }

        .full-width {
            grid-column: 1 / -1;
        }

        .form-group label {
            display: block;
            margin-bottom: 7px;
            color: #374151;
            font-size: 13px;
            font-weight: 600;
        }

        .required {
            color: #dc2626;
        }

        .optional {
            color: #9ca3af;
            font-size: 11px;
            font-weight: 400;
        }

        .form-group input,
        .form-group select {
            width: 100%;
            height: 44px;
            box-sizing: border-box;
            padding: 0 13px;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            background: #ffffff;
            color: #111827;
            font-family: inherit;
            font-size: 14px;
            outline: none;
        }

        .form-group input:focus,
        .form-group select:focus {
            border-color: #2563eb;
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
        }

        .parent-box {
            margin-top: 20px;
            padding: 20px;
            border: 1px solid #e5e7eb;
            border-radius: 10px;
            background: #f9fafb;
        }

        .parent-box h3 {
            margin: 0 0 18px;
            color: #374151;
            font-size: 14px;
            font-weight: 700;
        }

        .error-box {
            margin-bottom: 25px;
            padding: 15px 18px;
            border: 1px solid #fecaca;
            border-radius: 8px;
            background: #fef2f2;
            color: #991b1b;
        }

        .error-title {
            margin-bottom: 6px;
            font-size: 13px;
            font-weight: 700;
        }

        .error-box ul {
            margin: 0;
            padding-left: 20px;
            font-size: 13px;
        }

        .form-actions {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
            margin-top: 30px;
            padding-top: 22px;
            border-top: 1px solid #e5e7eb;
        }

        .cancel-button,
        .submit-button {
            min-height: 42px;
            padding: 0 20px;
            border-radius: 8px;
            font-family: inherit;
            font-size: 13px;
            font-weight: 600;
            text-decoration: none;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            box-sizing: border-box;
        }

        .cancel-button {
            border: 1px solid #d1d5db;
            background: #ffffff;
            color: #374151;
        }

        .cancel-button:hover {
            background: #f3f4f6;
        }

        .submit-button {
            border: 0;
            background: #2563eb;
            color: #ffffff;
        }

        .submit-button:hover {
            background: #1d4ed8;
        }

        @media (max-width: 700px) {

            .create-page-header {
                align-items: flex-start;
                flex-direction: column;
            }

            .back-button {
                width: 100%;
            }

            .create-container {
                width: calc(100% - 32px);
                padding: 28px 0 40px;
            }

            .form-card {
                padding: 22px;
            }

            .form-grid {
                grid-template-columns: 1fr;
                gap: 16px;
            }

            .full-width {
                grid-column: auto;
            }

            .parent-box {
                padding: 16px;
            }

            .form-actions {
                flex-direction: column;
            }

            .cancel-button,
            .submit-button {
                width: 100%;
            }
        }

    </style>

</x-app-layout>