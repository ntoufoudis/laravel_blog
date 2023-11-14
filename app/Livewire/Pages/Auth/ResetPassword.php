<?php

namespace App\Livewire\Pages\Auth;

use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Url;
use Livewire\Component;
use Illuminate\Validation\Rules;

class ResetPassword extends Component
{
    public $token;
    #[Url]
    public string $email = '';

    public string $password = '';
    public string $password_confirmation = '';

    public function rules(): array
    {
        return [
            'token' => ['required'],
            'email' => [
                'required',
                'string',
                'email',
            ],
            'password' => [
                'required',
                'string',
                'confirmed',
                Rules\Password::defaults(),
            ],
        ];
    }

    public function resetPassword(): void
    {
        $this->validate();

        $status = Password::reset(
            $this->only('email', 'password', 'password_confirmation', 'token'),
            function ($user) {
                $user->forceFill([
                    'password' => Hash::make($this->password),
                    'remember_token' => Str::random(60),
                ])->save();

                event(new PasswordReset($user));
            }
        );

        if ($status != Password::PASSWORD_RESET) {
            $this->addError('email', __($status));

            return;
        }

        Session::flash('status', __($status));

        $this->redirectRoute('login', navigate: true);
    }

    #[Layout('layouts.guest')]
    public function render()
    {
        return view('livewire.pages.auth.reset-password', [
            'email' => request()->query('email'),
        ]);
    }
}
