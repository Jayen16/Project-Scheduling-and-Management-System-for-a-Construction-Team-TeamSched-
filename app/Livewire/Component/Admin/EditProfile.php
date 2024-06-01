<?php

namespace App\Livewire\Component\Admin;

use Livewire\Component;

class EditProfile extends Component
{
    public $maxDate;
    public $selectedRole;
    public $showSkill = false;
    public $showStatusOfAppointment = true;
    public function redirectToAccountManagement()
    {
        return redirect()->route('account-management.index');
    }
    public function redirectToProfile()
    {
        return redirect()->route('profile.index');
    }
    public function updatedSelectedRole($value)
    {
        if ($value == 'Manpower') {
            $this->showSkill = true;
        } elseif ($value == 'Site Supervisor') {
            $this->showSkill = true;
        } elseif ($value == 'Admin') {
            $this->showStatusOfAppointment = false;
        } else {
            $this->showSkill = false;
            $this->showStatusOfAppointment = true;
        }
    }
    public function mount()
    {
        $this->maxDate = date('Y-m-d'); // Get the current date in 'YYYY-MM-DD' format
    }
    public function render()
    {
        return view('livewire.component.admin.edit-profile');
    }
}
