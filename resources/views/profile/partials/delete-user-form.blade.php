<section class="delete-section">

    <header>
        <h2>Delete Account</h2>

        <p>
            Once your account is deleted, all of its resources and data will be permanently deleted.
        </p>
    </header>

    <button
        type="button"
        class="delete-account-button"
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
    >
        Delete Account
    </button>

    <x-modal name="confirm-user-deletion" focusable>

        <form method="post" action="{{ route('profile.destroy') }}" class="delete-form-content">
            @csrf
            @method('delete')

            <h2>
                Are you sure you want to delete your account?
            </h2>

            <p>
                Once your account is deleted, all of its resources and data will be permanently deleted.
                Please enter your password to confirm.
            </p>

            <input
                id="password"
                name="password"
                type="password"
                placeholder="Password"
                class="delete-password"
            >

            @if ($errors->userDeletion->get('password'))
                <div class="form-error">
                    {{ $errors->userDeletion->first('password') }}
                </div>
            @endif

            <div class="delete-actions">

                <button
                    type="button"
                    class="cancel-button"
                    x-on:click="$dispatch('close')"
                >
                    Cancel
                </button>

                <button type="submit" class="confirm-delete-button">
                    Delete Account
                </button>

            </div>

        </form>

    </x-modal>

</section>

<style>

    .delete-section header h2 {
        margin: 0;
        color: #b91c1c;
        font-size: 22px;
        font-weight: 700;
    }

    .delete-section header p {
        margin: 8px 0 24px;
        max-width: 650px;
        color: #6b7280;
        font-size: 14px;
        line-height: 1.6;
    }

    .delete-account-button {
        padding: 10px 18px;
        border: 0;
        border-radius: 8px;
        background: #dc2626;
        color: white;
        font-family: inherit;
        font-size: 14px;
        font-weight: 600;
        cursor: pointer;
    }

    .delete-account-button:hover {
        background: #b91c1c;
    }

    .delete-form-content {
        padding: 24px;
    }

    .delete-form-content h2 {
        margin: 0;
        color: #111827;
        font-size: 18px;
        font-weight: 700;
    }

    .delete-form-content p {
        margin: 10px 0 20px;
        color: #6b7280;
        font-size: 14px;
        line-height: 1.6;
    }

    .delete-password {
        width: 100%;
        height: 44px;
        box-sizing: border-box;
        padding: 0 13px;
        border: 1px solid #d1d5db;
        border-radius: 8px;
        background: #ffffff;
        color: #111827;
        font-size: 14px;
        outline: none;
    }

    .delete-password:focus {
        border-color: #dc2626;
        box-shadow: 0 0 0 3px rgba(220, 38, 38, 0.1);
    }

    .form-error {
        margin-top: 7px;
        color: #dc2626;
        font-size: 13px;
    }

    .delete-actions {
        display: flex;
        justify-content: flex-end;
        gap: 10px;
        margin-top: 24px;
    }

    .cancel-button,
    .confirm-delete-button {
        padding: 10px 16px;
        border-radius: 8px;
        font-family: inherit;
        font-size: 13px;
        font-weight: 600;
        cursor: pointer;
    }

    .cancel-button {
        border: 1px solid #d1d5db;
        background: #ffffff;
        color: #374151;
    }

    .cancel-button:hover {
        background: #f3f4f6;
    }

    .confirm-delete-button {
        border: 0;
        background: #dc2626;
        color: white;
    }

    .confirm-delete-button:hover {
        background: #b91c1c;
    }

</style>