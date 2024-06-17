<?php

namespace App\Livewire\Component\Manpower;

use App\Models\Project;
use Livewire\Component;

class Attendance extends Component
{

    public $project;

    public function mount(Project $project){

       $this->project = $project;

    }
    public function render()
    {
        return view('livewire.component.manpower.attendance');
    }
}
