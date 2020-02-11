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
                <th>SUPERVISOR</th>
                <th>MANAGER</th>
                <th>DATE OF APPROVAL</th>
            </tr>
        </thead>
        <tbody>
            @if(Auth::user()->position_id==5 || Auth::user()->position_id==6 || Auth::user()->position_id==7 || Auth::user()->position_id==8 )
                @isset($reports)
                @if ($reports->count() > 0)
                    @foreach ($reports as $report)
                        <tr>
                            @if($report->first_process=='Approved' && $report->second_process=='Approved')
                                <td style="border-left: 12px solid #00b33c;">{{$report->name}}</td>
                            @elseif($report->first_process=='Declined' || $report->second_process=='Declined')
                                <td style="border-left: 12px solid #ff3333;">{{$report->name}}</td>
                            @else
                                <td style="border-left: 12px solid #00ace6;;">{{$report->name}}</td>
                            @endif
                                <td>{{$report->department->name}}</td>
                                <td>{{$report->date}}</td>
                                <td>{{$report->shift->name}}</td>
                                <td>{{$report->time_from}}</td>
                                <td>{{$report->time_to}}</td>
                                <td>{{$report->time_hrs}}</td>
                                <td>{{$report->job_content}}</td>
                                <td>{{$report->results}}</td>
                                <td>{{$report->first_process}}</td>
                                <td>{{$report->second_process}}</td>
                            @if($report->first_process == "Approved" && $report->second_process == "Approved")
                                <td>{{$report->updated_at}}</td>
                            @elseif($report->first_process == "Declined" || $report->second_process == "Declined")
                                <td>{{$report->updated_at}}</td>  
                            @else
                                <td></td>      
                            @endif
                        </tr>
                        
                    @endforeach
                @else
                    <tr>
                        <td colspan="12">-- NO DATA TO BE FOUND --</td>
                    </tr>
                @endif
                @else
                    <tr>
                        <td colspan="12">-- NO DATA TO BE DISPLAY --</td>
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
<div class="row">
    <div class="col-md">
        @isset($reports)
            {{-- {{ $employees->appends(request()->query())->links() }} --}}
            {!! $reports->appends(\Request::except('page'))->render() !!}
            {{-- Input::except(array('page')) --}}
        @endisset                        
    </div>    
</div>
