<?php

namespace App\Livewire\Pages\Auth;

use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Rule;
use Livewire\Component;

class ForgotPassword extends Component
{
    #[Rule('required|string|email')]
    public string $email = '';

    public function sendPasswordResetLink()
    {
        $status = Password::sendResetLink(
            $this->only('email')
        );

        if ($status != Password::RESET_LINK_SENT) {
            $this->addError('email', __($status));

            return;
        }

        $this->reset('email');

        Session::flash('status', __($status));
    }

    #[Layout('layouts.guest')]
    public function render()
    {
        return view('livewire.pages.auth.forgot-password');
    }
}
