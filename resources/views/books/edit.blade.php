<x-app-layout>

    <div class="edit-page">

        {{-- Page Header --}}
        <div class="page-header">

            <div class="header-content">
                <a href="{{ route('books.index') }}" class="back-link">
                    <span>←</span>
                    Back to Books
                </a>

                <div class="title-section">
                    <div class="book-icon">
                        📖
                    </div>

                    <div>
                        <h1>Edit Book</h1>
                        <p>
                            Update the information for
                            <strong>{{ $book->title }}</strong>
                        </p>
                    </div>
                </div>
            </div>

            <div class="book-reference">
                <span>BOOK ID</span>
                <strong>{{ $book->book_id }}</strong>
            </div>

        </div>


        {{-- Validation Errors --}}
        @if ($errors->any())
            <div class="error-message">

                <div class="error-icon">!</div>

                <div>
                    <strong>Please fix the following errors:</strong>

                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>

            </div>
        @endif


        {{-- Main Content --}}
        <div class="content-layout">

            {{-- Form Card --}}
            <div class="form-card">

                <div class="card-header">
                    <div>
                        <h2>Book Information</h2>
                        <p>Update the details below and save your changes.</p>
                    </div>
                </div>


                <form method="POST" action="{{ route('books.update', $book) }}">
                    @csrf
                    @method('PUT')

                    <div class="form-grid">

                        {{-- Title --}}
                        <div class="form-field full-width">

                            <label for="title">
                                Book Title
                                <span>*</span>
                            </label>

                            <div class="input-wrapper">
                                <span class="input-icon">📚</span>

                                <input id="title" type="text" name="title" value="{{ old('title', $book->title) }}"
                                    placeholder="Enter book title" class="@error('title') input-error @enderror"
                                    required>
                            </div>

                            @error('title')
                                <small class="error-text">{{ $message }}</small>
                            @enderror

                        </div>


                        {{-- Author --}}
                        <div class="form-field full-width">

                            <label for="author">
                                Author
                                <span>*</span>
                            </label>

                            <div class="input-wrapper">
                                <span class="input-icon">✍️</span>

                                <input id="author" type="text" name="author" value="{{ old('author', $book->author) }}"
                                    placeholder="Enter author name" class="@error('author') input-error @enderror"
                                    required>
                            </div>

                            @error('author')
                                <small class="error-text">{{ $message }}</small>
                            @enderror

                        </div>


                        {{-- Category --}}
                        <div class="form-field">

                            <label for="category">
                                Category
                                <span>*</span>
                            </label>

                            <div class="input-wrapper">
                                <span class="input-icon">🏷️</span>

                                <input id="category" type="text" name="category"
                                    value="{{ old('category', $book->category) }}" placeholder="e.g. Fiction"
                                    class="@error('category') input-error @enderror" required>
                            </div>

                            @error('category')
                                <small class="error-text">{{ $message }}</small>
                            @enderror

                        </div>


                        {{-- ISBN --}}
                        <div class="form-field">

                            <label for="isbn">
                                ISBN
                            </label>

                            <div class="input-wrapper">
                                <span class="input-icon">🔢</span>

                                <input id="isbn" type="text" name="isbn" value="{{ old('isbn', $book->isbn) }}"
                                    placeholder="Enter ISBN" class="@error('isbn') input-error @enderror">
                            </div>

                            @error('isbn')
                                <small class="error-text">{{ $message }}</small>
                            @enderror

                        </div>


                        {{-- Quantity --}}
                        <div class="form-field full-width">

                            <label for="quantity">
                                Total Quantity
                                <span>*</span>
                            </label>

                            <div class="quantity-section">

                                <div class="input-wrapper quantity-input">
                                    <span class="input-icon">📦</span>

                                    <input id="quantity" type="number" name="quantity"
                                        min="{{ $book->quantity - $book->available_copies }}"
                                        value="{{ old('quantity', $book->quantity) }}"
                                        class="@error('quantity') input-error @enderror" required>
                                </div>

                                <div class="quantity-info">

                                    <div class="quantity-stat">
                                        <span class="stat-label">Total</span>
                                        <strong>{{ $book->quantity }}</strong>
                                    </div>

                                    <div class="quantity-divider"></div>

                                    <div class="quantity-stat available">
                                        <span class="stat-label">Available</span>
                                        <strong>{{ $book->available_copies }}</strong>
                                    </div>

                                    <div class="quantity-divider"></div>

                                    <div class="quantity-stat issued">
                                        <span class="stat-label">Issued</span>
                                        <strong>
                                            {{ $book->quantity - $book->available_copies }}
                                        </strong>
                                    </div>

                                </div>

                            </div>

                            <div class="field-hint">
                                <span>ⓘ</span>
                                Minimum quantity:
                                <strong>
                                    {{ $book->quantity - $book->available_copies }}
                                </strong>.
                                You cannot reduce the quantity below the number of currently issued copies.
                            </div>

                            @error('quantity')
                                <small class="error-text">{{ $message }}</small>
                            @enderror

                        </div>

                    </div>


                    {{-- Actions --}}
                    <div class="form-actions">

                        <a href="{{ route('books.index') }}" class="cancel-button">
                            Cancel
                        </a>

                        <button type="submit" class="save-button">
                            <span>✓</span>
                            Update Book
                        </button>

                    </div>

                </form>

            </div>


            {{-- Side Information --}}
            <aside class="side-card">

                <div class="side-card-icon">
                    💡
                </div>

                <h3>Editing this book?</h3>

                <p>
                    Make sure the book information is accurate before saving
                    your changes.
                </p>

                <div class="tips">

                    <div class="tip">
                        <span>✓</span>
                        <p>Use the correct book title and author.</p>
                    </div>

                    <div class="tip">
                        <span>✓</span>
                        <p>Keep the ISBN accurate for identification.</p>
                    </div>

                    <div class="tip">
                        <span>✓</span>
                        <p>Quantity cannot be lower than issued copies.</p>
                    </div>

                </div>

            </aside>

        </div>

    </div>


    <style>
        /* =========================
           PAGE
        ========================= */

        .edit-page {
            width: min(1180px, calc(100% - 48px));
            margin: 0 auto;
            padding: 42px 0 70px;
            color: #111827;
        }


        /* =========================
           HEADER
        ========================= */

        .page-header {
            display: flex;
            align-items: flex-end;
            justify-content: space-between;
            gap: 30px;
            margin-bottom: 30px;
        }

        .header-content {
            min-width: 0;
        }

        .back-link {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            margin-bottom: 20px;
            color: #64748b;
            font-size: 13px;
            font-weight: 600;
            text-decoration: none;
            transition: .2s ease;
        }

        .back-link:hover {
            color: #2563eb;
            transform: translateX(-2px);
        }

        .back-link span {
            font-size: 18px;
        }

        .title-section {
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .book-icon {
            width: 52px;
            height: 52px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 14px;
            background: linear-gradient(135deg,
                    #eff6ff,
                    #dbeafe);
            border: 1px solid #bfdbfe;
            font-size: 23px;
        }

        .title-section h1 {
            margin: 0;
            font-size: 28px;
            line-height: 1.2;
            font-weight: 750;
            letter-spacing: -0.5px;
            color: #0f172a;
        }

        .title-section p {
            margin: 6px 0 0;
            color: #64748b;
            font-size: 14px;
        }

        .title-section p strong {
            color: #334155;
        }

        .book-reference {
            display: flex;
            flex-direction: column;
            align-items: flex-end;
            gap: 5px;
            padding: 11px 15px;
            border: 1px solid #e2e8f0;
            border-radius: 10px;
            background: #f8fafc;
        }

        .book-reference span {
            color: #94a3b8;
            font-size: 10px;
            font-weight: 700;
            letter-spacing: 1px;
        }

        .book-reference strong {
            color: #334155;
            font-size: 13px;
        }


        /* =========================
           ERROR
        ========================= */

        .error-message {
            display: flex;
            gap: 13px;
            margin-bottom: 24px;
            padding: 15px 17px;
            border: 1px solid #fecaca;
            border-radius: 12px;
            background: #fff7f7;
            color: #991b1b;
        }

        .error-icon {
            flex: 0 0 auto;
            width: 25px;
            height: 25px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            background: #dc2626;
            color: white;
            font-weight: 800;
            font-size: 13px;
        }

        .error-message strong {
            display: block;
            margin-bottom: 5px;
            font-size: 13px;
        }

        .error-message ul {
            margin: 0;
            padding-left: 17px;
            font-size: 12px;
            line-height: 1.7;
        }


        /* =========================
           LAYOUT
        ========================= */

        .content-layout {
            display: grid;
            grid-template-columns: minmax(0, 1fr) 270px;
            gap: 22px;
            align-items: start;
        }


        /* =========================
           FORM CARD
        ========================= */

        .form-card {
            overflow: hidden;
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 16px;
            box-shadow:
                0 4px 6px -1px rgba(15, 23, 42, .03),
                0 12px 30px -15px rgba(15, 23, 42, .12);
        }

        .card-header {
            padding: 23px 25px;
            border-bottom: 1px solid #eef2f7;
            background: linear-gradient(to bottom,
                    #ffffff,
                    #fcfdff);
        }

        .card-header h2 {
            margin: 0;
            color: #0f172a;
            font-size: 16px;
            font-weight: 700;
        }

        .card-header p {
            margin: 5px 0 0;
            color: #94a3b8;
            font-size: 12px;
        }

        form {
            padding: 25px;
        }


        /* =========================
           FORM GRID
        ========================= */

        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 21px 18px;
        }

        .form-field.full-width {
            grid-column: span 2;
        }

        .form-field label {
            display: block;
            margin-bottom: 7px;
            color: #334155;
            font-size: 12px;
            font-weight: 700;
        }

        .form-field label span {
            color: #ef4444;
            margin-left: 2px;
        }


        /* =========================
           INPUTS
        ========================= */

        .input-wrapper {
            position: relative;
        }

        .input-icon {
            position: absolute;
            left: 13px;
            top: 50%;
            z-index: 1;
            transform: translateY(-50%);
            font-size: 14px;
            pointer-events: none;
            opacity: .7;
        }

        .form-field input {
            width: 100%;
            height: 45px;
            box-sizing: border-box;
            padding: 0 13px 0 40px;
            border: 1px solid #dbe2ea;
            border-radius: 9px;
            outline: none;
            background: #fff;
            color: #0f172a;
            font-family: inherit;
            font-size: 13px;
            transition:
                border-color .2s ease,
                box-shadow .2s ease,
                background .2s ease;
        }

        .form-field input::placeholder {
            color: #b0bac7;
        }

        .form-field input:hover {
            border-color: #cbd5e1;
        }

        .form-field input:focus {
            border-color: #3b82f6;
            background: #fff;
            box-shadow:
                0 0 0 3px rgba(59, 130, 246, .10);
        }

        .form-field input.input-error {
            border-color: #ef4444;
        }

        .form-field input.input-error:focus {
            box-shadow:
                0 0 0 3px rgba(239, 68, 68, .10);
        }

        .error-text {
            display: block;
            margin-top: 6px;
            color: #dc2626;
            font-size: 11px;
        }


        /* =========================
           QUANTITY
        ========================= */

        .quantity-section {
            display: grid;
            grid-template-columns: 160px 1fr;
            gap: 12px;
        }

        .quantity-input input {
            font-weight: 600;
        }

        .quantity-info {
            display: flex;
            align-items: center;
            justify-content: space-around;
            min-height: 45px;
            padding: 0 10px;
            border: 1px solid #e2e8f0;
            border-radius: 9px;
            background: #f8fafc;
        }

        .quantity-stat {
            display: flex;
            flex-direction: column;
            gap: 2px;
            text-align: center;
        }

        .stat-label {
            color: #94a3b8;
            font-size: 9px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: .6px;
        }

        .quantity-stat strong {
            color: #334155;
            font-size: 14px;
        }

        .quantity-stat.available strong {
            color: #16a34a;
        }

        .quantity-stat.issued strong {
            color: #f59e0b;
        }

        .quantity-divider {
            width: 1px;
            height: 25px;
            background: #e2e8f0;
        }

        .field-hint {
            display: flex;
            align-items: flex-start;
            gap: 5px;
            margin-top: 8px;
            color: #64748b;
            font-size: 11px;
            line-height: 1.5;
        }

        .field-hint span {
            color: #3b82f6;
        }


        /* =========================
           ACTIONS
        ========================= */

        .form-actions {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
            margin-top: 28px;
            padding-top: 21px;
            border-top: 1px solid #f1f5f9;
        }

        .cancel-button,
        .save-button {
            height: 42px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 7px;
            padding: 0 18px;
            border-radius: 9px;
            font-family: inherit;
            font-size: 12px;
            font-weight: 700;
            cursor: pointer;
            text-decoration: none;
            transition: all .2s ease;
        }

        .cancel-button {
            border: 1px solid #e2e8f0;
            background: white;
            color: #475569;
        }

        .cancel-button:hover {
            background: #f8fafc;
            border-color: #cbd5e1;
        }

        .save-button {
            border: 0;
            background: linear-gradient(135deg,
                    #2563eb,
                    #1d4ed8);
            color: white;
            box-shadow:
                0 4px 10px rgba(37, 99, 235, .20);
        }

        .save-button:hover {
            transform: translateY(-1px);
            box-shadow:
                0 6px 14px rgba(37, 99, 235, .28);
        }

        .save-button:active {
            transform: translateY(0);
        }

        .save-button span {
            font-size: 14px;
        }


        /* =========================
           SIDE CARD
        ========================= */

        .side-card {
            padding: 22px;
            border: 1px solid #e2e8f0;
            border-radius: 16px;
            background: linear-gradient(145deg,
                    #f8fbff,
                    #ffffff);
            box-shadow:
                0 8px 25px -20px rgba(15, 23, 42, .25);
        }

        .side-card-icon {
            width: 38px;
            height: 38px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 15px;
            border-radius: 10px;
            background: #eff6ff;
            font-size: 17px;
        }

        .side-card h3 {
            margin: 0;
            color: #1e293b;
            font-size: 14px;
            font-weight: 700;
        }

        .side-card>p {
            margin: 7px 0 20px;
            color: #64748b;
            font-size: 12px;
            line-height: 1.6;
        }

        .tips {
            display: flex;
            flex-direction: column;
            gap: 14px;
        }

        .tip {
            display: flex;
            align-items: flex-start;
            gap: 9px;
        }

        .tip>span {
            flex: 0 0 auto;
            width: 19px;
            height: 19px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            background: #dcfce7;
            color: #16a34a;
            font-size: 10px;
            font-weight: 800;
        }

        .tip p {
            margin: 0;
            color: #64748b;
            font-size: 11px;
            line-height: 1.5;
        }


        /* =========================
           RESPONSIVE
        ========================= */

        @media (max-width: 900px) {

            .content-layout {
                grid-template-columns: 1fr;
            }

            .side-card {
                order: 2;
            }

        }

        @media (max-width: 700px) {

            .edit-page {
                width: calc(100% - 28px);
                padding: 28px 0 45px;
            }

            .page-header {
                align-items: flex-start;
                flex-direction: column;
                gap: 18px;
            }

            .book-reference {
                align-items: flex-start;
            }

            .form-grid {
                grid-template-columns: 1fr;
            }

            .form-field.full-width {
                grid-column: auto;
            }

            .quantity-section {
                grid-template-columns: 1fr;
            }

            .quantity-info {
                padding: 12px 5px;
            }

            .card-header,
            form {
                padding: 20px;
            }

        }

        @media (max-width: 480px) {

            .title-section {
                align-items: flex-start;
            }

            .book-icon {
                width: 44px;
                height: 44px;
                font-size: 19px;
            }

            .title-section h1 {
                font-size: 23px;
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

</x-app-layout>
}

.quantity-info {
display: flex;
align-items: center;
justify-content: space-around;
min-height: 45px;
padding: 0 10px;
border: 1px solid #e2e8f0;
border-radius: 9px;
background: #f8fafc;
}

.quantity-stat {
display: flex;
flex-direction: column;
gap: 2px;
text-align: center;
}

.stat-label {
color: #94a3b8;
font-size: 9px;
font-weight: 700;
text-transform: uppercase;
letter-spacing: .6px;
}

.quantity-stat strong {
color: #334155;
font-size: 14px;
}

.quantity-stat.available strong {
color: #16a34a;
}

.quantity-stat.issued strong {
color: #f59e0b;
}

.quantity-divider {
width: 1px;
height: 25px;
background: #e2e8f0;
}

.field-hint {
display: flex;
align-items: flex-start;
gap: 5px;
margin-top: 8px;
color: #64748b;
font-size: 11px;
line-height: 1.5;
}

.field-hint span {
color: #3b82f6;
}


/* =========================
ACTIONS
========================= */

.form-actions {
display: flex;
justify-content: flex-end;
gap: 10px;
margin-top: 28px;
padding-top: 21px;
border-top: 1px solid #f1f5f9;
}

.cancel-button,
.save-button {
height: 42px;
display: inline-flex;
align-items: center;
justify-content: center;
gap: 7px;
padding: 0 18px;
border-radius: 9px;
font-family: inherit;
font-size: 12px;
font-weight: 700;
cursor: pointer;
text-decoration: none;
transition: all .2s ease;
}

.cancel-button {
border: 1px solid #e2e8f0;
background: white;
color: #475569;
}

.cancel-button:hover {
background: #f8fafc;
border-color: #cbd5e1;
}

.save-button {
border: 0;
background: linear-gradient(
135deg,
#2563eb,
#1d4ed8
);
color: white;
box-shadow:
0 4px 10px rgba(37, 99, 235, .20);
}

.save-button:hover {
transform: translateY(-1px);
box-shadow:
0 6px 14px rgba(37, 99, 235, .28);
}

.save-button:active {
transform: translateY(0);
}

.save-button span {
font-size: 14px;
}


/* =========================
SIDE CARD
========================= */

.side-card {
padding: 22px;
border: 1px solid #e2e8f0;
border-radius: 16px;
background: linear-gradient(
145deg,
#f8fbff,
#ffffff
);
box-shadow:
0 8px 25px -20px rgba(15, 23, 42, .25);
}

.side-card-icon {
width: 38px;
height: 38px;
display: flex;
align-items: center;
justify-content: center;
margin-bottom: 15px;
border-radius: 10px;
background: #eff6ff;
font-size: 17px;
}

.side-card h3 {
margin: 0;
color: #1e293b;
font-size: 14px;
font-weight: 700;
}

.side-card > p {
margin: 7px 0 20px;
color: #64748b;
font-size: 12px;
line-height: 1.6;
}

.tips {
display: flex;
flex-direction: column;
gap: 14px;
}

.tip {
display: flex;
align-items: flex-start;
gap: 9px;
}

.tip > span {
flex: 0 0 auto;
width: 19px;
height: 19px;
display: flex;
align-items: center;
justify-content: center;
border-radius: 50%;
background: #dcfce7;
color: #16a34a;
font-size: 10px;
font-weight: 800;
}

.tip p {
margin: 0;
color: #64748b;
font-size: 11px;
line-height: 1.5;
}


/* =========================
RESPONSIVE
========================= */

@media (max-width: 900px) {

.content-layout {
grid-template-columns: 1fr;
}

.side-card {
order: 2;
}

}

@media (max-width: 700px) {

.edit-page {
width: calc(100% - 28px);
padding: 28px 0 45px;
}

.page-header {
align-items: flex-start;
flex-direction: column;
gap: 18px;
}

.book-reference {
align-items: flex-start;
}

.form-grid {
grid-template-columns: 1fr;
}

.form-field.full-width {
grid-column: auto;
}

.quantity-section {
grid-template-columns: 1fr;
}

.quantity-info {
padding: 12px 5px;
}

.card-header,
form {
padding: 20px;
}

}

@media (max-width: 480px) {

.title-section {
align-items: flex-start;
}

.book-icon {
width: 44px;
height: 44px;
font-size: 19px;
}

.title-section h1 {
font-size: 23px;
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

</x-app-layout>

@method('PUT')

<div class="form-grid">

    <div class="form-field span-2">
        <label>Title</label>
        <input type="text" name="title" value="{{ old('title', $book->title) }}">
    </div>

    <div class="form-field span-2">
        <label>Author</label>
        <input type="text" name="author" value="{{ old('author', $book->author) }}">
    </div>

    <div class="form-field">
        <label>Category</label>
        <input type="text" name="category" value="{{ old('category', $book->category) }}">
    </div>

    <div class="form-field">
        <label>ISBN</label>
        <input type="text" name="isbn" value="{{ old('isbn', $book->isbn) }}">
    </div>

    <div class="form-field span-2">
        <label>Quantity</label>
        <input type="number" name="quantity" min="1" value="{{ old('quantity', $book->quantity) }}">
        <small class="field-hint">
            Currently issued: {{ $book->quantity - $book->available_copies }} copies. Quantity can't go below that
            number.
        </small>
    </div>

</div>

<div class="form-actions">
    <a href="{{ route('books.index') }}" class="clear-button">Cancel</a>
    <button type="submit" class="save-button">Update Book</button>
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

    .page-intro h1 {
        margin: 0;
        color: #111827;
        font-size: 26px;
        font-weight: 700;
    }

    .page-intro p {
        margin: 7px 0 0;
        color: #6b7280;
        font-size: 14px;
    }

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

    .clear-button:hover {
        background: #e5e7eb;
    }

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

    .save-button:hover {
        background: #1d4ed8;
    }

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

    .error-message ul {
        margin: 0;
        padding-left: 16px;
    }

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

    .form-field.span-2 {
        grid-column: span 2;
    }

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

    .field-hint {
        display: block;
        margin-top: 6px;
        color: #6b7280;
        font-size: 12px;
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
        .form-container {
            width: calc(100% - 32px);
            padding: 28px 0 40px;
        }

        .page-intro {
            flex-direction: column;
            align-items: stretch;
        }

        .form-grid {
            grid-template-columns: 1fr;
        }

        .form-field.span-2 {
            grid-column: auto;
        }

        .form-actions {
            flex-direction: column-reverse;
        }

        .form-actions a,
        .form-actions button {
            width: 100%;
        }
    }
</style>

</x-app-layout>