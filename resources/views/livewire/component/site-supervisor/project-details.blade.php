<div>
    {{-- breadcrumbs --}}
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div>
                    <ol class="breadcrumb float-sm-right text-sm">
                        <li class="breadcrumb-item"><a href="{{ route('projects.index') }}">Projects</a></li>
                        <li class="breadcrumb-item active">Project Details</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <div class="d-flex justify-content-between px-2 align-items-end">
        <h5 class="font-weight-bold">Project</h5>
        <div class="d-flex">
            {{-- <button wire:click='redirectToAssignedProjects()' type="button" class="btn btn-sm btn-default mr-1">
                <i class="nav-icon fas fa-arrow-left mr-2"></i>
                Back
            </button> --}}

            @if($project->status !== App\Enums\Status::COMPLETED->value)

                @php
                $checkAttendance = App\Models\Attendance::where('employee_id', auth()->user()->id)
                    ->where('project_id', $project->id)
                    ->whereDate('created_at', Carbon\Carbon::today('Asia/Manila'))
                    ->whereNotNull('time_in')
                    ->first();
                @endphp
                {{-- if not yet existing --}}
                @if (!$checkAttendance) 
                    <button wire:click="timeIn({{ $project->id }})" type="button" class="btn btn-sm btn-success mr-1">
                        Time-in
                    </button>
                @elseif($checkAttendance->time_out == null)
                    <button wire:click="timeOut({{ $project->id }})" type="button" class="btn btn-sm btn-secondary mr-1">
                        Time-out
                    </button>
                @endif

            @endif
        </div>
    </div>

    <hr class="px-3" style="margin-top: px; border-width: 2px; border-color: #4a4a4a;">

    <div class="w-full">
        <div class="card card-neutral card-outline card-tabs">
            <div class="card-header p-0 pt-0 border-bottom-0">
                <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="custom-tabs-three-home-tab" data-toggle="pill"
                            href="#custom-tabs-three-home" role="tab" aria-controls="custom-tabs-three-home"
                            aria-selected="true">Project</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="custom-tabs-three-profile-tab" data-toggle="pill"
                            href="#custom-tabs-three-profile" role="tab" aria-controls="custom-tabs-three-profile"
                            aria-selected="false">Attendance Log</a>
                    </li>
                </ul>
            </div>

            <div class="card-body">
                <div class="tab-content" id="custom-tabs-three-tabContent">
                    <div class="tab-pane fade active show" id="custom-tabs-three-home" role="tabpanel"
                        aria-labelledby="custom-tabs-three-home-tab">
                        <div class="d-flex justify-content-end">
                            {{-- <h6 class="font-weight-bold">Project Title</h6> --}}
                            <div class="d-flex justify-content-end align-items-center">
                                <div>
                                    <div class="progress progress-xs progress-striped active">
                                        <div class="progress-bar bg-success" style="width: {{ number_format($projectPercent, 2) }}%;"></div>
                                    </div>
                                    <div>
                                        <p class="text-right text-sm font-weight-bold">Progress: {{ number_format($projectPercent, 2) }}%</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Project Details</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>Title</label>
                                            <div style="background-color: rgb(232, 232, 232);"
                                                class="p-2 border rounded">{{ $project->name }}

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>Site Supervisor</label>
                                            <div style="background-color: rgb(232, 232, 232);"
                                                class="p-2 border rounded">Supervisor 1
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>Date Started and Completion</label>
                                            <div style="background-color: rgb(232, 232, 232);"
                                                class="p-2 border rounded">{{ $project->date_range }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>Description</label>
                                            <div style="background-color: rgb(232, 232, 232);"
                                                class="p-2 border rounded text-justify">{{ $project->description }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                     

                        @foreach ($project->scope as $index => $week)

                        @php
                            $count = 0;
                            $done = 0;
                            $ongoing = 0;
                        @endphp

                            <div class="card card-secondary">
                                <div class="card-header">
                                    <h3 class="card-title">Scope of Work</h3>
                                </div>
                                <div class="card-body">
                                    <div class=" d-flex justify-content-end">
                                        <div>

                                            @php
                                         
                                                $count = count($week->task);
                                     
                                                foreach($week->task->pluck('status') as $status){
                                                    if($status == App\Enums\Status::COMPLETED->value){
                                                        $done +=1;
                                                    }elseif($status == App\Enums\Status::ONGOING->value){
                                                        $ongoing +=1;
                                                    }

                                                    $progressOfThisWeek = ($done > 0) ? ($done / $count) * 100 : 0;
                                                }

                                            @endphp

                                            <div class="progress progress-sm progress-striped active">
                                                <div class="progress-bar bg-success" style="width: {{ $progressOfThisWeek }}%;"></div>
                                            </div>
                                  
                                            <div>
                                                <p class="text-right text-sm font-weight-bold">Progress: {{ $progressOfThisWeek }}%</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="w-full">
                                        <div class="form-group">
                                            <label>Title</label>
                                            <div style="background-color: rgb(232, 232, 232);" class="p-2 border rounded">
                                                {{ $week->title }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="w-full">
                                        <div class="card w-full">
                                            <div class="card-header">
                                                <h3 class="card-title font-weight-bold">Tasks</h3>
                                            </div>

                                            <div class="table-responsive">
                                                <table class="table table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th class="pl-lg-4" style="width: 10%">#</th>
                                                            <th style="width: 60%">Task</th>
                                                            <!-- Set the width to 50% or any value you prefer -->
                                                            <th>Status</th>
                                                            <th class="text-center">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($week->task as $task)
                                                            <tr>
                                                                <td class="pl-lg-4"> {{ $loop->index +1 }}</td>
                                                                <td>{{ $task->name }}</td>
                                                                <td>{{ ucwords($task->status) }}</td>
                                                                <td class="text-center">
                                                                    <button wire:click="redirectToViewTask('{{ $task->id }}')"
                                                                    class="btn btn-sm btn-primary" type="button">
                                                                    View
                                                                </button>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>Assigned Manpower:</label>
                                            @foreach ($week->assignedmember as $member)
                                            @php
                                                $member = App\Models\Employee::where('id',$member->manpower_id)->first();
                                                $name = $member->firstName.' '.$member->middleName.' '.$member->lastName;
                                            @endphp
                                            <div style="background-color: rgb(232, 232, 232);"
                                                class="p-2 border rounded mt-1">
                                               
                                                    {{ $name }}
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    {{-- Attendance --}}
                    <div class="tab-pane fade " id="custom-tabs-three-profile" role="tabpanel"
                        aria-labelledby="custom-tabs-three-profile-tab">

                        <div>
                            <div id="accordion">
                                <div class="card card-secondary">
                                    <div class="card-header">
                                        <h4 class="card-title w-100">
                                            <a class="d-block w-100 collapsed" data-toggle="collapse"
                                                href="#collapseOne" aria-expanded="false">
                                                {{-- {{ ucwords($project->name) }} --}}
                                                {{ ucwords($project->name) }}
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseOne" class="collapse" data-parent="#accordion"
                                        style="">
                                        
                                  
                                        @php
                                            $lastDate = null;
                                            $counter = 0;
                                        @endphp
                                        
                                            @foreach ($project->attendance as $attendance)
                                                @if ($lastDate != $attendance->created_at->format('M d, Y'))
                                                    <div class="card-body">
                                                        <div class="card-body table-responsive p-0" style="max-height: 200px; overflow-y: auto;">
                                                            <b>{{ $attendance->created_at->format('M d, Y') }}</b>
                                                            @php
                                                                $lastDate = $attendance->created_at->format('M d, Y');
                                                                $counter = 0;
                                                            @endphp
                                                        </div>
                                                    </div>
                                                @endif
                                                @php
                                                    $counter++; 
                                                @endphp
                                                <table class="table table-head-fixed text-nowrap">
                                                    <thead>
                                                        <tr>
                                                            <th style="width: 10px">#</th>
                                                            <th>Name</th>
                                                            <th class="text-center">Time-in</th>
                                                            <th class="text-center">Time-out</th>
                                                            <th class="text-center">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>{{ $counter }}</td>
                                                            <td>{{ $attendance->employee->firstName . ' ' . $attendance->employee->middleName . ' ' . $attendance->employee->lastName ?? '-' }}</td>
                                                            <td class="text-center">{{ $attendance->time_in ?? '-' }}</td>
                                                            <td class="text-center">{{ $attendance->time_out ?? '-' }}</td>

                                                            @if($attendance->employee->id !== auth()->user()->id)
                                                            <td class="text-center">
                                                                <button wire:click="confirmAttendance({{ $attendance->employee->id }})" type="button" class="btn btn-primary">
                                                                    Confirm
                                                                </button>
                                                            </td>
                                                            @else
                                                                <td class="text-center"> - </td>
                                                            @endif
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            @endforeach
                                        
                                        {{--  --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
