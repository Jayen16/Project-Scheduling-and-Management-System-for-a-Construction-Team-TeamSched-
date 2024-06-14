<?php

namespace App\Livewire\Component\ProjectManager\ProjectManagement;

use Livewire\Component;

class TaskView extends Component
{
    public function redirectToProjectSummary()
    {
        return redirect()->route('project-summary.index');
    }
    public function render()
    {
        return view('livewire.component.project-manager.project-management.task-view');
    }
}
