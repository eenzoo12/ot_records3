function LoadHrTbl(search, url = 'hreq'){
    $.ajax({
      url: url,
      type:'get',
      data: search,
      success: function (data) {
          $('#HrTable').html(data); 
          $('#otfrom_x').val($('#otfrom_s').val());
          $('#otto_x').val($('#otto_s').val());
          $('#shift_x').val($('#shift_s').val());
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





 // TABLE RELOAD PAGINATE 
$('#HrTable').on('click', '.page-link', function(e){
    e.preventDefault();
    LoadAdminTbl('',$(this).attr('href'));
});


// function ExportTbl(search, url = 'xport'){
//     $.ajax({
//       url: url,
//       type:'get',
//       data: search,
//       success: function (data) {
//         if (data == 'success') {
//             iziToast.success({
//             title: 'Success',
//             position: 'topCenter',
//             message: 'Request Overtime imported!',
//             });
//         }
//       }
//   });

// }
