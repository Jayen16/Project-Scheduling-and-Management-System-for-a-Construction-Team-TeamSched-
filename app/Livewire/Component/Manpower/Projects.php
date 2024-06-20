<?php

namespace App\Livewire\Component\Manpower;

use Livewire\Component;

class Projects extends Component
{
    public function redirectToViewproject()
    {
        return redirect()->route('projects-details-manpower.index');
    }
    public function render()
    {
        return view('livewire.component.manpower.projects');
    }
}
