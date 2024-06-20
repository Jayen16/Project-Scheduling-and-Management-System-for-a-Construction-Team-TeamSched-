<div>
    {{-- breadcrumbs --}}
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div>
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('project-management.index') }}">Project
                                Management</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('project-summary.index',['project'=>$project->id]) }}">Project
                                Summary</a></li>
                        <li class="breadcrumb-item active">Edit</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <div class="pl-3 pb-3">

        <div class="d-flex justify-content-between">
            <h4 class="font-weight-bold">Edit Project</h4>
        </div>
        <hr style="margin-top: 0px; border-width: 2px; border-color: #4a4a4a;">

        <div class="d-flex justify-content-between">
            <p class="font-weight-bold">Project ID: <span
                    class="badge text-sm rounded-pill bg-light border border-width-3 p-2">00121755</span>
            </p>
            <p class="font-italic">Note: fields marked with <span
                    class="text-danger font-weight-bolder text-md">*</span> are required.
                <br><span>Scope of Work is required.</span>
            </p>
        </div>


        <form>
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Project Details</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                <label>Title <span class="text-danger font-weight-bolder text-md">*</span></label>
                                <input wire:model='project_name' type="text" class="form-control" placeholder="Title here..."
                                    required>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label>Site Supervisor <span
                                        class="text-danger font-weight-bolder text-md">*</span></label>
                                <select wire:model='assigned_supervisor' class="form-control" required>
                                    @foreach ($supervisorList as $supervisor)
                                        <option value="{{ $supervisor->id }}">{{ $supervisor->firstName }}</option>
                                    @endforeach
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
                                    <input wire:model='project_date_range' type="text" class="form-control float-right" id="reservation"
                                    name="dates" required>
                                    <input wire:model='project_date_range' type="hidden" id="hiddenDate">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label>Description <span class="text-danger font-weight-bolder text-md">*</span></label>
                                <textarea wire:model='project_description' style="resize: none;" class="form-control" rows="3" placeholder="Enter project description here..."></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">

                    </div>
                </div>
            </div>

            <div>
                {{-- ADD PROJECT --}}
                <div class="card card-secondary mb-3">
                    <div class="card-header">
                        <h3 class="card-title">Scope of Work</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    <label>Title <span
                                            class="text-danger font-weight-bolder text-md">*</span></label>
                                    <input wire:model='new_week_title' type="text" class="form-control text-uppercase"
                                        placeholder="Enter Title..." required>
                                </div>
                                @error('new_week_title')
                                    <span class='text-danger'> Description is needed for overview.</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    <div class="d-flex align-items-end">
                                        <div class="mr-2">
                                            <label>Task <span
                                                    class="text-danger font-weight-bolder text-md">*</span></label>
                                            <input wire:model='newTask' type="text" class="form-control"
                                                style="width:250px;" placeholder="Enter Task here..." required>
                                        </div>
                       
                                        <div>
                                            <button wire:click='addNewTask()' type="button"
                                                class="btn btn-success">
                                                <i class="nav-icon fas fa-plus mr-2"></i>Add
                                            </button>
                                        </div>
                                        @error('task')
                                        <span class='text-danger'> Add atleast 1 task</span>
                                    @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <div class="d-flex align-items-end">
                                        <div class="mr-2">
                                            <label>Assign Manpower <span
                                                    class="text-danger font-weight-bolder text-md">*</span></label>
                                                <select style="width: 250px;" wire:model="newManpower" class="form-control"
                                                required>
                                                    <option value="">Select Role</option>
                                                    @foreach ($listedManpower as $manpower)
                                                        @php
                                                            $name = ucwords($manpower->firstName) . ' ' . ucwords($manpower->middleName) . ' ' . ucwords($manpower->lastName)
                                                        @endphp
                                                        @unless(in_array($manpower->id, $NewUpdateManpower))
                                                            <option value="{{ $manpower->id }}"> {{$name }} </option>
                                                        @endunless
                                                    @endforeach

                                            </select>
                                        </div>
                                 
                                        <div>
                                            <button wire:click='addNewManpower()' type="button"
                                                class="btn btn-success">
                                                <i class="nav-icon fas fa-plus mr-2"></i>Add
                                            </button>
                                        </div>
                                        @error('manpower')
                                            <span class='text-danger'> Add atleast 1 manpower</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    <label>Tasks:</label>
                                    @foreach ($new_project_scope as $scopeIndex => $newScope)
                                        @if (!empty($newScope['tasks']))
                                            @foreach ($newScope['tasks'] as $taskIndex => $task)

                                                <div class="d-flex align-items-end mt-2">
                                                    <div class="mr-2">
                                                        <div style="background-color: rgb(248, 248, 248); width:250px;"
                                                            class="p-1 pl-2 border rounded text-uppercase">
                                                            {{ $task }}
                                                        </div>
                                                    </div>
                                                    <button
                                                        wire:click="removeTask('{{ $taskIndex }}')"
                                                        type="button" class="btn btn-danger btn-sm">
                                                        <i class="nav-icon fas fa-minus mr-2"></i>Remove
                                                    </button>
                                            </div>
                                        @endforeach
                                    @endif
                                @endforeach
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label>Manpower:</label>
                                    @foreach ($new_project_scope as $scopeIndex => $newScope)
                                        @if (!empty($newScope['manpowers']))
                                            @foreach ($newScope['manpowers'] as $manpowerIndex => $manpower)

                                                <div class="d-flex align-items-end mt-2">
                                                    <div class="mr-2">
                                                        <div style="background-color: rgb(248, 248, 248); width:250px;"
                                                            class="p-1 pl-2 border rounded text-uppercase">

                                                            @php
                                                                $manpowerDetail = App\Models\Employee::where('id',$manpower)->first();
                                                                $name = ucwords($manpowerDetail->firstName) . ' ' . ucwords($manpowerDetail->middleName) . ' ' . ucwords($manpowerDetail->lastName)

                                                                
                                                            @endphp

                                                            {{ $name }}
                                                        </div>
                                                    </div>
                                                    <button
                                                        wire:click="removeManpower('{{ $scopeIndex }}')"
                                                        type="button" class="btn btn-danger btn-sm">
                                                        <i class="nav-icon fas fa-minus mr-2"></i>Remove
                                                    </button>
                                            </div>
                                        @endforeach
                                    @endif
                                @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-right mb-3">
                    <button wire:click='addNewScopeOfWork()' type="button" class="btn btn-success">
                        <i class="nav-icon fas fa-plus mr-2"></i>Scope of Work
                    </button>
                </div>
                {{-- END OF ADD PROJECT --}}

                @foreach ($project_scope as $index => $week)

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
                                          
                                        <input wire:model='week_title.{{ $index }}' type="text" class="form-control text-uppercase"
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
                                                <input wire:model='tasks.{{ $index }}' type="text" class="form-control"
                                                    style="width:250px;" placeholder="Enter Task here..." required>
                                            </div>
                                            <div>
                                                <button wire:click="addTask('{{ $index }}')" type="button"
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
                                                <select style="width: 250px;" wire:model="manpowers.{{ $index }}" class="form-control"
                                                    required>
                                                     <option value="">Select Role</option>
                                 
                                                    @foreach ($listedManpower as $manpower)
                                                        @php
                                                            $name = ucwords($manpower->firstName) . ' ' . ucwords($manpower->middleName) . ' ' . ucwords($manpower->lastName)
                                                        @endphp
                                                        @if (!in_array($manpower['id'],$week['manpowers']))
                                                            <option value="{{ $manpower['id']}}">{{ $name}}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div>
                                                <button wire:click="addManpower('{{ $index }}')" type="button"
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
                                        @php
                                        @endphp
                                            @foreach ($week['tasks'] as $taskIndex => $task)
                                                <div class="d-flex align-items-end mt-2">
                                                    <div class="mr-2">
                                                        <div style="background-color: rgb(248, 248, 248); width:250px;"
                                                            class="p-1 pl-2 border rounded text-uppercase">
                                                            {{ $task }}
                                                        </div>
                                                    </div>
                                                    <button
                                                        wire:click="removeTask('{{ $index }}','{{ $taskIndex }}', '{{ $task }}')"
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
                                        @foreach ($week['manpowers'] as $manpowerIndex => $manpowerID)
                                            <div class="d-flex align-items-end mt-2">
                                                <div class="mr-2">
                                                    <div style="background-color: rgb(248, 248, 248); width:250px;"
                                                        class="p-1 pl-2 border rounded text-uppercase">

                                                        @php
                                                            $display_manpower = App\Models\Employee::where('id',$manpowerID)->first();
                                                            $name = ucwords($display_manpower->firstName) . ' ' . ucwords($display_manpower->middleName) . ' ' . ucwords($display_manpower->lastName)
                                                        @endphp
                                                        {{ $name }}
                                                    </div>
                                                </div>
                                                <button
                                                    wire:click="removeManpower('{{ $index }}','{{ $manpowerIndex }}', '{{ $manpowerID }}')"
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

            </div>

            <div class="d-flex justify-content-end mt-4">
                <button wire:click='redirectToProjectSummary()' type="button" class="btn btn-default mr-2">
                    Cancel</button>
                <button type="button" wire:click='update()' class="btn btn-success float-right">Save</button>
            </div>
        </form>
    </div>
</div>

<script>
    $(function() {
            $('input[name="dates"]').daterangepicker({
                opens: 'left'
            }, function(start, end, label) {
                var formattedStartDate = start.format('MM/DD/YYYY');
                var formattedEndDate = end.format('MM/DD/YYYY');
                var dateRange = formattedStartDate + ' - ' + formattedEndDate;

                document.getElementById('hiddenDate').value = dateRange;

                @this.set('project_date_range', dateRange);

            });

        });

</script>