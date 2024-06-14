<div>
    {{-- breadcrumbs --}}
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div>
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Manpower</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <div class="pl-3">
        <div class="d-flex justify-content-between">
            <h4 class="font-weight-bold">Manpower List</h4>
        </div>
        <hr style="margin-top: px; border-width: 2px; border-color: #4a4a4a;">

        <div>
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Manpower</h3>
                    <div class="card-tools">
                        <div class="input-group input-group-sm" style="width: 220px;">
                            <p class="mr-2 ml-4">Sort skill: </p>
                            <select wire:model.live="filter" class="form-control">
                                <option value="all">All</option>
                                <option value="carpenter">Carpenter</option>
                                <option value="mason">Mason</option>
                                <option value="installer">Installer</option>
                                <option value="painter">Painter</option>
                                <option value="cement Mixer">Cement Mixer</option>
                                <option value="electrician">Electrician</option>
                                <option value="plumber">Plumber</option>
                                <option value="operator">Heavy Equipment Operator</option>
                            </select>
                        </div>
                    </div>
                    <div class="card-tools">
                        <div class="input-group input-group-sm" style="width: 275px;">
                            <input wire:model.live="search" type="text" name="table_search" class="form-control float-right"
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
                                <th>Skill Category</th>
                                <th>Skill</th>
                                <th>Contact Number</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($paginate->isNotEmpty())
                                @foreach($paginate as $manpower)
                                    <tr>
                                        <td class="align-middle">{{ ($paginate->currentPage() - 1) * $paginate->perPage() + $loop->iteration }}</td>
                                        <td class="align-middle">{{ ucwords($manpower->firstName) .' '. ucwords($manpower->middleName) .' '. ucwords($manpower->lastName) }}</td>
                                        <td class="align-middle">{{ \Carbon\Carbon::parse($manpower->birthdate)->age }}</td>
                                        <td class="align-middle">{{ ucwords($manpower->employment_status) }}</td>
                                        <td class="align-middle">{{ ucwords($manpower->skill_category) }}</td>
                                        <td class="align-middle">{{ ucwords($manpower->skill) }}</td>
                                        <td class="align-middle">{{ ucwords($manpower->contact_number) }}</td>
                                        <td class="text-center"> <button wire:click="redirectToProfile('{{ $manpower->id }}')"
                                            class="btn btn-sm btn-primary" type="button"><i
                                                class="nav-icon fas fa-user mr-2"></i>Profile</button></td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan='7' class="text-center">No Available Manpower</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-end mt-2">
            {{ $paginate->links() }}
        </div>
    </div>
</div>
