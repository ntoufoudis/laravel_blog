<x-layouts.guest>
<div class="mb-4 text-sm text-gray-600">
    {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one') }}
</div>

    <!-- Session Status -->
    @if (session('status'))
        <div class="font-medium text-sm text-green-600 mb-4">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

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
                autofocus
                autocomplete="username"
            >
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <button
                type="submit"
                class="inline-flex ml-4 items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold
                    text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900
                    focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out
                    duration-150"
            >
                {{ __('Email Password Reset Link') }}
            </button>
        </div>
    </form>
</x-layouts.guest>
