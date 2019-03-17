<div class="modal fade" id="delete_user_modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Xóa người dùng</h4>
            </div>
            <form  id="del_frm_user" class="form-horizontal" method="post" action="" enctype="multipart/form-data">
                {{ csrf_field() }}
                {{ method_field('delete') }}
                <div class="modal-body">
                    <div class="row">
                       <div class="col-md-12">
                           <h4 class="nnbodydelete">Bạn có chắc muốn xóa <i id="deletename"></i></h4>
                       </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-info" data-dismiss="modal">Đóng cửa sổ</button>
                        <button type="submit" class="btn btn-warning">Xóa</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</div>