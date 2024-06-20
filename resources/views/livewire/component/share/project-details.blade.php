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
        <h5 class="font-weight-bold">{{ ucwords($project->name) }}</h5>
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
                    <button data-toggle="modal" data-target="#attendanceModal-{{ $project->id }}-time-in" type="button" class="btn btn-sm btn-success mr-1">
                        Time-in
                    </button>
                @elseif($checkAttendance->time_out == null)
                    <button data-toggle="modal" data-target="#attendanceModal-{{ $project->id }}-time-out" type="button" class="btn btn-sm btn-secondary mr-1">
                        Time-out
                    </button>
                @endif


         <!-- Time In Modal -->
            <div class="modal fade" id="attendanceModal-{{ $project->id }}-time-in" tabindex="-1" role="dialog" aria-labelledby="attendanceModalLabel-{{ $project->id }}-time-in" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="attendanceModalLabel-{{ $project->id }}-time-in">Attendance</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>Time In at {{ now()->format('h:i A') }}</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" wire:click="timeIn({{ $project->id }})" data-dismiss="modal">Time In</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Time Out Modal -->
            <div class="modal fade" id="attendanceModal-{{ $project->id }}-time-out" tabindex="-1" role="dialog" aria-labelledby="attendanceModalLabel-{{ $project->id }}-time-out" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="attendanceModalLabel-{{ $project->id }}-time-out">Attendance</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>Time Out at {{ now()->format('h:i A') }}</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" wire:click="timeOut({{ $project->id }})" data-dismiss="modal">Time Out</button>
                        </div>
                    </div>
                </div>
            </div>

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
                                            @php
                                                $name = $project->assignedProject->employee->firstName.' '.$project->assignedProject->employee->middleName.' '.$project->assignedProject->employee->lastName
                                            @endphp
                                            <div style="background-color: rgb(232, 232, 232);"
                                                class="p-2 border rounded"> {{ $name }}
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
                                                            @if (auth()->user()->hasRole(App\Enums\Employee::SUPERVISOR->value))
                                                                <th class="text-center">Action</th>
                                                            @endif
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($week->task as $task)
                                                            <tr>
                                                                <td class="pl-lg-4"> {{ $loop->index +1 }}</td>
                                                                <td>{{ $task->name }}</td>
                                                                <td>{{ ucwords($task->status) }}</td>
                                                                @if (auth()->user()->hasRole(App\Enums\Employee::SUPERVISOR->value))
                                                                    <td class="text-center">
                                                                        <button wire:click="redirectToViewTask('{{ $task->id }}')"
                                                                        class="btn btn-sm btn-primary" type="button">
                                                                        View
                                                                    </button>
                                                                @endif
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
                            @if (auth()->user()->hasRole(App\Enums\Employee::SUPERVISOR->value))
                                <livewire:component.site-supervisor.attendance project="{{ $project->id }}"/>
                                    
                            @elseif (auth()->user()->hasRole(App\Enums\Employee::MANPOWER->value))
                                <livewire:component.manpower.attendance project="{{ $project->id }}"/>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
