<x-app-layout>

    <div class="book-page">

        {{-- Header --}}
        <div class="book-header">
            <div class="header-content">
                <div class="eyebrow">LIBRARY / BOOK DETAILS</div>

                <h1>{{ $book->title }}</h1>

                <p>
                    View and manage information for this library book.
                </p>
            </div>

            <a href="{{ route('books.index') }}" class="back-button">
                <span>←</span>
                Back to Books
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


            {{-- Book ID Highlight --}}
            <div class="book-id-box">
                <div class="book-icon">
                    📚
                </div>

                <div>
                    <span>BOOK ID</span>
                    <strong>{{ $book->book_id }}</strong>
                </div>
            </div>


            {{-- Details --}}
            <div class="details-section">

                <div class="section-title">
                    <span>General Information</span>
                </div>

                <div class="detail-grid">

                    <div class="detail-item">
                        <span class="detail-label">Title</span>
                        <span class="detail-value">{{ $book->title }}</span>
                    </div>

                    <div class="detail-item">
                        <span class="detail-label">Author</span>
                        <span class="detail-value">{{ $book->author }}</span>
                    </div>

                    <div class="detail-item">
                        <span class="detail-label">Category</span>
                        <span class="detail-value">
                            {{ $book->category ?? 'N/A' }}
                        </span>
                    </div>

                    <div class="detail-item">
                        <span class="detail-label">ISBN</span>
                        <span class="detail-value">
                            {{ $book->isbn ?? 'N/A' }}
                        </span>
                    </div>

                </div>

            </div>


            {{-- Inventory --}}
            <div class="inventory-section">

                <div class="section-title">
                    <span>Inventory</span>
                </div>

                <div class="inventory-grid">

                    <div class="inventory-card">
                        <div class="inventory-icon total">
                            #
                        </div>

                        <div>
                            <span>Total Copies</span>
                            <strong>{{ $book->quantity }}</strong>
                        </div>
                    </div>

                    <div class="inventory-card">
                        <div class="inventory-icon available">
                            ✓
                        </div>

                        <div>
                            <span>Available Copies</span>
                            <strong>{{ $book->available_copies }}</strong>
                        </div>
                    </div>

                    <div class="inventory-card">
                        <div class="inventory-icon issued">
                            ↗
                        </div>

                        <div>
                            <span>Issued Copies</span>
                            <strong>
                                {{ max(0, $book->quantity - $book->available_copies) }}
                            </strong>
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

        .book-page {
            width: min(1000px, calc(100% - 48px));
            margin: 0 auto;
            padding: 42px 0 70px;
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
            margin-bottom: 26px;
        }

        .header-content {
            min-width: 0;
        }

        .eyebrow {
            margin-bottom: 8px;
            color: #2563eb;
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 0.1em;
        }

        .book-header h1 {
            margin: 0;
            color: #111827;
            font-size: 30px;
            line-height: 1.2;
            font-weight: 750;
            letter-spacing: -0.025em;
        }

        .book-header p {
            margin: 8px 0 0;
            color: #6b7280;
            font-size: 14px;
        }


        /* =========================
           BACK BUTTON
        ========================= */

        .back-button {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            height: 42px;
            padding: 0 16px;

            border: 1px solid #e5e7eb;
            border-radius: 9px;

            background: #ffffff;
            color: #374151;

            font-size: 13px;
            font-weight: 600;
            text-decoration: none;

            white-space: nowrap;

            transition: all 0.18s ease;
        }

        .back-button span {
            font-size: 17px;
            line-height: 1;
        }

        .back-button:hover {
            border-color: #d1d5db;
            background: #f9fafb;
            transform: translateX(-2px);
        }


        /* =========================
           MAIN CARD
        ========================= */

        .book-card {
            overflow: hidden;

            background: #ffffff;
            border: 1px solid #e5e7eb;
            border-radius: 14px;

            box-shadow:
                0 1px 2px rgba(0, 0, 0, 0.03),
                0 8px 24px rgba(15, 23, 42, 0.04);
        }


        /* =========================
           CARD TOP
        ========================= */

        .card-top {
            display: flex;
            align-items: center;
            justify-content: space-between;

            padding: 26px 30px 22px;

            border-bottom: 1px solid #f1f5f9;
        }

        .card-label {
            display: block;
            margin-bottom: 5px;

            color: #9ca3af;
            font-size: 10px;
            font-weight: 700;
            letter-spacing: 0.09em;
        }

        .card-top h2 {
            margin: 0;

            color: #111827;
            font-size: 19px;
            font-weight: 700;
        }


        /* =========================
           STATUS
        ========================= */

        .status-badge {
            display: inline-flex;
            align-items: center;
            gap: 7px;

            padding: 7px 11px;

            border-radius: 999px;

            font-size: 11px;
            font-weight: 700;
        }

        .status-dot {
            width: 6px;
            height: 6px;
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

            margin: 26px 30px;

            padding: 16px 18px;

            border: 1px solid #dbeafe;
            border-radius: 10px;

            background: #f8fbff;
        }

        .book-icon {
            display: flex;
            align-items: center;
            justify-content: center;

            width: 42px;
            height: 42px;

            border-radius: 9px;

            background: #eff6ff;

            font-size: 20px;
        }

        .book-id-box span {
            display: block;
            margin-bottom: 3px;

            color: #6b7280;
            font-size: 10px;
            font-weight: 700;
            letter-spacing: 0.08em;
        }

        .book-id-box strong {
            color: #1d4ed8;
            font-size: 14px;
            font-weight: 700;
        }


        /* =========================
           SECTIONS
        ========================= */

        .details-section,
        .inventory-section {
            padding: 0 30px 28px;
        }

        .section-title {
            display: flex;
            align-items: center;
            gap: 12px;

            margin-bottom: 18px;

            color: #374151;
            font-size: 12px;
            font-weight: 700;
        }

        .section-title::after {
            content: "";

            flex: 1;

            height: 1px;

            background: #f1f5f9;
        }


        /* =========================
           DETAILS
        ========================= */

        .detail-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);

            border: 1px solid #eef2f7;
            border-radius: 10px;
            overflow: hidden;
        }

        .detail-item {
            display: flex;
            flex-direction: column;
            gap: 7px;

            min-height: 82px;

            padding: 17px 19px;

            background: #ffffff;
        }

        .detail-item:nth-child(odd) {
            border-right: 1px solid #eef2f7;
        }

        .detail-item:nth-child(-n+2) {
            border-bottom: 1px solid #eef2f7;
        }

        .detail-label {
            color: #9ca3af;
            font-size: 10px;
            font-weight: 700;
            letter-spacing: 0.07em;
            text-transform: uppercase;
        }

        .detail-value {
            color: #1f2937;
            font-size: 14px;
            font-weight: 600;

            overflow-wrap: anywhere;
        }


        /* =========================
           INVENTORY
        ========================= */

        .inventory-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 12px;
        }

        .inventory-card {
            display: flex;
            align-items: center;
            gap: 12px;

            padding: 16px;

            border: 1px solid #eef2f7;
            border-radius: 10px;

            background: #fafafa;

            transition: all 0.18s ease;
        }

        .inventory-card:hover {
            border-color: #dbe2ea;
            background: #ffffff;
            transform: translateY(-1px);
        }

        .inventory-icon {
            display: flex;
            align-items: center;
            justify-content: center;

            width: 36px;
            height: 36px;

            flex-shrink: 0;

            border-radius: 8px;

            font-size: 14px;
            font-weight: 800;
        }

        .inventory-icon.total {
            background: #f3f4f6;
            color: #4b5563;
        }

        .inventory-icon.available {
            background: #ecfdf5;
            color: #059669;
        }

        .inventory-icon.issued {
            background: #fff7ed;
            color: #ea580c;
        }

        .inventory-card span {
            display: block;

            margin-bottom: 3px;

            color: #6b7280;
            font-size: 10px;
            font-weight: 600;
        }

        .inventory-card strong {
            color: #111827;
            font-size: 18px;
            font-weight: 750;
        }


        /* =========================
           ACTIONS
        ========================= */

        .card-actions {
            display: flex;
            justify-content: flex-end;
            gap: 10px;

            padding: 20px 30px;

            border-top: 1px solid #f1f5f9;
            background: #fcfcfd;
        }

        .secondary-button,
        .primary-button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 7px;

            height: 40px;
            padding: 0 17px;

            border-radius: 8px;

            font-size: 13px;
            font-weight: 650;

            text-decoration: none;

            transition: all 0.18s ease;
        }

        .secondary-button {
            border: 1px solid #e5e7eb;
            background: #ffffff;
            color: #374151;
        }

        .secondary-button:hover {
            background: #f9fafb;
            border-color: #d1d5db;
        }

        .primary-button {
            border: 1px solid #2563eb;
            background: #2563eb;
            color: #ffffff;
        }

        .primary-button:hover {
            border-color: #1d4ed8;
            background: #1d4ed8;
            box-shadow: 0 4px 10px rgba(37, 99, 235, 0.18);
            transform: translateY(-1px);
        }

        .primary-button span {
            font-size: 15px;
        }


        /* =========================
           RESPONSIVE
        ========================= */

        @media (max-width: 760px) {

            .book-page {
                width: calc(100% - 32px);
                padding: 28px 0 45px;
            }

            .book-header {
                align-items: stretch;
                flex-direction: column;
                gap: 16px;
            }

            .book-header h1 {
                font-size: 25px;
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
                border-bottom: 1px solid #eef2f7;
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