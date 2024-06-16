<div>

    <div>
        {{-- FOREACH --}}
        @php
            $processedDates = [];
        @endphp
    
        @if(count($tasks_progress) > 0)
        <div class="timeline">

            @foreach ($tasks_progress as $progress)
                @php
                    $currentDate = $progress->created_at->format('Y-m-d');
                @endphp
                        {{-- start of timeline upload --}}
                        {{-- @if ($loop->first) --}}
                        @if (!in_array($currentDate, $processedDates))
                            @php
                                $processedDates[] = $currentDate;
                            @endphp

                            <div class="time-label">
                                <span class="bg-green">{{ \Carbon\Carbon::parse($progress->created_at)->format('d M. Y') }}</span>
                            </div>
                        @endif

                        <div>
                            <i class="fa fa-camera bg-purple"></i>
                            <div class="timeline-item">
                                <span class="time"><span class="text-sm text-left mr-2"> {{ \Carbon\Carbon::parse($progress->created_at)->format('g:i a') }}
                                        •</span><i class="fas fa-clock"></i> {{ \Carbon\Carbon::parse($progress->created_at)->diffForHumans() }}</span>
                                <h3 class="timeline-header font-weight-normal"><span
                                        class="font-weight-bolder"></span>
                                    uploaded new photo</h3>
                                <div class="timeline-body">
                                    <div class="row p-2">
                                        <div class="col-3 border p-2 position-relative">
                                            @if ($progress->upload)
                                                <img class="w-100 h-100"
                                                    style="object-fit: cover; cursor: pointer; max-height: 300px;"
                                                    src="{{ asset('storage/'. $progress->upload) }}"
                                                    alt="..." data-toggle="modal"
                                                    data-target="#imageModal"
                                                    data-image="{{ asset('storage/'. $progress->upload) }}">  
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="timeline-body">
                                    <span class="font-weight-bold text-sm">Remarks:</span>
                                    <span>{{ $progress->remarks }}</span>
                                </div>
                            </div>
                        </div>

                        @if (in_array($currentDate, $processedDates) && $loop->last)


                            @if($task_status !== App\Enums\Status::COMPLETED->value)
                                <div class="my-lg-2">
                                    <span class="badge text-md rounded-pill bg-light border border-width-3 p-2">On going</span>
                                </div>

                            @else

                            <div class="my-lg-2">
                                <span class="badge text-md rounded-pill bg-light border border-width-3 p-2 bg-green">Completed</span>
                            </div>

                                {{-- <div>
                                    <i class="fas fa-check bg-gray"></i>
                                </div> --}}
                            @endif
                        @endif

                        {{-- end of timeline upload --}}
                        {{-- @if ($loop->last)
                            <div>
                                <i class="fas fa-clock bg-gray"></i>
                                <i class="fas fa-check bg-gray"></i>
                            </div>
                        @endif --}}

            @endforeach
            </div>
    
        @else
            <p class="text-center"> No Progress Yet</p>
        @endif
        {{-- FOREACH --}}
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

