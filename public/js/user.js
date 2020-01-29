$(document).ready(function(){
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

    $('#deleteModal').on('show.bs.modal', function (event) {
        console.log('Model_opened');
        var button = $(event.relatedTarget) 
        var emp_id = button.data('myid') 
        var modal = $(this)

        modal.find('.modal-body #emp_id').val(emp_id);
    });

    $('#addUserForm').on('submit', function(e){

        e.preventDefault();
    
        var form = $('#addUserForm').serialize();
        var url = form.attr('registerUser');
        $.ajax({
            url: url,
            type: "POST",
            data: form,
            success: function(data) {
                $("#addUserForm")[0].reset()
                $('#regModal').modal("hide")
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

                iziToast.success({
                    title: 'Failed',
                    position: 'topCenter',
                    message: 'User Failed Register!'
                });
            }

        });
    });


});
