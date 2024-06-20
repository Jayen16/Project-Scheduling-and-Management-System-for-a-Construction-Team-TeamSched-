<?php

namespace App\Livewire\Component\Admin;

use App\Livewire\Forms\FormEmployee;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Validate;
use Livewire\Component;

class AddAccount extends Component
{

    public FormEmployee $employee_form;

    public $maxDate;
    public $selectedRole;
    public $showStatusOfAppointment = false;
    public $showSkillCategory = false;
    public $selectedSkillCategory;
    public $showSkilled = false;
    public $showUnskilled = false;

    #[Validate('required|unique:roles,name')]
    public $userName;
    #[Validate('required', 'min:8')]
    public $userPassword;


    public function redirectToAccountManagement()
    {
        return redirect()->route('account-management.index');
    }
    public function updatedSelectedRole($value)
    {
        if ($value == 'Manpower') {
            $this->showSkillCategory = true;
            $this->showStatusOfAppointment = true;
        } elseif ($value == 'Site Supervisor') {
            $this->showStatusOfAppointment = false;
            $this->showSkillCategory = false;
            $this->showSkilled = false;
            $this->showUnskilled = false;
        } elseif ($value == 'Project Manager') {
            $this->showStatusOfAppointment = false;
            $this->showSkillCategory = false;
            $this->showSkilled = false;
            $this->showUnskilled = false;
        } else {
            $this->showSkillCategory = false;
            $this->showStatusOfAppointment = false;
            $this->showSkilled = false;
            $this->showUnskilled = false;
        }
    }
    public function updatedSelectedSkillCategory($value)
    {
        if ($value == 'Skilled') {
            $this->showSkilled = true;
            $this->showUnskilled = false;
        } elseif ($value == 'Unskilled') {
            $this->showSkilled = false;
            $this->showUnskilled = true;
        } else {
        }
    }

    public function create()
    {

        DB::transaction(function () {

            $type = $this->employee_form->type;
 
            $newAccount = new User();
            $newAccount->username = $this->userName;
            $newAccount->password = Hash::make($this->userPassword);
            $newAccount->save();
            $newAccount->addRole($type);

            $this->employee_form->user_id = $newAccount->id;
            $this->employee_form->store();

            $this->userName = '';
            $this->userPassword= '';
            
            $this->dispatch('alert',type:'success', title:'New Added Employee', position:'center');
        });


    }

    public function render()
    {

        $this->maxDate = date('Y-m-d'); 

        return view('livewire.component.admin.add-account');
    }
}
