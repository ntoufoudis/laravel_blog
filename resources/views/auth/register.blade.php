<x-layouts.guest>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <label class="block font-medium text-sm text-gray-700" for="name">
                {{ __('Name') }}
            </label>
            <input
                id="name"
                name="name"
                type="text"
                class="py-2 px-3 border border-gray-300 focus:outline-none focus:ring-2 focus:border-none
                    focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full"
                value="{{ old('name') }}"
                required
                autofocus
                autocomplete="name"
            >
            @error('name')
            <p class="text-sm text-red-600 mt-2">{{ $message }}</p>
            @enderror
        </div>

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
                value="{{ old('email') }}"
                required
                autocomplete="username"
            >
            @error('email')
            <p class="text-sm text-red-600 mt-2">{{ $message }}</p>
            @enderror
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
            @error('password')
            <p class="text-sm text-red-600 mt-2">{{ $message }}</p>
            @enderror
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
            @error('password')
            <p class="text-sm text-red-600 mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex items-center justify-end mt-4">
            <a
                class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2
                    focus:ring-offset-2 focus:ring-indigo-500"
                href="{{ route('login') }}"
            >
                {{ __('Already registered?') }}
            </a>

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
