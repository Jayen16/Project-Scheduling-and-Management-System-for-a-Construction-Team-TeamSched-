<?php

namespace App\Livewire\Component\SiteSupervisor;

use App\Models\ProgressReport;
use App\Models\Project;
use App\Models\Task;
use App\Models\Week;
use Livewire\Attributes\On;
use Livewire\Component;

class Progress extends Component
{

    public $progress_photo;
    public $progress;
    public $tasks;
    public $tasks_progress;
    public $task_status;

    public function mount(Task $task){

        $this->tasks = $task;
        $this->tasks_progress = $task->progressReport;
        $this->task_status = $task->status;

    } 

    public function render()
    {
        return view('livewire.component.site-supervisor.progress');
    }
}
