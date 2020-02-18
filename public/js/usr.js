function LoadAdminTbl(search, url = 'employees'){
    $.ajax({
      url: url,
      type:'get',
      data: search,
      success: function (data) {
          $('#adminTable').html(data); 
      }
  });

}
  LoadAdminTbl();

$(document).ready(function(){

    // Search user Form
    $('#searchNForm').on('submit', function(e){

        e.preventDefault();

        var form = $('#searchNForm').serialize();

        LoadAdminTbl(form);
    });


    //  EDIT USER FORM
    $('#editModal').on('show.bs.modal', function(event){
    console.log('Model_opened');
    var button = $(event.relatedTarget)

    var emp_id = button.data('myid') 
    var name = button.data('myname')
    var email = button.data('myemail')
    var phone = button.data('myphone')
    var position = button.data('myposition')
    var department = button.data('mydepartment');
    var modal = $(this)

    modal.find('.modal-body #emp_id').val(emp_id);
    modal.find('.modal-body #name').val(name);
    modal.find('.modal-body #email').val(email);
    modal.find('.modal-body #phone').val(phone);
    modal.find('.modal-body #position').val(position);
    modal.find('.modal-body #department').val(department);
    
    });

    //  DELETE USER FORM
    $('#deleteModal').on('show.bs.modal', function (event) {
        console.log('Model_opened');
        var button = $(event.relatedTarget) 
        var emp_id = button.data('myid') 
        var modal = $(this)

        modal.find('.modal-body #emp_id').val(emp_id);
    });


    editUserBtn
    //  REGISTRATION FORM
    $('#addUserForm').on('submit', function(e){

        e.preventDefault();
    
        var form = $('#addUserForm').serialize();
        var url = $(this).attr('action');
        $.ajax({
            url: url,
            type: "POST",
            data: form,
            success: function(data) {
                $("#addUserForm")[0].reset();
                $('#regModal').modal("hide");
                // Load The tables
                LoadAdminTbl();

                if (data == 'success') {
                    iziToast.success({
                        title: 'Success',
                        position: 'topCenter',
                        message: 'User Registered!'
                    });
                }
            },
            error:function(error){
                $('#regModal').modal("hide")

                iziToast.error({
                    title: 'Failed',
                    position: 'topCenter',
                    message: 'User Registration! <br>Please check your input'
                });
            }

        });
    });

});

        //  EDIT FORM BUTTON OVERRIDE
        $('#editUserForm').on('submit', function(e){
            e.preventDefault();
    
            var form = $('#editUserForm').serialize();
            var url = $(this).attr('action');
            $.ajax({
                url: url,
                type: "POST",
                data: form,
                success: function(data) {
                    $('#editModal').modal("hide");
                    // Load The tables
                    LoadAdminTbl();
    
                    if (data == 'success') {
                        iziToast.success({
                            title: 'Success',
                            position: 'topCenter',
                            message: 'Editting User Success!'
                        });
                    }
                },
                error:function(error){
                    $('#editModal').modal("hide")
    
                    iziToast.success({
                        title: 'Failed',
                        position: 'topCenter',
                        message: 'Editting User Failed !',
                        color:red
                    });
                }
    
            });
        });

        //  DELETE FORM BUTTON OVERRIDE
        $('#deleteUserForm').on('submit', function(e){
            e.preventDefault();
    
            var form = $('#deleteUserForm').serialize();
            var url = $(this).attr('action');
            $.ajax({
                url: url,
                type: "POST",
                data: form,
                success: function(data) {
                    $('#deleteModal').modal("hide");
                    LoadAdminTbl();
    
                    if (data == 'success') {
                        iziToast.warning({
                            title: 'Deleted User',
                            position: 'topCenter',
                            message: 'Successfully!',
                            iconColor: 'Red',
                        });
                    }
                },
                error:function(error){
                    $('#deleteModal').modal("hide")
    
                    iziToast.warning({
                        title: 'Failed',
                        position: 'topCenter',
                        message: 'Deleting User Failed !',
                        color:red
                    });
                }
    
            });
        });

        




// TABLE RELOAD PAGINATE 
$('#adminTable').on('click', '.page-link', function(e){
    e.preventDefault();
    LoadAdminTbl('',$(this).attr('href'));
});
