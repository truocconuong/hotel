@extends('frontend.master')
@section('content')
    <!-- SUB BANNER -->
    <section class="section-sub-banner bg-9">
        <div class="awe-overlay"></div>
        <div class="sub-banner">
            <div class="container">
                <div class="text text-center">
                    <h2>PHÒNG & GIÁ
                    </h2>
                    <p>Những gì bạn cần</p>
                </div>
            </div>
        </div>
    </section>
    <!-- END / SUB BANNER -->

    <!-- ROOM -->
    <section class="section-room bg-white">
        <div class="container">

            <div class="room-wrap-2">

                <!-- ITEM -->
                @foreach($listroom as $room)
                <div class="room_item-2">

                    <div class="img">
                        <a href="#"><img src="{{asset('theme/asset/images/room/room2/img-1.jpg')}}" alt=""></a>
                    </div>

                    <div class="text">
                        <h2><a href="#">{{$room->tenloaiphong}}</a></h2>
                        <span class="price">Từ <span class="amout">{{ get_currency_vn($room->giatien)}}</span> ngày</span>
                        <p>Sang trọng,View Biển và nhiều hơn thế nữa</p>
                        <a href="/room-detail/{{$room->id}}" class="awe-btn awe-btn-13">Xem Chi tiết</a>
                    </div>
                </div>
                <!-- ITEM -->
                @endforeach

            </div>

        </div>
    </section>
    <!-- END / ROOM -->




@endsection
