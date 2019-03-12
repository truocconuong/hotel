<button data-target="{{ $edit }}" class="btn btn-xs btn-primary btn-flat btn-edit"
 data-id="{{$id}}"  data-show="{{$detail}}"  data-url="{{$urlEdit}}" data-toggle="modal"><i class="glyphicon glyphicon-edit">
    </i> Sửa</button>
<button  data-target="#delete_phong" data-url="{{ $delete }}" id="delete_user" data-toggle="modal" data-id="{{$id}}"  data-show="{{$detail}}" class="btn btn-xs btn-danger btn-flat btn-delete"
><i class="glyphicon glyphicon-trash"></i> Xóa</button>