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


        list($startDateStr, $endDateStr) = explode(' - ', $project->date_range);

        $dateRangeStart = Carbon::createFromFormat('m/d/Y', $startDateStr)->startOfDay();
        $dateRangeEnd = Carbon::createFromFormat('m/d/Y', $endDateStr)->endOfDay();
        
        $projectList = [];

        foreach ($project->scope as $scope) {
            $createdDates = $scope->task()->where('status', 'completed')->get();
        
            $countMatches = [];
        
            // Calculate count of days with uploads within the date range

            foreach ($createdDates as $date) {

                $currentDate = Carbon::parse($date->created_at)->startOfDay();
        

                if ($currentDate->between($dateRangeStart, $dateRangeEnd)) {

                    $count = $currentDate->diffInDays($dateRangeStart) + 1;
                    $countMatches[] = $count;

                }

            }
        
            // Prepare task details for each scope
            $tasks = [];
            foreach ($scope->task as $task) {
                
                // dd($task);
                $taskDetails = [
                    'name' => $task->name,
                    'start' => $dateRangeStart->format('Y-m-d'), // Adjust format if needed
                    'end' => $dateRangeEnd->format('Y-m-d'), // Adjust format if needed
                    'uploads' => $countMatches, // Assuming this holds the correct count of uploads per day
                ];
                $tasks[] = $taskDetails;
            }
        
            // Build the structure for each scope
            $scopeDetails = [
                'name' => $scope->title,
                'tasks' => $tasks,
            ];
        
            // Add scope details to the project list
            $projectList[] = $scopeDetails;


        }
                

            $this->listofTask = $projectList;


            // dd($this->listofTask);
            
        }
  
        // $scopeList = [
        //     'name' => 'Scope of Work 1',
        //     'tasks' => [
        //         [
        //             'name' => 'Task 1',
        //             'start' => '$startDate',
        //             'end' => '$endDate',
        //             'uploads' => [1, 3] 
        //         ],
        //         [
        //             'name' => 'Task 2',
        //             'start' => '$startDate',
        //             'end' => '$endDate',
        //             'uploads' => [1] 
        //         ]
        //     ]
        // ];
        




    public function render()
    {
        return view('livewire.component.project-manager.project-management.gantt');
    }
}
