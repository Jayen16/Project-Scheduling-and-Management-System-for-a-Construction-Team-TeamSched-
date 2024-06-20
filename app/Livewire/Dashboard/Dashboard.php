<?php

namespace App\Livewire\Dashboard;

use App\Enums\Employee as EnumsEmployee;
use App\Enums\Status;
use App\Models\Employee;
use App\Models\Project;
use App\Models\Task;
use Livewire\Attributes\Title;
use Livewire\Component;

class Dashboard extends Component
{
    public $projects;
    public $totalProject = 0;
    public $totalSiteSupervisor = 0;
    public $totalmanpower = 0;
    public $totalOngoingTask = 0;

    #[Title('Dashboard')]
    public function render()
    {
        $this->projects = Project::orderBy('updated_at', 'desc')
        ->take(5) 
        ->get();

        $this->totalProject = count($this->projects);
        $this->totalSiteSupervisor = Employee::where('type', EnumsEmployee::SUPERVISOR)
        ->where('status', 'Active')
        ->count();

        $this->totalmanpower = Employee::where('type', EnumsEmployee::MANPOWER)
            ->where('status', 'Active')
            ->count();

        $this->totalOngoingTask = Task::where('status', Status::ONGOING->value)
        ->count();

        return view('livewire.dashboard.dashboard');
    }
}
