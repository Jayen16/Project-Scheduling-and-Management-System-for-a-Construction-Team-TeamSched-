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
                <button wire:click='redirectToEdit({{ $member->id }})' type="button" class="btn btn-warning">
                    <i class="nav-icon fas fa-pen mr-2"></i>Edit</button>
            </div>
        </div>
        <hr style="margin-top: px; border-width: 2px; border-color: #4a4a4a;">

        <div>
            <p class="font-weight-bold">Account ID: <span
                    class="badge text-sm rounded-pill bg-light border border-width-3 p-2">{{ $member->id }}</span></p>
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
                            <div style="background-color: rgb(232, 232, 232);" class="p-2 border rounded">{{ $member->firstName.' '.$member->middleName .' '.$member->lastName }}
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label>Birthday</label>
                            <div style="background-color: rgb(232, 232, 232);" class="p-2 border rounded">{{ \Carbon\Carbon::parse($member->birthdate)->format('M d, Y') }}
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label>Age</label>
                            <div style="background-color: rgb(232, 232, 232);" class="p-2 border rounded">{{ \Carbon\Carbon::parse($member->birthdate)->age }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-8">
                        <div class="form-group">
                            <label>Address</label>
                            <div style="background-color: rgb(232, 232, 232);" class="p-2 border rounded">{{ $member->address }}
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label>Contact Number</label>
                            <div style="background-color: rgb(232, 232, 232);" class="p-2 border rounded">{{ $member->contact_number }}
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
                            <div style="background-color: rgb(232, 232, 232);" class="p-2 border rounded">{{ ucfirst($member->type) }}
                            </div>
                        </div>
                    </div>

                    <div class="col-3">
                        <div class="form-group">
                            <label>Status of Appointment</label>
                            <div style="background-color: rgb(232, 232, 232);" class="p-2 border rounded">{{ $member->employment_status }}
                            </div>
                        </div>
                    </div>

                    <div class="col-3">
                        <div class="form-group">
                            <label>Skill Category </label>
                            <div style="background-color: rgb(232, 232, 232);" class="p-2 border rounded">{{ $member->skill_category }}
                            </div>
                        </div>
                    </div>

                    <div class="col-3">
                        <div class="form-group">
                            <label>Skill </label>
                            <div style="background-color: rgb(232, 232, 232);" class="p-2 border rounded">{{ $member->skill }}
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
