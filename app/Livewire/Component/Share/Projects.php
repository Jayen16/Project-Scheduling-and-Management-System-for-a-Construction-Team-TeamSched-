<?php

namespace App\Livewire\Component\Share;

use App\Enums\Status;
use App\Models\AssignedProject;
use App\Models\Project;
use Livewire\Component;

class Projects extends Component
{

    public $projects;
    public $searchProject ='';
    public $filterStatus ='';

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

        $query = AssignedProject::with('project')
        ->where('supervisor_id',auth()->user()->id);

        if ($this->searchProject !== '') {
            $query->whereHas('project', function ($query) {
                $query->where('name', 'like', '%' . $this->searchProject . '%');
            });
        }


        if ($this->filterStatus !== '') {
            $query->whereHas('project', function ($query) {
                $query->where('status', $this->filterStatus);
            });
        }
        
        $this->projects = $query->get();


        return view('livewire.component.share.projects');
    }
}