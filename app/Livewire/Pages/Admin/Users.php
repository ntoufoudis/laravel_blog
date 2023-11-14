<?php

namespace App\Livewire\Pages\Admin;

use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

class Users extends Component
{
    use WithPagination;

    #[Layout('layouts.admin')]
    public function render()
    {
        $users = User::paginate(10);
        return view('livewire.pages.admin.users', [
            'users' => $users,
        ]);
    }
}
