<?php

namespace App\Livewire\Component\Admin;

use App\Livewire\Forms\FormEmployee;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class EditProfile extends Component
{

    public FormEmployee $employee_form;
    
    public $maxDate;
    public $selectedRole;
    public $employee_userName;
    public $employee_password;
    public $member;
    public $accountDetail;
    
    public function mount(Employee $member){
        
        $this->member = $member;
    }

    public function update(){

        DB::transaction(function () {

            if($this->accountDetail){
                $this->accountDetail->update(['username'=>$this->employee_userName , 'password'=>$this->employee_password]);
            }

            if($this->employee_form->type !== 'manpower'){
                $this->employee_form->employment_status = null;
                $this->employee_form->skill_category = null;
                $this->employee_form->skill = null;
            }
            
            $this->employee_form->update();
    
            $this->dispatch('alert',type:'success', title:'The user has been updated', position:'center');
            return redirect()->route('profile.index',['member'=>$this->member->id]);
        });
       
    }

    public function redirectToAccountManagement()
    {
        return redirect()->route('account-management.index');
    }
    public function redirectToProfile()
    {
        return redirect()->route('profile.index',['member'=>$this->member->id]);
    }


    public function render()
    {

        $this->maxDate = date('Y-m-d');

        if($this->member){
            // $this->employee_form->store();
            $this->employee_form->setEmployee($this->member);
            $accountDetail = User::where('id',$this->member->user_id)->first();
            $this->accountDetail = $accountDetail;

            if($accountDetail!==null){             
                $this->employee_userName = $accountDetail->username;
                $this->employee_password = $accountDetail->password;
            }

        }

        return view('livewire.component.admin.edit-profile');
    }
}
