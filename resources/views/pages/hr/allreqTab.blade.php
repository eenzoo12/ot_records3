

<br>

<ul class="nav nav-justified" style="width:110%; justify-content:right;">
    <li class="nav-item">
        <form action="" method="get">
            <div class="input-group">
                <div data-v-29a3ebe0="" id="" class="input-group-text">FROM :</div>
                <input type="date" name="otfrom" id="otfrom" value="2020-01-01" class="form-control">
                <div data-v-29a3ebe0="" id="" class="input-group-text">TO :</div>
                <input type="date" name="otto" id="otto" value="2020-01-15" class="form-control">
                <select name="shift" id="shift" class="form-control">Selected
                    <option value="" selected="selected" disabled>Shift Schedule &nbsp;</option> 
                    <option value="1">DAY</option> 
                    <option value="2">NIGHT</option>
                </select>
                <button type="button" id="date-search-button">Go</button>
            </div>
        </form>
    
    <li class="nav-item" style="width:30%;">
        <form action="{{url('allrequest')}}" method="GET" style=" text-align:center">                        
            <input type="search" name="search" placeholder="Search name here.." style="width:40%;
            height: calc(1.6em + 0.75rem + 2px); ">
            <button type="button" id="sn-search-button" style="width:6%;
            height: calc(1.6em + 0.75rem + 2px);"><i class="fa fa-search"></i></button>
        </form>
    </li>
</ul>
<br>
<div style="overflow-x:auto;">
<table id="mytable" class="table table-bordred table-striped" style="width:120%;">  
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
            <th>DATE APPROVED</th>
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
                        <td>{{$report->updated_at}}</td>
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