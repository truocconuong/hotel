<div id="edit_user" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><b>Sửa Người Dùng</b></h4>
            </div>
            <div id="success-msg" class="hide">
                <div class="alert alert-info alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <strong>Success!</strong>
                </div>
            </div>
            <form id="edit_frm_user" method="POST" action="" enctype="multipart/form-data">

                <div class="col-md-12">
                    <div class="widget-body">
                        <div class="row">
                            <div class="col-md-6 col-md-offset-3">
                                {{ csrf_field() }}
                                <div class="form-group" style="display: none;">
                                    <input id="edit_id" type="text" name="id">
                                </div>
                                <div class="form-group {{ $errors->has('edit_name') ? 'has-error' : '' }}">
                                    <label for="name">Họ tên</label>
                                    <input type="text" class="form-control" id="edit_name" name="edit_name" placeholder="Họ tên"
                                          ">
                                    <span class="help-block">{{ $errors->first('edit_name') }}</span>
                                    <span class="text-danger">
                                             <strong id="name-error"></strong>
                                         </span>
                                </div>
                                <div class="form-group {{ $errors->has('edit_email') ? 'has-error' : '' }}">
                                    <label for="email">Địa chỉ Email</label>
                                    <input type="email" class="form-control" id="edit_email" name="edit_email"
                                           placeholder="Địa chỉ Email"
                                           ">
                                    <span class="help-block">{{ $errors->first('edit_email') }}</span>
                                </div>
                                <div class="form-group {{ $errors->has('edit_password') ? 'has-error' : '' }}">
                                    <label for="password">Mật khẩu</label>
                                    <input type="password" class="form-control" id="edit_password" name="edit_password"
                                           placeholder="Mật khẩu">
                                    <span class="help-block">{{ $errors->first('edit_password') }}</span>
                                </div>
                                <div class="form-group">
                                    <label for="password_confirmation">Xác nhận mật khẩu</label>
                                    <input type="password" class="form-control" id="edit_password_comfirm"
                                           name="edit_password_comfirm" placeholder="Xác nhận mật khẩu">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-info btn-flat" id="btn_edit_user">Sửa</button>
                    <button type="button" class="btn btn-flat btn-danger" data-dismiss="modal">Hủy</button>
                </div>
            </form>

        </div>

    </div>
</div>