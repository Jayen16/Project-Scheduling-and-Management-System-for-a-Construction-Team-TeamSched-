<div>
    {{-- breadcrumbs --}}
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div>
                    <ol class="breadcrumb float-sm-right text-sm">
                        <li class="breadcrumb-item"><a href="{{ route('projects.index') }}">Projects</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('project-details.index') }}">Project Details</a>
                        </li>
                        <li class="breadcrumb-item active">Task</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <div class="w-full">
        <div class="card card-neutral card-outline card-tabs">
            <div class="card-header p-0 pt-0 border-bottom-0">
                <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="custom-tabs-three-home-tab" data-toggle="pill"
                            href="#custom-tabs-three-home" role="tab" aria-controls="custom-tabs-three-home"
                            aria-selected="true">Progress Report</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="custom-tabs-three-profile-tab" data-toggle="pill"
                            href="#custom-tabs-three-profile" role="tab" aria-controls="custom-tabs-three-profile"
                            aria-selected="false">Progress Timeline</a>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <div class="tab-content" id="custom-tabs-three-tabContent">
                    <div class="tab-pane fade active show" id="custom-tabs-three-home" role="tabpanel"
                        aria-labelledby="custom-tabs-three-home-tab">
                        <div class="d-flex justify-content-between px-2 align-items-end">
                            <h5 class="font-weight-bold">Task Name</h5>
                            <div class="d-flex">
                                <button wire:click='' type="button" class="btn btn-sm btn-success mr-1">
                                    <i class="fas fa-check-circle mr-2"></i> Mark as done
                                </button>
                            </div>
                        </div>
                        <hr class="px-3" style="margin-top: px; border-width: 2px; border-color: #4a4a4a;">

                        <form action="">
                            <div class="w-full">
                                <div class="text-right text-xs">
                                    <p class="font-italic">Note: fields marked with <span
                                            class="text-danger font-weight-bolder text-md">*</span> are required.
                                    </p>
                                </div>
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h3 class="card-title font-weight-bold text-md">Create Progress Report</h3>
                                    </div>
                                    <div class="card-body">
                                        <p class="text-right text-sm">Date today: <span
                                                class="font-weight-bold"><?php echo date('F j, Y'); ?></span>
                                        </p>

                                        <div class="row">
                                            <div class="col-12">
                                                <div class="m-1 p-1 bg-gray">
                                                    <img id="imagePreview" class="w-100"
                                                        style="object-fit: cover; cursor: pointer; max-height: 180px;"
                                                        src="{{ asset('assets/images/image_placeholder.jpg') }}"
                                                        alt="image preview">
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <p class="text-center text-gray">Upload Preview</p>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="exampleInputFile">Upload Image <span
                                                            class="text-danger font-weight-bolder text-md">*</span>
                                                        <span class="font-weight-light text-sm"><i>(jpg/png
                                                                only)</i></span></label>
                                                    <div class="input-group">
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input"
                                                                id="exampleInputFile" accept=".jpg, .jpeg, .png"
                                                                onchange="previewImage()" required>
                                                            <label class="custom-file-label"
                                                                for="exampleInputFile">Choose image</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label>Remarks <span
                                                            class="text-danger font-weight-bolder text-md">*</span></label>
                                                    <textarea style="resize: none;" class="form-control" rows="3" placeholder="Enter project description here..."
                                                        required></textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="w-full">
                                            <div class='d-flex justify-content-between'>
                                                <button wire:click='redirectToProjectDetails()' type="button"
                                                    class="btn btn-sm btn-default mr-1">
                                                    <i class="nav-icon fas fa-arrow-left mr-2"></i>
                                                    Back
                                                </button>
                                                <button type="submit" class="btn w-full btn-success">
                                                    Submit
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                    {{-- Attendance --}}
                    <div class="tab-pane fade " id="custom-tabs-three-profile" role="tabpanel"
                        aria-labelledby="custom-tabs-three-profile-tab">
                        <div>
                            {{-- <div class="my-lg-2"><span
                                    class="badge text-md rounded-pill bg-light border border-width-3 p-2">Timeline</span>
                            </div> --}}
                            <div>
                                <div class="timeline">
                                    {{-- start of timeline upload --}}
                                    <div class="time-label">
                                        <span class="bg-green">3 Jan. 2024</span>
                                    </div>
                                    <div>
                                        <i class="fa fa-camera bg-purple"></i>
                                        <div class="timeline-item">
                                            <span class="time"><span class="text-sm text-left mr-2"> 9:40 a.m.
                                                    •</span><i class="fas fa-clock"></i> 2 days
                                                ago</span>
                                            <h3 class="timeline-header font-weight-normal"><span
                                                    class="font-weight-bolder">Mina Lee</span>
                                                uploaded new photos</h3>
                                            <div class="timeline-body">
                                                <div class="row p-2">
                                                    <div class="col-3 border p-2 position-relative">
                                                        <img class="w-100 h-100"
                                                            style="object-fit: cover; cursor: pointer; max-height: 300px;"
                                                            src="{{ asset('assets/images/construction.jpg') }}"
                                                            alt="..." data-toggle="modal"
                                                            data-target="#imageModal"
                                                            data-image="{{ asset('assets/images/construction.jpg') }}">
                                                    </div>
                                                    <div class="col-3 border p-2 position-relative">
                                                        <img class="w-100 h-100"
                                                            style="object-fit: cover; cursor: pointer; max-height: 300px;"
                                                            src="{{ asset('assets/images/wall painting.jpg') }}"
                                                            alt="..." data-toggle="modal"
                                                            data-target="#imageModal"
                                                            data-image="{{ asset('assets/images/wall painting.jpg') }}">
                                                    </div>
                                                    <div class="col-3 border p-2 position-relative">
                                                        <img class="w-100 h-100"
                                                            style="object-fit: cover; cursor: pointer; max-height: 300px;"
                                                            src="{{ asset('assets/images/teamsched_logo.png') }}"
                                                            alt="..." data-toggle="modal"
                                                            data-target="#imageModal"
                                                            data-image="{{ asset('assets/images/teamsched_logo.png') }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="timeline-body">
                                                <span class="font-weight-bold text-sm">Remarks:</span>
                                                <span>Done Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos
                                                    facilis mollitia.</span>
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
                    </div>
                </div>
            </div>

        </div>
    </div>


</div>

<script>
    function previewImage() {
        const file = document.getElementById('exampleInputFile').files[0];
        const preview = document.getElementById('imagePreview');
        const reader = new FileReader();

        if (file) {
            // Check if the file is an image
            if (file.type === 'image/jpeg' || file.type === 'image/png') {
                reader.onloadend = function() {
                    preview.src = reader.result;
                };
                reader.readAsDataURL(file);
            } else {
                alert('Please select a valid image file (JPG or PNG).');
                preview.src = "{{ asset('assets/images/image_placeholder.jpg') }}"; // Reset to default image
                document.getElementById('exampleInputFile').value = ''; // Clear the file input
            }
        } else {
            preview.src = "{{ asset('assets/images/image_placeholder.jpg') }}"; // Default image
        }
    }

    $(document).ready(function() {
        $('#imageModal').on('show.bs.modal', function(event) {
            var image = $(event.relatedTarget);
            var imageUrl = image.data('image');
            var modal = $(this);
            modal.find('#modalImage').attr('src', imageUrl);
        });
    });
</script>

<script></script>
