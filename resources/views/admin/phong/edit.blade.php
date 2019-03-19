<div id="edit_phong" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><b>Cập nhật thông tin phòng</b></h4>
            </div>
            <div id="success" class="hide">
                <div class="alert alert-info alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <strong>Success!</strong>
                </div>

            </div>
            <form id="frm_edit_phong" method="POST" action="" enctype="multipart/form-data">
                {{--{{ method_field('PUT') }}--}}
                <div class="col-md-12">
                    <div class="widget-body">
                        <div class="row">
                            <div class="col-md-6 col-md-offset-3">
                                {{ csrf_field() }}
                                <input type="hidden" name="edit_id" id="edit_id" value="" />
                                <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                                    <label for="name">Tên Phòng</label>
                                    <input type="text" class="form-control" id="edit_name" name="edit_name" placeholder="Tên Phòng">
                                    <span class="help-block">{{ $errors->first('name') }}</span>
                                    <span class="text-danger">
                                             <strong id="edit-name-error"></strong>
                                         </span>
                                </div>
                                <div class="form-group {{ $errors->has('mota') ? 'has-error' : '' }}">
                                    <label for="mota">Mô Tả</label>
                                    <input type="text" class="form-control" id="edit_mota" name="edit_mota" placeholder="Mô Tả">
                                    <span class="help-block">{{ $errors->first('mota') }}</span>
                                    <span class="text-danger">
                                             <strong id="edit-mota-error"></strong>
                                         </span>
                                </div>
                                <div class="form-group">
                                    <label for="image">Hình Ảnh Phòng</label>

                                   <div>
                                       <img id="image_thumbnail" alt="image" class="img-thumbnail img-responsive" width="50px" height="50px">
                                   </div>
                                    <br>
                                     <input type="file" class="form-control" id="edit_image" name="edit_image"
                                        >
                                    <span class="help-block">{{ $errors->first('edit_mota') }}</span>
                                    <span class="text-danger">
                                             <strong id="edit-image-error"></strong>
                                         </span>
                                </div>
                                <div class="form-group {{ $errors->has('loaiphong_id') ? 'has-error' : '' }}">
                                    <label for="edit_loaiphong_id">Loại Phòng</label>
                                    <select name="edit_loaiphong_id" id="edit_loaiphong_id" class="form-control">
                                        <option value="">Vui Lòng Chọn Loại Phòng</option>
                                        @if (count($loaiphongs) > 0)
                                            @foreach($loaiphongs as $loaiphong)
                                                <option value="{{ $loaiphong->id }}">{{ $loaiphong->tenloaiphong }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    <span class="help-block">{{ $errors->first('loaiphong_id') }}</span>
                                    <span class="text-danger">
                                             <strong id="edit-loaiphong_id-error"></strong>
                                         </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-info btn-flat" id="btn_edit_phong">Sửa</button>
                    <button type="button" class="btn btn-flat btn-danger" data-dismiss="modal">Hủy</button>
                </div>
            </form>

        </div>

    </div>
</div>