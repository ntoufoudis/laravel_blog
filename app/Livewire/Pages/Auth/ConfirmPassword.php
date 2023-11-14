<?php

namespace App\Livewire\Pages\Auth;

use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Rule;
use Livewire\Component;

class ConfirmPassword extends Component
{
    #[Rule('required|string')]
    public string $password = '';

    public function confirmPassword(): void
    {
        if (! Auth::guard('web')->validate([
            'email' => Auth::user()->email,
            'password' => $this->password,
        ])) {
            throw ValidationException::withMessages([
                'password' => __('auth.password'),
            ]);
        }

        session(['auth.password_confirmed_at' => time()]);

        $this->redirect(
            session('url.intended', RouteServiceProvider::HOME),
            navigate: true
        );
    }

    #[Layout('layouts.guest')]
    public function render()
    {
        return view('livewire.pages.auth.confirm-password');
    }
}
