<?php

namespace App\Livewire\Component\SiteSupervisor;

use Livewire\Component;

class ProgressReport extends Component
{
    public function redirectToProjectDetails()
    {
        return redirect()->route('project-details.index');
    }
    public function render()
    {
        return view('livewire.component.site-supervisor.progress-report');
    }
}
