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
                    <div class="col-md">
                        <h1 style="text-align:center;">MANAGER</h1>
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
               <div id="managerTable">
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

















































