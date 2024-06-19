<div>
    <style id="ganttChartStyles">
        #ganttChartTable {
            border-collapse: collapse;
            width: 100%;
        }

        #ganttChartTable th,
        #ganttChartTable td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }

        #ganttChartTable th {
            background-color: #f2f2f2;
        }

        #ganttChartTable .task {
            background-color: #faffdb;
        }

        #ganttChartTable .scope-of-work {
            text-align: left;
            background-color: #ffe499;
            font-weight: bold;
        }

        #ganttChartTable .upload {
            background-color: #669cff;
            /* Red color for upload */
        }
    </style>
    
    @php
        list($startDateStr, $endDateStr) = explode(' - ', $project->date_range);

        $dateRangeStart = \Carbon\Carbon::createFromFormat('m/d/Y', $startDateStr)->startOfDay();
        $dateRangeEnd = \Carbon\Carbon::createFromFormat('m/d/Y', $endDateStr)->endOfDay();
    @endphp
    
    <div class="font-weight-normal">
        <p>Start Date: <span class="font-weight-bold">{{ $dateRangeStart->format('M d, Y') }}</span></p>
        <p>Completion Date: <span class="font-weight-bold">{{ $dateRangeEnd->format('M d, Y') }}</span></p>
    </div>

 

    <input type="hidden" value="{{ $dateRangeStart }}" id="startdate">
    <input type="hidden" value="{{ $dateRangeEnd }}" id="enddate">


    <table id="ganttChartTable" class="gantt-chart-table">
        <tr>
            <th></th>
            <!-- Dynamic week generation -->
            <script>

                var startdateValue = document.getElementById('startdate').value;
                var enddateValue = document.getElementById('enddate').value;

                const daysOfWeek = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];

                function generateWeek(startDate, endDate) {
                    let currentDate = new Date(startDate);
                    let week = [];
                    while (currentDate <= endDate) {
                        week.push(new Date(currentDate));
                        currentDate.setDate(currentDate.getDate() + 1);
                    }
                    return week;
                }

                const startDate = new Date(startdateValue); // Example start date
                const endDate = new Date(enddateValue); // Example end date

                const week = generateWeek(startDate, endDate);

                week.forEach(date => {
                    document.write(`<th>${daysOfWeek[date.getDay()]} ${date.getDate()}</th>`);
                });
            </script>
        </tr>
    </table>


    <script>
          
        const listOfTask = {!! json_encode($listofTask) !!};

        const scopesOfWork = listOfTask;


        // const scopesOfWork = [{
        //         name: 'Name ng Week dito or Scope',
        //         tasks: [{
        //                 name: 'name ng task',
        //                 start: startDate,
        //                 end: endDate,
        //                 uploads: [0,2] // Days with uploads for Task 1
        //             },
        //             {
        //                 name: 'Task 2',
        //                 start: startDate,
        //                 end: endDate,
        //                 uploads: [1] // Days with uploads for Task 2
        //             }
        //         ]
        //     },
        // ];
        const table = document.getElementById('ganttChartTable');

        // Create scope of work rows
        scopesOfWork.forEach(scopeOfWork => {
            const scopeOfWorkRow = document.createElement('tr');
            const scopeOfWorkNameCell = document.createElement('td');
            scopeOfWorkNameCell.textContent = scopeOfWork.name;
            scopeOfWorkNameCell.className = 'scope-of-work';
            scopeOfWorkNameCell.setAttribute('colspan', week.length + 1); // Span the full row
            scopeOfWorkRow.appendChild(scopeOfWorkNameCell);
            table.appendChild(scopeOfWorkRow);

            // Create task rows for each scope of work
            scopeOfWork.tasks.forEach(task => {
                const taskRow = document.createElement('tr');
                const taskNameCell = document.createElement('td');
                taskNameCell.textContent = task.name;
                taskNameCell.className = 'task';
                taskRow.appendChild(taskNameCell);
                table.appendChild(taskRow);

                // Fill task cells based on start and end dates
                week.forEach((date, index) => {
                    const cell = document.createElement('td');
                    if (task.uploads.includes(index + 1)) {
                        cell.classList.add('upload');
                    }
                    taskRow.appendChild(cell);
                });
            });
        });
    </script>
</div>