$(function () {

    $(document).on('click', '.btn-edit', function(){
        var id = $(this).data('id');
        var url = $(this).data('show');
        var editUrl = $(this).data('url');
        // $('#frm_edit_loaiphong').attr('action', editUrl);
        $.ajax({
            url:"loaiphong/"+id,
            method:'get',
            dataType:'json',
            success:function(data)
            {
                $('#edit_name').val(data.tenloaiphong);
                $('#edit_slug').val(data.slug);
                $('#edit_id').val(data.id);
                $('#edit_loaiphong').modal('show');
            }
        })
    });


    $(document).on('click', '.btn-delete', function(){
        var id = $(this).data('id');
        var url = $(this).data('show');
        // var editUrl = $(this).data('url');
        // $('#frm_edit_loaiphong').attr('action', editUrl);
        $.ajax({
            url:"loaiphong/"+id,
            method:'get',
            dataType:'json',
            success:function(data)
            {
                $('#delete_id').val(data.id);
                $('#delete_loaiphong').modal('show');
            }
        })
    });



});