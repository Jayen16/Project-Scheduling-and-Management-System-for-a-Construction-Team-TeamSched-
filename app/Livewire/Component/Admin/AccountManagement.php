<?php

namespace App\Livewire\Component\Admin;

use App\Models\Employee;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class AccountManagement extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $members;
    public $isActive;
    public $deleteId;
    public $search = '';

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

    public function deletion($id)
    {

        $this->deleteId = $id;
        
        DB::transaction(function () {
            $employee = Employee::where('id',$this->deleteId)->first();

            $employee->user()->update(['isDeleted'=>1]);
            $employee->update(['status'=> 'Inactive']);
            // $employee = Employee::findOrFail($this->deleteId);
            // $employee->user->delete();
            // $employee->delete();
    
            $this->dispatch('alert',type:'success', title:'The user has been deleted', position:'center');
        });
      
    }


    public function render()
    {
        $query = Employee::query();

        $query->whereHas('user', function ($subQuery) {
            $subQuery->where('isDeleted', 0);
        });

        if (!empty($this->search)) {
            $query->where(function ($subQuery) {
                $subQuery->where('firstName', 'like', '%' . $this->search . '%')
                        ->orWhere('lastName', 'like', '%' . $this->search . '%');
            });
        }

        $paginate = $query->paginate(10);
            return view('livewire.component.admin.account-management', ['paginate' => $paginate]);
        }
}
