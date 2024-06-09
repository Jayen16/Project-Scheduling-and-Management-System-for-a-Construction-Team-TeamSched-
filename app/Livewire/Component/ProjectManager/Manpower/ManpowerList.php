<?php

namespace App\Livewire\Component\ProjectManager\Manpower;

use App\Models\Employee;
use Livewire\Component;
use Livewire\WithPagination;

class ManpowerList extends Component
{

    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    
    public $manpowers;
    public $filter = 'all';
    public $search = '';

    public function render()
    {
        $this->manpowers = Employee::where('type','manpower')->get();

        $query = Employee::where('type', 'manpower');
    
        if ($this->filter !== 'all') {
            $query->where('skill', $this->filter);
        }
    
        if (!empty($this->search)) {
            $query->where(function ($subQuery) {
                $subQuery->where('firstName', 'like', '%' . $this->search . '%')
                            ->orWhere('lastName', 'like', '%' . $this->search . '%');
            });
        }
    
        $paginate = $query->paginate(10);
    
        return view('livewire.component.project-manager.manpower.manpower-list', ['paginate' => $paginate]);
        
    }
}
