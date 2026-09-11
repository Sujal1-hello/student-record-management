<section class="profile-form-section">

    <header>
        <h2>Profile Information</h2>

        <p>
            Update your account's profile information and email address.
        </p>
    </header>

    <form method="post" action="{{ route('profile.update') }}" class="profile-form">
        @csrf
        @method('patch')

        <div class="form-group">
            <label for="name">Name</label>

            <input
                id="name"
                name="name"
                type="text"
                value="{{ old('name', $user->name) }}"
                required
                autofocus
                autocomplete="name"
            >

            @if ($errors->get('name'))
                <div class="form-error">
                    {{ $errors->first('name') }}
                </div>
            @endif
        </div>

        <div class="form-group">
            <label for="email">Email</label>

            <input
                id="email"
                name="email"
                type="email"
                value="{{ old('email', $user->email) }}"
                required
                autocomplete="username"
            >

            @if ($errors->get('email'))
                <div class="form-error">
                    {{ $errors->first('email') }}
                </div>
            @endif
        </div>

        @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())

            <div class="verification-message">

                <p>
                    Your email address is unverified.
                </p>

                <button
                    form="send-verification"
                    class="verification-button"
                >
                    Click here to re-send the verification email.
                </button>

                @if (session('status') === 'verification-link-sent')
                    <p class="verification-success">
                        A new verification link has been sent to your email address.
                    </p>
                @endif

            </div>

        @endif

        <div class="form-actions">

            <button type="submit" class="save-button">
                Save
            </button>

            @if (session('status') === 'profile-updated')
                <span class="saved-message">
                    Saved.
                </span>
            @endif

        </div>

    </form>

    @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
        <form
            id="send-verification"
            method="post"
            action="{{ route('verification.send') }}"
            style="display: none;"
        >
            @csrf
        </form>
    @endif

</section>

<style>

    .profile-form-section header h2 {
        margin: 0;
        color: #111827;
        font-size: 22px;
        font-weight: 700;
    }

    .profile-form-section header p {
        margin: 8px 0 0;
        max-width: 650px;
        color: #6b7280;
        font-size: 14px;
        line-height: 1.6;
    }

    .profile-form {
        margin-top: 28px;
    }

    .form-group {
        margin-bottom: 22px;
    }

    .form-group label {
        display: block;
        margin-bottom: 8px;
        color: #374151;
        font-size: 14px;
        font-weight: 600;
    }

    .form-group input {
        width: 100%;
        height: 46px;
        box-sizing: border-box;
        padding: 0 14px;
        border: 1px solid #d1d5db;
        border-radius: 8px;
        background: #ffffff;
        color: #111827;
        font-family: inherit;
        font-size: 14px;
        outline: none;
        transition: 0.2s ease;
    }

    .form-group input:focus {
        border-color: #2563eb;
        box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
    }

    .form-error {
        margin-top: 7px;
        color: #dc2626;
        font-size: 13px;
    }

    .verification-message {
        margin-top: 5px;
        padding: 14px;
        background: #fffbeb;
        border: 1px solid #fde68a;
        border-radius: 8px;
    }

    .verification-message p {
        margin: 0 0 8px;
        color: #92400e;
        font-size: 13px;
    }

    .verification-button {
        padding: 0;
        border: 0;
        background: transparent;
        color: #2563eb;
        font-family: inherit;
        font-size: 13px;
        font-weight: 600;
        cursor: pointer;
    }

    .verification-button:hover {
        text-decoration: underline;
    }

    .verification-success {
        margin-top: 10px !important;
        color: #15803d !important;
    }

    .form-actions {
        display: flex;
        align-items: center;
        gap: 15px;
        margin-top: 26px;
    }

    .save-button {
        padding: 10px 20px;
        border: 0;
        border-radius: 8px;
        background: #2563eb;
        color: white;
        font-family: inherit;
        font-size: 14px;
        font-weight: 600;
        cursor: pointer;
    }

    .save-button:hover {
        background: #1d4ed8;
    }

    .saved-message {
        color: #15803d;
        font-size: 13px;
        font-weight: 500;
    }

</style>