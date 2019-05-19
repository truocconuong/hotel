@extends('frontend.master')
@section('content')
    <section class="section-sub-banner awe-parallax bg-16">

        <div class="awe-overlay"></div>

        <div class="sub-banner">
            <div class="container">
                <div class="text text-center">
                    <h2>RESERVATION</h2>
                    <p>Lorem Ipsum is simply dummy text of the printing</p>
                </div>
            </div>

        </div>

    </section>
    <!-- END / SUB BANNER -->

    <!-- RESERVATION -->
    <section class="section-reservation-page bg-white">

        <div class="container">
            <div class="reservation-page">

                <!-- STEP -->
                <div class="reservation_step">
                    <ul>
                        <li><a href="#"><span>1.</span> Choose Date</a></li>
                        <li><a href="#"><span>2.</span> Choose Room</a></li>
                        <li class="active"><a href="#"><span>3.</span> Make a Reservation</a></li>
                        <li><a href="#"><span>4.</span> Confirmation</a></li>
                    </ul>
                </div>
                <!-- END / STEP -->

                <div class="row">

                    <!-- SIDEBAR -->
                    <div class="col-md-4 col-lg-3">

                        <div class="reservation-sidebar">

                            <!-- RESERVATION DATE -->
                            <div class="reservation-date bg-gray">

                                <!-- HEADING -->
                                <h2 class="reservation-heading">Dates</h2>
                                <!-- END / HEADING -->

                                <ul>
                                    <li>
                                        <span>Check-In</span>
                                        @if(isset($ngayden))
                                            <span>{{ Carbon\Carbon::parse($ngayden)->format('d/m/Y') }}</span>
                                        @else
                                            <span>Bạn Chưa chọn</span>
                                        @endif
                                    </li>
                                    <li>
                                        <span>Check-Out</span>
                                        @if(isset($ngaytra))
                                            <span>{{ Carbon\Carbon::parse($ngaytra)->format('d/m/Y')}}</span>
                                        @else
                                            <span>Bạn Chưa chọn</span>
                                        @endif
                                    </li>
                                    <li>
                                        <span>Total Nights</span>
                                        <span>2</span>
                                    </li>
                                    <li>
                                        <span>Rooms</span>
                                        @if(isset($phong_id))
                                            <span>{{ $phong_id }}</span>
                                        @else
                                            <span>Bạn Chưa chọn</span>
                                        @endif
                                    </li>
                                    <li>
                                        <span>Total Guests</span>
                                        <span>4 Adults 1 Children</span>
                                    </li>
                                </ul>

                            </div>
                            <!-- END / RESERVATION DATE -->

                            <!-- ROOM SELECT -->
                            <div class="reservation-room-selected bg-gray">

                                <!-- HEADING -->
                                <h2 class="reservation-heading">Select Rooms</h2>
                                <!-- END / HEADING -->

                                <!-- ITEM -->
                                <div class="reservation-room-seleted_item">

                                    <h6>{{$thongtin->tenphong}}</h6>

                                    <div class="reservation-room-seleted_name has-package">
                                        <h2><a href="#">{{ $thongtin->loaiphong->tenloaiphong}}</a></h2>
                                    </div>


                                    <div class="reservation-room-seleted_total-room">
                                        TOTAL Room 1
                                    </div>

                                </div>
                                <!-- END / ITEM -->

                                <!-- ITEM -->

                                <!-- TOTAL -->
                                <div class="reservation-room-seleted_total bg-blue">
                                    <label>TOTAL</label>
                                    <span class="reservation-total">{{get_currency_vn($thongtin->loaiphong->giatien)}}</span>
                                </div>
                                <!-- END / TOTAL -->

                            </div>
                            <!-- END / ROOM SELECT -->

                        </div>

                    </div>
                    <!-- END / SIDEBAR -->

                    <!-- CONTENT -->
                    <div class="col-md-8 col-lg-9">

                        <form method="post" action="{{route('frontend.home.comfirm')}}" class="reservation_content">
                            {{ csrf_field() }}
                            <div class="reservation-billing-detail">
                                <input type="hidden" name="ngaydat" value={{Carbon\Carbon::parse($ngayden)->format('Y/m/d')}}>
                                <input type="hidden" name="ngaytra" value={{Carbon\Carbon::parse($ngaytra)->format('Y/m/d')}}>
                                <input type="hidden" name="maphong" value={{$thongtin->id}}>
                                @if (Auth::guard('customer')->check())
                                    <input type="hidden" name="khachhang_id" value={{Auth::guard('customer')->user()->id}}>
                                @endif


                                @if (Auth::guard('customer')->check())
                                    <p class="reservation-login">Xin Chào<strong>{{ Auth::guard('customer')->user()->email}}</strong></p>

                                @else
                                    <p class="reservation-login">Returning customer? <a href="#">Click here to login</a>
                                    </p>

                                @endif
                                <h4>BILLING DETAILS</h4>

                                <div class="row">
                                    <div class="col-sm-12">
                                        @if(Auth::guard('customer')->check())
                                            <label>Họ Tên<sup>*</sup></label>
                                            <input type="text" class="input-text" name="hoten"
                                                   value="{{ Auth::guard('customer')->user()->email}}">
                                        @else
                                            <label>Họ Tên<sup>*</sup></label>
                                            <input type="text" class="input-text" name="hoten">
                                        @endif
                                    </div>
                                    <div class="col-sm-12">
                                        @if(Auth::guard('customer')->check())
                                            <label>Chứng Minh Nhân Dân<sup>*</sup></label>
                                            <input type="text" class="input-text" name="cmnd"
                                                   value="{{ Auth::guard('customer')->user()->cmnd}}">
                                        @else
                                            <label>Chứng Minh Nhân Dân<sup>*</sup></label>
                                            <input type="text" class="input-text" name="cmnd">
                                        @endif
                                    </div>
                                </div>


                                <label>Địa chỉ<sup>*</sup></label>
                                <input type="text" class="input-text" placeholder="Street Address">
                                <br><br>
                                <label>Số điện thoại<sup>*</sup></label>
                                @if(Auth::guard('customer')->check())

                                    <input type="text" class="input-text" name="sdt"
                                           value="{{ Auth::guard('customer')->user()->dienthoai}}">
                                @else

                                    <input type="text" class="input-text" name="sdt">
                                @endif
                                <br><br>
                                <label>Email<sup>*</sup></label>
                                    @if(Auth::guard('customer')->check())

                                        <input type="text" class="input-text" name="email"
                                               value="{{ Auth::guard('customer')->user()->email}}">
                                    @else

                                        <input type="text" class="input-text" name="email">
                                    @endif
                                <br><br>


                                <label>Ghi chú</label>
                                <textarea class="input-textarea"
                                          placeholder="Notes about your order, eg. special notes for delivery"></textarea>

                                <button class="awe-btn awe-btn-13">PLACE ORDER</button>
                            </div>

                        </form>

                    </div>
                    <!-- END / CONTENT -->

                </div>
            </div>
        </div>

    </section>
    <!-- END / RESERVATION -->
@endsection