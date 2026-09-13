<x-app-layout>

    <style>
        .fee-page {
            background: #f3f4f6;
            min-height: 100vh;
            padding: 32px 20px 50px;
        }

        .fee-container {
            width: 100%;
            max-width: 1100px;
            margin: 0 auto;
        }

        .fee-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 24px;
            gap: 20px;
        }

        .fee-header h1 {
            margin: 0;
            font-size: 28px;
            font-weight: 700;
            color: #111827;
        }

        .fee-header p {
            margin: 6px 0 0;
            font-size: 14px;
            color: #6b7280;
        }

        .back-button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 10px 16px;
            background: white;
            color: #374151;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
            transition: 0.2s;
        }

        .back-button:hover {
            background: #f9fafb;
        }

        .fee-card {
            background: white;
            border: 1px solid #e5e7eb;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
            margin-bottom: 20px;
            overflow: hidden;
        }

        .form-section {
            padding: 24px;
        }

        .section-title {
            margin: 0 0 20px;
            font-size: 18px;
            font-weight: 650;
            color: #111827;
        }

        .field-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 18px;
        }

        .field-group {
            display: flex;
            flex-direction: column;
        }

        .field-group.full {
            grid-column: 1 / -1;
        }

        .field-label {
            display: block;
            margin-bottom: 7px;
            font-size: 14px;
            font-weight: 600;
            color: #374151;
        }

        .field-input,
        .field-select {
            width: 100%;
            box-sizing: border-box;
            min-height: 44px;
            padding: 10px 12px;
            background: white;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            color: #111827;
            font-size: 14px;
            outline: none;
            transition: 0.2s;
        }

        .field-input:focus,
        .field-select:focus {
            border-color: #2563eb;
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
        }

        .field-input::placeholder {
            color: #9ca3af;
        }

        .student-select {
            max-width: 700px;
        }

        .payment-summary {
            margin-top: 22px;
            padding: 18px;
            background: #f9fafb;
            border: 1px solid #e5e7eb;
            border-radius: 10px;
        }

        .summary-title {
            margin: 0 0 14px;
            font-size: 15px;
            font-weight: 600;
            color: #374151;
        }

        .summary-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 14px;
        }

        .summary-box {
            background: white;
            border: 1px solid #e5e7eb;
            border-radius: 8px;
            padding: 14px;
        }

        .summary-label {
            font-size: 12px;
            color: #6b7280;
            margin-bottom: 5px;
        }

        .summary-value {
            font-size: 18px;
            font-weight: 700;
            color: #111827;
        }

        .status-value {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 44px;
            padding: 8px 12px;
            border-radius: 8px;
            background: #fee2e2;
            color: #b91c1c;
            font-size: 14px;
            font-weight: 600;
        }

        .amount-error {
            margin-top: 12px;
            padding: 10px 12px;
            border-radius: 8px;
            background: #fef2f2;
            border: 1px solid #fecaca;
            color: #dc2626;
            font-size: 13px;
        }

        .form-actions {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
            margin-top: 24px;
            padding-bottom: 10px;
        }

        .cancel-button,
        .save-button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-height: 44px;
            padding: 10px 20px;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 600;
            text-decoration: none;
            cursor: pointer;
            transition: 0.2s;
        }

        .cancel-button {
            background: white;
            color: #374151;
            border: 1px solid #d1d5db;
        }

        .cancel-button:hover {
            background: #f3f4f6;
        }

        .save-button {
            background: #2563eb;
            color: white;
            border: 1px solid #2563eb;
            box-shadow: 0 2px 4px rgba(37, 99, 235, 0.15);
        }

        .save-button:hover {
            background: #1d4ed8;
            border-color: #1d4ed8;
        }

        .save-button:disabled {
            background: #9ca3af;
            border-color: #9ca3af;
            cursor: not-allowed;
            box-shadow: none;
        }

        .error-box {
            margin-bottom: 20px;
            padding: 14px 16px;
            border-radius: 10px;
            background: #fef2f2;
            border: 1px solid #fecaca;
            color: #b91c1c;
        }

        .error-box h3 {
            margin: 0 0 8px;
            font-size: 14px;
            font-weight: 600;
        }

        .error-box ul {
            margin: 0;
            padding-left: 20px;
        }

        .error-box li {
            margin-bottom: 3px;
        }

        @media (max-width: 768px) {

            .fee-page {
                padding: 24px 14px 40px;
            }

            .fee-header {
                flex-direction: column;
                align-items: flex-start;
            }

            .back-button {
                width: 100%;
            }

            .field-grid,
            .summary-grid {
                grid-template-columns: 1fr;
            }

            .field-group.full {
                grid-column: auto;
            }

            .form-section {
                padding: 18px;
            }

            .student-select {
                max-width: 100%;
            }

            .form-actions {
                flex-direction: column-reverse;
            }

            .cancel-button,
            .save-button {
                width: 100%;
            }
        }
    </style>

    <div class="fee-page">

        <div class="fee-container">

            {{-- Header --}}
            <div class="fee-header">

                <div>
                    <h1>
                        Add Fee
                    </h1>

                    <p>
                        Add a new student fee record
                    </p>
                </div>

                <a
                    href="{{ route('fees.index') }}"
                    class="back-button"
                >
                    ← Back to Fees
                </a>

            </div>

            {{-- Validation Errors --}}
            @if ($errors->any())

                <div class="error-box">

                    <h3>
                        Please fix the following errors:
                    </h3>

                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>
                                {{ $error }}
                            </li>
                        @endforeach
                    </ul>

                </div>

            @endif

            <form
                method="POST"
                action="{{ route('fees.store') }}"
                id="feeForm"
            >

                @csrf

                {{-- Student Information --}}
                <div class="fee-card">

                    <div class="form-section">

                        <h2 class="section-title">
                            Student Information
                        </h2>

                        <div class="field-group">

                            <label
                                for="student_id"
                                class="field-label"
                            >
                                Student
                            </label>

                            <select
                                name="student_id"
                                id="student_id"
                                class="field-select student-select"
                                required
                            >

                                <option value="">
                                    Select Student
                                </option>

                                @foreach($students as $student)

                                    <option
                                        value="{{ $student->id }}"
                                        data-grade="{{ $student->grade }}"
                                        data-academic-year="{{ $student->academic_year }}"
                                        {{ old('student_id') == $student->id ? 'selected' : '' }}
                                    >
                                        {{ $student->student_id }} - {{ $student->name }}
                                    </option>

                                @endforeach

                            </select>

                        </div>

                    </div>

                </div>

                {{-- Academic Information --}}
                <div class="fee-card">

                    <div class="form-section">

                        <h2 class="section-title">
                            Academic Information
                        </h2>

                        <div class="field-grid">

                            <div class="field-group">

                                <label
                                    for="grade"
                                    class="field-label"
                                >
                                    Grade
                                </label>

                                <select
                                    name="grade"
                                    id="grade"
                                    class="field-select"
                                    required
                                >

                                    <option value="">
                                        Select Grade
                                    </option>

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

                            </div>

                            <div class="field-group">

                                <label
                                    for="academic_year"
                                    class="field-label"
                                >
                                    Academic Year
                                </label>

                                <input
                                    type="text"
                                    name="academic_year"
                                    id="academic_year"
                                    value="{{ old('academic_year') }}"
                                    placeholder="Example: 2083/84"
                                    class="field-input"
                                    required
                                >

                            </div>

                        </div>

                    </div>

                </div>

                {{-- Fee Information --}}
                <div class="fee-card">

                    <div class="form-section">

                        <h2 class="section-title">
                            Fee Information
                        </h2>

                        <div class="field-grid">

                            {{-- Fee Type --}}
                            <div class="field-group">

                                <label
                                    for="fee_type"
                                    class="field-label"
                                >
                                    Fee Type
                                </label>

                                <select
                                    name="fee_type"
                                    id="fee_type"
                                    class="field-select"
                                    required
                                >

                                    <option value="">
                                        Select Fee Type
                                    </option>

                                    <option
                                        value="Admission Fee"
                                        {{ old('fee_type') == 'Admission Fee' ? 'selected' : '' }}
                                    >
                                        Admission Fee
                                    </option>

                                    <option
                                        value="Tuition Fee"
                                        {{ old('fee_type') == 'Tuition Fee' ? 'selected' : '' }}
                                    >
                                        Tuition Fee
                                    </option>

                                    <option
                                        value="Examination Fee"
                                        {{ old('fee_type') == 'Examination Fee' ? 'selected' : '' }}
                                    >
                                        Examination Fee
                                    </option>

                                    <option
                                        value="Library Fee"
                                        {{ old('fee_type') == 'Library Fee' ? 'selected' : '' }}
                                    >
                                        Library Fee
                                    </option>

                                    <option
                                        value="Computer Fee"
                                        {{ old('fee_type') == 'Computer Fee' ? 'selected' : '' }}
                                    >
                                        Computer Fee
                                    </option>

                                    <option
                                        value="Transportation Fee"
                                        {{ old('fee_type') == 'Transportation Fee' ? 'selected' : '' }}
                                    >
                                        Transportation Fee
                                    </option>

                                    <option
                                        value="Other Fee"
                                        {{ old('fee_type') == 'Other Fee' ? 'selected' : '' }}
                                    >
                                        Other Fee
                                    </option>

                                </select>

                            </div>

                            {{-- Total Amount --}}
                            <div class="field-group">

                                <label
                                    for="total_amount"
                                    class="field-label"
                                >
                                    Total Amount
                                </label>

                                <input
                                    type="number"
                                    name="total_amount"
                                    id="total_amount"
                                    value="{{ old('total_amount', 0) }}"
                                    min="0"
                                    step="0.01"
                                    placeholder="Enter total amount"
                                    class="field-input"
                                    required
                                >

                            </div>

                            {{-- Discount --}}
                            <div class="field-group">

                                <label
                                    for="discount"
                                    class="field-label"
                                >
                                    Discount
                                </label>

                                <input
                                    type="number"
                                    name="discount"
                                    id="discount"
                                    value="{{ old('discount', 0) }}"
                                    min="0"
                                    step="0.01"
                                    placeholder="Enter discount"
                                    class="field-input"
                                >

                            </div>

                            {{-- Paid Amount --}}
                            <div class="field-group">

                                <label
                                    for="paid_amount"
                                    class="field-label"
                                >
                                    Paid Amount
                                </label>

                                <input
                                    type="number"
                                    name="paid_amount"
                                    id="paid_amount"
                                    value="{{ old('paid_amount', 0) }}"
                                    min="0"
                                    step="0.01"
                                    placeholder="Enter paid amount"
                                    class="field-input"
                                >

                            </div>

                        </div>

                        {{-- Payment Summary --}}
                        <div class="payment-summary">

                            <h3 class="summary-title">
                                Payment Summary
                            </h3>

                            <div class="summary-grid">

                                {{-- Remaining Amount --}}
                                <div class="summary-box">

                                    <div class="summary-label">
                                        Remaining Amount
                                    </div>

                                    <div
                                        id="remaining_display"
                                        class="summary-value"
                                    >
                                        Rs. 0.00
                                    </div>

                                    <input
                                        type="hidden"
                                        name="remaining_amount"
                                        id="remaining_amount"
                                        value="0"
                                    >

                                </div>

                                {{-- Payment Status --}}
                                <div class="summary-box">

                                    <div class="summary-label">
                                        Payment Status
                                    </div>

                                    <div
                                        id="status_display"
                                        class="status-value"
                                    >
                                        Pending
                                    </div>

                                    <input
                                        type="hidden"
                                        name="payment_status"
                                        id="payment_status"
                                        value="Pending"
                                    >

                                </div>

                            </div>

                            {{-- Amount Error --}}
                            <div
                                id="amountError"
                                class="amount-error"
                                style="display: none;"
                            >
                                Discount + Paid Amount cannot be greater than Total Amount.
                            </div>

                        </div>

                    </div>

                </div>

                {{-- Payment Details --}}
                <div class="fee-card">

                    <div class="form-section">

                        <h2 class="section-title">
                            Payment Details
                        </h2>

                        <div class="field-grid">

                            {{-- Payment Date --}}
                            <div class="field-group">

                                <label
                                    for="payment_date"
                                    class="field-label"
                                >
                                    Payment Date
                                </label>

                                <input
                                    type="date"
                                    name="payment_date"
                                    id="payment_date"
                                    value="{{ old('payment_date', date('Y-m-d')) }}"
                                    class="field-input"
                                >

                            </div>

                            {{-- Payment Method --}}
                            <div class="field-group">

                                <label
                                    for="payment_method"
                                    class="field-label"
                                >
                                    Payment Method
                                </label>

                                <select
                                    name="payment_method"
                                    id="payment_method"
                                    class="field-select"
                                >

                                    <option value="">
                                        Select Payment Method
                                    </option>

                                    <option
                                        value="Cash"
                                        {{ old('payment_method') == 'Cash' ? 'selected' : '' }}
                                    >
                                        Cash
                                    </option>

                                    <option
                                        value="Bank"
                                        {{ old('payment_method') == 'Bank' ? 'selected' : '' }}
                                    >
                                        Bank
                                    </option>

                                    <option
                                        value="Online"
                                        {{ old('payment_method') == 'Online' ? 'selected' : '' }}
                                    >
                                        Online
                                    </option>

                                    <option
                                        value="Other"
                                        {{ old('payment_method') == 'Other' ? 'selected' : '' }}
                                    >
                                        Other
                                    </option>

                                </select>

                            </div>

                        </div>

                    </div>

                </div>

                {{-- Form Buttons --}}
                <div class="form-actions">

                    <a
                        href="{{ route('fees.index') }}"
                        class="cancel-button"
                    >
                        Cancel
                    </a>

                    <button
                        type="submit"
                        id="saveButton"
                        class="save-button"
                    >
                        Save Fee
                    </button>

                </div>

            </form>

        </div>

    </div>

    <script src="{{ asset('js/fees-create.js') }}"></script>

</x-app-layout>