<x-app-layout>

    <div class="form-container">

        <div class="page-intro">
            <div>
                <h1>{{ $book->title }}</h1>
                <p>Book details for {{ $book->book_id }}</p>
            </div>

            <a href="{{ route('books.index') }}" class="clear-button">← Back to Books</a>
        </div>

        <div class="form-card">

            <dl class="detail-grid">

                <div>
                    <dt>Book ID</dt>
                    <dd><span class="student-id">{{ $book->book_id }}</span></dd>
                </div>

                <div>
                    <dt>Status</dt>
                    <dd><span class="status-badge {{ strtolower($book->status) }}">{{ $book->status }}</span></dd>
                </div>

                <div>
                    <dt>Title</dt>
                    <dd>{{ $book->title }}</dd>
                </div>

                <div>
                    <dt>Author</dt>
                    <dd>{{ $book->author }}</dd>
                </div>

                <div>
                    <dt>Category</dt>
                    <dd>{{ $book->category ?? 'N/A' }}</dd>
                </div>

                <div>
                    <dt>ISBN</dt>
                    <dd>{{ $book->isbn ?? 'N/A' }}</dd>
                </div>

                <div>
                    <dt>Quantity</dt>
                    <dd>{{ $book->quantity }}</dd>
                </div>

                <div>
                    <dt>Available Copies</dt>
                    <dd>{{ $book->available_copies }}</dd>
                </div>

            </dl>

            <div class="form-actions">
                <a href="{{ route('books.index') }}" class="clear-button">Back to Books</a>
                <a href="{{ route('books.edit', $book) }}" class="save-button" style="text-decoration:none;">Edit Book</a>
            </div>

        </div>

    </div>

    <style>

        .form-container {
            width: min(900px, calc(100% - 60px));
            margin: 0 auto;
            padding: 40px 0 60px;
        }

        .page-intro {
            display: flex;
            align-items: flex-end;
            justify-content: space-between;
            gap: 20px;
            margin-bottom: 28px;
        }

        .page-intro h1 { margin: 0; color: #111827; font-size: 26px; font-weight: 700; }
        .page-intro p { margin: 7px 0 0; color: #6b7280; font-size: 14px; }

        .clear-button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            height: 40px;
            padding: 0 16px;
            border-radius: 8px;
            border: 1px solid #e5e7eb;
            background: #f3f4f6;
            color: #374151;
            text-decoration: none;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
        }

        .clear-button:hover { background: #e5e7eb; }

        .save-button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            height: 40px;
            padding: 0 18px;
            border: 0;
            border-radius: 8px;
            background: #2563eb;
            color: white;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
        }

        .save-button:hover { background: #1d4ed8; }

        .form-card {
            background: #ffffff;
            border: 1px solid #e5e7eb;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
            padding: 28px;
        }

        .form-actions {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
            margin-top: 26px;
            padding-top: 20px;
            border-top: 1px solid #f1f5f9;
        }

        .detail-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 22px;
        }

        .detail-grid dt {
            margin-bottom: 5px;
            color: #9ca3af;
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 0.05em;
            text-transform: uppercase;
        }

        .detail-grid dd {
            margin: 0;
            color: #111827;
            font-size: 14px;
            font-weight: 500;
        }

        .student-id {
            display: inline-flex;
            padding: 5px 8px;
            border-radius: 6px;
            background: #eff6ff;
            color: #2563eb;
            font-size: 12px;
            font-weight: 700;
        }

        .status-badge {
            display: inline-flex;
            padding: 5px 9px;
            border-radius: 999px;
            font-size: 11px;
            font-weight: 600;
        }

        .status-badge.available { background: #ecfdf5; color: #15803d; }
        .status-badge.unavailable { background: #fef2f2; color: #dc2626; }

        @media (max-width: 700px) {
            .form-container { width: calc(100% - 32px); padding: 28px 0 40px; }
            .page-intro { flex-direction: column; align-items: stretch; }
            .detail-grid { grid-template-columns: 1fr; }
            .form-actions { flex-direction: column-reverse; }
            .form-actions a { width: 100%; text-align: center; }
        }

    </style>

</x-app-layout>