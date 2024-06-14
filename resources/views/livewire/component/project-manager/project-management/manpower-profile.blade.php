<div>
    {{-- breadcrumbs --}}
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div>
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('manpower.index') }}">Manpower</a></li>
                        <li class="breadcrumb-item active">Profile</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <div class="pl-3 pb-3">

        <div class="d-flex justify-content-between">
            <h4 class="font-weight-bold">Profile</h4>
            <div><button wire:click='redirectToManpower()' type="button" class="btn btn-default mr-1">
                    <i class="nav-icon fas fa-arrow-left mr-2"></i>
                    Back</button>
            </div>
        </div>
        <hr style="margin-top: px; border-width: 2px; border-color: #4a4a4a;">

        <div>
            <p class="font-weight-bold">Manpower ID: <span
                    class="badge text-sm rounded-pill bg-light border border-width-3 p-2">00121755</span></p>
        </div>
        <div class="col-12">
            <div class="card card-neutral card-outline card-tabs">
                <div class="card-header p-0 pt-0 border-bottom-0">
                    <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="custom-tabs-three-profile-tab" data-toggle="pill"
                                href="#custom-tabs-three-profile" role="tab"
                                aria-controls="custom-tabs-three-profile" aria-selected="true">Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="custom-tabs-three-attendance-tab" data-toggle="pill"
                                href="#custom-tabs-three-attendance" role="tab"
                                aria-controls="custom-tabs-three-attendance" aria-selected="false">Attendance Log</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content" id="custom-tabs-three-tabContent">
                        <div class="tab-pane fade active show" id="custom-tabs-three-profile" role="tabpanel"
                            aria-labelledby="custom-tabs-three-profile-tab">
                            <div>
                                {{-- basic info --}}
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h3 class="card-title">Basic Information</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label>Full Name</label>
                                                    <div style="background-color: rgb(232, 232, 232);"
                                                        class="p-2 border rounded">full name
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="form-group">
                                                    <label>Birthday</label>
                                                    <div style="background-color: rgb(232, 232, 232);"
                                                        class="p-2 border rounded">birthday
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="form-group">
                                                    <label>Age</label>
                                                    <div style="background-color: rgb(232, 232, 232);"
                                                        class="p-2 border rounded">43
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-8">
                                                <div class="form-group">
                                                    <label>Address</label>
                                                    <div style="background-color: rgb(232, 232, 232);"
                                                        class="p-2 border rounded">address
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label>Contact Number</label>
                                                    <div style="background-color: rgb(232, 232, 232);"
                                                        class="p-2 border rounded">contact
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- employment detail --}}
                                <div class="card card-secondary">
                                    <div class="card-header">
                                        <h3 class="card-title">Employment Details</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-3">
                                                <div class="form-group">
                                                    <label>Role</label>
                                                    <div style="background-color: rgb(232, 232, 232);"
                                                        class="p-2 border rounded">Manpower
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-3">
                                                <div class="form-group">
                                                    <label>Status of Appointment</label>
                                                    <div style="background-color: rgb(232, 232, 232);"
                                                        class="p-2 border rounded">Available
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-3">
                                                <div class="form-group">
                                                    <label>Skill Category </label>
                                                    <div style="background-color: rgb(232, 232, 232);"
                                                        class="p-2 border rounded">Skilled
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-3">
                                                <div class="form-group">
                                                    <label>Skill </label>
                                                    <div style="background-color: rgb(232, 232, 232);"
                                                        class="p-2 border rounded">Painter
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Attendance Log --}}
                        <div class="tab-pane fade" id="custom-tabs-three-attendance" role="tabpanel"
                            aria-labelledby="custom-tabs-three-attendance-tab">
                            <div>
                                {{-- <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Attendance</h3>
                                    </div>
                                    <div class="card-body table-responsive p-0"
                                        style="max-height: 400px; overflow-y: auto;">
                                        <table class="table table-striped table-head-fixed text-nowrap">
                                            <thead>
                                                <tr>
                                                    <th style="width: 10px">#</th>
                                                    <th style="width: 300px">Project</th>
                                                    <th>Task</th>
                                                    <th>Date</th>
                                                    <th class="text-center">Time-in</th>
                                                    <th class="text-center">Time-out</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>1.</td>
                                                    <td>LMC-IMUS-6D-BLOWERS</td>
                                                    <td>Update software</td>
                                                    <td>02/15/24</td>
                                                    <td class="text-center">7:00 a.m.</td>
                                                    <td class="text-center">5:00 p.m.</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div> --}}

                                <div class="col-md-12">
                                    {{-- <div class="card"> --}}
                                    <div class="card-header">
                                        <h3 class="card-title font-weight-bold">Projects</h3>
                                    </div>

                                    <div class="card-body">

                                        {{-- start accordion --}}
                                        <div id="accordion">
                                            <div class="card card-secondary">
                                                <div class="card-header">
                                                    <h4 class="card-title w-100">
                                                        <a class="d-block w-100 collapsed" data-toggle="collapse"
                                                            href="#collapseOne" aria-expanded="false">
                                                            LMC-IMUS-6D-BLOWERS
                                                        </a>
                                                    </h4>
                                                </div>
                                                <div id="collapseOne" class="collapse" data-parent="#accordion"
                                                    style="">
                                                    <div class="card-body">
                                                        <div class="card-body table-responsive p-0"
                                                            style="max-height: 200px; overflow-y: auto;">
                                                            <table class="table table-head-fixed text-nowrap">
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
                                        {{-- end accordion --}}
                                    </div>

                                    {{-- </div> --}}

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
