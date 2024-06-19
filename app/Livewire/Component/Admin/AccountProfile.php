<?php

namespace App\Livewire\Component\Admin;

use App\Models\Employee;
use Livewire\Component;

class AccountProfile extends Component
{

    public $member;

    public function mount(Employee $member){
        
        $this->member = $member;

    }

    public function redirectToEdit($id)
    {
        return redirect()->route('profile.edit',['member'=>$id]);
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
