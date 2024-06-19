<div>
    {{-- breadcrumbs --}}
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div>
                    <ol class="breadcrumb float-sm-right text-">
                        {{-- <li class="breadcrumb-item"><a href="{{ route('account-management.index') }}">Projects</a></li> --}}
                        <li class="breadcrumb-item active">Projects</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <div class="d-flex justify-content-between px-2">
        <h5 class="font-weight-bold">Assigned Project</h5>
    </div>

   
    <hr class="px-3" style="margin-top: 0px; border-width: 2px; border-color: #4a4a4a;">

    <div class="card-tools d-flex justify-content-center mb-5 mt-5">
        <div class="input-group input-group-sm mr-2" style="width: 275px;">
            <input wire:model.live='searchProject' type="text" name="table_search" class="form-control float-right"
                placeholder="Search">
            <div class="input-group-append">
                <button type="submit" class="btn btn-default">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </div>
        <div class="input-group input-group-sm" style="width: 275px;">
            <div class="input-group-prepend">
                <span class="input-group-text">Filter Progress</span>
            </div>
            <select wire:model.live='filterStatus' class="form-control">
                <option value="ongoing">Ongoing</option>
                <option value="completed">Completed</option>
            </select>
        </div>
    </div>

    
    <div class="container pt-1">
        <div class="row">
            @if ($projects !== null && $projects->isNotEmpty())
                @foreach ($projects as $assignedProject)
                
                @php

                    //getting the percentage
                    $week_count = count($assignedProject->project->scope);
                    $task_count = 0;
                    $done =0;
                    $add = 0;
                    $finalPercent = 0;
                    $taskStatus =[];
                    foreach($assignedProject->project->scope as  $week){
            
                
                        $statuses = $week->task->pluck('status')->toArray(); 

                        $task_count += count($week->task);
                        foreach ($statuses as $status) {
                            if ($status == App\Enums\Status::COMPLETED->value) {
                                $done += 1; 
                            }
                        }
                    
                        $taskStatus[] = ($done/$task_count) * 100 ; 
                    }
                    
                    
                    foreach($taskStatus as $status){
                        $add +=$status;
                    }

                    $finalPercent = ($add/$week_count);

                @endphp


                    <div class="col-12">
                        <div class="card w-full bg-primary">
                            <div class="card-body mt-1 bg-white">
                                <h5 class="card-title font-weight-bold">{{ $assignedProject->project->name }}</h5>
                                
                                @if (auth()->user()->hasRole(App\Enums\Employee::SUPERVISOR->value))
                                    <div class="d-flex justify-content-end">
                                        @if( $assignedProject->project->status !== App\Enums\Status::COMPLETED->value)
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-tool dropdown-toggle" data-toggle="dropdown">
                                                Mark
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-right" role="menu">
                                                <button class="dropdown-item" data-toggle="modal" data-target="#markStatusModal-{{ $assignedProject->project_id }}">
                                                    Completed
                                                </button>
                                            </div>
                                        </div>
                                        @endif
                                    </div>
                                @endif

                                <p class="card-text font-weight-light">{{ Str::limit( $assignedProject->project->description, 40) }}</p>
                            
                                
                                <div class="d-flex justify-content-end row">
                                
                                    @if (auth()->user()->hasRole(App\Enums\Employee::SUPERVISOR->value))
                                        @if($finalPercent == 100 && $assignedProject->project->status !== App\Enums\Status::COMPLETED->value)
                                            <div class="text-right pr-2"><button data-toggle="modal" data-target="#markStatusModal-{{ $assignedProject->project_id }}" type="button"
                                                class="btn btn-success btn-md rounded-lg text-white">
                                            <i class="fas fa-check"> </i>  Mark as completed</button>
                                            </div>
                                        @endif
                                    @endif

                                    <div class="text-right"><button wire:click="redirectToViewproject('{{ $assignedProject->project_id }}')" type="button"
                                            class="btn btn-primary">
                                            </i>View Project</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- Modal -->
                    @if (auth()->user()->hasRole(App\Enums\Employee::SUPERVISOR->value))
                    <div class="modal fade" id="markStatusModal-{{ $assignedProject->project_id }}" tabindex="-1" role="dialog" aria-labelledby="markStatusModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="markStatusModalLabel">Project Status</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p>Are you sure you want to mark as completed?</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary" wire:click="markAsCompleted({{ $assignedProject->project_id }})" data-dismiss="modal">Mark Completed</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif

                @endforeach

            @else

            <div class="col-12">
                <div class="card w-full bg-primary">
                    <div class="card-body mt-1 bg-white text-center">
                     No Existing Project
                </div>
                </div>
            </div>
           @endif
        </div>
    </div>
</div>
