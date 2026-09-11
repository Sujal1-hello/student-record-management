<section class="profile-form-section">

    <header>
        <h2>Update Password</h2>

        <p>
            Ensure your account is using a long, random password to stay secure.
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="profile-form">
        @csrf
        @method('put')

        <div class="form-group">
            <label for="current_password">Current Password</label>

            <input
                id="current_password"
                name="current_password"
                type="password"
                autocomplete="current-password"
            >

            @if ($errors->updatePassword->get('current_password'))
                <div class="form-error">
                    {{ $errors->updatePassword->first('current_password') }}
                </div>
            @endif
        </div>

        <div class="form-group">
            <label for="password">New Password</label>

            <input
                id="password"
                name="password"
                type="password"
                autocomplete="new-password"
            >

            @if ($errors->updatePassword->get('password'))
                <div class="form-error">
                    {{ $errors->updatePassword->first('password') }}
                </div>
            @endif
        </div>

        <div class="form-group">
            <label for="password_confirmation">Confirm Password</label>

            <input
                id="password_confirmation"
                name="password_confirmation"
                type="password"
                autocomplete="new-password"
            >

            @if ($errors->updatePassword->get('password_confirmation'))
                <div class="form-error">
                    {{ $errors->updatePassword->first('password_confirmation') }}
                </div>
            @endif
        </div>

        <div class="form-actions">

            <button type="submit" class="save-button">
                Update Password
            </button>

            @if (session('status') === 'password-updated')
                <span class="saved-message">
                    Password updated.
                </span>
            @endif

        </div>

    </form>

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