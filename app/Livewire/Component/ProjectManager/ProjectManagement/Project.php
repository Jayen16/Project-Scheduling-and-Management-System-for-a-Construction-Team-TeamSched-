<?php

namespace App\Livewire\Component\ProjectManager\ProjectManagement;

use Livewire\Component;

class Project extends Component
{
    public bool $isActive = false;

    public function redirectToAdd()
    {
        return redirect()->route('project.create');
    }
    public function redirectToProfile()
    {
        return redirect()->route('project-summary.index');
    }
    public function delete()
    {
    }
    public function render()
    {
        return view('livewire.component.project-manager.project-management.project');
    }
}
