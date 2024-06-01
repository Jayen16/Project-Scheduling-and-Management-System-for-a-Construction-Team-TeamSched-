<?php

namespace App\Livewire\Forms;

use App\Models\Employee;
use Livewire\Attributes\Validate;
use Livewire\Form;

class FormEmployee extends Form
{
    public ?Employee $employee_form;


    #[Validate('required|string')]
    public $firstName;
    #[Validate('nullable|string')]
    public $middleName;
    #[Validate('required|string')]
    public $lastName;
    #[Validate('required|string')]
    public $address;
    #[Validate('required|string')]
    public $birthdate;
    #[Validate('required|string')]
    public $contact_number;

    #[Validate('nullable|string')]
    public $skill;
    #[Validate('nullable|string')]
    public $skill_category;
    #[Validate('nullable|string')]
    public $employment_status;
    
    #[Validate('required|string')]
    public $type;


    public function setEmployee(Employee $employee_form)
    {
        $this->employee_form = $employee_form;
        
        $this->firstName = $employee_form->firstName;
        $this->middleName = $employee_form->middleName;
        $this->lastName = $employee_form->lastName;
        $this->address = $employee_form->address;
        $this->birthdate = $employee_form->birthdate;
        $this->contact_number = $employee_form->contact_number;
        $this->skill = $employee_form->skill;
        $this->skill_category = $employee_form->skill_category;
        $this->employment_status = $employee_form->employment_status;
        
        $this->type = $employee_form->type;

    }

    public function store()
    {
        $this->validate();

        $data = collect($this->all())->except('employee_form')->toArray();

        Employee::create($data);

        $this->reset(); 

    }

}
