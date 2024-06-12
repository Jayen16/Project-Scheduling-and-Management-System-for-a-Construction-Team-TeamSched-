<?php

namespace App\Livewire\Component\ProjectManager\ProjectManagement;

use App\Models\AssignedMember;
use App\Models\Employee;
use App\Models\Project;
use App\Models\Task;
use Livewire\Component;

class EditProject extends Component
{
    public $maxDate;
    public $scopes = [];
    public $tasks = [];
    public $manpowers = [];

    public $task;
    public $manpower;

    public $project;
    public $project_scope = [];


    public $project_name;
    public $project_date_range;
    public $project_description;
    
    public $week_title = [];
    public $updated_scope = [];
    public $taskInput = [];
    public $listedManpower;
    
    public function mount(Project $project){
        $this->project = $project;

        if($project){
            $this->project_name = $project->name;
            $this->project_date_range = $project->date_range;
            $this->project_description = $project->description;
        }

        if($project->scope){
            // $this->project_scope = $project->scope;

            foreach ($project->scope as $index => $scope) {
                $this->week_title[$scope->id] = $scope->title;
            
                $this->project_scope[$scope->id] = [
                    'tasks' => [],
                    'manpowers' => [],
                ];
            
                foreach ($scope->task as $task) {
                    $this->project_scope[$scope->id]['tasks'][] = $task->name;
                }
            
                foreach ($scope->assignedmember as $assignedmember) {
                    $this->project_scope[$scope->id]['manpowers'][] = strval($assignedmember->employee->id);
                }
            }
            

            $this->updated_scope = [$this->project_scope]; 
        }

        $this->maxDate = date('Y-m-d');
        
    }

    public function update(){

    
        foreach ($this->project_scope as $index => $scope) {

            $existingTasks = Task::where('week_id', $index)->pluck('name')->toArray();
            $existingTasksLookup = array_flip($existingTasks);
        
            foreach ($scope['tasks'] as $task) {
                
                if (!isset($existingTasksLookup[$task])) {
                    Task::create(['week_id' => $index, 'name' => $task]);
                } else {
                    unset($existingTasksLookup[$task]);
                }
            }

    

            // foreach ($existingTasksLookup as $task => $dummy) {
            //     Task::where('week_id', $index)->where('name', $task)->delete();
            // }

            // $existingManpowers = AssignedMember::where('week_id', $index)->pluck('manpower_id')->toArray();
            // $existingManpowersLookup = array_flip($existingManpowers);

            // foreach ($scope['manpowers'] as $id) {

            //     if (!isset($existingManpowersLookup[$id])) {
            //         AssignedMember::create(['week_id' => $index, 'manpower_id' => $id]);
            //     } else {
            //         unset($existingManpowersLookup[$id]);
            //     }
            // }
    
            // foreach ($existingManpowersLookup as $manpower => $dummy) {


            //     AssignedMember::where('week_id', $index)->where('manpower_id', $manpower)->delete();
            // }

   
        }

    }

  
    public function addTask($index)
    {

        foreach ($this->tasks as $task) {
         
            $this->project_scope[$index]['tasks'][] = $task;
           
        }

        $this->tasks = [];
    }

    public function addManpower($index)
    {

        foreach ($this->manpowers as $manpower) {
         
            $this->project_scope[$index]['manpowers'][] = $manpower;
            
        }

        $this->manpowers = [];
    }


    public function removeTask($scopeindex, $taskindex)
    {
        unset($this->project_scope[$scopeindex]['tasks'][$taskindex]);

    }

    public function removeManpower($scopeindex, $manpowerindex)
    {


        unset($this->project_scope[$scopeindex]['manpowers'][$manpowerindex]);

    }

    public function removeScopeOfWork($index)
    {
        unset($this->project_scope[$index]);
    }


    public function redirectToProjectSummary()
    {
        return redirect()->route('project-summary.index');
    }

    public function render()
    {

        $this->listedManpower = Employee::where('type', 'manpower')->get()->toArray();
  
        $this->maxDate = date('Y-m-d'); 
        return view('livewire.component.project-manager.project-management.edit-project');
    }
}
