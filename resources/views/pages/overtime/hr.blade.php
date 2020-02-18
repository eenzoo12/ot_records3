@extends('layouts.app')

@section('js')
    <script src="{{ asset('js\hr.js') }}" defer></script>
@endsection

@section('content')
<body class="body">
<div class="container1">
    <div class="card text-middle">
        <div class="card-header">
            <div class="row" style="margin: 20px 0px;">
                <div class="col-md">
                    @if(Auth::user()->position_id==1 || Auth::user()->position_id==2 || Auth::user()->position_id==3 || Auth::user()->position_id==4)
                        <h1 style="text-align: center;"> Human Resources </h1>
                    @else
                        <h1 style="text-align: center;"> {{ Auth::user()->position->name }} </h1>
                    @endif 
                </div> 
            </div>
        </div>
        <div class="card-body">
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#allreq-tab" role="tab">𝐀𝐥𝐥 𝐑𝐞𝐪𝐮𝐞𝐬𝐭</a>
                </li>
                {{-- <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#pending-tab" role="tab">𝐏𝐞𝐧𝐝𝐢𝐧𝐠</a>
                </li> --}}

            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="allreq-tab" role="tabpanel">
                    @include('pages.hr.allreqTab')
                </div>
                {{-- <div class="tab-pane" id="pending-tab" role="tabpanel">
                        
                        @include('pages.hr.pendingTab')
                </div> --}}
            </div>
        </div>
    </div>
</div>
</body>

    <footer style="position:absolute; width:100%;">
        @include('includes.footer')
    </footer>


@endsection

