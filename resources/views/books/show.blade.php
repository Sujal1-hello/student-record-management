```php
<x-app-layout>

    <div class="book-page">

        {{-- Header --}}
        <div class="book-header">

            <div class="header-content">

                <div class="breadcrumb">
                    <span>Library</span>
                    <span class="breadcrumb-separator">/</span>
                    <span>Book Details</span>
                </div>

                <div class="title-row">
                    <div class="title-icon">📖</div>

                    <div>
                        <h1>{{ $book->title }}</h1>

                        <p>
                            View and manage information for this library book.
                        </p>
                    </div>
                </div>

            </div>

            <a href="{{ route('books.index') }}" class="back-button">
                <span>←</span>
                <span>Back to Books</span>
            </a>

        </div>


        {{-- Main Card --}}
        <div class="book-card">

            {{-- Card Header --}}
            <div class="card-top">

                <div>
                    <span class="card-label">BOOK INFORMATION</span>
                    <h2>Book Details</h2>
                </div>

                <span class="status-badge {{ strtolower($book->status) }}">
                    <span class="status-dot"></span>
                    {{ $book->status }}
                </span>

            </div>


            {{-- Book ID --}}
            <div class="book-id-box">

                <div class="book-icon">
                    #
                </div>

                <div class="book-id-content">
                    <span>BOOK IDENTIFICATION</span>
                    <strong>{{ $book->book_id }}</strong>
                </div>

                <div class="id-label">
                    Library Record
                </div>

            </div>


            {{-- General Information --}}
            <div class="details-section">

                <div class="section-heading">
                    <div>
                        <span class="section-label">DETAILS</span>
                        <h3>General Information</h3>
                    </div>
                </div>

                <div class="detail-grid">

                    <div class="detail-item">
                        <div class="detail-icon">📚</div>

                        <div>
                            <span class="detail-label">Title</span>
                            <span class="detail-value">
                                {{ $book->title }}
                            </span>
                        </div>
                    </div>

                    <div class="detail-item">
                        <div class="detail-icon">✍</div>

                        <div>
                            <span class="detail-label">Author</span>
                            <span class="detail-value">
                                {{ $book->author }}
                            </span>
                        </div>
                    </div>

                    <div class="detail-item">
                        <div class="detail-icon">▦</div>

                        <div>
                            <span class="detail-label">Category</span>
                            <span class="detail-value">
                                {{ $book->category ?? 'N/A' }}
                            </span>
                        </div>
                    </div>

                    <div class="detail-item">
                        <div class="detail-icon">ISBN</div>

                        <div>
                            <span class="detail-label">ISBN</span>
                            <span class="detail-value">
                                {{ $book->isbn ?? 'N/A' }}
                            </span>
                        </div>
                    </div>

                </div>

            </div>


            {{-- Inventory --}}
            <div class="inventory-section">

                <div class="section-heading">
                    <div>
                        <span class="section-label">AVAILABILITY</span>
                        <h3>Inventory Overview</h3>
                    </div>
                </div>

                <div class="inventory-grid">

                    {{-- Total --}}
                    <div class="inventory-card total-card">

                        <div class="inventory-icon">
                            #
                        </div>

                        <div class="inventory-content">
                            <span>Total Copies</span>
                            <strong>{{ $book->quantity }}</strong>
                            <small>Registered copies</small>
                        </div>

                    </div>


                    {{-- Available --}}
                    <div class="inventory-card available-card">

                        <div class="inventory-icon">
                            ✓
                        </div>

                        <div class="inventory-content">
                            <span>Available Copies</span>
                            <strong>{{ $book->available_copies }}</strong>
                            <small>Ready to borrow</small>
                        </div>

                    </div>


                    {{-- Issued --}}
                    <div class="inventory-card issued-card">

                        <div class="inventory-icon">
                            ↗
                        </div>

                        <div class="inventory-content">
                            <span>Issued Copies</span>
                            <strong>
                                {{ max(0, $book->quantity - $book->available_copies) }}
                            </strong>
                            <small>Currently issued</small>
                        </div>

                    </div>

                </div>

            </div>


            {{-- Actions --}}
            <div class="card-actions">

                <a href="{{ route('books.index') }}" class="secondary-button">
                    Cancel
                </a>

                <a href="{{ route('books.edit', $book) }}" class="primary-button">
                    <span>✎</span>
                    Edit Book
                </a>

            </div>

        </div>

    </div>


    <style>
        * {
            box-sizing: border-box;
        }


        /* =========================
           PAGE
        ========================= */

        .book-page {
            width: min(1080px, calc(100% - 48px));
            margin: 0 auto;
            padding: 44px 0 70px;
            color: #111827;
        }


        /* =========================
           HEADER
        ========================= */

        .book-header {
            display: flex;
            align-items: flex-end;
            justify-content: space-between;
            gap: 30px;
            margin-bottom: 28px;
        }

        .header-content {
            min-width: 0;
        }

        .breadcrumb {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 14px;

            color: #94a3b8;
            font-size: 11px;
            font-weight: 700;
            letter-spacing: .08em;
            text-transform: uppercase;
        }

        .breadcrumb span:first-child {
            color: #2563eb;
        }

        .breadcrumb-separator {
            color: #cbd5e1;
        }

        .title-row {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .title-icon {
            display: flex;
            align-items: center;
            justify-content: center;

            width: 50px;
            height: 50px;

            border: 1px solid #dbeafe;
            border-radius: 13px;

            background: #eff6ff;

            font-size: 22px;
        }

        .book-header h1 {
            margin: 0;

            color: #0f172a;

            font-size: 30px;
            line-height: 1.2;
            font-weight: 750;
            letter-spacing: -.025em;
        }

        .book-header p {
            margin: 7px 0 0;

            color: #64748b;
            font-size: 14px;
        }


        /* =========================
           BACK BUTTON
        ========================= */

        .back-button {
            display: inline-flex;
            align-items: center;
            gap: 9px;

            height: 42px;
            padding: 0 16px;

            border: 1px solid #e2e8f0;
            border-radius: 9px;

            background: #ffffff;
            color: #334155;

            font-size: 13px;
            font-weight: 650;
            text-decoration: none;

            white-space: nowrap;

            transition: .2s ease;
        }

        .back-button span:first-child {
            font-size: 17px;
            transition: transform .2s ease;
        }

        .back-button:hover {
            border-color: #cbd5e1;
            background: #f8fafc;
            color: #0f172a;
        }

        .back-button:hover span:first-child {
            transform: translateX(-3px);
        }


        /* =========================
           MAIN CARD
        ========================= */

        .book-card {
            overflow: hidden;

            border: 1px solid #e2e8f0;
            border-radius: 16px;

            background: #ffffff;

            box-shadow:
                0 1px 2px rgba(15, 23, 42, .03),
                0 12px 35px rgba(15, 23, 42, .06);
        }


        /* =========================
           CARD HEADER
        ========================= */

        .card-top {
            display: flex;
            align-items: center;
            justify-content: space-between;

            padding: 27px 32px 24px;

            border-bottom: 1px solid #f1f5f9;
        }

        .card-label,
        .section-label {
            display: block;

            margin-bottom: 6px;

            color: #94a3b8;

            font-size: 10px;
            font-weight: 750;
            letter-spacing: .1em;
        }

        .card-top h2 {
            margin: 0;

            color: #0f172a;

            font-size: 19px;
            font-weight: 700;
        }


        /* =========================
           STATUS
        ========================= */

        .status-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;

            padding: 8px 12px;

            border-radius: 999px;

            font-size: 11px;
            font-weight: 750;
        }

        .status-dot {
            width: 7px;
            height: 7px;
            border-radius: 50%;
        }

        .status-badge.available {
            background: #ecfdf5;
            color: #047857;
        }

        .status-badge.available .status-dot {
            background: #10b981;
        }

        .status-badge.unavailable {
            background: #fef2f2;
            color: #b91c1c;
        }

        .status-badge.unavailable .status-dot {
            background: #ef4444;
        }


        /* =========================
           BOOK ID
        ========================= */

        .book-id-box {
            display: flex;
            align-items: center;
            gap: 14px;

            margin: 26px 32px;

            padding: 18px;

            border: 1px solid #dbeafe;
            border-radius: 12px;

            background:
                linear-gradient(135deg, #f8fbff, #f1f7ff);
        }

        .book-icon {
            display: flex;
            align-items: center;
            justify-content: center;

            width: 44px;
            height: 44px;

            flex-shrink: 0;

            border-radius: 10px;

            background: #2563eb;
            color: white;

            font-size: 18px;
            font-weight: 800;

            box-shadow: 0 4px 10px rgba(37, 99, 235, .18);
        }

        .book-id-content {
            min-width: 0;
        }

        .book-id-content span {
            display: block;

            margin-bottom: 3px;

            color: #64748b;

            font-size: 9px;
            font-weight: 750;
            letter-spacing: .1em;
        }

        .book-id-content strong {
            display: block;

            color: #1d4ed8;

            font-size: 15px;
            font-weight: 750;
        }

        .id-label {
            margin-left: auto;

            color: #94a3b8;

            font-size: 11px;
            font-weight: 600;
        }


        /* =========================
           SECTIONS
        ========================= */

        .details-section,
        .inventory-section {
            padding: 0 32px 32px;
        }

        .section-heading {
            display: flex;
            align-items: center;
            justify-content: space-between;

            margin-bottom: 16px;
        }

        .section-heading h3 {
            margin: 0;

            color: #1e293b;

            font-size: 14px;
            font-weight: 700;
        }


        /* =========================
           DETAILS
        ========================= */

        .detail-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);

            overflow: hidden;

            border: 1px solid #e8edf3;
            border-radius: 12px;
        }

        .detail-item {
            display: flex;
            align-items: center;
            gap: 13px;

            min-height: 88px;
            padding: 17px 19px;

            background: #ffffff;

            transition: background .2s ease;
        }

        .detail-item:hover {
            background: #f8fafc;
        }

        .detail-item:nth-child(odd) {
            border-right: 1px solid #e8edf3;
        }

        .detail-item:nth-child(-n+2) {
            border-bottom: 1px solid #e8edf3;
        }

        .detail-icon {
            display: flex;
            align-items: center;
            justify-content: center;

            width: 38px;
            height: 38px;

            flex-shrink: 0;

            border-radius: 9px;

            background: #f8fafc;
            color: #475569;

            font-size: 14px;
            font-weight: 700;
        }

        .detail-label {
            display: block;

            margin-bottom: 5px;

            color: #94a3b8;

            font-size: 9px;
            font-weight: 750;
            letter-spacing: .08em;

            text-transform: uppercase;
        }

        .detail-value {
            display: block;

            color: #1e293b;

            font-size: 14px;
            font-weight: 650;

            overflow-wrap: anywhere;
        }


        /* =========================
           INVENTORY
        ========================= */

        .inventory-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 14px;
        }

        .inventory-card {
            display: flex;
            align-items: center;
            gap: 13px;

            padding: 18px;

            border: 1px solid #e8edf3;
            border-radius: 12px;

            background: #ffffff;

            transition: .2s ease;
        }

        .inventory-card:hover {
            transform: translateY(-2px);

            box-shadow:
                0 6px 18px rgba(15, 23, 42, .06);
        }

        .inventory-icon {
            display: flex;
            align-items: center;
            justify-content: center;

            width: 40px;
            height: 40px;

            flex-shrink: 0;

            border-radius: 10px;

            font-size: 15px;
            font-weight: 800;
        }

        .total-card .inventory-icon {
            background: #f1f5f9;
            color: #475569;
        }

        .available-card .inventory-icon {
            background: #ecfdf5;
            color: #059669;
        }

        .issued-card .inventory-icon {
            background: #fff7ed;
            color: #ea580c;
        }

        .inventory-content span {
            display: block;

            margin-bottom: 2px;

            color: #64748b;

            font-size: 10px;
            font-weight: 650;
        }

        .inventory-content strong {
            display: block;

            color: #0f172a;

            font-size: 22px;
            line-height: 1.2;
            font-weight: 750;
        }

        .inventory-content small {
            display: block;

            margin-top: 2px;

            color: #94a3b8;

            font-size: 9px;
        }


        /* =========================
           ACTIONS
        ========================= */

        .card-actions {
            display: flex;
            justify-content: flex-end;
            gap: 10px;

            padding: 20px 32px;

            border-top: 1px solid #f1f5f9;

            background: #fafbfc;
        }

        .secondary-button,
        .primary-button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 7px;

            min-height: 41px;
            padding: 0 17px;

            border-radius: 9px;

            font-size: 13px;
            font-weight: 650;

            text-decoration: none;

            transition: .2s ease;
        }

        .secondary-button {
            border: 1px solid #e2e8f0;

            background: #ffffff;
            color: #475569;
        }

        .secondary-button:hover {
            border-color: #cbd5e1;
            background: #f8fafc;
            color: #1e293b;
        }

        .primary-button {
            border: 1px solid #2563eb;

            background: #2563eb;
            color: #ffffff;

            box-shadow: 0 3px 8px rgba(37, 99, 235, .14);
        }

        .primary-button:hover {
            border-color: #1d4ed8;
            background: #1d4ed8;

            transform: translateY(-1px);

            box-shadow: 0 6px 14px rgba(37, 99, 235, .2);
        }

        .primary-button span {
            font-size: 15px;
        }


        /* =========================
           RESPONSIVE
        ========================= */

        @media (max-width: 760px) {

            .book-page {
                width: calc(100% - 28px);
                padding: 28px 0 45px;
            }

            .book-header {
                align-items: stretch;
                flex-direction: column;
                gap: 18px;
            }

            .title-row {
                align-items: flex-start;
            }

            .title-icon {
                width: 44px;
                height: 44px;
            }

            .book-header h1 {
                font-size: 24px;
            }

            .back-button {
                width: fit-content;
            }

            .card-top {
                align-items: flex-start;
                flex-direction: column;
                gap: 14px;

                padding: 22px;
            }

            .book-id-box {
                margin: 20px 22px;
            }

            .id-label {
                display: none;
            }

            .details-section,
            .inventory-section {
                padding-left: 22px;
                padding-right: 22px;
            }

            .detail-grid {
                grid-template-columns: 1fr;
            }

            .detail-item:nth-child(odd) {
                border-right: 0;
            }

            .detail-item:nth-child(-n+2) {
                border-bottom: 0;
            }

            .detail-item:not(:last-child) {
                border-bottom: 1px solid #e8edf3;
            }

            .inventory-grid {
                grid-template-columns: 1fr;
            }

            .card-actions {
                flex-direction: column-reverse;
                padding: 18px 22px;
            }

            .secondary-button,
            .primary-button {
                width: 100%;
            }

        }
    </style>

</x-app-layout>
```