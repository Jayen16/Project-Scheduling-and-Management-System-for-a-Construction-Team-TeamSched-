<div>
    {{-- breadcrumbs --}}
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div>
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('project-management.index') }}">Project
                                Management</a></li>
                        <li class="breadcrumb-item active">Project Summary</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <div class="pl-3 pb-3">

        <div class="col-12">
            <div class="card card-neutral card-outline card-tabs">
                <div class="card-header p-0 pt-0 border-bottom-0">
                    <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="custom-tabs-three-home-tab" data-toggle="pill"
                                href="#custom-tabs-three-home" role="tab" aria-controls="custom-tabs-three-home"
                                aria-selected="true">Project Summary</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="custom-tabs-three-profile-tab" data-toggle="pill"
                                href="#custom-tabs-three-profile" role="tab"
                                aria-controls="custom-tabs-three-profile" aria-selected="false">Gantt Chart</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content" id="custom-tabs-three-tabContent">
                        <div class="tab-pane fade active show" id="custom-tabs-three-home" role="tabpanel"
                            aria-labelledby="custom-tabs-three-home-tab">
                            <div class="d-flex justify-content-between">
                                <h4 class="font-weight-bold"> {{ ucwords($project->name) ?? '-' }}</h4>
                                <div><button wire:click='redirectToProjectManagement()' type="button"
                                        class="btn btn-default mr-1">
                                        <i class="nav-icon fas fa-arrow-left mr-2"></i>
                                        Back</button>
                                        @if ($project->status !== 'completed')
                                            <button wire:click="redirectToEdit('{{ $project->id }}')" type="button" class="btn btn-warning">
                                            <i class="nav-icon fas fa-pen mr-2"></i>Edit</button>
                                        @endif

                                </div>
                            </div>
                            <hr style="margin-top: px; border-width: 2px; border-color: #4a4a4a;">

                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <p class="font-weight-bold">Project ID: <span
                                            class="badge text-sm rounded-pill bg-light border border-width-3 p-2">#{{ $project->id }}</span>
                                    </p>
                                </div>
                                <div class="col-3">
                                    <div>
                                        <div class="progress progress-lg progress-striped active">
                                            <div class="progress-bar bg-success" style="width: {{ number_format($projectPercent, 2) }}%"></div>
                                        </div>
                                        <div>
                                            <p class="text-right font-weight-bold">Progress: {{ number_format($projectPercent, 2) }}%</p>
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
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label>Title</label>
                                                <div style="background-color: rgb(232, 232, 232);"
                                                    class="p-2 border rounded">{{ ucwords($project->name) }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label>Site Supervisor</label>
                                                <div style="background-color: rgb(232, 232, 232);"
                                                    class="p-2 border rounded"> {{ $supervisor ?? '-' }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label>Date Started and Completion</label>
                                                <div style="background-color: rgb(232, 232, 232);"
                                                    class="p-2 border rounded">{{ $project->date_range ?? '-' }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label>Description</label>
                                                <div style="background-color: rgb(232, 232, 232);"
                                                    class="p-2 border rounded">{{ $project->description ?? '-' }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- scope  --}}
                            @foreach ($scopes as $week)
                                
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
                                    <div class="d-flex justify-content-between align-items-start">
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label>Title</label>
                                                <div style="background-color: rgb(232, 232, 232);"
                                                    class="p-2 border rounded">{{ ucwords($week->title) }}
                                                </div>
                                            </div>
                                        </div>

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

                                        <div class="col-3">
                                            <div>
                                                <div class="progress progress-lg progress-striped active">
                                                    <div class="progress-bar bg-success" style="width: {{ number_format($progressOfThisWeek, 2) }}%"></div>
                                                </div>
                                                <div>
                                                    <p class="text-right font-weight-bold">Progress: {{ number_format($progressOfThisWeek, 2) }}%</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row px-2">
                                        <div class="card col-12">
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
                                                            <td> {{ $loop->index +1 }}</td>
                                                            <td>{{ $task->name }}</td>
                                                            <td>{{ ucwords($task->status) }}</td>
                                                            <td class="text-center">
                                                                <button wire:click="redirectToViewTask('{{ $task->id }}')"
                                                                    class="btn btn-sm btn-primary" type="button">
                                                                    <i class="nav-icon fas fa-file mr-2"></i>View
                                                                </button>
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-4">
                                        <div class="form-group">
                                            <label>Assigned Manpower:</label>
                                            
                                            @php
                                                $manpowerList = [];

                                            @endphp
                                            @foreach ($week->assignedmember as $manpower)
                                                    @if (!in_array($manpower->id, $manpowerList))
                                                        @php
                                                            $manpowerList[] = $manpower->id; // Append the ID to the list
                                                        @endphp
                                                        <div style="background-color: rgb(232, 232, 232);"
                                                            class="p-2 border rounded mt-1">
                                                            {{ $manpower->employee->firstName.' '.$manpower->employee->middleName.' '.$manpower->employee->lastName }}
                                                        </div>
                                                    @endif
                                            @endforeach
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                            @endforeach

                            {{-- end scope --}}
                        </div>

                        {{-- Gantt --}}
                        <div class="tab-pane fade " id="custom-tabs-three-profile" role="tabpanel"
                            aria-labelledby="custom-tabs-three-profile-tab">
                            <div>
                                <livewire:component.project-manager.project-management.gantt project="{{ $project->id }}">
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

</div>
