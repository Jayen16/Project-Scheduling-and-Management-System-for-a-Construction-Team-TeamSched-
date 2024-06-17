<?php

namespace App\Livewire\Component\ProjectManager\ProjectManagement;

use App\Models\Project as ModelsProject;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Project extends Component
{
    public bool $isActive = false;
    public $projects;
    public $project_id;
    public $search ='';

    public function redirectToAdd()
    {
        return redirect()->route('project.create');
    }
    public function redirectToProject($id)
    {
        return redirect()->route('project-summary.index',['project'=>$id]);
    }
    public function deleteProject($id)
    {

        $this->project_id = $id;

        DB::transaction(function () {

            $project = ModelsProject::where('id',$this->project_id)->first();
            $project->assignedProject()->delete();
            $project->scope->task()->delete();
            $project->scope()->delete();
            $project->attendance()->delete();
            $project->delete();
            
            $this->dispatch('alert', type:'success', title:'The project removed successfuly', position:'center');
        });
       
    }
    public function render()
    {

        $this->projects = ModelsProject::all();

        $query = ModelsProject::query();
    
        if (!empty($this->search)) {
            $query->where(function ($subQuery) {
                $subQuery->where('name', 'like', '%' . $this->search . '%')
                            ->orWhere('name', 'like', '%' . $this->search . '%');
            });
        }
    
        $paginate = $query->paginate(10);

        return view('livewire.component.project-manager.project-management.project', ['paginate' => $paginate]);
    }
}
