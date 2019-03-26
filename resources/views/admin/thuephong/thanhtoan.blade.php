@extends('adminlte::master')
@section('title','Thanh Toán')
@section('body')
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
                        <div class="panel panel-primary">
                            <div class="panel-heading"><h4>Hóa Đơn Trả Phòng</h4></div>
                            <div class="panel-body">
                                <div class="col-md-6">
                                    <div class="row">
                                        <label class="col-md-4">Họ tên</label>
                                        <div class="col-md-8">{{$checkin->customer->tenkhachhang}}</div>
                                    </div>
                                    <div class="row">
                                        <label class="col-md-4">Số điện thoại</label>
                                        <div class="col-md-8">{{$checkin->customer->dienthoai}}</div>
                                    </div>
                                    <div class="row">
                                        <label class="col-md-4">Email</label>
                                        <div class="col-md-8">{{$checkin->customer->email}}</div>
                                    </div>
                                    <div class="row">
                                        <label class="col-md-4">Địa chỉ</label>
                                        <div class="col-md-8">{{$checkin->customer->diachi}}</div>
                                    </div>
                                    <div class="row">
                                        <label class="col-md-4">Tài khoản</label>
                                        <div class="col-md-8">
                                            @if ($checkin->customer->username !== null)
                                            {{ $checkin->customer->username }}
                                            @else
                                             Không
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-md-4">Ngày Vào</label>
                                        <div class="col-md-8">{{$checkin->ngaydat}}</div>
                                    </div>
                                    <div class="row">
                                        <label class="col-md-4">Ngày Dự Kiến Trả</label>
                                        <div class="col-md-8">{{$checkin->ngaytra}}</div>
                                    </div>
                                    <div class="row">
                                        <label class="col-md-4">Ngày Trả</label>
                                        <div class="col-md-8">{{$mytime}}</div>
                                    </div>
                                    <div class="row">
                                        <table>
                                            <thead></thead>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <table class="table table-responsive table-bordered ">
                                        <thead>
                                        <tr>
                                            <th>Tên Dịch Vụ</th>
                                            <th>Đơn Vị</th>
                                            <th>Số Lượng</th>
                                            <th>Giá</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        @php
                                            $total = 0;
                                        @endphp
                                        @foreach($checkin->sddichvu as $sddv)
                                            @php
                                                $subtotal = $sddv->quantity * $sddv->dichvu->gia;
                                                $total += $subtotal;
                                            @endphp
                                            <tr>
                                                <td>{{ $sddv->dichvu->tendichvu }}</td>
                                                <td>{{ $sddv->dichvu->donvi }}</td>
                                                <td>{{ $sddv->quantity }}</td>
                                                <td>{{ $sddv->dichvu->gia }}</td>
                                            </tr>

                                        @endforeach
                                        <tr>
                                            <td colspan="3">Tổng tiền</td>
                                            <td>{{$total}}</td>
                                        </tr>
                                        </tbody>

                                    </table>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
@endsection