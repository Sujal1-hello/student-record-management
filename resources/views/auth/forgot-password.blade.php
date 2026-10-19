```blade
<x-guest-layout>
    <div class="mb-6 text-center">
        <h2 class="text-3xl font-bold text-gray-900 dark:text-white">
            Forgot Password?
        </h2>

        <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
            No worries! We'll help you reset your password.
        </p>
    </div>

    <div class="mt-4">
        <div class="mb-6 text-sm leading-6 text-gray-600 dark:text-gray-400">
            Enter the email address associated with your account.
            We'll send you a password reset link so you can securely
            create a new password.
        </div>

        <!-- Session Status -->
        <x-auth-session-status
            class="mb-4"
            :status="session('status')"
        />

        <!-- Password Reset Form -->
        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email Address')" />

                <x-text-input
                    id="email"
                    class="block mt-2 w-full"
                    type="email"
                    name="email"
                    :value="old('email')"
                    required
                    autofocus
                    autocomplete="username"
                    placeholder="Enter your email address"
                />

                <x-input-error
                    :messages="$errors->get('email')"
                    class="mt-2"
                />
            </div>

            <!-- Submit Button -->
            <div class="mt-6">
                <x-primary-button class="w-full justify-center">
                    {{ __('Send Password Reset Link') }}
                </x-primary-button>
            </div>

            <!-- Back to Login -->
            <div class="mt-5 text-center">
                <a
                    href="{{ route('login') }}"
                    class="text-sm font-medium text-indigo-600 hover:text-indigo-500 dark:text-indigo-400 dark:hover:text-indigo-300 transition"
                >
                    &larr; Back to Login
                </a>
            </div>
        </form>
    </div>
</x-guest-layout>
```