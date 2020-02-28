<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

<br>
<div class="row">
    <div class="col-md-2">
        @if(Auth::user()->position_id==5 || Auth::user()->position_id==6 || Auth::user()->position_id==7 || Auth::user()->position_id==8 )
        <form id="xportdta" action="{{ url('xport') }}" method="GET">
            <h1 class="kreep" style="margin-top:-10px;">
                <button type="submit" class="btn btn-success" style="width:120px;"><i class="fa fa-file-excel-o" aria-hidden="true"></i>&nbsp; EXPORT</button>
                <input type="hidden" name="otfrom" id="otfrom_x">
                <input type="hidden" name="otto" id="otto_x"> 
                <input type="hidden" name="shift" id="shift_x">
            </h1> 
        </form>  
        @endif
    </div>
    <div class="col-md-7">
        <form id="searchHrForm" action="" method="POST" >
            <div class="input-group">
                <div data-v-29a3ebe0="" id="" class="input-group-text">FROM :</div>
                <input type="date" id="otfrom_s" name="otfrom" value="2020-01-01" class="form-control" required>
                <div data-v-29a3ebe0="" id="" class="input-group-text">TO :</div>
                <input type="date" id="otto_s" name="otto" value="2020-01-15" class="form-control" required>
                <select name="shift" id="shift_s" class="form-control" required>
                    <option value="" selected="selected" disabled>Shift Schedule &nbsp;</option> 
                    <option value="1">DAY</option> 
                    <option value="2">NIGHT</option>
                    <option value="3">ALL SHIFT</option>
                </select>
                <button type="submit" id="date-search-button">Go</button>
            </div>
        </form>
    </div> 
        
    <div class="col-md-3">
        <form id="searchNForm" method="POST">
            {{ csrf_field() }}
            <div class="input-group">
                <input type="search" class="form-control" name="txtname"
                    placeholder="Search name here.." > <span class="input-group-btn"></span>
                <button type="submit" id="sn-search-button"><i class="fa fa-search"></i></button>
                </span>
            </div>
        </form>
    </div>
</div>
<br>
    <div id="HrTable">
        {{-- HR TABLE IN JS --}}
    </div>
