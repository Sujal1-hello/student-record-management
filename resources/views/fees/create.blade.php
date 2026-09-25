<x-app-layout>

    <style>
        :root {
            --fee-primary: #2563eb;
            --fee-primary-dark: #1d4ed8;
            --fee-primary-soft: #eff6ff;
            --fee-text: #111827;
            --fee-muted: #6b7280;
            --fee-border: #e5e7eb;
            --fee-border-dark: #d1d5db;
            --fee-bg: #f8fafc;
            --fee-card: #ffffff;
            --fee-danger: #dc2626;
            --fee-danger-bg: #fef2f2;
            --fee-success: #15803d;
            --fee-success-bg: #f0fdf4;
            --fee-warning: #b45309;
            --fee-warning-bg: #fffbeb;
            --fee-radius: 14px;
        }

        .fee-page {
            min-height: 100vh;
            padding: 36px 24px 56px;
            background:
                radial-gradient(circle at top left, rgba(37, 99, 235, 0.06), transparent 32%),
                var(--fee-bg);
            color: var(--fee-text);
        }

        .fee-container {
            width: 100%;
            max-width: 1120px;
            margin: 0 auto;
        }

        .fee-header {
            display: flex;
            align-items: flex-end;
            justify-content: space-between;
            gap: 24px;
            margin-bottom: 28px;
        }

        .fee-header-content {
            min-width: 0;
        }

        .fee-eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            margin-bottom: 8px;
            color: var(--fee-primary);
            font-size: 12px;
            font-weight: 700;
            letter-spacing: .08em;
            text-transform: uppercase;
        }

        .fee-eyebrow::before {
            content: "";
            width: 7px;
            height: 7px;
            border-radius: 999px;
            background: var(--fee-primary);
        }

        .fee-header h1 {
            margin: 0;
            font-size: clamp(28px, 4vw, 34px);
            line-height: 1.15;
            font-weight: 800;
            letter-spacing: -0.025em;
            color: var(--fee-text);
        }

        .fee-header p {
            margin: 8px 0 0;
            color: var(--fee-muted);
            font-size: 14px;
            line-height: 1.5;
        }

        .back-button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            flex-shrink: 0;
            min-height: 42px;
            padding: 9px 15px;
            border: 1px solid var(--fee-border-dark);
            border-radius: 10px;
            background: var(--fee-card);
            color: #374151;
            text-decoration: none;
            font-size: 14px;
            font-weight: 600;
            box-shadow: 0 1px 2px rgba(15, 23, 42, .04);
            transition: .2s ease;
        }

        .back-button:hover {
            border-color: #9ca3af;
            background: #f9fafb;
            transform: translateY(-1px);
        }

        .fee-card {
            margin-bottom: 18px;
            overflow: hidden;
            background: var(--fee-card);
            border: 1px solid var(--fee-border);
            border-radius: var(--fee-radius);
            box-shadow: 0 4px 16px rgba(15, 23, 42, .045);
        }

        .form-section {
            padding: 26px;
        }

        .section-heading {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            margin-bottom: 22px;
        }

        .section-icon {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 34px;
            height: 34px;
            flex: 0 0 34px;
            border-radius: 9px;
            background: var(--fee-primary-soft);
            color: var(--fee-primary);
            font-size: 15px;
            font-weight: 800;
        }

        .section-title {
            margin: 0;
            color: var(--fee-text);
            font-size: 17px;
            line-height: 1.35;
            font-weight: 750;
            letter-spacing: -.01em;
        }

        .section-description {
            margin: 3px 0 0;
            color: var(--fee-muted);
            font-size: 12px;
            line-height: 1.5;
        }

        .field-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 20px;
        }

        .field-group {
            display: flex;
            flex-direction: column;
            min-width: 0;
        }

        .field-group.full {
            grid-column: 1 / -1;
        }

        .field-label {
            display: flex;
            align-items: center;
            gap: 4px;
            margin-bottom: 8px;
            color: #374151;
            font-size: 13px;
            font-weight: 650;
        }

        .field-input,
        .field-select {
            width: 100%;
            min-height: 46px;
            box-sizing: border-box;
            padding: 11px 13px;
            border: 1px solid var(--fee-border-dark);
            border-radius: 10px;
            outline: none;
            background: #fff;
            color: var(--fee-text);
            font-size: 14px;
            line-height: 1.4;
            transition: border-color .2s ease, box-shadow .2s ease, background .2s ease;
        }

        .field-input:hover,
        .field-select:hover {
            border-color: #9ca3af;
        }

        .field-input:focus,
        .field-select:focus {
            border-color: var(--fee-primary);
            box-shadow: 0 0 0 3px rgba(37, 99, 235, .11);
        }

        .field-input::placeholder {
            color: #9ca3af;
        }

        .field-input[type="number"] {
            font-variant-numeric: tabular-nums;
        }

        .student-select {
            max-width: none;
        }

        .payment-summary {
            margin-top: 24px;
            padding: 20px;
            border: 1px solid #dbeafe;
            border-radius: 12px;
            background: linear-gradient(180deg, #f8fbff 0%, #f9fafb 100%);
        }

        .summary-heading {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            margin-bottom: 16px;
        }

        .summary-title {
            margin: 0;
            color: #1f2937;
            font-size: 14px;
            font-weight: 750;
        }

        .summary-hint {
            color: var(--fee-muted);
            font-size: 11px;
        }

        .summary-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 14px;
        }

        .summary-box {
            min-width: 0;
            padding: 16px;
            background: #fff;
            border: 1px solid var(--fee-border);
            border-radius: 11px;
        }

        .summary-label {
            margin-bottom: 7px;
            color: var(--fee-muted);
            font-size: 11px;
            font-weight: 650;
            letter-spacing: .02em;
            text-transform: uppercase;
        }

        .summary-value {
            color: var(--fee-text);
            font-size: 21px;
            line-height: 1.2;
            font-weight: 800;
            font-variant-numeric: tabular-nums;
        }

        .status-value {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-height: 34px;
            padding: 6px 12px;
            border: 1px solid #fecaca;
            border-radius: 999px;
            background: var(--fee-danger-bg);
            color: #b91c1c;
            font-size: 12px;
            font-weight: 750;
        }

        .amount-error {
            margin-top: 14px;
            padding: 11px 13px;
            border: 1px solid #fecaca;
            border-radius: 9px;
            background: var(--fee-danger-bg);
            color: var(--fee-danger);
            font-size: 12px;
            font-weight: 550;
            line-height: 1.5;
        }

        .error-box {
            display: flex;
            gap: 12px;
            margin-bottom: 18px;
            padding: 15px 17px;
            border: 1px solid #fecaca;
            border-left: 4px solid #ef4444;
            border-radius: 11px;
            background: var(--fee-danger-bg);
            color: #991b1b;
        }

        .error-box h3 {
            margin: 0 0 7px;
            font-size: 13px;
            font-weight: 750;
        }

        .error-box ul {
            margin: 0;
            padding-left: 18px;
        }

        .error-box li {
            margin-bottom: 3px;
            font-size: 12px;
        }

        .form-actions {
            display: flex;
            justify-content: flex-end;
            align-items: center;
            gap: 10px;
            margin-top: 24px;
            padding-top: 4px;
        }

        .cancel-button,
        .save-button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-height: 44px;
            padding: 10px 20px;
            border-radius: 10px;
            font-size: 14px;
            font-weight: 650;
            line-height: 1;
            text-decoration: none;
            cursor: pointer;
            transition: .2s ease;
        }

        .cancel-button {
            border: 1px solid var(--fee-border-dark);
            background: #fff;
            color: #374151;
        }

        .cancel-button:hover {
            background: #f9fafb;
            border-color: #9ca3af;
        }

        .save-button {
            border: 1px solid var(--fee-primary);
            background: var(--fee-primary);
            color: #fff;
            box-shadow: 0 4px 10px rgba(37, 99, 235, .18);
        }

        .save-button:hover {
            border-color: var(--fee-primary-dark);
            background: var(--fee-primary-dark);
            box-shadow: 0 6px 14px rgba(37, 99, 235, .22);
            transform: translateY(-1px);
        }

        .save-button:disabled {
            border-color: #9ca3af;
            background: #9ca3af;
            cursor: not-allowed;
            box-shadow: none;
            transform: none;
        }

        @media (max-width: 768px) {
            .fee-page {
                padding: 24px 14px 40px;
            }

            .fee-header {
                align-items: stretch;
                flex-direction: column;
                gap: 16px;
                margin-bottom: 22px;
            }

            .back-button {
                width: 100%;
            }

            .form-section {
                padding: 20px 18px;
            }

            .field-grid,
            .summary-grid {
                grid-template-columns: 1fr;
                gap: 16px;
            }

            .field-group.full {
                grid-column: auto;
            }

            .summary-heading {
                align-items: flex-start;
                flex-direction: column;
                gap: 4px;
            }

            .form-actions {
                flex-direction: column-reverse;
                align-items: stretch;
            }

            .cancel-button,
            .save-button {
                width: 100%;
            }
        }

        @media (max-width: 480px) {
            .fee-page {
                padding-inline: 10px;
            }

            .form-section {
                padding: 18px 15px;
            }

            .payment-summary {
                padding: 15px;
            }

            .section-icon {
                width: 31px;
                height: 31px;
                flex-basis: 31px;
            }
        }
    </style>

    <div class="fee-page">

        <div class="fee-container">

            {{-- Header --}}
            <div class="fee-header">

                <div class="fee-header-content">
                    <div class="fee-eyebrow">Fee Management</div>
                    <h1>Add Fee</h1>

                    <p>
                        Add a new student fee record
                    </p>
                </div>

                <a href="{{ route('fees.index') }}" class="back-button">
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

            <form method="POST" action="{{ route('fees.store') }}" id="feeForm">

                @csrf

                {{-- Student Information --}}
                <div class="fee-card">

                    <div class="form-section">

                        <div class="section-heading">
                            <div class="section-icon">01</div>
                            <div>
                                <h2 class="section-title">Student Information</h2>
                                <p class="section-description">Select the student for this fee record.</p>
                            </div>
                        </div>

                        <div class="field-group">

                            <label for="student_id" class="field-label">
                                Student
                            </label>

                            <select name="student_id" id="student_id" class="field-select student-select" required>

                                <option value="">
                                    Select Student
                                </option>

                                @foreach($students as $student)

                                    <option value="{{ $student->id }}" data-grade="{{ $student->grade }}"
                                        data-academic-year="{{ $student->academic_year }}" {{ old('student_id') == $student->id ? 'selected' : '' }}>
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

                        <div class="section-heading">
                            <div class="section-icon">02</div>
                            <div>
                                <h2 class="section-title">Academic Information</h2>
                                <p class="section-description">Enter the student's current academic details.</p>
                            </div>
                        </div>

                        <div class="field-grid">

                            <div class="field-group">

                                <label for="grade" class="field-label">
                                    Grade
                                </label>

                                <select name="grade" id="grade" class="field-select" required>

                                    <option value="">
                                        Select Grade
                                    </option>

                                    <option value="11" {{ old('grade') == '11' ? 'selected' : '' }}>
                                        Grade 11
                                    </option>

                                    <option value="12" {{ old('grade') == '12' ? 'selected' : '' }}>
                                        Grade 12
                                    </option>

                                </select>

                            </div>

                            <div class="field-group">

                                <label for="academic_year" class="field-label">
                                    Academic Year
                                </label>

                                <input type="text" name="academic_year" id="academic_year"
                                    value="{{ old('academic_year') }}" placeholder="Example: 2083/84"
                                    class="field-input" required>

                            </div>

                        </div>

                    </div>

                </div>

                {{-- Fee Information --}}
                <div class="fee-card">

                    <div class="form-section">

                        <div class="section-heading">
                            <div class="section-icon">03</div>
                            <div>
                                <h2 class="section-title">Fee Information</h2>
                                <p class="section-description">Enter the fee amount and payment breakdown.</p>
                            </div>
                        </div>

                        <div class="field-grid">

                            {{-- Fee Type --}}
                            <div class="field-group">

                                <label for="fee_type" class="field-label">
                                    Fee Type
                                </label>

                                <select name="fee_type" id="fee_type" class="field-select" required>

                                    <option value="">
                                        Select Fee Type
                                    </option>

                                    <option value="Admission Fee" {{ old('fee_type') == 'Admission Fee' ? 'selected' : '' }}>
                                        Admission Fee
                                    </option>

                                    <option value="Tuition Fee" {{ old('fee_type') == 'Tuition Fee' ? 'selected' : '' }}>
                                        Tuition Fee
                                    </option>

                                    <option value="Examination Fee" {{ old('fee_type') == 'Examination Fee' ? 'selected' : '' }}>
                                        Examination Fee
                                    </option>

                                    <option value="Library Fee" {{ old('fee_type') == 'Library Fee' ? 'selected' : '' }}>
                                        Library Fee
                                    </option>

                                    <option value="Computer Fee" {{ old('fee_type') == 'Computer Fee' ? 'selected' : '' }}>
                                        Computer Fee
                                    </option>

                                    <option value="Transportation Fee" {{ old('fee_type') == 'Transportation Fee' ? 'selected' : '' }}>
                                        Transportation Fee
                                    </option>

                                    <option value="Other Fee" {{ old('fee_type') == 'Other Fee' ? 'selected' : '' }}>
                                        Other Fee
                                    </option>

                                </select>

                            </div>

                            {{-- Total Amount --}}
                            <div class="field-group">

                                <label for="total_amount" class="field-label">
                                    Total Amount
                                </label>

                                <input type="number" name="total_amount" id="total_amount"
                                    value="{{ old('total_amount', 0) }}" min="0" step="0.01"
                                    placeholder="Enter total amount" class="field-input" required>

                            </div>

                            {{-- Discount --}}
                            <div class="field-group">

                                <label for="discount" class="field-label">
                                    Discount
                                </label>

                                <input type="number" name="discount" id="discount" value="{{ old('discount', 0) }}"
                                    min="0" step="0.01" placeholder="Enter discount" class="field-input">

                            </div>

                            {{-- Paid Amount --}}
                            <div class="field-group">

                                <label for="paid_amount" class="field-label">
                                    Paid Amount
                                </label>

                                <input type="number" name="paid_amount" id="paid_amount"
                                    value="{{ old('paid_amount', 0) }}" min="0" step="0.01"
                                    placeholder="Enter paid amount" class="field-input">

                            </div>

                        </div>

                        {{-- Payment Summary --}}
                        <div class="payment-summary">

                            <h3 class="summary-title">Payment Summary</h3>
                            <span class="summary-hint">Calculated automatically</span>

                            <div class="summary-grid">

                                {{-- Remaining Amount --}}
                                <div class="summary-box">

                                    <div class="summary-label">
                                        Remaining Amount
                                    </div>

                                    <div id="remaining_display" class="summary-value">
                                        Rs. 0.00
                                    </div>

                                    <input type="hidden" name="remaining_amount" id="remaining_amount" value="0">

                                </div>

                                {{-- Payment Status --}}
                                <div class="summary-box">

                                    <div class="summary-label">
                                        Payment Status
                                    </div>

                                    <div id="status_display" class="status-value">
                                        Pending
                                    </div>

                                    <input type="hidden" name="payment_status" id="payment_status" value="Pending">

                                </div>

                            </div>

                            {{-- Amount Error --}}
                            <div id="amountError" class="amount-error" style="display: none;">
                                Discount + Paid Amount cannot be greater than Total Amount.
                            </div>

                        </div>

                    </div>

                </div>

                {{-- Payment Details --}}
                <div class="fee-card">

                    <div class="form-section">

                        <div class="section-heading">
                            <div class="section-icon">04</div>
                            <div>
                                <h2 class="section-title">Payment Details</h2>
                                <p class="section-description">Record when and how the payment was made.</p>
                            </div>
                        </div>

                        <div class="field-grid">

                            {{-- Payment Date --}}
                            <div class="field-group">

                                <label for="payment_date" class="field-label">
                                    Payment Date
                                </label>

                                <input type="date" name="payment_date" id="payment_date"
                                    value="{{ old('payment_date', date('Y-m-d')) }}" class="field-input">

                            </div>

                            {{-- Payment Method --}}
                            <div class="field-group">

                                <label for="payment_method" class="field-label">
                                    Payment Method
                                </label>

                                <select name="payment_method" id="payment_method" class="field-select">

                                    <option value="">
                                        Select Payment Method
                                    </option>

                                    <option value="Cash" {{ old('payment_method') == 'Cash' ? 'selected' : '' }}>
                                        Cash
                                    </option>

                                    <option value="Bank" {{ old('payment_method') == 'Bank' ? 'selected' : '' }}>
                                        Bank
                                    </option>

                                    <option value="Online" {{ old('payment_method') == 'Online' ? 'selected' : '' }}>
                                        Online
                                    </option>

                                    <option value="Other" {{ old('payment_method') == 'Other' ? 'selected' : '' }}>
                                        Other
                                    </option>

                                </select>

                            </div>

                        </div>

                    </div>

                </div>

                {{-- Form Buttons --}}
                <div class="form-actions">

                    <a href="{{ route('fees.index') }}" class="cancel-button">
                        Cancel
                    </a>

                    <button type="submit" id="saveButton" class="save-button">
                        Save Fee
                    </button>

                </div>

            </form>

        </div>

    </div>

    <script src="{{ asset('js/fees-create.js') }}"></script>

</x-app-layout>