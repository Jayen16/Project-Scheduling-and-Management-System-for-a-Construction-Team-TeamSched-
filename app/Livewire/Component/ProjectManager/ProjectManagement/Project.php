<?php

namespace App\Livewire\Component\ProjectManager\ProjectManagement;

use App\Models\Project as ModelsProject;
use Livewire\Component;

class Project extends Component
{
    public bool $isActive = false;
    public $projects;
    public $search ='';

    public function redirectToAdd()
    {
        return redirect()->route('project.create');
    }
    public function redirectToProject($id)
    {
        return redirect()->route('project-summary.index',['project'=>$id]);
    }
    public function delete()
    {
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
