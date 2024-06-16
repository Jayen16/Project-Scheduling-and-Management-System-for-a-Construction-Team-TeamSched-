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
            <button wire:click='' type="button" class="btn btn-sm btn-success mr-1">
                Time-in
            </button>
            <button wire:click='' type="button" class="btn btn-sm btn-secondary mr-1">
                Time-out
            </button>
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
                                        <div class="progress-bar bg-success" style="width: 55%"></div>
                                    </div>
                                    <div>
                                        <p class="text-right text-sm font-weight-bold">Progress: 55%</p>
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
                                                class="p-2 border rounded">Title
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
                                                class="p-2 border rounded">06/08/2024 -
                                                06/08/2024
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>Description</label>
                                            <div style="background-color: rgb(232, 232, 232);"
                                                class="p-2 border rounded text-justify">Project
                                                Description here...
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card card-secondary">
                            <div class="card-header">
                                <h3 class="card-title">Scope of Work</h3>
                            </div>
                            <div class="card-body">
                                <div class=" d-flex justify-content-end">
                                    <div>
                                        <div class="progress progress-sm progress-striped active">
                                            <div class="progress-bar bg-success" style="width: 10%"></div>
                                        </div>
                                        <div>
                                            <p class="text-right text-sm font-weight-bold">Progress: 10%</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="w-full">
                                    <div class="form-group">
                                        <label>Title</label>
                                        <div style="background-color: rgb(232, 232, 232);" class="p-2 border rounded">
                                            Sample
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
                                                    <tr>
                                                        <td class="pl-lg-4">1.</td>
                                                        <td>Painting</td>
                                                        <td>Ongoing</td>
                                                        <td class="text-center">
                                                            <button wire:click='redirectToViewTask()'
                                                                class="btn btn-sm btn-primary" type="button">
                                                                View
                                                            </button>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Assigned Manpower:</label>
                                        <div style="background-color: rgb(232, 232, 232);"
                                            class="p-2 border rounded mt-1">Manpower 1
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Attendance --}}
                    <div class="tab-pane fade " id="custom-tabs-three-profile" role="tabpanel"
                        aria-labelledby="custom-tabs-three-profile-tab">
                        <div class="w-full">
                            <div class="card w-full">
                                <div class="card-header">
                                    <h3 class="card-title font-weight-bold">Attendance Log</h3>
                                </div>

                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th style="width: 10px">#</th>
                                                <th>Date</th>
                                                <th class="text-center">Time-in</th>
                                                <th class="text-center">Time-out</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @for ($i = 0; $i < 6; $i++)
                                                <tr>
                                                    <td>1.</td>
                                                    <td>02/15/24</td>
                                                    <td class="text-center">7:00 a.m.</td>
                                                    <td class="text-center">5:00 p.m.</td>
                                                </tr>
                                            @endfor

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
