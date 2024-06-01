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
                            <select wire:model.live="selectedRole" class="form-control" required>
                                <option value="Painter">Painter</option>
                                <option value="Cement Mixer">Cement Mixer</option>
                            </select>
                        </div>
                    </div>
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
                                <th>Skill</th>
                                <th>Status of Appointment</th>
                                <th>Contact Number</th>
                            </tr>
                        </thead>
                        <tbody>
                            @for ($i = 0; $i < 5; $i++)
                                <tr>
                                    <td class="align-middle">1</td>
                                    <td class="align-middle">John Doe</td>
                                    <td class="align-middle">43</td>
                                    <td class="align-middle">Painter</span></td>
                                    <td class="align-middle">Available</td>
                                    <td class="align-middle">09123456789</td>
                                </tr>
                            @endfor
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
