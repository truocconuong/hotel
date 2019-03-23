$(function () {

    $('#frm_add_thuephong').on('click','#btn_add_thuephong',function (e) {
        event.preventDefault();
        $('#name-error').html("");
        var formData=  $('#frm_add_thuephong').serialize();
        $.ajax({
            url: "./thuephong",
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
                    $("#frm_add_thuephong")[0].reset();
                    $('#add_thuephong').modal('hide');
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



    $(document).on('click', '.btn-edit', function(){
        var id = $(this).data('id');
        var url = $(this).data('show');
        $.ajax({
            url:"thuephong/"+id,
            method:'get',
            dataType:'json',
            success:function(data)
            {
                $('#edit_name').val(data.tenkhachhang);
                $('#edit_khachhang_id').val(data.khachhang_id);
                $('#tenphong').val(data.tenphong);
                $('#edit_checkin').val(data.ngaydat);
                $('#edit_checkout').val(data.ngaytra);
                $('#edit_id').val(data.id);
                $('#edit_order').modal('show');
            }
        })
    });

    $(function () {
        $('#edit_checkin').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss'
        });
        $('#edit_checkout').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss'
        });
    });

});