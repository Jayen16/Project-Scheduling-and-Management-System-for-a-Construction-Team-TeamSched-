<?php

namespace App\Livewire\Component\ProjectManager\ProjectManagement;

use Livewire\Component;

class ProjectSummary extends Component
{
    public function redirectToEdit()
    {
        return redirect()->route('project.edit');
    }
    public function redirectToProjectManagement()
    {
        return redirect()->route('project-management.index');
    }
    public function redirectToViewTask()
    {
        return redirect()->route('task.index');
    }

    public function render()
    {
        return view('livewire.component.project-manager.project-management.project-summary');
    }
}
