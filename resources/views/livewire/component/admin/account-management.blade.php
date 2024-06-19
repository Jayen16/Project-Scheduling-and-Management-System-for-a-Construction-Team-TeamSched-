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
                            <input type="text" wire:model.live="search" name="table_search" class="form-control float-right"
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
                                    @if (!$paginate->isEmpty())
                                        @foreach ($paginate as $member)
                                        <td class="align-middle">
                                            {{ ($paginate->currentPage() - 1) * $paginate->perPage() + $loop->iteration }}
                                        </td>
                                        <td class="align-middle">{{ ucwords($member->firstName).' '.ucwords($member->middleName) .' '.ucwords($member->lastName)}}</td>
                                        <td class="align-middle">{{ \Carbon\Carbon::parse($member->birthdate)->age }}</td>
                                        <td class="align-middle">{{ ucwords($member->employment_status) }}</td>
                                        <td class="align-middle">{{ ucwords($member->type) }}</td>
                                        <td class="text-center align-middle">

                                            <div class="form-group">
                                                <div>
                                                    <div class="form-group">

                                                        @php
                                                            $toggleProperty = 'isActive' . $member->id;
                                                        @endphp

                                                        @if ($member->status == 'Active')
                                                            @php
                                                                $this->isActive = true;
                                                                $badgeClass = 'badge-success';
                                                                $badgeValue = 'Active';
                                                            @endphp
                                                        @else
                                                            @php
                                                                $this->isActive = false;
                                                                $badgeClass = 'badge-secondary';
                                                                $badgeValue = 'Inactive';
                                                            @endphp
                                                        @endif

                                                        {{--   --}}
                                                        <div
                                                            class="custom-control custom-switch custom-switch-on-success custom-switch-off-">
                                                            <input type="checkbox" class="custom-control-input"
                                                                id="{{ $toggleProperty }}"
                                                                @if ($this->isActive) checked @endif
                                                                wire:click="toggleUpdate({{ $member->id }})">
                                                            <label class="custom-control-label"
                                                                for="{{ $toggleProperty }}">
                                                                {{ $badgeValue }}
                                                            </label>

                                                        </div>

                                                    </div>
                                                </div>

                                            </div>
                                        </td>
                                        <td class="text-center align-middle">
                                            <button wire:click='redirectToProfile({{ $member->id }})'
                                                class="btn btn-sm btn-primary" type="button"><i
                                                    class="nav-icon fas fa-user mr-2"></i>Profile</button>
                                            <button class="btn btn-sm btn-danger" type="button" data-toggle="modal"
                                                data-target="#modal-{{ $member->id }}">
                                                <i class="nav-icon fas fa-minus mr-2"></i> Delete</button>
                                        </td>
                                    </tr>


                                    <div class="modal fade"  id="modal-{{ $member->id }}">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Delete User</h4>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Are you sure to delete this user?</p>
                                                </div>
                                                <div class="modal-footer justify-end">
                                                    <button type="button" class="btn btn-default"
                                                        data-dismiss="modal">Close</button>
                                                    <button wire:click="deletion('{{ $member->id }}')" type="button"
                                                        class="btn btn-danger" data-dismiss="modal">Delete</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                @endforeach


                            @else
                                <td colspan="7" class="text-center"> No Available Search</td>
                            @endif
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>

            </div>
            <div class="d-flex justify-content-end mt-2">
                {{ $paginate->links() }}
            </div>
        </div>
    </div>


</div>
