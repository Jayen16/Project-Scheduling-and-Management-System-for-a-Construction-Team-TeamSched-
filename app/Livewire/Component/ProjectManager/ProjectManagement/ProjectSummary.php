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


        $countOfScope = $project->scope->count();
        $percentage = 100/$countOfScope;

        //in order to get the percantage of each scope(week)
        //get the count of status completed sa task first  (forexample 3 tasks = 33.33% each )
        // then get the percentage of each scope for summation ng project percent sa 100%
        // example week 1 100% , week 2 100% , week 3 50% = project % is 83.33% ..computation is 250% divided by 3 

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
