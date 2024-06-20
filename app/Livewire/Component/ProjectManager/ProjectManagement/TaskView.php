<?php

namespace App\Livewire\Component\ProjectManager\ProjectManagement;

use App\Models\Project;
use App\Models\Task;
use Livewire\Component;

class TaskView extends Component
{

    public $task;
    public $project;

    public function mount(Project $project,Task $task)
    {   
        $this->task =$task;
        $this->project = $project;
       
    }
    public function redirectToProjectSummary()
    {
        return redirect()->route('project-summary.index',['project'=>$this->project->id]);
    }
    public function render()
    {
        return view('livewire.component.project-manager.project-management.task-view');
    }
}
