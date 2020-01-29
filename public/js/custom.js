
//   Overtime request Button 
$( "#requestSubmitBtn" ).on( "click", function() {

  var formdata = $('#requestSaveForm').serialize();
  $.ajax({
    url: 'requests',
    type:'post',
    data: formdata,
    success: function (data) {
      $("#requestSaveForm")[0].reset()
        if (data == 'success') {
          iziToast.success({
            title: 'Success',
            position: 'topCenter',
            message: 'Successfully Created',
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


