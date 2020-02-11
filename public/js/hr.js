function LoadHrTbl(search, url = 'hreq'){
    $.ajax({
      url: url,
      type:'get',
      data: search,
      success: function (data) {
          $('#HrTable').html(data); 
      }
  });

}
LoadHrTbl();

 $('#searchHrForm').on('submit', function(e){

    e.preventDefault();

    var form = $('#searchHrForm').serialize();

    LoadHrTbl(form);

 });

 $('#searchNForm').on('submit', function(e){

    e.preventDefault();

    var form = $('#searchNForm').serialize();

    LoadHrTbl(form);

 });

$('#xportdta').on('click', function(){
    $.ajax({
        success:function(data){
            if (data == 'success') {
                    iziToast.success({
                      title: 'Success',
                      position: 'topCenter',
                      message: 'Request Approved!'
                    });
                  }
        }
    });
});


 // TABLE RELOAD PAGINATE 
$('#HrTable').on('click', '.page-link', function(e){
    e.preventDefault();
    LoadAdminTbl('',$(this).attr('href'));
});

