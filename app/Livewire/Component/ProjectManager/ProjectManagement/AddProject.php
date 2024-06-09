<?php

namespace App\Livewire\Component\ProjectManager\ProjectManagement;

use App\Livewire\Forms\FormProject;
use App\Models\AssignedMember;
use App\Models\Employee;
use App\Models\Project;
use App\Models\Task;
use App\Models\Week;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Validate;
use Livewire\Component;

class AddProject extends Component
{

    // public FormProject $project_form;

    public $maxDate;
    public $scopes = [];
    public $tasks = [];
    public $manpowers = [];

 
    public $manpowerList;
    public $week_title;
    public $task_id;
    public $week;

    public $task;
    public $manpower;

    #[Validate('required|unique:projects,name')]
    public $project_name;
    #[Validate('required')]
    public $project_date_range;
    #[Validate('required|string')]
    public $project_description;
    
    public $project;
    public $displayScope = [];
    public $displayTitle = [];

    private function resetInputFields()
    {
        $this->week_title = '';
        $this->project_name = '';
        $this->project_date_range = '';
        $this->project_description = '';
        $this->manpower = '';
        $this->task = '';
        $this->scopes = [];
    }

    public function create()
    {

        $this->validate();

        if (is_null($this->week_title) || is_null($this->project_name) || is_null($this->project_date_range) || is_null($this->project_description) || is_null($this->manpower) || is_null($this->task)) {

            $this->dispatch('alert', type:'error', title:'There are incomplete inputs', position:'center');

        } else {

            DB::transaction(function () {

            //create project
            $project = Project::create([
                'name' => $this->project_name, 
                'date_range' => $this->project_date_range, 
                'description' => $this->project_description
            ]);

            foreach($this->displayScope as $index => $scope){
                
                // Create the week
                $this->week = Week::create(['project_id' => $project->id, 'title' => $this->displayTitle[$index]]);

                foreach ($scope as $type) {

                    foreach($type['tasks'] as $taskName){
                        
                        $task = Task::create([
                            'week_id' => $this->week->id, 
                            'name' => $taskName,
                        ]);

                        foreach($type['manpowers'] as $manpower){

                            AssignedMember::create([
                                'task_id' => $task->id, 
                                'manpower_id' => $manpower,
                            ]);
                        }
                    }
                }
            }

            });
    
            $this->resetInputFields();
            $this->dispatch('alert', type:'success', title:'The new project has been saved.', position:'center');

        }
        
    }

    public function addScopeOfWork()
    {
        
        $this->displayScope []= $this->scopes;
        $this->displayTitle []= $this->week_title;

        $this->scopes = [];
        $this->week_title= '';

    }

    public function removeScopeOfWork($index)
    {
        unset($this->displayScope[$index]);
    }

    public function addTask()
    {
        $this->scopes[0]['tasks'][] = $this->task;
        $this->task = '';

    }

    public function addManpower()
    {
        $this->scopes[0]['manpowers'][] = $this->manpower;
        $this->manpower = '';
    }

    public function removeTask($taskIndex)
    {
        unset($this->scopes[0]['tasks'][$taskIndex]);
    }

    public function removeManpower($manpowerIndex)
    {
        unset($this->scopes[0]['manpowers'][$manpowerIndex]);
    }

    public function redirectToProjectManagement()
    {
        return redirect()->route('project-management.index');
    }
    public function mount()
    {

       $this->scopes[] = [
            'tasks' => [],
            'manpowers' => []
        ];

        $this->maxDate = date('Y-m-d'); 
    }


    public function render()
    {
        $this->manpowerList = Employee::where('type','manpower')->get();

        return view('livewire.component.project-manager.project-management.add-project');
    }
}
