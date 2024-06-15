<div>
    {{-- breadcrumbs --}}
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div>
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('project-management.index') }}">Project
                                Management</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('project-summary.index') }}">Project
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
                <h4 class="font-weight-bold">Task Name</h4>
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
            <div class="timeline">
                {{-- start of timeline upload --}}
                <div class="time-label">
                    <span class="bg-green">3 Jan. 2024</span>
                </div>
                <div>
                    <i class="fa fa-camera bg-purple"></i>
                    <div class="timeline-item">
                        <span class="time"><span class="text-sm text-left mr-2"> 9:40 a.m. •</span><i class="fas fa-clock"></i> 2 days
                            ago</span>
                        <h3 class="timeline-header font-weight-normal"><span class="font-weight-bolder">Mina Lee</span>
                            uploaded new photos</h3>
                        <div class="timeline-body">
                            <div class="row p-2">
                                <div class="col-3 border p-2 position-relative">
                                    <img class="w-100 h-100"
                                        style="object-fit: cover; cursor: pointer; max-height: 300px;"
                                        src="{{ asset('assets/images/construction.jpg') }}" alt="..."
                                        data-toggle="modal" data-target="#imageModal"
                                        data-image="{{ asset('assets/images/construction.jpg') }}">
                                </div>
                                <div class="col-3 border p-2 position-relative">
                                    <img class="w-100 h-100"
                                        style="object-fit: cover; cursor: pointer; max-height: 300px;"
                                        src="{{ asset('assets/images/wall painting.jpg') }}" alt="..."
                                        data-toggle="modal" data-target="#imageModal"
                                        data-image="{{ asset('assets/images/wall painting.jpg') }}">
                                </div>
                                <div class="col-3 border p-2 position-relative">
                                    <img class="w-100 h-100"
                                        style="object-fit: cover; cursor: pointer; max-height: 300px;"
                                        src="{{ asset('assets/images/teamsched_logo.png') }}" alt="..."
                                        data-toggle="modal" data-target="#imageModal"
                                        data-image="{{ asset('assets/images/teamsched_logo.png') }}">
                                </div>
                            </div>
                        </div>
                        <div class="timeline-body">
                            <span class="font-weight-bold">Remarks:</span>
                            <span>Done Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos facilis mollitia
                                omnis nesciunt rerum enim dignissimos quae quo architecto culpa, eum voluptatum
                                temporibus porro! Facilis earum aliquid maiores quod accusantium.</span>
                        </div>
                    </div>
                </div>
                {{-- end of timeline upload --}}

                <div>
                    <i class="fas fa-clock bg-gray"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-body">
                    <img id="modalImage" class="w-100 h-100"
                        style="object-fit: contain; cursor: pointer; max-height: 500px;" src="" alt="">
                </div>
            </div>
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
