@extends('layouts.app')

@section('js')
    <script src="{{ asset('js\apr.js') }}" defer></script>
@endsection

@section('content')
<body class="body">
    <div class="container1">
        <div class="card text-middle">
            <div class="card-header">
                <div class="row" style="margin: 20px 0px;">
                    <div class="col-md-9">
                        <h1 style="text-align:center;">Supervisor</h1>
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
                            <button type="button" id="bulk_approve1" class="btn btn-app1 btn-success btn-xs "><i class="fa fa-check"></i>&nbsp; APPROVE</button>
                        </h1>
                        <h1 class="wiggle">   
                            <button type="button" id="bulk_decline1" class="btn btn-decl1 btn-danger btn-xs"><i class="fa fa-trash"></i>&nbsp; DECLINE</button> 
                        </h1>
                    </div>
                </div>
                <br>
                <div id="supervisorTable">
                    {{-- // TABLE DIRECT JS SUPERVISOR --}}
                </div>
            </div>
            
            </div>

        </div>
        
</body>

    <footer style="position:absolute; width:100%;">
        @include('includes.footer')
    </footer>



@endsection

















































