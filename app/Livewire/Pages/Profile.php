<?php

namespace App\Livewire\Pages;

use App\Livewire\Actions\Logout;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;
use Livewire\Component;
use Nette\Schema\ValidationException;

class Profile extends Component
{
    public string $email = '';
    public string $current_password = '';
    public string $password = '';
    public string $password_confirmation = '';
    public string $delete_password = '';

    public function mount(): void
    {
        $this->email = auth()->user()->email;
    }

    public function rules(): array
    {
        return [

            'current_password' => ['required', 'string', 'current_password'],
            'password' => ['required', 'string', 'confirmed', Password::defaults()],

        ];
    }

    public function updateProfileInformation(): void
    {
        $user = Auth::user();

        $validated = $this->validate([
            'email' => [
                'required',
                'string',
                'lowercase',
                'email',
                'max:255',
                Rule::unique(User::class)->ignore(auth()->user()->id)
            ],
        ]);

        $user->fill($validated);

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        $user->save();

        $this->dispatch('profile-updated');
    }

    public function sendVerification(): void
    {
        $user = Auth::user();

        if ($user->hasVerifiedEmail()) {
            $path = session('url.intended', RouteServiceProvider::HOME);

            $this->redirect($path);

            return;
        }

        $user->sendEmailVerificationNotification();

        Session::flash('status', 'verification-link-sent');
    }

    public function updatePassword(): void
    {
        try {
            $validated = $this->validate();
        } catch (ValidationException $e) {
            $this->reset('current_password', 'password', 'password_confirmation');

            throw $e;
        }

        Auth::user()->update([
            'password' => Hash::make($validated['password']),
        ]);

        $this->reset('current_password', 'password', 'password_confirmation');

        $this->dispatch('password-updated');
    }

    public function logout(Logout $logout): void
    {
        $logout();

        $this->redirect('/', navigate: true);
    }

    public function deleteUser(Logout $logout): void
    {
            $this->validate([
                'delete_password' => ['required', 'string', 'current_password']
            ]);

            tap(Auth::user(), $logout(...))->delete();

            $this->redirect('/', navigate: true);

    }

    public function render()
    {
        return view('livewire.pages.profile');
    }
}
