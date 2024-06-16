<?php

namespace App\Livewire\Component\SiteSupervisor;

use App\Enums\Status;
use App\Models\Project;
use Livewire\Component;

class ProjectDetails extends Component
{
    public $project;
    public $done = 0;
    public $task_count = 0;
    public $taskStatus = [];

    public $projectPercent = 0;


    public function mount(Project $project){
        $this->project = $project;

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
    public function redirectToAssignedProjects()
    {
        return redirect()->route('projects.index');
    }
    public function redirectToViewTask($id)
    {
        return redirect()->route('progress-report.index',['task'=>$id]);
    }
    public function render()
    {
        return view('livewire.component.site-supervisor.project-details');
    }
}
