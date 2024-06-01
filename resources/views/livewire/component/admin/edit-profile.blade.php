<div>
    {{-- breadcrumbs --}}
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div>
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('account-management.index') }}">Account
                                Management</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('profile.index') }}">Profile</a></li>
                        <li class="breadcrumb-item active">Edit</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <div class="pl-3 pb-3">

        <div class="d-flex justify-content-between">
            <h4 class="font-weight-bold">Edit Profile</h4>
        </div>
        <hr style="margin-top: 0px; border-width: 2px; border-color: #4a4a4a;">

        <form wire:submit="">
            <div class="d-flex justify-content-between">
                <div>
                    <p class="font-weight-bold">Account ID:
                        <span class="badge text-sm rounded-pill bg-light border border-width-3 p-2">00121755</span>
                    </p>
                </div>
                <div>
                    <p class="font-italic text-right">Note: fields marked with
                        <span class="text-danger font-weight-bolder text-md">*</span> are required.
                    </p>
                </div>
            </div>

            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Basic Information</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                <label>Last Name <span class="text-danger font-weight-bolder text-md">*</span></label>
                                <input wire:model='' type="text" class="form-control"
                                    placeholder="Enter Last Name..." required>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label>First Name <span class="text-danger font-weight-bolder text-md">*</span></label>
                                <input wire:model='' type="text" class="form-control"
                                    placeholder="Enter First Name..." required>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label>Middle Name</label>
                                <input wire:model='' type="text" class="form-control"
                                    placeholder="Enter Middle Name...">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-8">
                            <div class="form-group">
                                <label>Address <span class="text-danger font-weight-bolder text-md">*</span></label>
                                <input wire:model='' type="text" class="form-control" placeholder="Enter Address..."
                                    required>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label>Birthday <span class="text-danger font-weight-bolder text-md">*</span></label>
                                <input wire:model='' type="date" class="form-control" max="{{ $maxDate }}"
                                    required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                <label>Contact Number <span
                                        class="text-danger font-weight-bolder text-md">*</span></label>
                                <input wire:model='' class="form-control"
                                    oninput="this.value = this.value.replace(/[^0-9]/g, '')" type="text"
                                    maxlength="11" placeholder="Enter contact number..." required>
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
                                <label>Role <span class="text-danger font-weight-bolder text-md">*</span></label>
                                <select wire:model.live="selectedRole" class="form-control" required>
                                    <option value="">Select Role</option>
                                    <option value="Manpower">Manpower</option>
                                    <option value="Site Supervisor">Site Supervisor</option>
                                    <option value="Project Manager">Project Manager</option>
                                    <option value="Admin">Admin</option>
                                </select>
                            </div>
                        </div>
                        @if ($showStatusOfAppointment)
                            <div class="col-3">
                                <div class="form-group">
                                    <label>Status of Appointment <span
                                            class="text-danger font-weight-bolder text-md">*</span></label>
                                    <select class="form-control" required>
                                        <option value="">Select Status of Appointment</option>
                                        <option value="Available">Available</option>
                                        <option value="Working">Working</option>
                                        <option value="Overdue">Overdue</option>
                                    </select>
                                </div>
                            </div>
                        @endif
                        @if ($showSkillCategory)
                            <div class="col-3">
                                <div class="form-group">
                                    <label>Skill Category <span
                                            class="text-danger font-weight-bolder text-md">*</span></label>
                                    <select wire:model.live="selectedSkillCategory" class="form-control" required>
                                        <option value="">Select Category</option>
                                        <option value="Skilled">Skilled</option>
                                        <option value="Unskilled">Unskilled</option>
                                    </select>
                                </div>
                            </div>
                        @endif
                        {{-- (Skilled) --}}
                        @if ($showSkilled)
                            <div class="col-3">
                                <div class="form-group">
                                    <label>Skill <span class="text-danger font-weight-bolder text-md">*</span></label>
                                    <select class="form-control" required>
                                        <option value="">Select Skill</option>
                                        <option value="Carpenter">Carpenter</option>
                                        <option value="Mason">Mason</option>
                                        <option value="Installer">Installer</option>
                                        <option value="Painter">Painter</option>
                                        <option value="Electrician">Electrician</option>
                                        <option value="Plumber">Plumber</option>
                                        <option value="Heavy Equipment Operator">Heavy Equipment Operator</option>
                                    </select>
                                </div>
                            </div>
                        @endif
                        {{-- (Unskilled) --}}
                        @if ($showUnskilled)
                            <div class="col-3">
                                <div class="form-group">
                                    <label>Skill <span class="text-danger font-weight-bolder text-md">*</span></label>
                                    <select class="form-control" required>
                                        <option value="">Select Skill</option>
                                        <option value="Laborer">Laborer</option>
                                        <option value="Helper">Helper</option>
                                    </select>
                                </div>
                            </div>
                        @endif
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
                                <label>Username <span class="text-danger font-weight-bolder text-md">*</span></label>
                                <input wire:model='' type="text" class="form-control"
                                    placeholder="Enter username..." required>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label>Password <span class="text-danger font-weight-bolder text-md">*</span></label>
                                <input wire:model='' type="text" class="form-control"
                                    placeholder="Enter password..." required>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-end">
                <button wire:click='redirectToProfile()' type="button" class="btn btn-default mr-2">
                    Cancel</button>
                <button type="submit" class="btn btn-success float-right">Save</button>
            </div>
        </form>
    </div>
</div>
