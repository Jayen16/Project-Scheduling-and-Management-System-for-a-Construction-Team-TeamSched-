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
                                aria-controls="custom-tabs-three-profile" aria-selected="false">Calendar</a>
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
                                    <button wire:click="redirectToEdit('{{ $project->id }}')" type="button" class="btn btn-warning">
                                        <i class="nav-icon fas fa-pen mr-2"></i>Edit</button>
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
                                            <div class="progress-bar bg-success" style="width: 55%"></div>
                                        </div>
                                        <div>
                                            <p class="text-right font-weight-bold">Progress: 55%</p>
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
                                                    class="p-2 border rounded">Title
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
                                
                            <div class="card card-secondary">
                                <div class="card-header">
                                    <h3 class="card-title">Scope of Work</h3>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label>Title</label>
                                                <div style="background-color: rgb(232, 232, 232);"
                                                    class="p-2 border rounded">{{ ucwords($week->title) }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row px-2">
                                        <div class="card col-12">
                                            <div class="card-header">
                                                <h3 class="card-title font-weight-bold">Tasks</h3>
                                            </div>

                                            <div>
                                                <table class="table table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th style="width: 10px">#</th>
                                                            <th>Task</th>
                                                            <th>Progress</th>
                                                            <th style="width: 150px">Percentage %</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($week->task as $task)
                                                        <tr>
                                                            <td> {{ $loop->index +1 }}</td>
                                                            <td>{{ $task->name }}</td>
                                                            <td class="align-middle">
                                                                <div class="progress progress-xs">
                                                                    <div class="progress-bar bg-success"
                                                                        style="width: 55%">
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td><span class="badge bg-success">55%</span></td>
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
                        <div class="tab-pane fade" id="custom-tabs-three-profile" role="tabpanel"
                            aria-labelledby="custom-tabs-three-profile-tab">
                            Mauris tincidunt mi at erat gravida, eget tristique urna bibendum. Mauris pharetra purus ut
                            ligula tempor, et vulputate metus facilisis. Lorem ipsum dolor sit amet, consectetur
                            adipiscing
                            elit. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia
                            Curae;
                            Maecenas sollicitudin, nisi a luctus interdum, nisl ligula placerat mi, quis posuere purus
                            ligula eu lectus. Donec nunc tellus, elementum sit amet ultricies at, posuere nec nunc. Nunc
                            euismod pellentesque diam.
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

</div>
