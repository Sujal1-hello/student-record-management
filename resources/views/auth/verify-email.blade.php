<x-guest-layout>

<h2 class="mb-3 text-xl font-semibold text-gray-900 dark:text-gray-100"> Verify Your Email </h2>


    <div class="mb-6 text-sm leading-6 text-gray-600 dark:text-gray-400">
        {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="mb-6 rounded-md bg-green-50 p-3 text-sm font-medium text-green-700 dark:bg-green-900/20 dark:text-green-400">
            {{ __('A new verification link has been sent to the email address you provided during registration.') }}
        </div>
    @endif

    <div class="mt-6 flex items-center justify-between">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf

            <div class="flex items-center">
                <x-primary-button class="w-full justify-center sm:w-auto">
                    {{ __('Resend Verification Link') }}
                </x-primary-button>
            </div>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit"
                class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                {{ __('Log Out') }}
            </button>
        </form>
    </div>
</x-guest-layout>