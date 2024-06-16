<div>
    {{-- <div class="my-lg-2"><span
            class="badge text-md rounded-pill bg-light border border-width-3 p-2">Timeline</span>
    </div> --}}
    <div>
        {{-- FOREACH --}}
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
                            class="font-weight-bolder"></span>
                        uploaded new photos</h3>
                    <div class="timeline-body">
                        <div class="row p-2">
                            <div class="col-3 border p-2 position-relative">
                                @if ($progress_photo)
                                    <img class="w-100 h-100"
                                    style="object-fit: cover; cursor: pointer; max-height: 300px;"
                                    src="{{ asset('storage/upload_progress/' . $progress_photo) }}"
                                    alt="..." data-toggle="modal"
                                    data-target="#imageModal"
                                    data-image="{{ asset('storage/upload_progress/' . $progress_photo) }}">  
                                @endif
                             
                            </div>
                            {{-- <div class="col-3 border p-2 position-relative">
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
                            </div> --}}
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
        {{-- FOREACH --}}
    </div>
</div>