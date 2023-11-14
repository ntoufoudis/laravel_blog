<?php

namespace App\Livewire\Pages\Auth;

use App\Livewire\Actions\Logout;
use App\Livewire\Forms\LoginForm;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Login extends Component
{
    public LoginForm $form;

    public function login(): void
    {
        $this->validate();

        $this->form->authenticate();

        Session::regenerate();

        $this->redirect(
            session('url.intended', RouteServiceProvider::HOME),
            navigate: true
        );
    }

    #[Layout('layouts.guest')]
    public function render()
    {
        return view('livewire.pages.auth.login');
    }
}
