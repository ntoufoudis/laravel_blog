<?php

namespace App\Livewire\Pages\Auth;

use App\Livewire\Actions\Logout;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Component;

class VerifyEmail extends Component
{
    public function sendVerification()
    {
        if (Auth::user()->hasVerifiedEmail()) {
            $this->redirect(
                session('url.intended', RouteServiceProvider::HOME),
                navigate: true
            );

            return;
        }

        Auth::user()->sendEmailVerificationNotification();

        Session::flash('status', 'verification-link-sent');
    }

    public Logout $logout;

    public function logout(): void
    {
        $this->logout();

        $this->redirect('/', navigate: true);
    }

    #[Layout('layouts.guest')]
    public function render()
    {
        return view('livewire.pages.auth.verify-email');
    }
}
