<div>
    {{-- breadcrumbs --}}
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div>
                    <ol class="breadcrumb float-sm-right text-sm">
                        <li class="breadcrumb-item"><a href="{{ route('projects.index') }}">Projects</a></li>

                        <li class="breadcrumb-item"><a href="{{ route('project-details.index',['project'=>$task->week->project_id]) }}">Project Details</a>

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

                
                    @if($hideMarkButton !== true)
                    <li class="nav-item">
                        <a class="nav-link active" id="custom-tabs-three-home-tab" data-toggle="pill"
                            href="#custom-tabs-three-home" role="tab" aria-controls="custom-tabs-three-home"
                            aria-selected="true"
                                
                            >Progress Report</a>
                    </li>
                    @endif
                    <li class="nav-item">
                        <a class="nav-link" id="custom-tabs-three-profile-tab" data-toggle="pill"
                            href="#custom-tabs-three-profile" role="tab" aria-controls="custom-tabs-three-profile"
                           
                            @if($hideMarkButton !== true)
                                aria-selected="false"
                            @else
                                aria-selected="true"
                            @endif
                            
                            >Progress Timeline</a>

                    </li>
                </ul>
            </div>
            <div class="card-body">
                <div class="tab-content" id="custom-tabs-three-tabContent">

                    <div class="tab-pane fade {{ !$hideMarkButton ? 'active show' : '' }}" id="custom-tabs-three-home" role="tabpanel"
                        aria-labelledby="custom-tabs-three-home-tab">
                        <div class="d-flex justify-content-between px-2 align-items-end">
                            <h5 class="font-weight-bold"> {{ ucwords($task->name) }}</h5>
                            <div class="d-flex">
                                @if ($hideMarkButton !== true)
             
                                    <button data-toggle="modal" data-target="#markAsDone-{{$task->id }}" class="btn btn-sm btn-success mr-1" type="button">
                                        <i class="fas fa-check-circle mr-2"></i> Mark as done
                                    </button>

                                     <!-- Mark as Done Modal -->
                                    <div class="modal fade" id="markAsDone-{{$task->id }}" tabindex="-1" role="dialog" aria-labelledby="markAsDoneLabel={{ $task->id }}" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="markAsDoneLabel={{ $task->id }}">Mask as Done </h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    Are you sure you want to mark this as done?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                    <button wire:click='changeStatus()' data-dismiss="modal" class="btn btn-success">Confirm</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                @else
                                    <p> COMPLETED </p>
                                @endif
                           
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

                                                    @if ($upload_photo)
                                                        <img id="imagePreview" class="w-100" 
                                                         style="object-fit: cover; cursor: pointer; max-height: 300px;"
                                                        src="{{ $upload_photo->temporaryUrl() }}" class="img-fluid mt-2" style="max-width: 500;" alt="Preview Image">
                                                    @else
                                                        <img id="imagePreview" class="w-100" 
                                                            style="object-fit:cover ; cursor: pointer; max-height: 300px;"
                                                            src="{{ asset('assets/images/image_placeholder.jpg') }}" class="img-fluid mt-2" style="max-width: 500;" alt="Preview Image">
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <p class="text-center text-gray">Upload Preview</p>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">

                                                    <label for="UploadFilePhoto">Upload Image <span

                                                            class="text-danger font-weight-bolder text-md">*</span>
                                                        <span class="font-weight-light text-sm"><i>(jpg/png
                                                                only)</i></span></label>
                                                    <div class="input-group">
                                                        <div class="custom-file">

                                                            <input wire:model.live='upload_photo' type="file" class="custom-file-input" id="exampleInputFile" accept=".jpg, .jpeg, .png" required>
                                                            <label class="custom-file-label" for="exampleInputFile">{{ $upload_photo ? $upload_photo->getClientOriginalName() : 'Choose image' }}</label>

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

                                                    <textarea wire:model='remarks' style="resize: none;" class="form-control" rows="3" placeholder="Enter project description here..."

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

                                                <button wire:click='save()' type="button" class="btn w-full btn-success">

                                                    Submit
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>


                    {{-- Progress Report --}}

                  
                    <div class="tab-pane fade {{ $hideMarkButton ? 'active show' : '' }}" id="custom-tabs-three-profile" role="tabpanel"
                        aria-labelledby="custom-tabs-three-profile-tab" >
                        <livewire:component.site-supervisor.progress task="{{ $task->id }}" />
                    </div>               
                </div>
            </div>

        </div>
    </div>
</div>





