<x-guest-layout>
    ```blade
<div class="mb-6 text-center">
    <div class="mb-4 flex justify-center">
        <div class="flex h-16 w-16 items-center justify-center rounded-2xl bg-indigo-100 dark:bg-indigo-900/40">
            <svg class="h-8 w-8 text-indigo-600 dark:text-indigo-400"
                 xmlns="http://www.w3.org/2000/svg"
                 fill="none"
                 viewBox="0 0 24 24"
                 stroke-width="1.8"
                 stroke="currentColor">
                <path stroke-linecap="round"
                      stroke-linejoin="round"
                      d="M16.5 10.5V6.75a4.5 4.5 0 0 0-9 0v3.75m-.75 0h10.5A2.25 2.25 0 0 1 19.5 12.75v6A2.25 2.25 0 0 1 17.25 21h-10.5A2.25 2.25 0 0 1 4.5 18.75v-6A2.25 2.25 0 0 1 6.75 10.5Z"/>
            </svg>
        </div>
    </div>

    <h2 class="text-3xl font-bold tracking-tight text-gray-900 dark:text-white">
        Confirm Your Password
    </h2>

    <p class="mt-3 text-sm leading-6 text-gray-600 dark:text-gray-400">
        Please verify your identity by entering your password
        before accessing this secure area.
    </p>
</div>

    <form method="POST" action="{{ route('password.confirm') }}">
        @csrf

        <!-- Password -->
        <div>
            <x-input-label for="password" :value="__('Password')" />

           ```blade
<div class="mt-2">
    <x-text-input
        id="password"
        class="block w-full rounded-xl border-gray-300 py-3
               shadow-sm transition duration-200
               focus:border-indigo-500 focus:ring-indigo-500
               dark:border-gray-600 dark:bg-gray-900 dark:text-white"
        type="password"
        name="password"
        required
        autofocus
        autocomplete="current-password"
        placeholder="Enter your password"
    />

    <x-input-error
        :messages="$errors->get('password')"
        class="mt-2"
    />
</div>

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="flex justify-end mt-4">
            <x-primary-button>
                {{ __('Confirm') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
