<?php

namespace App\Livewire\Component\SiteSupervisor;

use App\Enums\Status;
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

    public function markAsCompleted($id){

       Project::where('id',$id)->update(['status'=> Status::COMPLETED->value]);
       $this->dispatch('alert', type:'success', title:'The project has been marked as completed.', position:'center');
       
    }
    public function render()
    {
        // dd(auth()->user()->id);

        $this->projects = AssignedProject::with('project')->where('supervisor_id',7)->get();

        return view('livewire.component.site-supervisor.projects');
    }
}
