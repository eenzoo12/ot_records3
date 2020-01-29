@extends('layouts.app')

@section('js')
    <script src="{{ asset('js\custom.js') }}" defer></script>
@endsection

@section('content')

<body class="body">
    <div class="container1">
    <div class="card text-middle">
        <div class="card-header">
            <div class="row" style="margin: 20px 0px;">
                <div class="col-md">
                        <h1 style="text-align:center;"> REQUESTER </h1>
                </div>
            </div>
        </div>
        <div class="card-body">
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#req-tab" role="tab">𝐑𝐞𝐪𝐮𝐞𝐬𝐭</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#pend-tab" role="tab">𝐏𝐞𝐧𝐝𝐢𝐧𝐠</a>
                </li>

            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="req-tab" role="tabpanel">
                        @include('pages.supervisor.requestTab')
                </div>
                <div class="tab-pane" id="pend-tab" role="tabpanel">
                        @include('pages.supervisor.pendingTab')
                </div>
            </div>
           
        </div>
    </div>
</div>
    
</body>

    <footer style="position:absolute; width:100%;">
        @include('includes.footer')
    </footer>

@endsection