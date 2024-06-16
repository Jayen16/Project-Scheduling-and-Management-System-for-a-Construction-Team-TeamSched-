<?php

namespace App\Livewire\Component\SiteSupervisor;

use Livewire\Component;

class Projects extends Component
{
    public function redirectToViewproject()
    {
        return redirect()->route('project-details.index');
    }
    public function render()
    {
        return view('livewire.component.site-supervisor.projects');
    }
}
