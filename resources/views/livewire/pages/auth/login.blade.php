<div>
    <!-- Session Status -->
    @if (session('status'))
        <div class="font-medium text-sm text-green-600 mb-4">
            {{ session('status') }}
        </div>
    @endif

    <form wire:submit="login">
        <!-- Email Address -->
        <div>
            <label class="block font-medium text-sm text-gray-700" for="email">
                {{ __('Email') }}
            </label>

            <input
                wire:model="form.email"
                id="email"
                type="email"
                name="email"
                required
                autofocus
                autocomplete="username"
                class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md
                    shadow-sm"
            >
            <x-input-error :messages="$errors->get('email')" class="mt-2"/>
        </div>

        <!-- Password -->
        <div class="mt-4">
            <label class="block font-medium text-sm text-gray-700" for="password">
                {{ __('Password') }}
            </label>
            <input
                wire:model="form.password"
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

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember" class="inline-flex items-center">
                <input
                    wire:model="form.remember"
                    id="remember"
                    name="remember"
                    type="checkbox"
                    class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"
                >
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a
                    class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none
                        focus:ring-offset-2 focus:ring-indigo-500"
                    href="{{ route('password.request') }}"
                    wire:navigate
                >
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <button
                type="submit"
                class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold
                    text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900
                    focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out
                    duration-150 ms-3"
            >
                {{ __('Log in') }}
            </button>
        </div>
    </form>
</div>
