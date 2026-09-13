<x-app-layout>

    <div class="form-container">

        <div class="page-intro">
            <div>
                <h1>Add New Book</h1>
                <p>Enter the details for the new book.</p>
            </div>

            <a href="{{ route('books.index') }}" class="clear-button">← Back to Books</a>
        </div>

        @if ($errors->any())
            <div class="error-message">
                <span>✕</span>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="form-card">
            <form method="POST" action="{{ route('books.store') }}">
                @csrf

                <div class="form-grid">

                    <div class="form-field span-2">
                        <label>Title</label>
                        <input type="text" name="title" value="{{ old('title') }}" placeholder="e.g. Introduction to Algorithms">
                    </div>

                    <div class="form-field span-2">
                        <label>Author</label>
                        <input type="text" name="author" value="{{ old('author') }}" placeholder="e.g. Thomas H. Cormen">
                    </div>

                    <div class="form-field">
                        <label>Category</label>
                        <input type="text" name="category" value="{{ old('category') }}" placeholder="e.g. Computer Science">
                    </div>

                    <div class="form-field">
                        <label>ISBN</label>
                        <input type="text" name="isbn" value="{{ old('isbn') }}" placeholder="e.g. 978-0262046305">
                    </div>

                    <div class="form-field">
                        <label>Quantity</label>
                        <input type="number" name="quantity" min="1" value="{{ old('quantity', 1) }}">
                    </div>

                </div>

                <div class="form-actions">
                    <a href="{{ route('books.index') }}" class="clear-button">Cancel</a>
                    <button type="submit" class="save-button">Save Book</button>
                </div>

            </form>
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

        .error-message {
            display: flex;
            gap: 10px;
            margin-bottom: 20px;
            padding: 13px 16px;
            background: #fef2f2;
            border: 1px solid #fecaca;
            border-radius: 9px;
            color: #991b1b;
            font-size: 13px;
        }

        .error-message ul { margin: 0; padding-left: 16px; }

        .form-card {
            background: #ffffff;
            border: 1px solid #e5e7eb;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
            padding: 28px;
        }

        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 18px;
        }

        .form-field.span-2 { grid-column: span 2; }

        .form-field label {
            display: block;
            margin-bottom: 6px;
            color: #374151;
            font-size: 13px;
            font-weight: 600;
        }

        .form-field input {
            width: 100%;
            height: 44px;
            box-sizing: border-box;
            padding: 0 13px;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            background: #ffffff;
            color: #111827;
            font-size: 13px;
            outline: none;
        }

        .form-field input:focus {
            border-color: #2563eb;
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
        }

        .form-actions {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
            margin-top: 26px;
            padding-top: 20px;
            border-top: 1px solid #f1f5f9;
        }

        @media (max-width: 700px) {
            .form-container { width: calc(100% - 32px); padding: 28px 0 40px; }
            .page-intro { flex-direction: column; align-items: stretch; }
            .form-grid { grid-template-columns: 1fr; }
            .form-field.span-2 { grid-column: auto; }
            .form-actions { flex-direction: column-reverse; }
            .form-actions a, .form-actions button { width: 100%; }
        }

    </style>

</x-app-layout>