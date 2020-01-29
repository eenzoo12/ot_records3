@extends('layouts.app')

@section('js')
    <script src="{{ asset('js\overall.js') }}" defer></script>
@endsection

@section('content')

<body class="body">
    <div class="container1">
        <div class="card text-middle">
            <div class="card-header">
                <div class="row" style="margin: 20px 0px;">
                    <div class="col-md-9">
                        <h1 style="text-align:center;">MANAGER</h1>
                    </div> 
                    <div class="col-md-3">
                        <form action="{{url('search')}}" method="GET" style=" text-align:center">
                        {{csrf_field()}}
                            <input type="search" name="search" placeholder="Search name here.." style="width: 80%;
                            height: calc(1.6em + 0.75rem + 2px); ">
                            <button type="submit" style="width:12%;
                            height: calc(1.6em + 0.75rem + 2px); "><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <br>
                <div class="row">
                        <div class="col-md-9 ">
                            <h3 style="margin-left:10%;">TO BE APPROVE</h3>
                        </div>
                        <div class="col-md-3">
                            <h1 class="kreep" style="margin-right:2%">
                                <button type="button" id="bulk_approve2" class="btn btn-success btn-xs "><i class="fa fa-check"></i>&nbsp; APPROVE</button>
                            </h1>
                            <h1 class="wiggle">   
                                <button type="button" id="bulk_decline2" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i>&nbsp; DECLINE</button> 
                            </h1>
                        </div>
                    </div>
                <br>
                <div style="overflow-x:auto;">
                    <table id="mytable" class="table table-bordred table-striped" >  
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
                                        @if($report->first_process == "Approved" && $report->second_process == "")

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

                                        @endif

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
            </div>
            
            </div>

        </div>
        
</body>

    <footer style="position:absolute; width:100%;">
        @include('includes.footer')
    </footer>

@endsection

















































