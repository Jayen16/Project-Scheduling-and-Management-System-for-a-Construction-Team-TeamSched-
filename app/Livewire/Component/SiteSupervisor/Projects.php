<?php

namespace App\Livewire\Component\SiteSupervisor;

use App\Models\AssignedProject;
use App\Models\Project;
use Livewire\Component;

class Projects extends Component
{

    public $projects;

    public function redirectToViewproject($id)
    {
        return redirect()->route('project-details.index',['project'=>$id]);
    }

    public function render()
    {
        // dd(auth()->user()->id);

        $this->projects = AssignedProject::with('project')->where('supervisor_id',7)->get();

        return view('livewire.component.site-supervisor.projects');
    }
}
