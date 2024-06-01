<?php

namespace App\Livewire\Component\Admin;

use Livewire\Component;

class AccountManagement extends Component
{
    public bool $isActive = false;

    public function toggleIsActive()
    {
        $this->isActive = !$this->isActive;
    }
    public function redirectToAdd()
    {
        return redirect()->route('account.create');
    }
    public function redirectToProfile()
    {
        return redirect()->route('profile.index');
    }
    public function delete()
    {
        dd('sample');
    }
    public function render()
    {
        return view('livewire.component.admin.account-management');
    }
}
