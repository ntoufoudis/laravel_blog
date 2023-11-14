<x-layouts.guest>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('This is a secure are of the application. Please confirm your password before continuing.') }}
    </div>

    <form method="POST" action="{{ route('password.confirm') }}">
        @csrf

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
                autocomplete="current-password"
            >
            @error('password')
            <p class="text-sm text-red-600 mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex items-center justify-end mt-4">
            <button
                type="submit"
                class="inline-flex ml-4 items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold
                    text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900
                    focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out
                    duration-150"
            >
                {{ __('Register') }}
            </button>
        </div>
    </form>
</x-layouts.guest>
