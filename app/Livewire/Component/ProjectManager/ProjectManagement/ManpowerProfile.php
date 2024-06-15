<?php

namespace App\Livewire\Component\ProjectManager\ProjectManagement;

use Livewire\Component;

class ManpowerProfile extends Component
{
    public function redirectToManpower()
    {
        return redirect()->route('manpower.index');
    }
    public function render()
    {
        return view('livewire.component.project-manager.project-management.manpower-profile');
    }
}
