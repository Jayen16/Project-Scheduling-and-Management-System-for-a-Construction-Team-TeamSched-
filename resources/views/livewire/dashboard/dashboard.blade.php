<div>
  <div class="content-header">
      <div class="container-fluid">
          <div class="row mb-2">
              <div class="col-sm-6">
                  <h1 class="m-0">Dashboard</h1>
              </div>
          </div>
      </div>
  </div>
  <div class="px-3">
      <div class="row">
          <div class="col-lg-3 col-6">

              <div class="small-box bg-info">
                  <div class="inner">
                      <h3>{{ $totalProject }}</h3>
                      <p>Total Project</p>
                  </div>
                  <div class="icon">
                      <i class="nav-icon fas fa-folder"></i>
                  </div>
              </div>
          </div>

          <div class="col-lg-3 col-6">

              <div class="small-box bg-gray">
                  <div class="inner">
                      <h3>{{ $totalOngoingTask }}</h3>
                      <p>Ongoing Tasks</p>
                  </div>
                  <div class="icon">
                      <i class="nav-icon fas fa-tasks"></i>
                  </div>
              </div>
          </div>

          <div class="col-lg-3 col-6">

              <div class="small-box bg-success">
                  <div class="inner">
                      <h3>{{ $totalmanpower }}</h3>
                      <p>Total Manpower</p>
                  </div>
                  <div class="icon">
                      <i class="nav-icon fas fa-hammer"></i>
                  </div>
              </div>
          </div>

          <div class="col-lg-3 col-6">

              <div class="small-box bg-warning">
                  <div class="inner">
                      <h3>{{ $totalSiteSupervisor }}</h3>
                      <p>Total Site Supervisor</p>
                  </div>
                  <div class="icon">
                      <i class="nav-icon fas fa-hard-hat"></i>
                  </div>
              </div>
          </div>

      </div>
  </div>
  <div class="content-header">
      <div class="container-fluid">
          <div class="row mb-2">
              <div class="col-sm-6">
                  <h5 class="m-0">Recent Projects</h5>
              </div>
          </div>
      </div>
  </div>
  <div class="px-3">
      <div class="card">
          <div class="card-header">
              <h3 class="card-title">Projects</h3>
              <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 275px;">
                      {{-- <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
                      <div class="input-group-append">
                          <button type="submit" class="btn btn-default">
                              <i class="fas fa-search"></i>
                          </button>
                      </div> --}}
                  </div>
              </div>
          </div>

          <div class="card-body table-responsive p-0">
              <table class="table table-striped text-nowrap">
                  <thead>
                      <tr>
                          <th>#</th>
                          <th>Title</th>
                          <th>Date Started</th>
                          <th>Expected Completion Date</th>
                          <th>Progress</th>
                          <th>Percentage %</th>
                      </tr>
                  </thead>
                  <tbody>
                      @php
                          use Illuminate\Support\Str;
                            $task_count = 0;
                            $done =0;
                            $finalPercent=0;
                            $taskStatus =[];

                      @endphp


                    @if ($projects !== null && $projects->isNotEmpty())
                        @foreach ($projects as $project)
                            <tr>
                                <td class="align-middle">{{ $loop->index+1 }}</td>
                                <td class="align-middle">{{ ucwords($project->name) }}</td>
                                @php
                                list($startDateStr, $endDateStr) = explode(' - ', $project->date_range);
                            
                                $startDate = \DateTime::createFromFormat('m/d/Y', $startDateStr);
                                $endDate = \DateTime::createFromFormat('m/d/Y', $endDateStr);
                            @endphp
                            
                            <td class="align-middle">{{ $startDate->format('m/d/Y') }}</td>
                            <td class="align-middle">{{ $endDate->format('m/d/Y') }}</td>
                            

                            @php
                                $week_count = count($project->scope);
                                    foreach($project->scope as  $week){

                                    

                                        $statuses = $week->task->pluck('status')->toArray(); 

                                        $task_count += count($week->task);
                                        foreach ($statuses as $status) {
                                            if ($status == App\Enums\Status::COMPLETED->value) {
                                                $done += 1; 
                                            }
                                        }
                                    
                                        $taskStatus[] = ($done/$task_count) * 100 ; 
                                    }
                                    
                                    $add = 0;
                                    foreach($taskStatus as $status){
                                        $add +=$status;
                                    }

                                    $finalPercent = ($add/$week_count);

                            @endphp   

                                <td class="align-middle font-weight-bold">
                                    <div class="progress progress-xs">
                                        <div class="progress-bar bg-success" style="width: {{ $finalPercent }}%">
                                        </div>
                                    </div>
                                
                                <td class="font-weight-bold">{{ $finalPercent }}%</td>
                                </td>
                            </tr>

                            @php
                                $task_count = 0;
                                $done =0;
                                $finalPercent=0;
                                $taskStatus =[]
                            @endphp
                        @endforeach

                    @endif

                    @if ($projects === null || $projects->isEmpty())
                        <tr>
                            <td colspan="6" class='text-center'> No Available Project</td>
                        </tr>
                    @endif
                  </tbody>
              </table>

          </div>
      </div>
  </div>

</div>