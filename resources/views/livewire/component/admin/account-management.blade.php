<div>
    {{-- breadcrumbs --}}
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div>
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Account Management</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <div class="pl-3">
        <div class="d-flex justify-content-between">
            <h4 class="font-weight-bold">Account Management</h4>

            <button wire:click='redirectToAdd()' type="button" class="btn btn-success">
                <i class="nav-icon fas fa-plus mr-2"></i>New</button>
        </div>
        <hr style="margin-top: px; border-width: 2px; border-color: #4a4a4a;">

        {{-- account table --}}
        <div>
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Accounts</h3>
                    <div class="card-tools">
                        <div class="input-group input-group-sm" style="width: 275px;">
                            <input type="text" name="table_search" class="form-control float-right"
                                placeholder="Search">
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
                                <th>Name</th>
                                <th>Age</th>
                                <th>Status of Appointment</th>
                                <th>Role</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="align-middle">1</td>
                                <td class="align-middle">John Doe</td>
                                <td class="align-middle">43</td>
                                <td class="align-middle">Available</td>
                                <td class="align-middle">Manpower</td>
                                <td class="text-center align-middle">
                                    <div class="form-group">
                                        <div>
                                            <div class="form-group">
                                                <div
                                                    class="custom-control custom-switch custom-switch-on-success custom-switch-off-">
                                                    <input type="checkbox" class="custom-control-input"
                                                        id="availability" wire:click="toggleIsActive">
                                                    <label class="custom-control-label" for="availability">
                                                        {{ $isActive ? 'Active' : 'Inactive' }}
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </td>
                                <td class="text-center align-middle">
                                    <button wire:click='redirectToProfile()' class="btn btn-sm btn-primary"
                                        type="button"><i class="nav-icon fas fa-user mr-2"></i>Profile</button>
                                    <button data-toggle="modal" data-target="#exampleModal"
                                        class="btn btn-sm btn-danger" type="button"><i
                                            class="nav-icon fas fa-minus mr-2"></i> Delete</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
    {{-- confirmation modal --}}
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Account</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this account?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger">Delete</button>
                </div>
            </div>
        </div>
    </div>
</div>
