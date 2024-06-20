<?php

namespace App\Livewire\Component\ProjectManager\ProjectManagement;

use App\Enums\Status;
use App\Models\Project;
use Livewire\Component;

class ProjectSummary extends Component
{

    public $project;
    public $scopes;
    public $supervisor;

    public $projectPercent = 0;
    public $taskStatus = [];


    public function mount(Project $project){
        $this->project = $project;


        if($project->scope){
            $this->scopes = $project->scope;
            $employee = $project->assignedProject->employee;
            $this->supervisor = $employee->firstName.' '.$employee->middleName.' '.$employee->lastName;
        }


        $week_count = count($project->scope);

        foreach($project->scope as  $week){

            $task_count = 0;
            $done =0;

            $statuses = $week->task->pluck('status')->toArray(); 

            $task_count += count($week->task);
            foreach ($statuses as $status) {
                if ($status == Status::COMPLETED->value) {
                    $done += 1; 
                }
            }
        
            $this->taskStatus[] = ($done/$task_count) * 100 ; 
        }
        
        $add = 0;
        foreach($this->taskStatus as $status){
            $add +=$status;
        }

        $finalPercent = ($add/$week_count);

        $this->projectPercent = $finalPercent;

    }

    public function redirectToEdit($id)
    {
        return redirect()->route('project.edit',['project'=>$id]);
    }
    public function redirectToProjectManagement()
    {
        return redirect()->route('project-management.index');
    }
    public function redirectToViewTask($id)
    {
        return redirect()->route('task.index',['project'=>$this->project->id ,'task'=>$id]);
    }

    public function render()
    {
        return view('livewire.component.project-manager.project-management.project-summary');
    }
}
