<div>
    {{-- breadcrumbs --}}
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div>
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('account-management.index') }}">Account
                                Management</a></li>
                        <li class="breadcrumb-item active">Profile</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <div class="pl-3 pb-3">

        <div class="d-flex justify-content-between">
            <h4 class="font-weight-bold">Profile</h4>
            <div><button wire:click='redirectToAccountManagement()' type="button" class="btn btn-default mr-1">
                    <i class="nav-icon fas fa-arrow-left mr-2"></i>
                    Back</button>
                <button wire:click='redirectToEdit()' type="button" class="btn btn-warning">
                    <i class="nav-icon fas fa-pen mr-2"></i>Edit</button>
            </div>
        </div>
        <hr style="margin-top: px; border-width: 2px; border-color: #4a4a4a;">

        <div>
            <p class="font-weight-bold">Account ID: <span
                    class="badge text-sm rounded-pill bg-light border border-width-3 p-2">00121755</span></p>
        </div>
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Basic Information</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label>Full Name</label>
                            <div style="background-color: rgb(232, 232, 232);" class="p-2 border rounded">full name
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label>Birthday</label>
                            <div style="background-color: rgb(232, 232, 232);" class="p-2 border rounded">birthday
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label>Age</label>
                            <div style="background-color: rgb(232, 232, 232);" class="p-2 border rounded">43
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-8">
                        <div class="form-group">
                            <label>Address</label>
                            <div style="background-color: rgb(232, 232, 232);" class="p-2 border rounded">address
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label>Contact Number</label>
                            <div style="background-color: rgb(232, 232, 232);" class="p-2 border rounded">contact
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card card-secondary">
            <div class="card-header">
                <h3 class="card-title">Employment Details</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-3">
                        <div class="form-group">
                            <label>Role</label>
                            <div style="background-color: rgb(232, 232, 232);" class="p-2 border rounded">Manpower
                            </div>
                        </div>
                    </div>

                    <div class="col-3">
                        <div class="form-group">
                            <label>Status of Appointment</label>
                            <div style="background-color: rgb(232, 232, 232);" class="p-2 border rounded">Available
                            </div>
                        </div>
                    </div>

                    <div class="col-3">
                        <div class="form-group">
                            <label>Skill Category </label>
                            <div style="background-color: rgb(232, 232, 232);" class="p-2 border rounded">Skilled
                            </div>
                        </div>
                    </div>

                    <div class="col-3">
                        <div class="form-group">
                            <label>Skill </label>
                            <div style="background-color: rgb(232, 232, 232);" class="p-2 border rounded">Painter
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        {{-- account details --}}
        <div class="card card-cyan">
            <div class="card-header">
                <h3 class="card-title">Account Details</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <label>Username</label>
                            <div style="background-color: rgb(232, 232, 232);" class="p-2 border rounded">
                                manpowerteamsched001
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label>Password</label>
                            <div style="background-color: rgb(232, 232, 232);" class="p-2 border rounded">hfe4713d
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
