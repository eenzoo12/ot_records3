@if(Auth::user()->position_id==4)
    <div class="row" style="margin-bottom:20px;">
        <div class="col-md-3"></div>
        <div class="col-md-3">
                <div class="col-md">
                    @include('inc.message')
                </div>
        </div>
        <div class="col-md-6" >
            <div style="border: 1px solid rgba(0, 0, 0, 0.125); padding:5px; width:100%; margin-top:20px;">
                <div class="row ">
                    <div class="col-md-5" style="text-align:center;">
                        <a href="{{ url('/download/userguide.xlsx')}}"><i class="fa fa-file-excel-o" aria-hidden="true"></i> User Guide</a>
                    </div>
                    <div class="col-md-7" style="text-align:center;">
                        <label ><b>To Request Bulk Overtime:</b></label>
                    </div>
                </div>
                <div class="row" style="justify-content:center;">
                    <div style="float:left" class="col-sm-4" >
                        <a href="{{ url('/download/template.xlsx')}}" class="btn btn-success"><i class="fa fa-download"></i> Download Template</a>
                    </div>
                    {{-- Uploading Multiple Overtime Request --}}
                <form action="{{ route('importdata') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                        <div class="col-md-12" style="border: 1px solid rgba(0, 0, 0, 0.125); padding: 5px; ">
                            <input type="file" name="select_file">
                            <button type="submit" name="upload" value="Upload" style="margin:5px 15px 0 0;"> Go </button>
                        </div>
                </form>
                    {{-- End of Overtime Request --}}
                </div>
            </div>
        </div>
    </div>
    <form id="requestSaveForm" action="{{ action('RequesterController@store') }}" method="POST">
        @csrf
        
    <div class="row">
        <div class="col-md-4" style="margin-top:20px;">
                <div class="form-group">
                    <label>Name: </label>
                    <input type="text" class="form-control" name="name" required>
                </div>
                <input type="hidden" name='department_id' value='{{Auth::user()->department_id}}'>
                <div class="form-group">
                    <label>Date: </label>
                    <input type="date" class="form-control" name="date" required>
                </div>
                <label>Shift Schedule:</label>
                <div class="form-group">
                    <select class="form-control" style=" height: calc(1.6em + 0.75rem + 2px); " name="shift_sched" required>
                        <option class="hidden" seleted disabled>-- Please select Shift Schedule --</option>
                        <option value="1">Day Shift</option>
                        <option value="2">Night Shift</option>
                    </select>
                </div>
                <label>Agency:</label>
                <div class="form-group">
                    <select class="form-control" style=" height: calc(1.6em + 0.75rem + 2px); " name="agency_id" required>
                        <option class="hidden"  selected disabled>-- Select Agency --</option>
                        @foreach ($agencies as $agency)
                            <option value="{{$agency->id}}">{{$agency->name}}</option>
                        @endforeach
                    </select>
                </div>

        </div>
        <div class="col-md-4 ">
            <div class="container2">
                <h4>Job Content: </h4>
                <textarea rows="5" cols="38" style="resize:none; padding:5px;" placeholder="Input text here.. " name="job_content" required></textarea>
                <h4>Results: </h4>
                <textarea  rows="5" cols="38" style="resize:none; padding:5px; " placeholder="Input text here.. " name="results" required></textarea>
            </div>
            <div class="row justify-content-center">
                <button type="button" id="requestSubmitBtn" class="btn btn-info" style="margin-top:10px;">Submit</button>
            </div>
            
        </div>
        <div class="col-md-4">
            <div class="card text-center" style="margin-left:-5px; margin-top:20px;">
                <div class="card-header">
                    <h3>Actual Overtime</h3>
                </div>
                <div class="card-body">
                    <label>FROM: </label>
                        <input type="time" name="time_from" class="form-control" style="width:100%;" value="08:00" step="900" required>
                    <label>TO: </label>
                        <input type="time" name="time_to" class="form-control" style="width:100%;" value="17:00" step="900" required>
                    <label>TOTAL HRS: </label>
                        <input type="text" name="time_hrs" class="form-control" required>
                </div>
            </div>
        </div>
    </div>
    </form>

    @else
        <p style="text-align:center; margin:27px 0px;"> -- NOT PERMITTED TO DISPLAY --</p>

@endif