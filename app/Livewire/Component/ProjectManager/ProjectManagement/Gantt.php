<?php

namespace App\Livewire\Component\ProjectManager\ProjectManagement;

use App\Models\Project;
use Carbon\Carbon;
use Livewire\Component;

class Gantt extends Component
{
    public $project;
    public $scopeList = [];
    public $listofTask = [];
    public $countOfDayWhenMatch = [];
    public function mount(Project $project)
    {
        $this->project = $project;
        list($startDateStr, $endDateStr) = explode(' - ', $project->date_range);
    
        $dateRangeStart = Carbon::createFromFormat('m/d/Y', $startDateStr)->startOfDay();
        $dateRangeEnd = Carbon::createFromFormat('m/d/Y', $endDateStr)->endOfDay();
    
        $projectList = [];
    
        foreach ($project->scope as $scope) {
            $scopeTasks = [];
    
            foreach ($scope->task as $task) {
                $createdDates = [];
    
                // Retrieve progress reports for the current task
                if ($task->progressReport) {
                    foreach ($task->progressReport as $report) {
                        $formattedDate = $report->created_at->format('m-d-Y');
                        $createdDates[] = $formattedDate;
                    }
                }
    
                // Calculate count of days with uploads within the date range
                $countMatches = [];
                foreach ($createdDates as $date) {
                    $currentDate = Carbon::createFromFormat('m-d-Y', $date)->startOfDay();
    
                    if ($currentDate->between($dateRangeStart, $dateRangeEnd)) {
                        $count = $currentDate->diffInDays($dateRangeStart) + 1;
                        $countMatches[] = $count;
                    }
                }
    
                // Store task details including uploads
                $taskDetails = [
                    'name' => $task->name,
                    'start' => $dateRangeStart->format('Y-m-d'),
                    'end' => $dateRangeEnd->format('Y-m-d'),
                    'uploads' => $countMatches,
                ];
    
                $scopeTasks[] = $taskDetails;
            }
    
            // Store scope details with its tasks
            $scopeDetails = [
                'name' => $scope->title,
                'tasks' => $scopeTasks,
            ];
    
            $projectList[] = $scopeDetails;
        }
    
        $this->listofTask = $projectList;
    }

        




    public function render()
    {
        return view('livewire.component.project-manager.project-management.gantt');
    }
}
