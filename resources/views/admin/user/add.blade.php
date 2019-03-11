<div id="add_user" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><b>Thêm Người Dùng</b></h4>
            </div>
            <div id="success-msg" class="hide">
                <div class="alert alert-info alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <strong>Success!</strong> Check your mail for login confirmation!!
                </div>
            </div>
                <form method="POST" action="{{ route('admin.users.store') }}" id="frm_add_user" enctype="multipart/form-data">
                   <div class="col-md-12">
                       <div class="widget-body">
                           <div class="row">
                               <div class="col-md-6 col-md-offset-3">
                                   {{ csrf_field() }}
                                   <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                                       <label for="name">Họ tên</label>
                                       <input type="text" class="form-control" id="name" name="name" placeholder="Họ tên"
                                              value="{{ old('name') }}">
                                       <span class="help-block">{{ $errors->first('name') }}</span>
                                       <span class="text-danger">
                                             <strong id="name-error"></strong>
                                         </span>
                                   </div>
                                   <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                                       <label for="email">Địa chỉ Email</label>
                                       <input type="email" class="form-control" id="email" name="email"
                                              placeholder="Địa chỉ Email"
                                              value="{{ old('email') }}">
                                       <span class="help-block">{{ $errors->first('email') }}</span>
                                   </div>
                                   <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                                       <label for="password">Mật khẩu</label>
                                       <input type="password" class="form-control" id="password" name="password"
                                              placeholder="Mật khẩu">
                                       <span class="help-block">{{ $errors->first('password') }}</span>
                                   </div>
                                   <div class="form-group">
                                       <label for="password_confirmation">Xác nhận mật khẩu</label>
                                       <input type="password" class="form-control" id="password_confirmation"
                                              name="password_confirmation" placeholder="Xác nhận mật khẩu">
                                   </div>
                               </div>
                           </div>
                       </div>
                   </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-info btn-flat" id="btn_add_user">Thêm</button>
                        <button type="button" class="btn btn-flat btn-danger" data-dismiss="modal">Hủy</button>
                    </div>
                </form>

        </div>

    </div>
</div>
