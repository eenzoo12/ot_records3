<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

<br>
<div class="row">
    <div class="col-md-2">
        {{-- <button type="button" id="xportdta" class="btn btn-success" style="width:120px;"><i class="fa fa-file-excel-o" aria-hidden="true"></i>&nbsp; EXPORT</button> --}}
        <a href="downloadExport" class="w3-btn w3-green w3-round"><i class="fa fa-file-excel-o" aria-hidden="true"></i>&nbsp; EXPORT</a>
    </div>
    <div class="col-md-7">
        <form id="searchHrForm" action="" method="POST" >
            <div class="input-group">
                <div data-v-29a3ebe0="" id="" class="input-group-text">FROM :</div>
                <input type="date" name="otfrom" id="otfrom" value="2020-01-01" class="form-control" required>
                <div data-v-29a3ebe0="" id="" class="input-group-text">TO :</div>
                <input type="date" name="otto" id="otto" value="2020-01-15" class="form-control" required>
                <select name="shift" id="shift" class="form-control" required>Selected
                    <option value="" selected="selected" disabled>Shift Schedule &nbsp;</option> 
                    <option value="1">DAY</option> 
                    <option value="2">NIGHT</option> 
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
        {{-- @include('includes.table.hrAllreqTbl'); --}}
    </div>




    {{-- <form action="{{url('allrequest')}}" method="GET" style=" text-align:center">                        
            <input type="search" name="search" placeholder="Search name here.." style="width:40%;
            height: calc(1.6em + 0.75rem + 2px); ">
            <button type="button" id="sn-search-button" style="width:6%;
            height: calc(1.6em + 0.75rem + 2px);"><i class="fa fa-search"></i></button>
        </form> --}}