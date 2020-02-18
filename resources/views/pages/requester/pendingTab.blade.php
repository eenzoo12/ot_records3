   <br> 
    <div class="row mb-1">
        <div class="col-md">
            <div class="table-responsive-lg w-100 text-nowrap" style='min-height: 400px;overflow:auto'>
                <table id="mytable" class="table table-bordred table-striped" style="width:110%;">  
                    <thead>
                        <tr>
                            <th>NAME</th>
                            <th>DEPARTMENT</th>
                            <th>OT_DATE</th>
                            <th>SHIFT</th>
                            <th>FROM</th>
                            <th>TO</th>
                            <th>TOTAL HRS</th>
                            <th>JOB CONTENT</th>
                            <th>RESULTS</th>
                            <th>SUPERVISOR</th>
                            <th>MANAGER</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(Auth::user()->position_id==4)
                            @isset($reports)
                            @if ($reports->count() > 0)
                                
                                    @foreach ($reports as $report)
                                        <tr>
                                            <td>{{$report->name}}</td>
                                            <td>{{$report->department->name}}</td>
                                            <td>{{$report->date}}</td>
                                            <td>{{$report->shift->name}}</td>
                                            <td>{{$report->time_from}}</td>
                                            <td>{{$report->time_to}}</td>
                                            <td>{{$report->time_hrs}}</td>
                                            <td>{{$report->job_content}}</td>
                                            <td>{{$report->results}}</td>
                                            <td>{{$report->first_process}}</td>
                                            <td>{{$report->second_process}}</td>
                                        </tr>
                                    @endforeach
                                
                            @else
                                <tr>
                                    <td colspan="11">-- NO DATA TO DISPLAY --</td>
                                </tr>
                            @endif 
                        @else
                            <tr>
                                <td colspan="11">-- NO DATA TO DISPLAY --</td>
                            </tr>
                        @endisset

                        @else
                            <tr>
                                <td colspan="11">-- NOT PERMITTED TO DISPLAY --</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md">
            @isset($reports)
                {{-- {{ $employees->appends(request()->query())->links() }} --}}
                {!! $reports->appends(\Request::except('page'))->render() !!}
                {{-- Input::except(array('page')) --}}
            @endisset                        
        </div>    
    </div>





{{-- <script type="text/javascript">
    $( document ).ready(function() {
        $( document ).on( "keyup",'#search_data', function() {
           var results;
           var search_data = $(this).val();
           if(search_data != ""){
    
            $.ajax(
              {
               type: "POST",
               url: 'testdata.php',
               data: {search: search_data},
               dataType: 'json',
               success: function(response){
                if(response.status=="success"){
                 results+= "<div class='table-responsive'>";
                 results+= "<table  class='table table-bordered table-striped'>";
                 results+=  "<tr>" +
                            "<th>Employee Name</th>" +
                            "<th>Email</th>" +
                            "<th>Message</th>" +
                            "<th>Date</th>" +
                            "</tr>";
                $.each(response.data, function(key,data) {
                     results+='<tr><td>'+data.employee+'</td><td>'+data.email+'</td><td>'+data.message+'</td><td>'+data.date+'</td></tr>';
                });
                results+= "</table>";
                results+= "</div>";
                $(".container").html(results);
              }else{
                $(".container").html('No Result Found');
              }
    
               }
            });
    
           }else{
            $(".container").html('');
           }
    
        });
    });
    </script> --}}





