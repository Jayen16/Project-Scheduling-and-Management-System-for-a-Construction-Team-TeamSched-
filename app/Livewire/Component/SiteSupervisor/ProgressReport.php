<?php

namespace App\Livewire\Component\SiteSupervisor;

use App\Enums\Status;
use App\Models\ProgressReport as ModelsProgressReport;
use App\Models\Task;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class ProgressReport extends Component
{

    use WithFileUploads;
    public $task;
    public $mark_status;
    
    #[Validate('required|image|max:10000')]
    public $upload_photo;
    #[Validate('required|string')]
    public $remarks;

    public $imagePreview;

    public bool $hideMarkButton =false;

    public function mount(Task $task){
        $this->task = $task;

        if($task->status == Status::COMPLETED->value){
            $this->hideMarkButton = true;
        }
    }

    
    public function save(){

        $this->validate();

        $extension = $this->upload_photo->getClientOriginalExtension();
        $filename = 'Task-'.$this->task->name.'-Project'. $this->task->week->project->name. time() . '.' . $extension;
        $uploadedphoto = $this->upload_photo->storeAs('upload_progress', $filename, 'public');

        $this->imagePreview = $this->upload_photo->temporaryUrl();

        ModelsProgressReport::create([
            'task_id'=> $this->task->id,
            'remarks'=> $this->remarks,
            'upload'=> $uploadedphoto,

        ]);
        
        // $this->remarks ='';
        // $this->upload_photo ='';
        $this->reset('remarks','upload_photo');
        $this->dispatch('alert', type:'success', title:'The progress uploaded successfuly', position:'center');

    }


    
    public function changeStatus(){

        if($this->task->status == Status::ONGOING->value){

            $this->task->update(['status'=> Status::COMPLETED->value]);
            $this->dispatch('alert', type:'success', title:'The task completed successfuly', position:'center');
            $this->hideMarkButton = true;
        }

    }



    public function redirectToProjectDetails()
    {
        return redirect()->route('project-details.index');
    }
    public function render()
    {


        $this->imagePreview =  $this->upload_photo;

        return view('livewire.component.site-supervisor.progress-report');
    }
}
