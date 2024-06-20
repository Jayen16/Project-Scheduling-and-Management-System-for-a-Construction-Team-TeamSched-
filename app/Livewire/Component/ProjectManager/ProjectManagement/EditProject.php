<?php

namespace App\Livewire\Component\ProjectManager\ProjectManagement;

use App\Enums\Employee as EnumsEmployee;
use App\Models\AssignedMember;
use App\Models\Employee;
use App\Models\Project;
use App\Models\Task;
use App\Models\Week;
use Illuminate\Support\Facades\DB;
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

    public $assigned_supervisor;
    public $supervisorList;

    public $newManpower;
    public $newTask;
    public $NewUpdateManpower = [];
    public $NewUpdateTask = [];
    
    public $new_project_scope =[];
    public $new_week_title ;

    public $NewDisplayScope = [];
    public $NewDisplayTitle = [];

    public $save_project_scope = [];
    public $save_week_title = [];


    public function mount(Project $project){
        $this->project = $project;

        if($project){
            $this->project_name = $project->name;
            $this->project_date_range = $project->date_range;
            $this->project_description = $project->description;
            $employee = $project->assignedProject->employee;
            $this->assigned_supervisor = $employee->id;

        }

        if($project->scope){
            // $this->project_scope = $project->scope;

      
            $this->refresh($project->scope);

            $this->updated_scope = [$this->project_scope]; 
        }

        $this->maxDate = date('Y-m-d');
        
    }

    public function refresh($scope){

        $project_scope = $scope;
        foreach ($project_scope as $index => $scope) {
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

    public function update(){

        DB::transaction(function () {
            
            $project = Project::find($this->project->id);

            $hasChanges = false;

            if ($project->description !== $this->project_description) {
                $hasChanges = true;
            }

            if ($project->name !== $this->project_name) {
                $hasChanges = true;
            }

            if ($project->date_range !== $this->project_date_range) {
                $hasChanges = true;
            }

            // If there are changes, update the project
            if ($hasChanges) {
                $project->update([
                    'name' => $this->project_name,
                    'description' => $this->project_description,
                    'date_range' => $this->project_date_range,
                ]);
            }

            if($project->assignedProject->employee->id !== $this->assigned_supervisor ){
                $project->assignedProject()->update(['supervisor_id'=> $this->assigned_supervisor]);
            }

            foreach ($this->project_scope as $week_id => $scope) {

                $existingTasks = Task::where('week_id', $week_id)->pluck('name')->toArray();


                $existingTasksLookup = array_flip($existingTasks);
            
                foreach ($scope['tasks'] as $task) {
                    
                    
                    if (!isset($existingTasksLookup[$task])) {

                        Task::create(['week_id' => $week_id, 'name' => $task]);
                    } else {

                        unset($existingTasksLookup[$task]);

                    }
                }


                foreach ($existingTasksLookup as $task => $dummy) {


                    Task::where('week_id', $week_id)->where('name', $task)->delete();
                }

                $existingManpowers = AssignedMember::where('week_id', $week_id)->pluck('manpower_id')->toArray();
                $existingManpowersLookup = array_flip($existingManpowers);

                foreach ($scope['manpowers'] as $id) {

                    if (!isset($existingManpowersLookup[$id])) {
                        AssignedMember::create(['week_id' => $week_id, 'manpower_id' => $id]);
                    } else {
                        unset($existingManpowersLookup[$id]);
                    }
                }
        
                foreach ($existingManpowersLookup as $manpower => $dummy) {

                    AssignedMember::where('week_id', $week_id)->where('manpower_id', $manpower)->delete();
                }

            }
            

            $this->dispatch('alert', type:'success', title:'The scope has been updated.', position:'center');

        });

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

    public function addNewTask()
    {
        $this->new_project_scope[0]['tasks'][] = $this->newTask;
        $this->newTask = [];
    }


    public function addNewManpower()
    {

        $this->new_project_scope[0]['manpowers'][] = $this->newManpower;
        $this->newManpower = '';
    }

    public function addNewScopeOfWork()
    {

        $week = Week::create(['project_id'=>$this->project->id,'title'=>$this->new_week_title]);

        foreach($this->new_project_scope[0]['tasks'] as $task){
            Task::create(['week_id'=>$week->id,'name'=>$task]);
        }

        foreach($this->new_project_scope[0]['manpowers'] as $manpower){
            AssignedMember::create(['week_id'=>$week->id,'manpower_id'=>$manpower]);
        }

        $this->new_project_scope = [];
        $this->new_week_title= '';
        $this->refresh($this->project->scope);
        $this->dispatch('alert', type:'success', title:'The scope has added successfuly', position:'center');

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
        $week = Week::find($index);

        if ($week) {
            $week->task()->delete();
    
            $week->assignedMember()->delete();
    
            $week->delete();
        }

        unset($this->project_scope[$index]);
        $this->dispatch('alert', type:'success', title:'The scope removed successfuly', position:'center');
    }


    public function redirectToProjectSummary()
    {
        return redirect()->route('project-summary.index',['project'=> $this->project->id]);
    }

    public function render()
    {

        $this->listedManpower = Employee::where('type', EnumsEmployee::MANPOWER->value) 
        ->where('status','Active')
        ->whereHas('user', function ($query) {
            $query->where('isDeleted', 0);
        })
        ->get();

        $this->supervisorList = Employee::where('type', EnumsEmployee::SUPERVISOR->value) 
        ->where('status','Active')
        ->whereHas('user', function ($query) {
            $query->where('isDeleted', 0);
        })
        ->get();

        $this->maxDate = date('Y-m-d'); 
        return view('livewire.component.project-manager.project-management.edit-project');
    }
}
