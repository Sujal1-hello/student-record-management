
<x-app-layout>

    <div class="create-container">

        <div class="form-card">

            {{-- =========================
                 PAGE HEADER
            ========================== --}}
            <div class="form-card-header">
                <div>
                    <h1>Student Registration</h1>
                    <p>
                        Enter the student's general, academic and parent information.
                    </p>
                </div>

                <a href="{{ route('students.index') }}" class="back-button">
                    ← Back to Students
                </a>
            </div>


            {{-- =========================
                 VALIDATION ERRORS
            ========================== --}}
            @if ($errors->any())
                <div class="error-box" role="alert">

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


            {{-- =========================
                 SUCCESS MESSAGE
            ========================== --}}
            @if (session('success'))
                <div class="success-box" role="alert">
                    ✓ {{ session('success') }}
                </div>
            @endif


            {{-- =========================
                 STUDENT FORM
            ========================== --}}
            <form
                action="{{ route('students.store') }}"
                method="POST"
                id="studentForm"
            >

                @csrf


                {{-- =========================
                     GENERAL INFORMATION
                ========================== --}}
                <div class="section-title">
                    <div class="section-number">01</div>

                    <div>
                        <h2>General Information</h2>
                        <p>Basic information about the student.</p>
                    </div>
                </div>


                <div class="form-grid">

                    {{-- NAME --}}
                    <div class="form-group">

                        <label for="name">
                            Name
                            <span class="required">*</span>
                        </label>

                        <input
                            id="name"
                            type="text"
                            name="name"
                            value="{{ old('name') }}"
                            placeholder="Enter student's full name"
                            maxlength="255"
                            autocomplete="name"
                            required
                            class="@error('name') input-error @enderror"
                        >

                        @error('name')
                            <span class="field-error">{{ $message }}</span>
                        @enderror

                    </div>


                    {{-- ROLL NUMBER --}}
                    <div class="form-group">

                        <label for="roll_no">
                            Roll No
                            <span class="required">*</span>
                        </label>

                        <input
                            id="roll_no"
                            type="text"
                            name="roll_no"
                            value="{{ old('roll_no') }}"
                            placeholder="Enter roll number"
                            maxlength="50"
                            required
                            class="@error('roll_no') input-error @enderror"
                        >

                        @error('roll_no')
                            <span class="field-error">{{ $message }}</span>
                        @enderror

                    </div>


                    {{-- EMAIL --}}
                    <div class="form-group">

                        <label for="email">
                            Email
                            <span class="required">*</span>
                        </label>

                        <input
                            id="email"
                            type="email"
                            name="email"
                            value="{{ old('email') }}"
                            placeholder="student@example.com"
                            maxlength="255"
                            autocomplete="email"
                            required
                            class="@error('email') input-error @enderror"
                        >

                        @error('email')
                            <span class="field-error">{{ $message }}</span>
                        @enderror

                    </div>


                    {{-- PHONE --}}
                    <div class="form-group">

                        <label for="phone">
                            Phone
                            <span class="optional">(Optional)</span>
                        </label>

                        <input
                            id="phone"
                            type="tel"
                            name="phone"
                            value="{{ old('phone') }}"
                            placeholder="98XXXXXXXX"
                            maxlength="20"
                            inputmode="numeric"
                            autocomplete="tel"
                            class="@error('phone') input-error @enderror"
                        >

                        @error('phone')
                            <span class="field-error">{{ $message }}</span>
                        @enderror

                    </div>


                    {{-- DATE OF BIRTH --}}
                    <div class="form-group">

                        <label for="date_of_birth">
                            Date of Birth
                            <span class="optional">(Optional)</span>
                        </label>

                        <input
                            id="date_of_birth"
                            type="date"
                            name="date_of_birth"
                            value="{{ old('date_of_birth') }}"
                            class="@error('date_of_birth') input-error @enderror"
                        >

                        @error('date_of_birth')
                            <span class="field-error">{{ $message }}</span>
                        @enderror

                    </div>


                    {{-- GENDER --}}
                    <div class="form-group">

                        <label for="gender">
                            Gender
                            <span class="optional">(Optional)</span>
                        </label>

                        <select
                            id="gender"
                            name="gender"
                            class="@error('gender') input-error @enderror"
                        >

                            <option value="">Select Gender</option>

                            <option
                                value="Male"
                                {{ old('gender') === 'Male' ? 'selected' : '' }}
                            >
                                Male
                            </option>

                            <option
                                value="Female"
                                {{ old('gender') === 'Female' ? 'selected' : '' }}
                            >
                                Female
                            </option>

                            <option
                                value="Other"
                                {{ old('gender') === 'Other' ? 'selected' : '' }}
                            >
                                Other
                            </option>

                        </select>

                        @error('gender')
                            <span class="field-error">{{ $message }}</span>
                        @enderror

                    </div>

                </div>



                {{-- =========================
                     ACADEMIC INFORMATION
                ========================== --}}
                <div class="section-title">

                    <div class="section-number">02</div>

                    <div>
                        <h2>Academic Information</h2>
                        <p>Student's grade, section and academic details.</p>
                    </div>

                </div>


                <div class="form-grid">

                    {{-- GRADE --}}
                    <div class="form-group">

                        <label for="grade">
                            Grade
                            <span class="required">*</span>
                        </label>

                        <select
                            id="grade"
                            name="grade"
                            required
                            class="@error('grade') input-error @enderror"
                        >

                            <option value="">Select Grade</option>

                            <option
                                value="11"
                                {{ old('grade') == '11' ? 'selected' : '' }}
                            >
                                Grade 11
                            </option>

                            <option
                                value="12"
                                {{ old('grade') == '12' ? 'selected' : '' }}
                            >
                                Grade 12
                            </option>

                        </select>

                        @error('grade')
                            <span class="field-error">{{ $message }}</span>
                        @enderror

                    </div>


                    {{-- SECTION --}}
                    <div class="form-group">

                        <label for="section">
                            Section
                            <span class="required">*</span>
                        </label>

                        <input
                            id="section"
                            type="text"
                            name="section"
                            value="{{ old('section') }}"
                            placeholder="e.g. A"
                            maxlength="20"
                            required
                            class="@error('section') input-error @enderror"
                        >

                        @error('section')
                            <span class="field-error">{{ $message }}</span>
                        @enderror

                    </div>


                    {{-- ACADEMIC YEAR --}}
                    <div class="form-group">

                        <label for="academic_year">
                            Academic Year
                            <span class="required">*</span>
                        </label>

                        <input
                            id="academic_year"
                            type="text"
                            name="academic_year"
                            value="{{ old('academic_year') }}"
                            placeholder="e.g. 2082/83"
                            maxlength="20"
                            required
                            class="@error('academic_year') input-error @enderror"
                        >

                        <small class="field-hint">
                            Example: 2082/83
                        </small>

                        @error('academic_year')
                            <span class="field-error">{{ $message }}</span>
                        @enderror

                    </div>


                    {{-- COURSE --}}
                    <div class="form-group">

                        <label for="course">
                            Course
                            <span class="required">*</span>
                        </label>

                        <input
                            id="course"
                            type="text"
                            name="course"
                            value="{{ old('course') }}"
                            placeholder="e.g. Science"
                            maxlength="255"
                            required
                            class="@error('course') input-error @enderror"
                        >

                        @error('course')
                            <span class="field-error">{{ $message }}</span>
                        @enderror

                    </div>


                    {{-- SEMESTER --}}
                    <div class="form-group">

                        <label for="semester">
                            Semester
                            <span class="optional">(Optional)</span>
                        </label>

                        <select
                            id="semester"
                            name="semester"
                            class="@error('semester') input-error @enderror"
                        >

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

                        @error('semester')
                            <span class="field-error">{{ $message }}</span>
                        @enderror

                    </div>

                </div>



                {{-- =========================
                     PARENT DETAILS
                ========================== --}}
                <div class="section-title">

                    <div class="section-number">03</div>

                    <div>
                        <h2>Parent Details</h2>
                        <p>Contact information for parents or guardians.</p>
                    </div>

                </div>



                {{-- =========================
                     FATHER
                ========================== --}}
                <div class="parent-box">

                    <div class="parent-heading">

                        <div class="parent-icon">
                            F
                        </div>

                        <div>
                            <h3>Father's Information</h3>
                            <p>Father's contact and occupation details.</p>
                        </div>

                    </div>


                    <div class="form-grid">

                        {{-- FATHER NAME --}}
                        <div class="form-group">

                            <label for="father_name">
                                Father's Name
                            </label>

                            <input
                                id="father_name"
                                type="text"
                                name="father_name"
                                value="{{ old('father_name') }}"
                                placeholder="Father's full name"
                                maxlength="255"
                                autocomplete="name"
                                class="@error('father_name') input-error @enderror"
                            >

                            @error('father_name')
                                <span class="field-error">{{ $message }}</span>
                            @enderror

                        </div>


                        {{-- FATHER PHONE --}}
                        <div class="form-group">

                            <label for="father_phone">
                                Father's Phone
                            </label>

                            <input
                                id="father_phone"
                                type="tel"
                                name="father_phone"
                                value="{{ old('father_phone') }}"
                                placeholder="98XXXXXXXX"
                                maxlength="20"
                                inputmode="numeric"
                                autocomplete="tel"
                                class="@error('father_phone') input-error @enderror"
                            >

                            @error('father_phone')
                                <span class="field-error">{{ $message }}</span>
                            @enderror

                        </div>


                        {{-- FATHER OCCUPATION --}}
                        <div class="form-group full-width">

                            <label for="father_occupation">
                                Father's Occupation
                            </label>

                            <input
                                id="father_occupation"
                                type="text"
                                name="father_occupation"
                                value="{{ old('father_occupation') }}"
                                placeholder="Father's occupation"
                                maxlength="255"
                                class="@error('father_occupation') input-error @enderror"
                            >

                            @error('father_occupation')
                                <span class="field-error">{{ $message }}</span>
                            @enderror

                        </div>

                    </div>

                </div>



                {{-- =========================
                     MOTHER
                ========================== --}}
                <div class="parent-box">

                    <div class="parent-heading">

                        <div class="parent-icon">
                            M
                        </div>

                        <div>
                            <h3>Mother's Information</h3>
                            <p>Mother's contact and occupation details.</p>
                        </div>

                    </div>


                    <div class="form-grid">

                        {{-- MOTHER NAME --}}
                        <div class="form-group">

                            <label for="mother_name">
                                Mother's Name
                            </label>

                            <input
                                id="mother_name"
                                type="text"
                                name="mother_name"
                                value="{{ old('mother_name') }}"
                                placeholder="Mother's full name"
                                maxlength="255"
                                autocomplete="name"
                                class="@error('mother_name') input-error @enderror"
                            >

                            @error('mother_name')
                                <span class="field-error">{{ $message }}</span>
                            @enderror

                        </div>


                        {{-- MOTHER PHONE --}}
                        <div class="form-group">

                            <label for="mother_phone">
                                Mother's Phone
                            </label>

                            <input
                                id="mother_phone"
                                type="tel"
                                name="mother_phone"
                                value="{{ old('mother_phone') }}"
                                placeholder="98XXXXXXXX"
                                maxlength="20"
                                inputmode="numeric"
                                autocomplete="tel"
                                class="@error('mother_phone') input-error @enderror"
                            >

                            @error('mother_phone')
                                <span class="field-error">{{ $message }}</span>
                            @enderror

                        </div>


                        {{-- MOTHER OCCUPATION --}}
                        <div class="form-group full-width">

                            <label for="mother_occupation">
                                Mother's Occupation
                            </label>

                            <input
                                id="mother_occupation"
                                type="text"
                                name="mother_occupation"
                                value="{{ old('mother_occupation') }}"
                                placeholder="Mother's occupation"
                                maxlength="255"
                                class="@error('mother_occupation') input-error @enderror"
                            >

                            @error('mother_occupation')
                                <span class="field-error">{{ $message }}</span>
                            @enderror

                        </div>

                    </div>

                </div>



                {{-- =========================
                     GUARDIAN
                ========================== --}}
                <div class="parent-box">

                    <div class="parent-heading">

                        <div class="parent-icon">
                            G
                        </div>

                        <div>
                            <h3>Guardian Information</h3>
                            <p>Alternative guardian information if applicable.</p>
                        </div>

                    </div>


                    <div class="form-grid">

                        {{-- GUARDIAN NAME --}}
                        <div class="form-group">

                            <label for="guardian_name">
                                Guardian's Name
                            </label>

                            <input
                                id="guardian_name"
                                type="text"
                                name="guardian_name"
                                value="{{ old('guardian_name') }}"
                                placeholder="Guardian's full name"
                                maxlength="255"
                                autocomplete="name"
                                class="@error('guardian_name') input-error @enderror"
                            >

                            @error('guardian_name')
                                <span class="field-error">{{ $message }}</span>
                            @enderror

                        </div>


                        {{-- GUARDIAN PHONE --}}
                        <div class="form-group">

                            <label for="guardian_phone">
                                Guardian's Phone
                            </label>

                            <input
                                id="guardian_phone"
                                type="tel"
                                name="guardian_phone"
                                value="{{ old('guardian_phone') }}"
                                placeholder="98XXXXXXXX"
                                maxlength="20"
                                inputmode="numeric"
                                autocomplete="tel"
                                class="@error('guardian_phone') input-error @enderror"
                            >

                            @error('guardian_phone')
                                <span class="field-error">{{ $message }}</span>
                            @enderror

                        </div>


                        {{-- GUARDIAN RELATION --}}
                        <div class="form-group full-width">

                            <label for="guardian_relation">
                                Guardian's Relation
                            </label>

                            <input
                                id="guardian_relation"
                                type="text"
                                name="guardian_relation"
                                value="{{ old('guardian_relation') }}"
                                placeholder="e.g. Uncle, Aunt, Brother"
                                maxlength="100"
                                class="@error('guardian_relation') input-error @enderror"
                            >

                            @error('guardian_relation')
                                <span class="field-error">{{ $message }}</span>
                            @enderror

                        </div>

                    </div>

                </div>



                {{-- =========================
                     FORM ACTIONS
                ========================== --}}
                <div class="form-actions">

                    <a
                        href="{{ route('students.index') }}"
                        class="cancel-button"
                    >
                        Cancel
                    </a>

                    <button
                        type="submit"
                        class="submit-button"
                        id="submitButton"
                    >
                        <span id="submitText">
                            Add Student
                        </span>

                        <span
                            id="loadingText"
                            class="loading-text"
                        >
                            Saving...
                        </span>
                    </button>

                </div>

            </form>

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
           MAIN CONTAINER
        ========================== */

        .create-container {
            width: min(100% - 40px, 1100px);
            margin: 0 auto;
            padding: 40px 0 70px;
        }


        /* =========================
           FORM CARD
        ========================== */

        .form-card {
            background: #ffffff;
            border: 1px solid #e5e7eb;
            border-radius: 16px;
            padding: 34px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
        }


        /* =========================
           HEADER
        ========================== */

        .form-card-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
            margin-bottom: 30px;
            padding-bottom: 24px;
            border-bottom: 1px solid #e5e7eb;
        }


        .form-card-header h1 {
            margin: 0;
            color: #111827;
            font-size: 26px;
            line-height: 1.3;
            font-weight: 750;
        }


        .form-card-header p {
            margin: 7px 0 0;
            color: #6b7280;
            font-size: 14px;
        }


        /* =========================
           BACK BUTTON
        ========================== */

        .back-button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-height: 40px;
            padding: 0 15px;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            background: #ffffff;
            color: #374151;
            text-decoration: none;
            font-size: 13px;
            font-weight: 600;
            white-space: nowrap;
            transition: 0.2s ease;
        }


        .back-button:hover {
            background: #f3f4f6;
            border-color: #9ca3af;
        }


        /* =========================
           SECTION TITLE
        ========================== */

        .section-title {
            display: flex;
            align-items: center;
            gap: 13px;
            margin: 32px 0 20px;
            padding-bottom: 13px;
            border-bottom: 1px solid #e5e7eb;
        }


        .section-title:first-of-type {
            margin-top: 0;
        }


        .section-number {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 32px;
            height: 32px;
            flex-shrink: 0;
            border-radius: 8px;
            background: #eff6ff;
            color: #2563eb;
            font-size: 11px;
            font-weight: 800;
        }


        .section-title h2 {
            margin: 0;
            color: #111827;
            font-size: 17px;
            font-weight: 700;
        }


        .section-title p {
            margin: 3px 0 0;
            color: #6b7280;
            font-size: 12px;
        }


        /* =========================
           FORM GRID
        ========================== */

        .form-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 20px;
        }


        .form-group {
            min-width: 0;
        }


        .full-width {
            grid-column: 1 / -1;
        }


        /* =========================
           LABELS
        ========================== */

        .form-group label {
            display: block;
            margin-bottom: 7px;
            color: #374151;
            font-size: 13px;
            font-weight: 650;
        }


        .required {
            color: #dc2626;
            font-weight: 700;
        }


        .optional {
            color: #9ca3af;
            font-size: 11px;
            font-weight: 400;
        }


        /* =========================
           INPUTS
        ========================== */

        .form-group input,
        .form-group select {
            width: 100%;
            height: 44px;
            padding: 0 13px;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            outline: none;
            background: #ffffff;
            color: #111827;
            font-family: inherit;
            font-size: 14px;
            transition:
                border-color 0.2s ease,
                box-shadow 0.2s ease,
                background 0.2s ease;
        }


        .form-group input::placeholder {
            color: #9ca3af;
        }


        .form-group input:hover,
        .form-group select:hover {
            border-color: #9ca3af;
        }


        .form-group input:focus,
        .form-group select:focus {
            border-color: #2563eb;
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.10);
        }


        /* =========================
           ERROR INPUT
        ========================== */

        .form-group input.input-error,
        .form-group select.input-error {
            border-color: #dc2626;
            background: #fffafa;
        }


        .form-group input.input-error:focus,
        .form-group select.input-error:focus {
            border-color: #dc2626;
            box-shadow: 0 0 0 3px rgba(220, 38, 38, 0.10);
        }


        .field-error {
            display: block;
            margin-top: 6px;
            color: #dc2626;
            font-size: 12px;
            line-height: 1.4;
        }


        .field-hint {
            display: block;
            margin-top: 5px;
            color: #9ca3af;
            font-size: 11px;
        }


        /* =========================
           PARENT BOX
        ========================== */

        .parent-box {
            margin-top: 20px;
            padding: 22px;
            border: 1px solid #e5e7eb;
            border-radius: 12px;
            background: #f9fafb;
        }


        .parent-heading {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 20px;
        }


        .parent-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 34px;
            height: 34px;
            flex-shrink: 0;
            border-radius: 9px;
            background: #ffffff;
            border: 1px solid #e5e7eb;
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


        .parent-heading p {
            margin: 3px 0 0;
            color: #9ca3af;
            font-size: 11px;
        }


        /* =========================
           ERROR BOX
        ========================== */

        .error-box {
            margin-bottom: 25px;
            padding: 15px 18px;
            border: 1px solid #fecaca;
            border-radius: 9px;
            background: #fef2f2;
            color: #991b1b;
        }


        .error-title {
            margin-bottom: 7px;
            font-size: 13px;
            font-weight: 700;
        }


        .error-box ul {
            margin: 0;
            padding-left: 20px;
            font-size: 13px;
        }


        .error-box li {
            margin-bottom: 3px;
        }


        /* =========================
           SUCCESS BOX
        ========================== */

        .success-box {
            margin-bottom: 25px;
            padding: 14px 18px;
            border: 1px solid #bbf7d0;
            border-radius: 9px;
            background: #f0fdf4;
            color: #166534;
            font-size: 13px;
            font-weight: 600;
        }


        /* =========================
           FORM ACTIONS
        ========================== */

        .form-actions {
            display: flex;
            justify-content: flex-end;
            align-items: center;
            gap: 10px;
            margin-top: 32px;
            padding-top: 24px;
            border-top: 1px solid #e5e7eb;
        }


        .cancel-button,
        .submit-button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-height: 44px;
            padding: 0 21px;
            border-radius: 8px;
            font-family: inherit;
            font-size: 13px;
            font-weight: 650;
            text-decoration: none;
            cursor: pointer;
            transition: 0.2s ease;
        }


        .cancel-button {
            border: 1px solid #d1d5db;
            background: #ffffff;
            color: #374151;
        }


        .cancel-button:hover {
            background: #f3f4f6;
            border-color: #9ca3af;
        }


        .submit-button {
            border: 1px solid #2563eb;
            background: #2563eb;
            color: #ffffff;
        }


        .submit-button:hover {
            background: #1d4ed8;
            border-color: #1d4ed8;
        }


        .submit-button:disabled {
            opacity: 0.65;
            cursor: not-allowed;
        }


        .loading-text {
            display: none;
        }


        /* =========================
           MOBILE
        ========================== */

        @media (max-width: 760px) {

            .create-container {
                width: calc(100% - 24px);
                padding: 24px 0 40px;
            }


            .form-card {
                padding: 22px 18px;
                border-radius: 12px;
            }


            .form-card-header {
                align-items: flex-start;
                flex-direction: column;
                gap: 15px;
            }


            .form-card-header h1 {
                font-size: 22px;
            }


            .back-button {
                width: 100%;
            }


            .form-grid {
                grid-template-columns: 1fr;
                gap: 16px;
            }


            .full-width {
                grid-column: auto;
            }


            .parent-box {
                padding: 17px;
            }


            .section-title {
                margin-top: 28px;
            }


            .form-actions {
                flex-direction: column-reverse;
                align-items: stretch;
            }


            .cancel-button,
            .submit-button {
                width: 100%;
            }

        }


        /* =========================
           SMALL MOBILE
        ========================== */

        @media (max-width: 420px) {

            .create-container {
                width: calc(100% - 16px);
            }


            .form-card {
                padding: 18px 14px;
            }


            .parent-box {
                padding: 14px;
            }


            .section-title h2 {
                font-size: 16px;
            }

        }

    </style>



    {{-- =========================
         FORM JAVASCRIPT
    ========================== --}}
    <script>

        document.addEventListener('DOMContentLoaded', function () {

            const form = document.getElementById('studentForm');
            const button = document.getElementById('submitButton');
            const submitText = document.getElementById('submitText');
            const loadingText = document.getElementById('loadingText');

            if (!form || !button) {
                return;
            }

            form.addEventListener('submit', function () {

                button.disabled = true;

                submitText.style.display = 'none';
                loadingText.style.display = 'inline';

            });

        });

    </script>

</x-app-layout>

