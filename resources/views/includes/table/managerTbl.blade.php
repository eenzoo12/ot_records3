
<div style="overflow-x:auto;">
    <table id="mytable" class="table table-bordred table-striped" style="width:105%;">  
        <thead>
        <tr>
            <td><input type="checkbox" id="checkall"></td>
            <th>NAME</th>
            <th>DEPARTMENT</th>
            <th>OT_DATE</th>
            <th>SHIFT</th>
            <th>FROM</th>
            <th>TO</th>
            <th>TOTAL HRS</th>
            <th>JOB CONTENT</th>
            <th>RESULTS</th>
        </tr>
        </thead>
        <tbody>
            @if(Auth::user()->position_id==2)
                @isset($reports)
                @if ($reports->count() > 0)
                    @foreach ($reports as $report)

                        <tr >
                            <td><input type="checkbox" class="checkitem" value="{{$report->id }}"></td>
                            <td>{{$report->name}}</td>
                            <td>{{$report->department->name}}</td>
                            <td>{{$report->date}}</td>
                            <td>{{$report->shift->name}}</td>
                            <td>{{$report->time_from}}</td>
                            <td>{{$report->time_to}}</td>
                            <td>{{$report->time_hrs}}</td>
                            <td>{{$report->job_content}}</td>
                            <td>{{$report->results}}</td>
                        </tr>

                    @endforeach
                @else
                    <tr>
                        <td colspan="11">-- NO DATA TO DISPLAY --</td>
                    </tr>
                @endif
            @else
                <tr>
                    <td colspan="11">-- NO DATA TO DISPLAY --</td>
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
            {{-- {{ $reports->appends(request()->query())->links() }} --}}
            {!! $reports->appends(\Request::except('page'))->render() !!}
            {{-- Input::except(array('page')) --}}
        @endisset                        
    </div>    
</div>

<script>
    $("#checkall").change(function(){
        $('.checkitem').prop("checked", $(this).prop("checked"))
        
    });
    $(".checkitem").change(function(){
        if($(this).prop("checked")==false){
            $("#checkall").prop("checked", false)
        }
        if($(".checkitem:checked").length == $(".checkitem").length){
            $("#checkall").prop('checked', true)
        } 
    });
</script>
