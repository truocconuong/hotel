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
                            <button type="button" class="btn bg-olive btn-flat margin btn_add_user" data-toggle="modal" data-target="#add_user">
                                <i class="fa fa-plus" aria-hidden="true"></i> Thêm Loại Phòng</button>
                        </div>
                        <br>
                        <div class="panel panel-default">
                            <div class="panel-heading">Danh sách Loại Phòng</div>
                            <div class="panel-body">
                                <div id="success3" class="hide">
                                    <div class="alert alert-info alert-dismissible fade in" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                        <strong>Success!</strong>
                                    </div>
                                </div>
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
                                <table class="table-responsive table-bordered table-striped" id="loaiphong-table">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Tên Loại Phòng</th>
                                        <th>slug</th>
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
            @include('admin.loaiphong.add')
            @include('admin.loaiphong.edit')
            @include('admin.loaiphong.delete')

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
@section('script')
    <script type="text/javascript" src="{{ asset('js/loaiphong.js') }}"></script>
    <script>
        $('body').on('click', '#btn_add_loaiphong', function() {
            var registerForm = $("#frm_add_loaiphong");
            var formData = registerForm.serialize();
            $('#name-error').html("");

            $.ajax({
                url: "{{ url('admin/loaiphong') }}",
                type: "POST",
                data: formData,
                success: function (data) {
                    console.log(data);
                    if (data.errors) {
                        if (data.errors.name) {
                            $('#name-error').html(data.errors.name[0]);
                        }

                    }
                    if (data.success) {
                        $('#add_user').modal('hide');
                        $('#success-msg').removeClass('hide');
                        setInterval(function () {
                            $('#success-msg').addClass('hide');
                        }, 1000);
                        datatables.ajax.reload();
                    }
                },
            });
        });

        $('#frm_edit_loaiphong').on('submit', function(event){
            event.preventDefault();
            var form_data = $(this).serialize();
            var id =  $('#edit_id').val();
            $.ajax({
                url:"{{ url('admin/loaiphong')}}/"+id,
                method:"PUT",
                data:form_data,
                dataType:"json",
                success:function(data)
                {    console.log(data);
                    if (data.errors) {
                        if (data.errors.edit_name) {
                            $('#gif-error').html(data.errors.edit_name[0]);
                        }
                    }
                    else{
                        $('#frm_edit_loaiphong')[0].reset();
                        $('#success').removeClass('hide');
                        setInterval(function () {
                            $('#success').addClass('hide');
                        }, 1000);
                        $('#edit_loaiphong').modal('hide');
                        datatables.ajax.reload();
                    }
                }
            })
        });


        $('#del_frm_loaiphong').on('submit', function(event){
            event.preventDefault();
            var form_data = $(this).serialize();
            var id =  $('#delete_id').val();
            $.ajax({
                url:"{{url('admin/loaiphong')}}/"+id,
                method:"delete",
                data:form_data,
                dataType:"json",
                success:function(data)
                {
                    console.log(data);
                    if (data.errors) {
                        if (data.errors.edit_name) {
                            $('#gif-error').html(data.errors.edit_name[0]);
                        }
                    }
                    else{
                        $('#success3').removeClass('hide');
                        setInterval(function () {
                            $('#success3').addClass('hide');
                        }, 3000);
                        $('#delete_loaiphong').modal('hide');
                        datatables.ajax.reload();
                    }
                }
            })
        });
        $(function(){
            datatables =  $('#loaiphong-table').DataTable({
                processing: true,
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
                    url:" {{route('admin.loaiphong.data') }}",
                },
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'tenloaiphong', name: 'tenloaiphong' },
                    { data: 'slug', name: 'slug' },
                    { data: 'created_at', name: 'created_at' },
                    { data: 'updated_at', name: 'updated_at' },
                    { data: 'action', name: 'action'}
                ],
                drawCallback: function () {
                }
            });


            //
            // datatables.on('draw', function () {
            //     $('.btn-edit').on('click', function () {
            //         var url = $(this).data('show');
            //         var editUrl = $(this).data('url');
            //         $('#edit_frm_user').attr('action', editUrl);
            //         $.get(url, function (resp) {
            //             $("#edit_name").val(resp.name);
            //             $("#edit_email").val(resp.email);
            //             console.log(resp);
            //         }, 'json');
            //     });
            //
            //     $("#delete_user").click(function(){
            //         var delUrl = $(this).data('url');
            //         $('#del_frm_user').attr('action', delUrl);
            //         $('#delete_user_modal').modal('show');
            //
            //     });
            // });

        });
    </script>
@endsection
