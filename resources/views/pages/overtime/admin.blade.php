
@extends('layouts.app')
    
@section('js')
    <script src="{{ asset('js\usr.js') }}" defer></script>
@endsection

@section('content')

<body class="body">
    <div class="container1">
        <div class="card text-middle">
            <div class="card-header">
                <div class="row" style="margin: 20px 0px;">
                    <div class="col-md-4">
                         @if(Auth::user()->position_id==1)
                         <h1 class="kreep">
                            <button style="width:150px; height:40px;" class="btn btn-success" data-toggle="modal" data-target="#regModal">REGISTER</button>
                         </h1>
                         @endif 
                    </div>
                    <div class="col-md-3">
                        <h1 style="text-align:center;"> ADMIN </h1>    
                    </div> <div class="col-md-2"></div>
                    <div class="col-md-3">
                        <form id="searchNForm" method="POST">
                        {{ csrf_field() }}                        
                            <div class="input-group">
                                <input type="search" class="form-control" name="searchtxt"
                                    placeholder="Search name here.." > <span class="input-group-btn"></span>
                                <button type="submit" id="sn-search-button" style="
                                height: calc(1.6em + 0.75rem + 2px);"><i class="fa fa-search"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div id="adminTable">
                     {{-- FUNCTION IN JS HAS AUTO RELOAD --}}
                    {{-- @include('includes.table.adminTbl') --}}
                </div>
            </div>
            </div>

        {{-- Register Modal--}}
         <div class="modal modal-primary fade" id="regModal" tabindex="-1" data-backdrop="false" role="dialog" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        
                        <div class="modal-header">
                            <h5 style="margin-left:0.83em; margin-top:0.3em; font-size: 1.5em; font-weight: bold;">Register Account</h5>
                            <button type="button" name="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form id="addUserForm"  method="POST" action="{{ url('registerUser') }}">
                            @csrf
                        <div class="modal-body">
                            @include('includes.regform') 
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" id="registerBtn" class="btn btn-primary">Save Data</button>
                        </div>
                        </form>
                
                    </div>
                </div>
            </div>             
            {{-- End of Registration --}}


            {{-- Editing content--}}

            <div class="modal modal-primary fade" id="editModal" tabindex="-1" data-backdrop="false" role="dialog" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            
                            <div class="modal-header">
                                <h5 style="margin-left:0.83em; margin-top:0.3em; font-size: 1.5em; font-weight: bold;">Edit Employee Data</h5>
                                <button type="button" name="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <form id="editUserForm" action="{{route('employees.update','test')}}" method="post">
                                    {{csrf_field()}}
                                    {{method_field('patch')}}
                            <div class="modal-body">
                                @include('includes.editform')
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" id="editUserBtn" class="btn btn-primary">Save changes</button>
                            </div>
                            </form>
                        
                        </div>
                    </div>
                </div>    
                
            {{--End of editing --}}
            
            {{--Start of deleting--}}

            <div class="modal modal-danger fade" id="deleteModal" data-backdrop="false" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            
                            <div class="modal-header">
                                <h5 style="margin-left:0.83em; margin-top:0.3em; font-size: 1.5em; font-weight: bold;">Delete Confirmation</h5>
                                <button type="button" name="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <form id="deleteUserForm" action="{{route('employees.destroy','test')}}" method="post">
                                    {{csrf_field()}}
                                    {{method_field('delete')}}
                            <div class="modal-body">
                                    <input type="hidden" name="employee_id" id="emp_id" value="">
                                    <p class="text-left"> Are you sure you want to delete this record?
                                    </p>
                                    
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-success" data-dismiss="modal">No, Cancel</button>
                                <button type="submit" id="deleteUserBtn" class="btn btn-danger">Yes, Delete</button>
                            </div>
                            </form>
                    </div>
                    </div>
                </div>
            {{--End of deleting--}}


        </div>


</body>
    <footer style="position:absolute; width:100%;">
        @include('includes.footer')
    </footer>
    
@endsection