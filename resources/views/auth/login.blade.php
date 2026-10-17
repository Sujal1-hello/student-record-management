<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

  <div class="mb-8">
    <h2 class="text-3xl font-bold text-gray-900 dark:text-white tracking-tight">
        Welcome Back
    </h2>
    <p class="mt-2 text-base text-gray-600 dark:text-gray-400">
        Please log in to your account.
    </p>
</div>

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email"
               class="block mt-1 w-full rounded-lg border-gray-300 px-4 py-3 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:border-gray-600 dark:bg-gray-800 dark:text-white"
                type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password"
                class="block mt-1 w-full border-gray-300 rounded-lg focus:border-indigo-500 focus:ring-indigo-500"
                type="password" name="password" required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox"
                   class="rounded-md border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500 transition duration-200 cursor-pointer"
                    name="remember">
                <span class="ms-2 text-sm text-gray-600 dark:text-gray-400 cursor-pointer">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="text-sm text-indigo-600 hover:text-indigo-900 dark:text-indigo-400 dark:hover:text-indigo-300 transition duration-200"
                    href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

           <x-primary-button class="ms-3 rounded-lg px-7 py-3 shadow-sm transition duration-300 hover:shadow-md focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
    {{ __('Log in') }}
</x-primary-button>
        </div>
    </form>
</x-guest-layout>