<div style="overflow-x:auto;">
<table id="mytable" class="table table-bordred table-striped" style="width:105%;">  
    <thead>
        <tr>
            <th>NAME</th>
            <th>DEPARTMENT</th>
            <th>OT_DATE</th>
            <th>SHIFT</th>
            <th>FROM</th>
            <th>TO</th>
            <th>TOTAL HRS</th>
            <th>JOB CONTENT</th>
            <th>RESULTS</th>
            <th>MANAGER</th>
            <th>KOREAN MANAGER</th>
        </tr>
    </thead>
    <tbody>
        @if(Auth::user()->position_id==5 || Auth::user()->position_id==6 || Auth::user()->position_id==7 || Auth::user()->position_id==8 )
            @isset($reports)
            @if ($reports->count() > 0)
                @foreach ($reports as $report)
                    <tr>
                        <td>{{$report->name}}</td>
                        <td>{{$report->department->name}}</td>
                        <td>{{$report->date}}</td>
                        <td>{{$report->shift_sched}}</td>
                        <td>{{$report->time_from}}</td>
                        <td>{{$report->time_to}}</td>
                        <td>{{$report->time_hrs}}</td>
                        <td>{{$report->job_content}}</td>
                        <td>{{$report->results}}</td>
                        <td>{{$report->first_process}}</td>
                        <td>{{$report->second_process}}</td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="12">NO DATA</td>
                </tr>
            @endif
            @else
                <tr>
                    <td colspan="12">NO DATA</td>
                </tr>
            @endisset

        @else
            <tr>
                <td colspan="12">-- NOT PERMITTED TO DISPLAY --</td>
            </tr>
        @endif
    </tbody>
</table>

</div>
