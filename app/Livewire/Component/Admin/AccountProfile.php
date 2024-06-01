<?php

namespace App\Livewire\Component\Admin;

use Livewire\Component;

class AccountProfile extends Component
{
    public function redirectToEdit()
    {
        return redirect()->route('profile.edit');
    }
    public function redirectToAccountManagement()
    {
        return redirect()->route('account-management.index');
    }

    public function render()
    {
        return view('livewire.component.admin.account-profile');
    }
}
