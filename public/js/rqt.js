function LoadRequestTbl(search, url = 'requests'){
    $.ajax({
      url: url,
      type:'get',
      data: {
        
      },
      success: function (data) {
          $('#requestTable').html(data); 
      }
  });

}
LoadRequestTbl();
//   Overtime request Button 
$( "#requestSubmitBtn" ).on( "click", function(e) {
    
    e.preventDefault();

  var formdata = $('#requestSaveForm').serialize();
  $.ajax({
    url: 'requests',
    type:'post',
    data: formdata,
    success: function (data) {
        $("#requestSaveForm")[0].reset()
        LoadRequestTbl();
            if (data == 'success') {
                iziToast.success({
                title: 'Success',
                position: 'topCenter',
                message: 'Request Successfully Created',
                });
            }
        },
        error:function(error){
            iziToast.error({
                title: 'Failed',
                position: 'topCenter',
                message: 'Request Failed!'
            });
            
        }
  });
});

// TABLE RELOAD PAGINATE 
$('#requestTable').on('click', '.page-link', function(e){
    e.preventDefault();
    LoadRequestTbl('',$(this).attr('href'));
});

