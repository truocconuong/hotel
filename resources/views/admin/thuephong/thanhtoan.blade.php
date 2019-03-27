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
                            <div class="panel-heading"><h4>Hóa Đơn Trả Phòng {{ $checkin->phong->tenphong }}</h4></div>
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
                                        <div class="col-md-8">{{Carbon\Carbon::parse($checkin->ngaydat)->format('d/m/Y') }}</div>
                                    </div>
                                    <div class="row">
                                        <label class="col-md-4">Ngày Dự Kiến Trả</label>
                                        <div class="col-md-8">{{Carbon\Carbon::parse($checkin->ngaytra)->format('d/m/Y')}}</div>
                                    </div>
                                    <div class="row">
                                        <label class="col-md-4">Ngày Trả</label>
                                        <div class="col-md-8">{{$mytime }}</div>
                                    </div>

                                    @php

                                        $ngaydat = Carbon\Carbon::parse($checkin->ngaydat)->format('d');
                                        $day = $mytime->day - $ngaydat;
                                        $giaphong = ($checkin->phong->loaiphong->giatien * $day);
                                    @endphp
                                    <div class="row">
                                        <label class="col-md-4">Tiền phòng</label>
                                        <div class="col-md-8">
                                            <table class="table table-responsive table-bordered">
                                                <thead>
                                                <th>Giá Phòng</th>
                                                <th>Số Ngày Thuê</th>
                                                <th>Thành Tiền</th>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>{{ $checkin->phong->loaiphong->giatien }}</td>
                                                        <td>{{ $day }}</td>
                                                        <td>{{$giaphong}}</td>

                                                    </tr>
                                                </tbody>
                                            </table>
                                            </div>
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

                                                $maintotal = $total + $giaphong;
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
                                            <td>{{get_currency_vn($total)}}</td>
                                        </tr>
                                        </tbody>

                                    </table>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <h3> Tổng tiền phải thanh toán <span><strong>{{get_currency_vn($maintotal)}}</strong></span></h3>
                                    </div>
                                </div>
                            </div>
                            <div class="panel-footer"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
@endsection