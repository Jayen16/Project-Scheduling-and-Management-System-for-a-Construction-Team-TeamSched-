<div>
    {{-- breadcrumbs --}}
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div>
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Project Management</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <div class="pl-3">
        <div class="d-flex justify-content-between">
            <h4 class="font-weight-bold">Project Management</h4>

            <button wire:click='redirectToAdd()' type="button" class="btn btn-success">
                <i class="nav-icon fas fa-plus mr-2"></i>New</button>
        </div>
        <hr style="margin-top: px; border-width: 2px; border-color: #4a4a4a;">

        {{-- account table --}}
        <div>
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Projects</h3>
                    <div class="card-tools">
                        <div class="input-group input-group-sm" style="width: 275px;">
                            <input type="text" wire:model.live='search' name="table_search"
                                class="form-control float-right" placeholder="Search">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-body table-responsive p-0">
                    <table class="table table-striped text-nowrap">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Date Started</th>
                                <th>Expected Completion Date</th>
                                <th>Progress</th>
                                <th>Percentage %</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($paginate->isNotEmpty())
                                @foreach ($paginate as $project)
                                    @php
                                        $dateRange = explode(' - ', $project->date_range);
                                        $startDate = $dateRange[0];
                                        $endDate = $dateRange[1];

                                        //getting the percentage
                                        $week_count = count($project->scope);
                                        $task_count = 0;
                                        $done = 0;
                                        $add = 0;
                                        $finalPercent = 0;
                                        $taskStatus =[];
                                        foreach($project->scope as  $week){
                                  
                                            $task_count = 0;
                                            $done =0;
                                            
                                            $statuses = $week->task->pluck('status')->toArray(); 

                                            $task_count += count($week->task);
                                            foreach ($statuses as $status) {
                                                if ($status == App\Enums\Status::COMPLETED->value) {
                                                    $done += 1;
                                                }
                                            }

                                            $taskStatus[] = ($done / $task_count) * 100;
                                        }

                                        foreach ($taskStatus as $status) {
                                            $add += $status;
                                        }

                                        $finalPercent = ($add/$week_count);


                                        
                                    @endphp
                                    <tr>
                                        <td class="align-middle">
                                            {{ ($paginate->currentPage() - 1) * $paginate->perPage() + $loop->iteration }}
                                        </td>
                                        <td class="align-middle">{{ ucwords($project->name) }}</td>
                                        <td class="align-middle">
                                            {{ isset($startDate) ? \Carbon\Carbon::parse($startDate)->format('F d, Y') : '-' }}
                                        </td>
                                        <td class="align-middle">
                                            {{ isset($endDate) ? \Carbon\Carbon::parse($endDate)->format('F d, Y') : '-' }}
                                        </td>
                                        <td class="align-middle font-weight-bold">
                                            <div class="progress progress-xs">
                                                <div class="progress-bar bg-success"
                                                    style="width: {{ $finalPercent ?? 0 }}%;">
                                                </div>
                                            </div>
                                        <td class="font-weight-bold">{{ $finalPercent ?? 0 }}%</td>
                                        </td>
                                        <td class="text-center align-middle">
                                            <button wire:click="redirectToProject({{ $project->id }})"
                                                class="btn btn-sm btn-primary" type="button">
                                                <i class="nav-icon fas fa-file mr-2"></i>View
                                            </button>
                                            <button data-toggle="modal" data-target="#exampleModal-{{ $project->id }}"
                                                class="btn btn-sm btn-danger" type="button">
                                                <i class="nav-icon fas fa-minus mr-2"></i> Delete
                                            </button>
                                        </td>
                                    </tr>

                                    {{-- confirmation modal --}}
                                    <div class="modal fade" id="exampleModal-{{ $project->id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="exampleModalLabel-{{ $project->id }}"
                                        aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel-{{ $project->id }}">
                                                        Delete Project</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    Are you sure you want to delete this project?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Cancel</button>
                                                    <button wire:click="deleteProject({{ $project->id }})"
                                                        data-dismiss="modal" class="btn btn-danger">Delete</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan='7' class="text-center">No Available Project</td>
                                </tr>
                            @endif


                        </tbody>
                    </table>
                </div>
                <div class="d-flex justify-content-end mt-2">
                    {{ $paginate->links() }}
                </div>
            </div>
        </div>
    </div>

</div>
