$(document).ready(function(){
            //     For Selecting Multiple Rows
        $("#checkall").change(function(){
            $('.checkitem').prop("checked", $(this).prop("checked"))
        });
        $(".checkitem").change(function(){
            if($(this).prop("checked")==false){
                $("#checkall").prop("checked", false)
            }
            if($(".checkitem:checked").length == $(".checkitem").length){
                $("#checkall").prop('checked', true)
            } 
        });
        


        $("#bulk_approve1").click(function(){
            if(confirm("Are you sure you to approve?")){
                var id = [];
                //    Getting each data id
                $('.checkitem').each(function(){
                    if($(this).is(":checked")){
                        id.push($(this).val());
                    }
                });
                //    Checking each data  
                alert (id.length);   
                alert (id);sss
                //     For verifying check item
                if(id.length == 0)
                {
                    alert ("Please Select atleast one checkbox ");
                }
                else{
                    $.ajax({
                        url: "/approve1",
                        method:"POST",
                        data: {'id' : id},
                        success:function(data){
                            // for(var i=0; i<id.length; i++)
                            //     {
                            //         $('tr#' + id[i] + '' ).css('background-color', '#ccc');
                            //         $('tr#' + id[i] + '' ).fadeOut('slow');
                            //     }
                            alert("HELLOOO");
                        }
                    })
                }
        }



    });
    

});



 // $("#bulk_approve1").click(function(){
        //     if(confirm("Are you sure you to approve?")){
        //         var id = [];
                
        //         $(':checkbox:checked').each(function(i){
        //             id[i] = $(this).val();
        //         });
        //         //     For verifying check item
        //         if(id.length == 0)
        //         {
        //             alert ("Please Select atleast one checkbox ");
        //         }
        //         else{
        //             $.ajax({
        //                 url: 'approve1',
        //                 type:'POST',
        //                 dataType: 'json',
        //                 data : $('.checkitem:checked').serialize(),
        //                 success: function (data){
        //                     for(var i=0; i<id.length; i++)
        //                     {
        //                         $('tr#' + id[i] + '' ).css('background-color', '#ccc');
        //                         $('tr#' + id[i] + '' ).fadeOut('slow');
        //                     }
        //                 }

        //             })
        //         }
        //     }
            
        // });
        
    




    //   Approve 1 Click

    // if (data == 'success') {
    //     iziToast.success({
    //       title: 'Success',
    //       position: 'topCenter',
    //       message: 'Request Approved'
    //     });
    //   }