<?php

namespace App\Livewire\Component\ProjectManager\ProjectManagement;

use App\Models\Project;
use Livewire\Component;

class ProjectSummary extends Component
{

    public $project;
    public $scopes;
    public $supervisor;

    public function mount(Project $project){
        $this->project = $project;


        if($project->scope){
            $this->scopes = $project->scope;
            $employee = $project->assignedProject->employee;
            $this->supervisor = $employee->firstName.' '.$employee->middleName.' '.$employee->lastName;
        }
    }

    public function redirectToEdit($id)
    {
        return redirect()->route('project.edit',['project'=>$id]);
    }
    public function redirectToProjectManagement($id)
    {
        return redirect()->route('project-management.index',['project'=>$id]);
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
