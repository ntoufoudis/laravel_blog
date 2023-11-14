<?php

namespace App\Livewire\Pages\Auth;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Register extends Component
{

    public string $email = '';

    public string $password = '';

    public string $password_confirmation = '';

    public function rules(): array
    {
        return [
            'email' => [
                'required',
                'string',
                'lowercase',
                'email',
                'max:255',
                'unique:' . User::class,
            ],
            'password' => [
                'required',
                'string',
                'confirmed',
                Rules\Password::defaults(),
            ],
        ];
    }

    public function register(): void
    {
        $validated = $this->validate();

        $validated['password'] = Hash::make($validated['password']);

        event(new Registered($user = User::create($validated)));

        Auth::login($user);

        $this->redirect(RouteServiceProvider::HOME, navigate: true);
    }

    #[Layout('layouts.guest')]
    public function render()
    {
        return view('livewire.pages.auth.register');
    }
}
