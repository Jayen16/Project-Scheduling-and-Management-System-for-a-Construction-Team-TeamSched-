<div>
    <div id="accordion">
        <div class="card card-secondary">
            <div class="card-header">
                <h4 class="card-title w-100">
                    <a class="d-block w-100 collapsed" data-toggle="collapse" href="#collapseOne" aria-expanded="false">
                        {{-- {{ ucwords($project->name) }} --}}
                        {{ ucwords($project->name) }}
                    </a>
                </h4>
            </div>
            <div id="collapseOne" class="collapse" data-parent="#accordion" style="">
                @php
                    $lastDate = null;
                    $counter = 0;
                    $getAttendance = $project
                        ->attendance()
                        ->where('employee_id', auth()->user()->id)
                        ->get();

                @endphp

                <table class="table table-head-fixed text-nowrap">
                    <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Date</th>
                            <th>Name</th>
                            <th class="text-center">Time-in</th>
                            <th class="text-center">Time-out</th>
                        </tr>
                    </thead>
                    <tbody>

                        @if ($getAttendance !== null && $getAttendance->isNotEmpty())
                            @foreach ($getAttendance as $attendance)
                                @if ($lastDate !== $attendance->created_at->format('M d, Y'))
                          
                                    @php
                                        $lastDate = $attendance->created_at->format('M d, Y');
                                        $counter = 0;
                                    @endphp
                                  
                                @endif
                                @php
                                    $counter++; 
                                @endphp

                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $attendance->created_at->format('M d, Y') }}</td>
                                    <td>{{ $attendance->employee->firstName . ' ' . $attendance->employee->middleName . ' ' . $attendance->employee->lastName ?? '-' }}
                                    </td>
                                    <td class="text-center">{{ $attendance->time_in ?? '-' }}</td>
                                    <td class="text-center">{{ $attendance->time_out ?? '-' }}</td>
                                </tr>
                                
                            @endforeach
                        @else
                            <div class="card-body text-center">
                                <p>No Attendance Yet</p>
                            </div>
                        @endif
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>
