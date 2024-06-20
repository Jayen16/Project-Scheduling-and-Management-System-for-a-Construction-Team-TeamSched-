<?php

namespace App\Livewire\Component\ProjectManager\ProjectManagement;

use App\Models\Employee;
use Livewire\Component;

class ManpowerProfile extends Component
{

    public $employee;
    public $manpower;
    public $projects;

    public function mount(Employee $employee){
        $this->manpower = $employee;

        if($employee->assignedManpower){

            $this->projects = $employee->assignedManpower->week->project->get();
        }
        // if()
    }


    public function redirectToProfile($id){
     

    }
    public function redirectToManpower()
    {
        return redirect()->route('manpower.index');
    }
    public function render()
    {
        return view('livewire.component.project-manager.project-management.manpower-profile');
    }
}
