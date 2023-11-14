<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Profile') }}
    </h2>
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <div class="p-4 sm:p-8 bg-white shadow sm:rounded:lg">
            <div class="max-w-xl">
                <section>
                    <header>
                        <h2 class="text-lg font-medium text-gray-900">
                            {{ __('Profile Information') }}
                        </h2>

                        <p class="mt-1 text-sm text-gray-600">
                            {{ __("Update your account's profile information and email address.") }}
                        </p>
                    </header>

                    <form wire:submit="updateProfileInformation" class="mt-6 space-y-6">
                        <div>
                            <label class="block font-medium text-sm text-gray-700" for="name">
                                {{ __('Name') }}
                            </label>

                            <input
                                wire:model="name"
                                id="name"
                                type="text"
                                name="name"
                                required
                                autofocus
                                autocomplete="name"
                                class="block mt-1 w-full border-gray-300 focus:border-indigo-500
                                        focus:ring-indigo-500 rounded-md shadow-sm"
                            >
                            <x-input-error :messages="$errors->get('name')" class="mt-2"/>
                        </div>
                        <div>
                            <label class="block font-medium text-sm text-gray-700" for="email">
                                {{ __('Email') }}
                            </label>

                            <input
                                wire:model="email"
                                id="email"
                                type="email"
                                name="email"
                                required
                                autocomplete="username"
                                class="block mt-1 w-full border-gray-300 focus:border-indigo-500
                                        focus:ring-indigo-500 rounded-md shadow-sm"
                            >
                            <x-input-error :messages="$errors->get('email')" class="mt-2"/>

                            @if (auth()->user() instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! auth()->user()->hasVerifiedEmail())
                                <div>
                                    <p class="text-sm mt-2 text-gray-800">
                                        {{ __('Your email address is unverified') }}

                                        <button
                                            wire:click.prevent="sendVerification"
                                            class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md
                                                    focus:outline-none focus:ring-2 focus:ring-offset-2
                                                    focus:ring-indigo-500"
                                        >
                                            {{ __('Click here to re-send the verification email.') }}
                                        </button>
                                    </p>

                                    @if (session('status') === 'verification-link-sent')
                                        <p class="mt-2 font-medium text-sm text-green-600">
                                            {{ __('A new verification link has been sent to your email address.') }}
                                        </p>
                                    @endif
                                </div>
                            @endif
                        </div>
                        <div class="flex items-center gap-4">
                            <button
                                type="submit"
                                class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent
                                    rounded-md font-semibold text-xs text-white uppercase tracking-widest
                                    hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none
                                    focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out
                                    duration-150 ms-3"
                            >
                                {{ __('Save') }}
                            </button>

                            <x-action-message class="me-3" on="profile-updated">
                                {{ __('Saved.') }}
                            </x-action-message>
                        </div>
                    </form>
                </section>
            </div>
        </div>
        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <div class="max-w-xl">
                <section>
                    <header>
                        <h2 class="text-lg font-medium text-gray-900">
                            {{ __('Update Password') }}
                        </h2>

                        <p class="mt-1 text-sm text-gray-600">
                            {{ __('Ensure your account is using a long, random password to stay secure.') }}
                        </p>
                    </header>
                    <form wire:submit="updatePassword" class="mt-6 space-y-6">
                        <div>
                            <label class="block font-medium text-sm text-gray-700" for="current_password">
                                {{ __('Current Password') }}
                            </label>
                            <input
                                wire:model="current_password"
                                id="current_password"
                                type="password"
                                name="current_password"
                                required
                                autocomplete="current-password"
                                class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500
                                    rounded-md shadow-sm"
                            >
                            <x-input-error :messages="$errors->get('current_password')" class="mt-2"/>
                        </div>
                        <div>
                            <label class="block font-medium text-sm text-gray-700" for="password">
                                {{ __('New Password') }}
                            </label>
                            <input
                                wire:model="password"
                                id="password"
                                type="password"
                                name="password"
                                required
                                autocomplete="new-password"
                                class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500
                                    rounded-md shadow-sm"
                            >
                            <x-input-error :messages="$errors->get('password')" class="mt-2"/>
                        </div>
                        <div>
                            <label class="block font-medium text-sm text-gray-700" for="password_confirmation">
                                {{ __('Confirm Password') }}
                            </label>
                            <input
                                wire:model="password_confirmation"
                                id="password_confirmation"
                                type="password"
                                name="password_confirmation"
                                required
                                autocomplete="new-password"
                                class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500
                                    rounded-md shadow-sm"
                            >
                            <x-input-error :messages="$errors->get('password')" class="mt-2"/>
                        </div>
                        <div class="flex items-center gap-4">
                            <button
                                type="submit"
                                class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent
                                    rounded-md font-semibold text-xs text-white uppercase tracking-widest
                                    hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none
                                    focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out
                                    duration-150 ms-3"
                            >
                                {{ __('Save') }}
                            </button>

                            <x-action-message class="me-3" on="password-updated">
                                {{ __('Saved.') }}
                            </x-action-message>
                        </div>
                    </form>
                </section>
            </div>
        </div>
        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <div class="max-w-xl">
                <section class="space-y-6">
                    <header>
                        <h2 class="text-lg font-medium text-gray-900">
                            {{ __('Delete Account') }}
                        </h2>

                        <p class="mt-1 text-sm text-gray-600">
                            {{ __('Once your account is deleted, all of its resources and data will be permanently
                                deleted. Before deleting your account, please download any data or information that you
                                wish to retain.') }}
                        </p>
                    </header>
                    <button
                        x-data=""
                        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
                        type="submit"
                        class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md
                            font-semibold text-xs text-white uppercase tracking-widest  hover:bg-red-500
                            active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2
                            transition ease-in-out duration-150"
                    >
                        {{ __('Delete Account') }}
                    </button>
                    <x-modal name="confirm-user-deletion" :show="$errors->isNotEmpty()" focusable>
                        <form wire:submit="deleteUser" class="p-6">
                            <h2 class="text-lg font-medium text-gray-900">
                                {{ __('Are you sure you want to delete your account?') }}
                            </h2>

                            <p class="mt-1 text-sm text-gray-600">
                                {{ __('Once your account is deleted, all of its resources and data will be permanently
                                    deleted. Please enter your password to confirm you would like to permanently
                                    delete your account.') }}
                            </p>

                            <div class="mt-6">
                                <label class="block font-medium text-sm text-gray-700 sr-only" for="delete_password">
                                    {{ __('Password') }}
                                </label>
                                <input
                                    wire:model="delete_password"
                                    id="delete_password"
                                    type="password"
                                    name="delete_password"
                                    required
                                    autocomplete="current-password"
                                    class="block mt-1 w-1/3 border-gray-300 focus:border-indigo-500
                                        focus:ring-indigo-500 rounded-md shadow-sm"
                                    placeholder="{{ __('Password') }}"
                                >
                                <x-input-error :messages="$errors->get('delete_password')" class="mt-2"/>
                            </div>
                            <div class="mt-6 flex justify-end">
                                <button
                                    x-on:click="$dispatch('close')"
                                    type="button"
                                    class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md
                                        font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm
                                        hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500
                                        focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150"
                                >
                                    {{ __('Cancel') }}
                                </button>
                                <button
                                    type="submit"
                                    class="ms-3 inline-flex items-center px-4 py-2 bg-red-600 border border-transparent
                                        rounded-md font-semibold text-xs text-white uppercase tracking-widest
                                        hover:bg-red-500 active:bg-red-700 focus:outline-none focus:ring-2
                                        focus:ring-red-500 focus:ring-offset-2 transition ease-in-out duration-150"
                                >
                                    {{ __('Delete Account') }}
                                </button>
                            </div>
                        </form>
                    </x-modal>
                </section>
            </div>
        </div>
    </div>
</div>
