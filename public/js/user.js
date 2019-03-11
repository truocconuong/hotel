$(function () {

    // $(document).on('click', '.btn-edit', function() {
    //     $('#edit_name').val($(this).data('name'));
    //     $('#edit_email').val($(this).data('email'));
    //     $('#edit_id').val($(this).data('id'));
    //     $('#edit_user').modal('show');
    // });
    // //

    $('#btn_edit_user').on('click', function (e) {
        e.preventDefault();
        $('#edit_frm_user').submit();
    });


    // $('.modal-footer').on('click', '#btn_edit_user', function()  {
    //     if ($(this).valid()) {
    //         var data = $(this).serializeArray();
    //         var formData = $("#edit_frm_user").serialize();
    //         var url = $(this).attr('action');
    //         $.ajax({
    //             url: url,
    //             type: "POST",
    //             data: formData,
    //             dataType: 'json',
    //             success: function (resp) {
    //                 if (resp.errors) {
    //                     if (resp.error.name) {
    //                         $('#name-error').html(resp.error.name[0]);
    //                         console.log(resp);
    //                     }
    //
    //                 }
    //                 if (resp.success) {
    //                     $('#success-msg').removeClass('hide');
    //                     setInterval(function () {
    //                         $('#add_user').modal('hide');
    //                         $('#success-msg').addClass('hide');
    //                     }, 1000);
    //                     datatables.ajax.reload();
    //                 }
    //             },
    //         });
    //     }
    //     return false;
    // });


});