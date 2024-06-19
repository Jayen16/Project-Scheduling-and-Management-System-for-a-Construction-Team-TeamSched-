<?php

namespace App\Livewire\Component\SiteSupervisor;

use App\Models\Attendance as ModelsAttendance;
use App\Models\Project;
use Livewire\Component;

class Attendance extends Component
{

    public $project;

    public function mount(Project $project){

       $this->project = $project;

    }

    public function confirmAttendance(ModelsAttendance $attendance){

        $attendance->update(['status'=>1]);
        $this->dispatch('alert', type:'success', title:'confirmed the attendance of '.$attendance->employee->firstName.' '.$attendance->employee->lastName, position:'center');

    }
    public function render()
    {
        return view('livewire.component.site-supervisor.attendance');
    }
}
