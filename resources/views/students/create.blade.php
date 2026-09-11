<x-app-layout>

    <div class="create-container">

        <div class="form-card">

            <div class="form-card-header">
                <h1>Add New Student</h1>
                <p>Enter the student's information below.</p>
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

                <div class="form-grid">

                    <div class="form-group full-width">
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
                            required
                            maxlength="255"
                        >
                    </div>

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
                            required
                        >
                    </div>

                    <div class="form-group">
                        <label for="phone">
                            Phone
                            <span class="optional">(Optional)</span>
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
                            Date of Birth
                            <span class="optional">(Optional)</span>
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
                            Gender
                            <span class="optional">(Optional)</span>
                        </label>

                        <select id="gender" name="gender">
                            <option value="">Select Gender</option>

                            <option value="Male"
                                {{ old('gender') == 'Male' ? 'selected' : '' }}>
                                Male
                            </option>

                            <option value="Female"
                                {{ old('gender') == 'Female' ? 'selected' : '' }}>
                                Female
                            </option>

                            <option value="Other"
                                {{ old('gender') == 'Other' ? 'selected' : '' }}>
                                Other
                            </option>
                        </select>
                    </div>

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
                            placeholder="e.g. BCA"
                            required
                            maxlength="255"
                        >
                    </div>

                    <div class="form-group">
                        <label for="semester">
                            Semester
                            <span class="optional">(Optional)</span>
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
            transition: 0.2s ease;
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
            padding: 32px;
            background: #ffffff;
            border: 1px solid #e5e7eb;
            border-radius: 14px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.04);
        }

        .form-card-header {
            margin-bottom: 28px;
        }

        .form-card-header h1 {
            margin: 0;
            color: #111827;
            font-size: 26px;
            font-weight: 700;
        }

        .form-card-header p {
            margin: 7px 0 0;
            color: #6b7280;
            font-size: 14px;
        }

        .error-box {
            margin-bottom: 25px;
            padding: 15px 18px;
            background: #fef2f2;
            border: 1px solid #fecaca;
            border-radius: 9px;
            color: #991b1b;
        }

        .error-title {
            margin-bottom: 8px;
            font-size: 14px;
            font-weight: 700;
        }

        .error-box ul {
            margin: 0;
            padding-left: 20px;
            font-size: 13px;
        }

        .error-box li {
            margin-bottom: 4px;
        }

        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 22px 18px;
        }

        .full-width {
            grid-column: span 2;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
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
            font-weight: 500;
        }

        .form-group input,
        .form-group select {
            width: 100%;
            height: 46px;
            box-sizing: border-box;
            padding: 0 13px;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            background: #ffffff;
            color: #111827;
            font-family: inherit;
            font-size: 14px;
            outline: none;
            transition: 0.2s ease;
        }

        .form-group input::placeholder {
            color: #9ca3af;
        }

        .form-group input:focus,
        .form-group select:focus {
            border-color: #2563eb;
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
        }

        .form-actions {
            display: flex;
            justify-content: flex-end;
            align-items: center;
            gap: 10px;
            margin-top: 30px;
            padding-top: 24px;
            border-top: 1px solid #e5e7eb;
        }

        .cancel-button,
        .submit-button {
            min-height: 42px;
            padding: 0 18px;
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

            .create-container {
                width: calc(100% - 32px);
                padding: 28px 0 40px;
            }

            .create-page-header {
                align-items: flex-start;
                flex-direction: column;
            }

            .back-button {
                width: 100%;
            }

            .form-card {
                padding: 22px;
            }

            .form-card-header h1 {
                font-size: 23px;
            }

            .form-grid {
                grid-template-columns: 1fr;
                gap: 18px;
            }

            .full-width {
                grid-column: auto;
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

    </style>

</x-app-layout>