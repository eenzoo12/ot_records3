$( "#requestSubmitBtn" ).on( "click", function() {

  var formdata = $('#requestSaveForm').serialize();
  $.ajax({
    url: 'requests',
    type:'post',
    data: formdata,
    success: function (data) {
        if (data == 'success') {
          iziToast.success({
            title: 'Success',
            position: 'topCenter',
            message: 'Successfully Created'
          });
        }
        else{
          iziToast.error({
            title: 'Error',
            position: 'topCenter',
            message: 'Please check your input'
          });
        }
    }
  });
});




// $( document ).ready(function() {
//       function fetch_data()
//       {
//           $.ajax({
//               url: 'supervisor.php',
//               method: "POST",
//               success:function(data){
//                   $('#table-live').html(data);
//               }
//                 })
//       }

// $( document ).ready(function() {
//     function fetch_data()
//     {
//         // $.ajax({
//         //     url: 'supervisor.php',
//         //     method: "POST",
//         //     success:function(data){
//         //         $('#table-live').html(data);
//         //     }
//         //       })
//     }
//             $.each(data, function(i,value){
//                 var tr =$("<tr>");
//                     tr.append($("<td/>", {
//                         text : value.name
//                     })).append($("<td/>", {
//                         text : value.department
//                     })).append($("<td/>", {
//                         text : value.date
//                     })).append($("<td/>", {
//                         text : value.shift
//                     })).append($("<td/>", {
//                         text : value.from
//                     })).append($("<td/>", {
//                         text : value.to
//                     }))
//                 $('#pending-req').append(tr);
//             });

//             $('#checkall').change(function(){
//                 $('.checkitem').prop("checked", $(this).prop("checked"))
//             })
        
    

// });

/* $.ajaxSetup({
  headers: {
      'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
  }
}); */
