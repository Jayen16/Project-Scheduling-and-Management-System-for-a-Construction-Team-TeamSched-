<?php

namespace App\Livewire\Component\ProjectManager\ProjectManagement;

use Livewire\Component;

class AddProject extends Component
{
    public $maxDate;
    public $scopes = [];
    public $tasks = [];
    public $manpowers = [];

    public $task;
    public $manpower;

    public function addScopeOfWork()
    {
        $this->scopes[] = [
            'tasks' => [],
            'manpowers' => []
        ];
    }
    public function removeScopeOfWork($index)
    {
        unset($this->scopes[$index]);
        $this->scopes = array_values($this->scopes);
    }
    public function addTask($index)
    {
        $this->scopes[$index]['tasks'][] = $this->task;
        $this->task = '';
    }

    public function addManpower($index)
    {
        $this->scopes[$index]['manpowers'][] = $this->manpower;
        $this->manpower = '';
    }

    public function removeTask($scopeIndex, $taskIndex)
    {
        unset($this->scopes[$scopeIndex]['tasks'][$taskIndex]);
        $this->scopes[$scopeIndex]['tasks'] = array_values($this->scopes[$scopeIndex]['tasks']);
    }

    public function removeManpower($scopeIndex, $manpowerIndex)
    {
        unset($this->scopes[$scopeIndex]['manpowers'][$manpowerIndex]);
        $this->scopes[$scopeIndex]['manpowers'] = array_values($this->scopes[$scopeIndex]['manpowers']);
    }
    public function redirectToProjectManagement()
    {
        return redirect()->route('project-management.index');
    }
    public function mount()
    {
        $this->maxDate = date('Y-m-d'); // Get the current date in 'YYYY-MM-DD' format
    }
    public function render()
    {
        return view('livewire.component.project-manager.project-management.add-project');
    }
}
