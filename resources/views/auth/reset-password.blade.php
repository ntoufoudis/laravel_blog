<x-layouts.guest>
    <form method="POST" action="{{ route('password.store') }}">
        @csrf

        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <!-- Email Address -->
        <div class="mt-4">
            <label class="block font-medium text-sm text-gray-700" for="email">
                {{ __('Email') }}
            </label>
            <input
                id="email"
                name="email"
                type="email"
                class="py-2 px-3 border border-gray-300 focus:outline-none focus:ring-2 focus:border-none
                    focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full"
                value="{{ old('email', $request->email) }}"
                required
                autofocus
                autocomplete="username"
            >
            <x-input-error :messages="$errors->get('email')" class="mt-2"/>
        </div>

        <!-- Password -->
        <div class="mt-4">
            <label class="block font-medium text-sm text-gray-700" for="password">
                {{ __('Password') }}
            </label>
            <input
                id="password"
                name="password"
                type="password"
                class="py-2 px-3 border border-gray-300 focus:outline-none focus:ring-2 focus:border-none
                    focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full"
                required
                autocomplete="new-password"
            >
            <x-input-error :messages="$errors->get('password')" class="mt-2"/>
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <label class="block font-medium text-sm text-gray-700" for="password_confirmation">
                {{ __('Confirm Password') }}
            </label>
            <input
                id="password_confirmation"
                name="password_confirmation"
                type="password"
                class="py-2 px-3 border border-gray-300 focus:outline-none focus:ring-2 focus:border-none
                    focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full"
                required
                autocomplete="new-password"
            >
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2"/>
        </div>

        <div class="flex items-center justify-end mt-4">
            <button
                type="submit"
                class="inline-flex ml-4 items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold
                    text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900
                    focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out
                    duration-150"
            >
                {{ __('Reset Password') }}
            </button>
        </div>
    </form>
</x-layouts.guest>
