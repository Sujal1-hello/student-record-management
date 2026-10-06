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

    <div class="mt-6 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
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

            <button type="submit" class="rounded-md px-3 py-2 text-sm text-gray-600 underline underline-offset-4 transition hover:text-gray-900 dark:text-gray-400 dark:hover:text-gray-100">
                {{ __('Log Out') }}
            </button>
        </form>
    </div>
</x-guest-layout>