@extends('layouts.app')

@section('content')
<style>
.col-md-3:hover, .col-md-4:hover{
    transform: scale(1.3)
}
.col-md-3, .col-md-4{
    transition: .3s;
}
h5, h2{
    color: white;
}
</style>
<body class="body">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="row justify-content-center">
               <h2> Choose Your Profile &nbsp; 
                    <i style="color:white;" class="fa fa-pencil"></i>
                   
            </h2>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-4">
                </div>
                <div class="col-md-4 text-center">
                    <a  href="{{ url('admin') }}">
                        <img src="{{asset('images\img7.jpg')}}" alt="profile" height="80%" width="100%">
                    </a>
                    <h5>𝐀𝐃𝐌𝐈𝐍</h5>
                </div>
                <div class="col-md-4">
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-3 text-center">
                    <a href="{{ url('kmanager') }}">
                        <img src="{{asset('images\img5.png')}}" alt="profile" height="80%" width="100%">
                    </a>
                    <h5>𝐊𝐎𝐑𝐄𝐀𝐍 𝐌𝐀𝐍𝐀𝐆𝐄𝐑</h5>
                </div>
                <div class="col-md-3 text-center">
                    <a href="{{ url('manager') }}">
                        <img src="{{asset('images\img10.png')}}" alt="profile" height="80%" width="100%">
                    </a>
                    <h5>𝐌𝐀𝐍𝐀𝐆𝐄𝐑</h5>
                </div>
                <div class="col-md-3 text-center">
                    <a href="{{ url('requester') }}">
                        <img src="{{asset('images\img9.png')}}" alt="profile" height="80%" width="100%">
                    </a>
                    <h5>𝐑𝐄𝐐𝐔𝐄𝐒𝐓𝐄𝐑</h5>
                </div>
                <div class="col-md-3 text-center">
                    <a href="{{ url('hr') }}">
                        <img src="{{asset('images\img12.png')}}" alt="profile" height="80%" width="100%">
                    </a>
                    <H5>𝐇𝐑</h5>
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
