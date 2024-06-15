<div>
    {{-- breadcrumbs --}}
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div>
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('project-management.index') }}">Project
                                Management</a></li>
                        <li class="breadcrumb-item active">New Project</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <div class="pl-3 pb-3">

        <div class="d-flex justify-content-between">
            <h4 class="font-weight-bold">Create Project</h4>
        </div>
        <hr style="margin-top: 0px; border-width: 2px; border-color: #4a4a4a;">

        <form wire:submit="">
            <div class="text-right">
                <p class="font-italic">Note: fields marked with <span
                        class="text-danger font-weight-bolder text-md">*</span> are required.
                    <br><span>Scope of Work is required.</span>
                </p>
            </div>
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Project Details</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                <label>Title <span class="text-danger font-weight-bolder text-md">*</span></label>
                                <input wire:model='' type="text" class="form-control" placeholder="Title here..."
                                    required>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label>Site Supervisor <span
                                        class="text-danger font-weight-bolder text-md">*</span></label>
                                <select wire:model='' class="form-control" required>
                                    <option value="">Select Site Supervisor</option>
                                    <option value="Supervisor 1">Supervisor 1</option>
                                </select>
                            </div>
                        </div>
                        {{-- daterange picker --}}
                        <div class="col-3">
                            <div class="form-group">
                                <label>Date Started and Completion: <span
                                        class="text-danger font-weight-bolder text-md">*</span></label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="far fa-calendar-alt"></i>
                                        </span>
                                    </div>
                                    <input type="text" class="form-control float-right" id="reservation"
                                        name="dates">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label>Description <span class="text-danger font-weight-bolder text-md">*</span></label>
                                <textarea style="resize: none;" class="form-control" rows="3" placeholder="Enter project description here..."></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">

                    </div>
                </div>
            </div>

            {{-- <div class="card card-secondary">
                <div class="card-header">
                    <h3 class="card-title">Scope of Work</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                <label bel>Title <span class="text-danger font-weight-bolder text-md">*</span></label>
                                <input wire:model='' type="text" class="form-control text-uppercase"
                                    placeholder="Enter Title..." required>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                <div class="d-flex align-items-end">
                                    <div class="mr-2">
                                        <label>Task <span
                                                class="text-danger font-weight-bolder text-md">*</span></label>
                                        <input wire:model='task' type="text" class="form-control"
                                            style="width:250px;" placeholder="Enter Task here..." required>
                                    </div>
                                    <div>
                                        <button wire:click='addTask()' type="button" class="btn btn-success">
                                            <i class="nav-icon fas fa-plus mr-2"></i>Add
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <div class="d-flex align-items-end">
                                    <div class="mr-2">
                                        <label>Assign Manpower <span
                                                class="text-danger font-weight-bolder text-md">*</span></label>
                                        <select style="width: 250px;" wire:model="manpower" class="form-control"
                                            required>
                                            <option value="">Select Role</option>
                                            <option value="Manpower 1">Manpower 1</option>
                                            <option value="Manpower 2">Manpower 2</option>
                                            <option value="Manpower 3">Manpower 3</option>
                                            <option value="Manpower 4">Manpower 4</option>
                                        </select>
                                    </div>
                                    <div>
                                        <button wire:click='addManpower()' type="button" class="btn btn-success">
                                            <i class="nav-icon fas fa-plus mr-2"></i>Add
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                <label>Tasks:</label>
                                @foreach ($tasks as $index => $task)
                                    <div class="d-flex align-items-end mt-2">
                                        <div class="mr-2">
                                            <div style="background-color: rgb(248, 248, 248); width:250px;"
                                                class="p-1 pl-2 border rounded text-uppercase">
                                                {{ $task }}
                                            </div>
                                        </div>
                                        <button wire:click='removeTask({{ $index }})' type="button"
                                            class="btn btn-danger btn-sm">
                                            <i class="nav-icon fas fa-minus mr-2"></i>Remove</button>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label>Manpower:</label>
                                @foreach ($manpowers as $index => $manpower)
                                    <div class="d-flex align-items-end mt-2">
                                        <div class="mr-2">
                                            <div style="background-color: rgb(248, 248, 248); width:250px;"
                                                class="p-1 pl-2 border rounded text-uppercase">
                                                {{ $manpower }}
                                            </div>
                                        </div>
                                        <button wire:click='removeManpower({{ $index }})' type="button"
                                            class="btn btn-danger btn-sm">
                                            <i class="nav-icon fas fa-minus mr-2"></i>Remove</button>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="text-right">
                <button wire:click='addScopeOfWork()' type="button" class="btn btn-success">
                    <i class="nav-icon fas fa-plus mr-2"></i>Scope of Work
                </button>
            </div> --}}

            <div>
                @foreach ($scopes as $index => $scope)
                    <div class="card card-secondary mb-3">
                        <div class="card-header">
                            <h3 class="card-title">Scope of Work</h3>
                            <div class="card-tools">
                                <button wire:click='removeScopeOfWork({{ $index }})' type="button"
                                    class="btn btn-danger btn-xs px-2">
                                    <i class="nav-icon fas fa-minus"></i></button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group">
                                        <label>Title <span
                                                class="text-danger font-weight-bolder text-md">*</span></label>
                                        <input wire:model='' type="text" class="form-control text-uppercase"
                                            placeholder="Enter Title..." required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group">
                                        <div class="d-flex align-items-end">
                                            <div class="mr-2">
                                                <label>Task <span
                                                        class="text-danger font-weight-bolder text-md">*</span></label>
                                                <input wire:model='task' type="text" class="form-control"
                                                    style="width:250px;" placeholder="Enter Task here..." required>
                                            </div>
                                            <div>
                                                <button wire:click='addTask({{ $index }})' type="button"
                                                    class="btn btn-success">
                                                    <i class="nav-icon fas fa-plus mr-2"></i>Add
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <div class="d-flex align-items-end">
                                            <div class="mr-2">
                                                <label>Assign Manpower <span
                                                        class="text-danger font-weight-bolder text-md">*</span></label>
                                                <select style="width: 250px;" wire:model="manpower" class="form-control"
                                                    required>
                                                    <option value="">Select Role</option>
                                                    <option value="Manpower 1">Manpower 1</option>
                                                    <option value="Manpower 2">Manpower 2</option>
                                                    <option value="Manpower 3">Manpower 3</option>
                                                    <option value="Manpower 4">Manpower 4</option>
                                                </select>
                                            </div>
                                            <div>
                                                <button wire:click='addManpower({{ $index }})' type="button"
                                                    class="btn btn-success">
                                                    <i class="nav-icon fas fa-plus mr-2"></i>Add
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group">
                                        <label>Tasks:</label>
                                        @foreach ($scope['tasks'] as $taskIndex => $task)
                                            <div class="d-flex align-items-end mt-2">
                                                <div class="mr-2">
                                                    <div style="background-color: rgb(248, 248, 248); width:250px;"
                                                        class="p-1 pl-2 border rounded text-uppercase">
                                                        {{ $task }}
                                                    </div>
                                                </div>
                                                <button
                                                    wire:click='removeTask({{ $index }}, {{ $taskIndex }})'
                                                    type="button" class="btn btn-danger btn-sm">
                                                    <i class="nav-icon fas fa-minus mr-2"></i>Remove
                                                </button>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label>Manpower:</label>
                                        @foreach ($scope['manpowers'] as $manpowerIndex => $manpower)
                                            <div class="d-flex align-items-end mt-2">
                                                <div class="mr-2">
                                                    <div style="background-color: rgb(248, 248, 248); width:250px;"
                                                        class="p-1 pl-2 border rounded text-uppercase">
                                                        {{ $manpower }}
                                                    </div>
                                                </div>
                                                <button
                                                    wire:click='removeManpower({{ $index }}, {{ $manpowerIndex }})'
                                                    type="button" class="btn btn-danger btn-sm">
                                                    <i class="nav-icon fas fa-minus mr-2"></i>Remove
                                                </button>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="text-right mb-3">
                    <button wire:click='addScopeOfWork' type="button" class="btn btn-success">
                        <i class="nav-icon fas fa-plus mr-2"></i>Scope of Work
                    </button>
                </div>
            </div>

            <div class="d-flex justify-content-end mt-4">
                <button wire:click='redirectToProjectManagement()' type="button" class="btn btn-default mr-2">
                    Cancel</button>
                <button type="button" data-toggle="modal" data-target="#exampleModal"
                    class="btn btn-success float-right">Create Project</button>
            </div>
        </form>
    </div>
    {{-- confirmation modal --}}
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create Project</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure that the details you have entered are correct?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $('input[name="dates"]').daterangepicker();
</script>
