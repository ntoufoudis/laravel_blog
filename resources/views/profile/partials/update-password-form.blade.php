<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Update Password') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Ensure your account is using a long, random password to stay secure.") }}
        </p>
    </header>

    <form method="POST" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('PUT')

        <div class="mt-4">
            <label class="block font-medium text-sm text-gray-700" for="current_password">
                {{ __('Current Password') }}
            </label>
            <input
                id="current_password"
                name="current_password"
                type="password"
                class="py-2 px-3 border border-gray-300 focus:outline-none focus:border-none focus:ring-2
                    focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full"
                required
                autocomplete="current-password"
            >
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2"/>


        </div>
        <div class="mt-4">
            <label class="block font-medium text-sm text-gray-700" for="password">
                {{ __('New Password') }}
            </label>
            <input
                id="password"
                name="password"
                type="password"
                class="py-2 px-3 border border-gray-300 focus:outline-none focus:border-none focus:ring-2
                    focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full"
                required
                autocomplete="new-password"
            >
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2"/>

        </div>
        <div class="mt-4">
            <label class="block font-medium text-sm text-gray-700" for="password_confirmation">
                {{ __('Confirm Password') }}
            </label>
            <input
                id="password_confirmation"
                name="password_confirmation"
                type="password"
                class="py-2 px-3 border border-gray-300 focus:outline-none focus:border-none focus:ring-2
                    focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full"
                required
                autocomplete="new-password"
            >
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2"/>

        </div>
        <div class="flex items-center gap-4">
            <button
                type="submit"
                class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold
                    text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900
                    focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out
                    duration-150"
            >
                {{ __('Save') }}
            </button>

            @if (session('status') === 'password-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 5000)"
                    class="text-sm text-gray-600"
                >{{ __('Saved') }}</p>
            @endif
        </div>
    </form>
</section>
