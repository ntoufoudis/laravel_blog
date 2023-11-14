<div>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
    </div>

    <form wire:submit="confirmPassword">
        <!-- Password -->
        <div>
            <label class="block font-medium text-sm text-gray-700" for="password">
                {{ __('Password') }}
            </label>
            <input
                wire:model="password"
                id="password"
                type="password"
                name="password"
                required
                autocomplete="current-password"
                class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md
                    shadow-sm"
            >
            <x-input-error :messages="$errors->get('password')" class="mt-2"/>
        </div>

        <div class="flex justify-end mt-4">
            <button
                type="submit"
                class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold
                    text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900
                    focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out
                    duration-150 ms-3"
            >
                {{ __('Confirm') }}
            </button>
        </div>
    </form>
</div>
