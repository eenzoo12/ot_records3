function LoadSvisorTbl(search, url = 'svr'){
    $.ajax({
      url: url,
      type:'get',
      data: {
          
      },
      success: function (data) {
          $('#supervisorTable').html(data); 
      }
  });

}
function LoadMgrTbl(search, url = 'mgr'){
    $.ajax({
      url: url,
      type:'get',
      data: {
          
      },
      success: function (data) {
          $('#managerTable').html(data); 
      }
  });
}
LoadSvisorTbl();
LoadMgrTbl();


  
$(document).ready(function(){
        
        //     For Selecting Multiple Rows
        /* $("#checkall").change(function(){
            $('.checkitem').prop("checked", $(this).prop("checked"))
            
        }); */
        /* $(".checkitem").change(function(){
            if($(this).prop("checked")==false){
                $("#checkall").prop("checked", false)
            }
            if($(".checkitem:checked").length == $(".checkitem").length){
                $("#checkall").prop('checked', true)
            } 
        }); */

        // For Selecting Multiple Rows Dedicated only for Table-Div
        $('#supervisorTable').on('change', "#checkall", function(){
            $('.checkitem').prop("checked", $(this).prop("checked"))
            
        });
        $('#supervisorTable').on('change', ".checkitem", function(){
            if($(this).prop("checked")==false){
                $("#checkall").prop("checked", false)
            }
            if($(".checkitem:checked").length == $(".checkitem").length){
                $("#checkall").prop('checked', true)
            }            
        });

        $('#managerTable').on('change', "#checkall", function(){
            $('.checkitem').prop("checked", $(this).prop("checked"))
            
        });
        $('#managerTable').on('change', ".checkitem", function(){
            if($(this).prop("checked")==false){
                $("#checkall").prop("checked", false)
            }
            if($(".checkitem:checked").length == $(".checkitem").length){
                $("#checkall").prop('checked', true)
            }            
        });

        // END For Selecting Multiple Rows Dedicated only for Table-Div
        
        //   FOR APPROVING BY SUPERVISOR

        $("#bulk_approve1").click(function(){
            if(confirm("Are you sure you want to approve?")){
                var id = [];
                //    Getting each data id
                $('.checkitem').each(function(){
                    if($(this).is(":checked")){
                        id.push($(this).val());
                    }
                });
                //    Checking each data  
                   
                //     For verifying check item
                if(id.length == 0)
                {
                    alert ("Please Select atleast one checkbox ");
                }
                else{
                    alert ("You're about to approve " + id.length + " item");
                    $.ajax({
                        url: "approve1",
                        method:"POST",
                        data: {
                            'id' : id,
                            '_token': $('meta[name="csrf-token"]').attr('content')
                        },
                        success:function(data){
                            LoadSvisorTbl();
                            if (data == 'success') {
                                iziToast.success({
                                    title: 'Success',
                                    position: 'topCenter',
                                    message: 'Request Approved!'
                                });
                            }
                        }
                        
                        
                    });
                }
            }
        });


        //   FOR DECLINING BY SUPERVISOR

        $("#bulk_decline1").click(function(){
            if(confirm("Are you sure you want to decline?")){
                var id = [];
                //    Getting each data id
                $('.checkitem').each(function(){
                    if($(this).is(":checked")){
                        id.push($(this).val());
                    }
                });
                //    Checking each data  
                
                //     For verifying check item
                if(id.length == 0)
                {
                    alert ("Please Select atleast one checkbox ");
                }
                else{
                    alert ("You're about to decline " + id.length + " item");   
                    $.ajax({
                        url: "decline1",
                        method:"POST",
                        data: {
                            'id' : id,
                            '_token': $('meta[name="csrf-token"]').attr('content')
                        },
                        success:function(data){ 
                            LoadSvisorTbl();
                            if (data == 'success') {
                                iziToast.success({
                                    title: 'Declined',
                                    position: 'topCenter',
                                    message: 'Request Decline!',
                                    color: 'red',
                                });
                                }
                                
                        }
                    });
                }
            }
        });



        //   FOR APPROVING BY MANAGER

        $("#bulk_approve2").click(function(){
            if(confirm("Are you sure you want to approve?")){
                var id = [];
                //    Getting each data id
                $('.checkitem').each(function(){
                    if($(this).is(":checked")){
                        id.push($(this).val());
                    }
                });
                //    Checking each data  
                   
                //     For verifying check item
                if(id.length == 0)
                {
                    alert ("Please Select atleast one checkbox ");
                }
                else{
                    alert ("You're about to approve " + id.length + " item");
                    $.ajax({
                        url: "approve2",
                        method:"POST",
                        data: {
                            'id' : id,
                            '_token': $('meta[name="csrf-token"]').attr('content')
                        },
                        success:function(data){
                            for(var i=0; i<id.length; i++)
                                {
                                    $('tr#' + id[i] + '' ).css('background-color', '#ccc');
                                    $('tr#' + id[i] + '' ).fadeOut('slow');
                                }
                                if (data == 'success') {
                                    LoadMgrTbl();
                                        iziToast.success({
                                          title: 'Success',
                                          position: 'topCenter',
                                          message: 'Request Approved!'
                                        });
                                      }
                        }
                    })
                }
            }
        });


        //   FOR DECLINING BY MANAGER

        $("#bulk_decline2").click(function(){
            if(confirm("Are you sure you want to decline?")){
                var id = [];
                //    Getting each data id
                $('.checkitem').each(function(){
                    if($(this).is(":checked")){
                        id.push($(this).val());
                    }
                });
                //    Checking each data  
                
                //     For verifying check item
                if(id.length == 0)
                {
                    alert ("Please Select atleast one checkbox ");
                }
                else{
                    alert ("You're about to decline " + id.length + " item");   
                    $.ajax({
                        url: "decline2",
                        method:"POST",
                        data: {
                            'id' : id,
                            '_token': $('meta[name="csrf-token"]').attr('content')
                        },
                        success:function(data){
                            LoadMgrTbl();
                            for(var i=0; i<id.length; i++)
                                {
                                    $('tr#' + id[i] + '' ).css('background-color', '#ccc');
                                    $('tr#' + id[i] + '' ).fadeOut('slow');
                                }
                                if (data == 'success') {
                                    iziToast.success({
                                        title: 'Declined',
                                        position: 'topCenter',
                                        message: 'Request Decline!',
                                        color: 'red',
                                    });
                                    }
                                    
                        }
                    })
                }
            }
        });

    

});

$('#managerTable').on('click', '.page-link', function(e){
    e.preventDefault();
    LoadMgrTbl('',$(this).attr('href'));
});
$('#supervisorTable').on('click', '.page-link', function(e){
    e.preventDefault();
    LoadSvisorTbl('',$(this).attr('href'));
});

        
    