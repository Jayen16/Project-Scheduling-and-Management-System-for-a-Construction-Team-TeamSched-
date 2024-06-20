<div>
    <div id="accordion">
        <div class="card card-secondary">
            <div class="card-header">
                <h4 class="card-title w-100">
                    <a class="d-block w-100 collapsed" data-toggle="collapse" href="#collapseOne" aria-expanded="false">
                        {{ ucwords($project->name) }}
                    </a>
                </h4>
            </div>

            @php
                $lastDate = null;
            @endphp

            <div id="collapseOne" class="collapse show" data-parent="#accordion" style="">

                @php
                    $groupedAttendances = $project->attendance->groupBy(function ($item) {
                        return $item->created_at->format('M d, Y');
                    });

                @endphp
                @foreach ($groupedAttendances as $date => $attendances)
                    <div class="card-body">
                        <div class="card-body table-responsive p-0" style="max-height: 200px; overflow-y: auto;">
                            <b>{{ $date }}</b>


                        </div>
                        <div class="table-responsive">
                            <table class="table table-head-fixed text-nowrap">
                                <thead>
                                    <tr>
                                        <th style="width: 10%">#</th>
                                        <th style="width: 30%">Name</th>
                                        <th class="text-center" style="width: 20%">Time-in</th>
                                        <th class="text-center" style="width: 20%">Time-out</th>
                                        <th class="text-center" style="width: 20%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($attendances as $attendance)
                                        {{-- @php
                                            $getDetail = App\Models\Employee::where(
                                                'id',
                                                $attendance->employee_id,
                                            )->first();

                                            // dd($getDetail);
                                            $name = $query->firstName . ' ' . ($query->lastName ?? '');
                                        @endphp --}}
                                        <tr>
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td>{{ $attendance->employee->firstName . ' ' . $attendance->employee->middleName . ' ' . $attendance->employee->lastName ?? '-' }}
                                            </td>
                                            <td class="text-center">{{ $attendance->time_in ?? '-' }}</td>
                                            <td class="text-center">{{ $attendance->time_out ?? '-' }}</td>
                                            <td class="text-center">
                                                @if ($attendance->employee->id !== auth()->user()->id && $attendance->status == 0)
                                                    <button wire:click="confirmAttendance({{ $attendance->id }})"
                                                        type="button" class="btn btn-primary">
                                                        Confirm
                                                    </button>
                                                @elseif($attendance->status == 1)
                                                    Confirmed
                                                @else
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                @endforeach

                @if ($project->attendance->isEmpty())
                    <div class="card-body text-center">
                        <p>No Attendance Yet</p>
                    </div>
                @endif

            </div>
        </div>
    </div>
</div>
