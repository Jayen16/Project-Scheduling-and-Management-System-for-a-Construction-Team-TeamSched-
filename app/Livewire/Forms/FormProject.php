<?php

namespace App\Livewire\Forms;

use App\Models\Project;
use Livewire\Attributes\Validate;
use Livewire\Form;

class FormProject extends Form
{
    public ?Project $project_form;


    #[Validate('required|string')]
    public $name;
    #[Validate('required')]
    public $date_range;
    #[Validate('required|string')]
    public $description;
  

    public function setEmployee(Project $project_form)
    {
        $this->project_form = $project_form;
        
        $this->name = $project_form->name;
        $this->date_range = $project_form->date_range;
        $this->description = $project_form->description;
    

    }

    public function store()
    {
        $this->validate();

        $data = collect($this->all())->except('project_form')->toArray();

        Project::create($data);

        $this->reset(); 

    }

    public function update()
    {
        
        $this->validate();

        $data = collect($this->all())->except('project_form')->toArray();

        $this->project_form->update($data);
 
        $this->reset();

    }
}
