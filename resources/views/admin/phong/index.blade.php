@extends('adminlte::master')
@section('body')


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Dashboard
                <small>Control panel</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Dashboard</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="pull-right-container">
                <div class="row">
                    <div class="col-md-12">
                        <div>
                            <button type="button" class="btn bg-olive btn-flat margin btn_add_user" data-toggle="modal" data-target="#add_phong">
                                <i class="fa fa-plus" aria-hidden="true"></i> Thêm Phòng</button>
                        </div>
                        <br>
                        <div class="panel panel-default">
                            <div class="panel-heading"><h4>Danh sách Phòng</h4></div>
                            <div class="panel-body">
                                @if (session('message'))
                                    <div class="alert alert-success">
                                        {{ session('message') }}
                                    </div>
                                @endif
                                @if (session('error'))
                                    <div class="alert alert-danger">
                                        {{ session('error') }}
                                    </div>
                                @endif
                                <table class="table table-responsive table-bordered table-striped" id="phong-table">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Tên Phòng</th>
                                        <th>Tình Trạng</th>
                                        <th>Loại Phòng</th>
                                        <th>Hình Ảnh</th>
                                        <th>Ngày tạo</th>
                                        <th>Ngày cập nhật</th>
                                        <th>Thao Tác</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @include('admin.phong.add')
            @include('admin.phong.edit')
            @include('admin.phong.delete')

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
@section('script')
    <script type="text/javascript" src="{{ asset('js/phong.js') }}"></script>
    <script>
        {{--$('#frm_edit_phong').on('click', '#btn_edit_phong',function(event){--}}
            {{--event.preventDefault();--}}
            {{--var formd=new FormData($("#frm_edit_phong")[0]);--}}
            {{--var form_data = $(this).serialize();--}}
            {{--var id =  $('#edit_id').val();--}}
            {{--$.ajax({--}}
                {{--url:"{{ url('admin/phong')}}/"+id,--}}
                {{--method:"POST",--}}
                {{--data:formd,--}}
                {{--dataType:"json",--}}
                {{--contentType:false,--}}
                {{--processData:false,--}}
                {{--success:function(data)--}}
                {{--{    console.log(formd);--}}
                    {{--if (data.errors) {--}}
                        {{--if (data.errors.edit_loaiphong_id) {--}}
                            {{--$('#edit-name-error').html(data.errors.name);--}}
                            {{--$('#edit-mota-error').html(data.errors.mota);--}}
                            {{--$('#ledit-oaiphong_id-error').html(data.errors.loaiphong_id);--}}
                        {{--}--}}
                    {{--}--}}
                    {{--if (data.success) {--}}

                        {{--$('#edit_phong').modal('hide');--}}
                        {{--swal({--}}
                            {{--title: "Success!",--}}
                            {{--text: "Thêm Dữ Liệu Thành Công",--}}
                            {{--icon: "success",--}}
                            {{--timer: '2000'--}}
                        {{--});--}}
                        {{--datatables.ajax.reload();--}}
                    {{--}--}}
                {{--}--}}
            {{--})--}}
        {{--});--}}



        {{--$('#del_frm_loaiphong').on('submit', function(event){--}}
            {{--event.preventDefault();--}}
            {{--var form_data = $(this).serialize();--}}
            {{--var id =  $('#delete_id').val();--}}
            {{--$.ajax({--}}
                {{--url:"{{url('admin/loaiphong')}}/"+id,--}}
                {{--method:"delete",--}}
                {{--data:form_data,--}}
                {{--dataType:"json",--}}
                {{--success:function(data)--}}
                {{--{--}}
                    {{--console.log(data);--}}
                    {{--if (data.errors) {--}}
                        {{--if (data.errors.edit_name) {--}}
                            {{--$('#gif-error').html(data.errors.edit_name[0]);--}}
                        {{--}--}}
                    {{--}--}}
                    {{--else{--}}
                        {{--$('#success3').removeClass('hide');--}}
                        {{--setInterval(function () {--}}
                            {{--$('#success3').addClass('hide');--}}
                        {{--}, 3000);--}}
                        {{--$('#delete_loaiphong').modal('hide');--}}
                        {{--datatables.ajax.reload();--}}
                    {{--}--}}
                {{--}--}}
            {{--})--}}
        {{--});--}}
        $(function(){
            datatables =  $('#phong-table').DataTable({
                processing: false,
                serverSide: true,
                autoWidth: false,
                searching: true,
                language: {
                    "lengthMenu": "Hiển thị _MENU_ bản ghi",
                    "zeroRecords": "Không có bản ghi nào được tìm thấy",
                    "emptyTable": "Không có bản ghi nào được hiển thị",
                    "processing": "Đang xử lý",
                    "search": "Tìm kiếm",
                    "paginate": {
                        "first": "Đầu tiên",
                        "last": "Cuối cùng",
                        "next": "<i class='fa fa-chevron-right' aria-hidden='true'></i>",
                        "previous": "<i class='fa fa-chevron-left' aria-hidden='true'></i>"
                    },
                    "info": "Trình bày _START_ - _END_ trong số _TOTAL_ mục",
                    "infoEmpty": "Trình bày 0 - 0 trong 0 mục"
                },
                ajax: {
                    url:" {{route('admin.phong.data') }}",
                },
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'tenphong', name: 'tenphong' },
                    { data: 'tinhtrang', name: 'tinhtrang'},
                    { data: 'loaiphong.tenloaiphong', name: 'loaiphong.tenloaiphong', },
                    { data: 'image_show', name:'image_show'},
                    { data: 'created_at', name: 'created_at' },
                    { data: 'updated_at', name: 'updated_at' },
                    { data: 'action', name: 'action'}
                ]
            });

        });
    </script>
@endsection

