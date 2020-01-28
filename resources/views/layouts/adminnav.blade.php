<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">


    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/user.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
    <title>Document</title>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
            <div class="container">
                <div class="col-md-6"> 
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Prima Tech') }}
                    </a>
                </div>
                <div class="col-md-6" >
                    @if(Auth::user()->position_id==1)
                    <div class="col-md-9" style="text-align:right;"><button class="btn btn-success" data-toggle="modal" data-target="#regModal">REGISTER</button></div>
                    @endif
                    <div class="col-md-3" style="text-align:right;">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                            {{ Auth::user()->name }} 
                        </a>
                
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </div>
                    </div>


                    {{-- Registering content--}}

                    <div class="modal modal-primary fade" id="regModal" tabindex="-1" data-backdrop="false" role="dialog" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    
                                    <div class="modal-header">
                                        <h5 style="margin-left:0.83em; margin-top:0.3em; font-size: 1.5em; font-weight: bold;">Register Account</h5>
                                        <button type="button" name="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="{{ action('UserController@store') }}" method="POST">
                                            {{csrf_field()}}
                                    <div class="modal-body">
                                        @include('includes.regform')
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save Data</button>
                                    </div>
                                    </form>
                                
                                </div>
                            </div>
                        </div>    
                        
                    {{--End of Registering --}}
                </div>

                     
            

            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>