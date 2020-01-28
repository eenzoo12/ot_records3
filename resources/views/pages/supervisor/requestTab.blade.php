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
            <div class="row" style="justify-content:center;">
                <label >To Request Bulk Overtime:</label>
            </div>
        <form action="{{url('/upload')}}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="row" style="justify-content:center;">
                <div style="float:left" class="col-sm-4" >
                    <a href="{{ url('/download/template.xlsx')}}" class="btn btn-success"><i class="fa fa-download"></i> Download Template</a>
                </div>
                <div style="float:middle" class="col-sm-5">
                    <div style="border: 1px solid rgba(0, 0, 0, 0.125); padding: 5px; ">
                        <input type="file" name="excellfile">
                    </div>
                </div>
                <div style="float:right" class="col-sm-2">
                        <button type="submit" style="margin:5px 15px 0 0;"> Go </button>
                    </div>
            </div>
            </form>
        </div>
        </div>
    </div>
    <form id="requestSaveForm" action="{{ action('SupervisorController@store') }}" method="POST">
        @csrf
    <div class="row">
        <div class="col-md-4">
                <div class="form-group">
                    <label>Name: </label>
                    <input type="text" class="form-control" name="name" required>
                </div>
                <input type="hidden" name='department_id' value='{{Auth::user()->department_id}}'>
                <div class="form-group">
                    <label>Date: </label>
                    <input type="date" class="form-control" name="date" required>
                </div>
                <label>Period Covered: </label>
                <div class="row" style="margin-left:0px; margin-bottom:15px;">
                    <input type="date" class="form-control" style="width:46%;" name="periodfrom" required> &nbsp;&nbsp;
                    <input type="date" class="form-control" style="width:46%;" name="periodto" required>
                </div>
                <label>Shift Schedule:</label>
                <div class="form-group">
                    <select class="form-control" style=" height: calc(1.6em + 0.75rem + 2px); " name="shift" required>
                        <option class="hidden" seleted disabled>-- Please select Shift Schedule --</option>
                        <option value="1">Day Shift</option>
                        <option value="2">Night Shift</option>
                    </select>
                </div>
                <label>Agency:</label>
                <div class="form-group">
                    <select class="form-control" style=" height: calc(1.6em + 0.75rem + 2px); " name="agency" required>
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
                <textarea rows="5" cols="38" style="resize:none; padding:5px;" placeholder="Input text here.. " name="jcontent" required></textarea>
                <h4>Results: </h4>
                <textarea  rows="5" cols="38" style="resize:none; padding:5px; " placeholder="Input text here.. " name="results" required></textarea>
            </div>
            <div class="row justify-content-center">
                <button type="button" id="requestSubmitBtn" class="btn btn-info" style="width:8vw; margin-top:10px;">Submit</button>
            </div>
            
        </div>
        <div class="col-md-4">
            <div class="card text-center" style="margin-left:-5px; margin-top:50px;">
                <div class="card-header">
                    <h3>Actual Overtime</h3>
                </div>
                <div class="card-body">
                    <label>FROM: </label>
                        <input type="time" name="tfrom" class="form-control" style="width:100%;" value="08:00" step="900" required>
                    <label>TO: </label>
                        <input type="time" name="tto" class="form-control" style="width:100%;" value="17:00" step="900" required>
                    <label>TOTAL HRS: </label>
                        <input type="text" name="hrs" class="form-control" required>
                </div>
            </div>
        </div>
    </div>
    </form>

    @else
        <p style="text-align:center; margin:27px 0px;"> -- NOT PERMITTED TO DISPLAY --</p>

@endif