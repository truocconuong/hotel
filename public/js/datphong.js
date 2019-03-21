$(function () {
    $('#frm_add_datphong').on('click','#btn_add_datphong',function (e) {
        event.preventDefault();
        $('#name-error').html("");
        var formData=  $('#frm_add_datphong').serialize();
        $.ajax({
            url: "./datphong",
            type: "POST",
            data:formData,
            success: function (data) {
                console.log(data);
                if (data.errors) {
                    $('#name-error').html(data.errors.name);
                    $('#dienthoai-error').html(data.errors.dienthoai);
                    $('#cmnd-error').html(data.errors.cmnd);
                    $('#diachi-error').html(data.errors.diachi);
                    $('#gioitinh-error').html(data.errors.gioitinh);
                    $('#phong_id-error').html(data.errors.phong_id);
                    swal({
                        title: "Errors!",
                        text: "Có Lỗi Khi Thêm Dữ Liệu",
                        icon: "error",
                        timer: '1000'
                    });

                }
                if (data.success) {
                    $(this).html('');
                    $("#frm_add_datphong")[0].reset();
                    $('#add_datphong').modal('hide');
                    swal({
                        title: "Success!",
                        text: "Thêm Dữ Liệu Thành Công",
                        icon: "success",
                        timer: '1000'
                    });
                    datatables.ajax.reload();
                }
            },
        });
    });    
    
    
    
});