$(function () {

    $(document).on('click', '.btn-edit', function(){
        var id = $(this).data('id');
        var url = $(this).data('show');
        var editUrl = $(this).data('url');
        $('#frm_edit_loaiphong').attr('action', editUrl);
        $.ajax({
            url:url,
            data:{id:id},
            method:'get',
            dataType:'json',
            success:function(data)
            {
                $('#edit_name').val(data.tenloaiphong);
                $('#edit_id').val(id);
                $('#edit_loaiphong').modal('show');
            }
        })
    });

});