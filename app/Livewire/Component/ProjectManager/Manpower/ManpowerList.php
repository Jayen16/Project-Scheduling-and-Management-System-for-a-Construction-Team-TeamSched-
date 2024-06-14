<?php

namespace App\Livewire\Component\ProjectManager\Manpower;

use Livewire\Component;

class ManpowerList extends Component
{
    public function redirectToProfile()
    {
        return redirect()->route('manpower-profile.index');
    }
    public function render()
    {
        return view('livewire.component.project-manager.manpower.manpower-list');
    }
}
