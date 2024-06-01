<?php

namespace App\Livewire\Component\Admin;

use Livewire\Component;

class AddAccount extends Component
{
    public $maxDate;
    public $selectedRole;
    public $showStatusOfAppointment = false;
    public $showSkillCategory = false;
    public $selectedSkillCategory;
    public $showSkilled = false;
    public $showUnskilled = false;
    public function redirectToAccountManagement()
    {
        return redirect()->route('account-management.index');
    }
    public function updatedSelectedRole($value)
    {
        if ($value == 'Manpower') {
            $this->showSkillCategory = true;
            $this->showStatusOfAppointment = true;
        } elseif ($value == 'Site Supervisor') {
            $this->showStatusOfAppointment = false;
            $this->showSkillCategory = false;
            $this->showSkilled = false;
            $this->showUnskilled = false;
        } elseif ($value == 'Project Manager') {
            $this->showStatusOfAppointment = false;
            $this->showSkillCategory = false;
            $this->showSkilled = false;
            $this->showUnskilled = false;
        } else {
            $this->showSkillCategory = false;
            $this->showStatusOfAppointment = false;
            $this->showSkilled = false;
            $this->showUnskilled = false;
        }
    }
    public function updatedSelectedSkillCategory($value)
    {
        if ($value == 'Skilled') {
            $this->showSkilled = true;
            $this->showUnskilled = false;
        } elseif ($value == 'Unskilled') {
            $this->showSkilled = false;
            $this->showUnskilled = true;
        } else {
        }
    }
    public function mount()
    {
        $this->maxDate = date('Y-m-d'); // Get the current date in 'YYYY-MM-DD' format
    }
    public function render()
    {
        return view('livewire.component.admin.add-account');
    }
}
