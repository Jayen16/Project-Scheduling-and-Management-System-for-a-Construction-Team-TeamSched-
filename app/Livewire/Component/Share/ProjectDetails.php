<?php

namespace App\Livewire\Component\Share;


use App\Enums\Status;
use App\Models\Attendance;
use App\Models\Project;
use Carbon\Carbon;

use Livewire\Component;

class ProjectDetails extends Component
{

    public $project;
    public $done = 0;
    public $task_count = 0;
    public $taskStatus = [];

    public $projectPercent = 0;


    public function mount(Project $project)
    {
        $this->project = $project;

        $week_count = count($project->scope);

        foreach ($project->scope as $week) {

            $task_count = 0;
            $done = 0;

            $statuses = $week->task->pluck('status')->toArray();

            $task_count += count($week->task);
            foreach ($statuses as $status) {
                if ($status == Status::COMPLETED->value) {
                    $done += 1;
                }
            }

            $this->taskStatus[] = ($done / $task_count) * 100;
        }

        $add = 0;
        foreach ($this->taskStatus as $status) {
            $add += $status;
        }

        $finalPercent = ($add / $week_count);

        $this->projectPercent = $finalPercent;

    }


    public function timeIn($id)
    {

        if (!Attendance::where('employee_id', auth()->user()->employee->id)->where('project_id', $id)->whereDate('created_at', Carbon::today('Asia/Manila'))->exists()) {
            Attendance::create([
                'employee_id' => auth()->user()->employee->id,
                'time_in' => Carbon::now()->format('g:i A'),
                'project_id' => $id,
                // 'status'=> 1
            ]);

            $this->dispatch('alert', type: 'success', title: 'Time in recorded!', position: 'center');
        } else {
            $this->dispatch('alert', type: 'error', title: 'Time in might have already been recorded.', position: 'center');
        }

    }
    public function timeOut($id)
    {

        if (
            Attendance::where('employee_id', auth()->user()->employee->id)
                ->where('project_id', $id)
                ->whereNull('time_out')
                ->whereDate('created_at', Carbon::today('Asia/Manila'))
                ->whereNotNull('time_in')
                ->exists()
        ) {

            $timeOut = Attendance::where('employee_id', auth()->user()->employee->id)
                ->where('project_id', $id)
                ->whereNull('time_out')
                ->first();

            if ($timeOut) {
                $timeOut->update(['time_out' => Carbon::now()->format('g:i A')]);
                $this->dispatch('alert', type: 'success', title: 'Time Out recorded!', position: 'center');

            } else {
                $this->dispatch('alert', type: 'error', title: 'Error recording', position: 'center');
            }

        }

    }

    public function confirmAttendance($id)
    {
        dd('burikat', $id);
    }

    public function redirectToAssignedProjects()
    {
        return redirect()->route('projects.index');
    }


    public function redirectToViewTask($id)
    {

        return redirect()->route('progress-report.index', ['task' => $id]);

    }
    public function render()
    {
        return view('livewire.component.share.project-details');
    }
}
