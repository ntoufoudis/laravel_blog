<?php

namespace App\Livewire\Layout;

use App\Livewire\Actions\Logout;
use Livewire\Component;

class AdminNavigation extends Component
{
    public function render()
    {
        return view('livewire.layout.admin-navigation');
    }
}
