<div>
    {{-- breadcrumbs --}}
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div>
                    <ol class="breadcrumb float-sm-right text-sm">
                        {{-- <li class="breadcrumb-item"><a href="{{ route('account-management.index') }}">Projects</a></li> --}}
                        <li class="breadcrumb-item active">Projects</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <div class="d-flex justify-content-between px-2">
        <h5 class="font-weight-bold">Assigned Project</h5>
    </div>
    <hr class="px-3" style="margin-top: 0px; border-width: 2px; border-color: #4a4a4a;">
    <div class="container pt-1">
        <div class="row">
            <div class="col-12">
                <div class="card w-full bg-primary">
                    <div class="card-body mt-1 bg-white">
                        <h5 class="card-title font-weight-bold">LMC IMUS - 6D BLOWERS</h5>
                        <p class="card-text font-weight-light">{{ Str::limit('Project description here...', 40) }}</p>
                        <div class="text-right"><button wire:click='redirectToViewproject()' type="button"
                                class="btn btn-primary">
                                </i>View Project</button></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
