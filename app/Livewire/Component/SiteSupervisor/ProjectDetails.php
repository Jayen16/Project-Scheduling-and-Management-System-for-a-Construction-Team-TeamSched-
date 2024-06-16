<?php

namespace App\Livewire\Component\SiteSupervisor;

use Livewire\Component;

class ProjectDetails extends Component
{

    public function redirectToAssignedProjects()
    {
        return redirect()->route('projects.index');
    }
    public function redirectToViewTask()
    {
        return redirect()->route('progress-report.index');
    }
    public function render()
    {
        return view('livewire.component.site-supervisor.project-details');
    }
}
