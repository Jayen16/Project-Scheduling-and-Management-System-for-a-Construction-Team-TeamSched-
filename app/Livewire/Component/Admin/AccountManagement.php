<?php

namespace App\Livewire\Component\Admin;

use App\Models\Employee;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class AccountManagement extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $members;
    public $isActive;

    public function toggleUpdate($id){
        
        $employee = Employee::findOrFail($id);

        $status = $employee->status === 'Active' ? 'Inactive' : 'Active';
        
        $employee->update(['status' => $status]);

        $this->dispatch('alert',type:'success', title:'The status has been updated', position:'center');

    }


    public function redirectToAdd()
    {
        return redirect()->route('account.create');
    }
    
    public function redirectToProfile($id)
    {
        return redirect()->route('profile.index',['member'=>$id]);
    }

    public function delete($id)
    {
        $employee = Employee::findOrFail($id);
        $employee->delete();
    }


    public function render()
    {

        $this->members = Employee::get();
         
        $paginate = Employee::paginate(10);

        return view('livewire.component.admin.account-management', ['paginate' => $paginate]);
    }
}
