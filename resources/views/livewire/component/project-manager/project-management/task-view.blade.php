<div>
    {{-- breadcrumbs --}}
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div>
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('project-management.index') }}">Project
                                Management</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('project-summary.index',['project'=> $project->id]) }}">Project
                                Summary</a></li>
                        <li class="breadcrumb-item active">Task</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <div class="pl-3 pb-3">
        <div class="d-flex justify-content-between">
            <div>
                <h4 class="font-weight-bold">{{ ucwords($task->name) }}</h4>
            </div>
            <div><button wire:click='redirectToProjectSummary()' type="button" class="btn btn-default mr-1">
                    <i class="nav-icon fas fa-arrow-left mr-2"></i>
                    Back</button>
            </div>
        </div>
        <hr style="margin-top: px; border-width: 2px; border-color: #4a4a4a;">
        <div class="my-lg-2"><span class="badge text-md rounded-pill bg-light border border-width-3 p-2">Timeline</span>
        </div>
        <div>

            <livewire:component.site-supervisor.progress task="{{ $task->id }}"/>

        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#imageModal').on('show.bs.modal', function(event) {
            var image = $(event.relatedTarget);
            var imageUrl = image.data('image');
            var modal = $(this);
            modal.find('#modalImage').attr('src', imageUrl);
        });
    });
</script>
