@extends('frontend.master')
@section('content')
    <section class="section-account parallax bg-11">
        <div class="awe-overlay"></div>
        <div class="container">
            <div class="login-register">
                <div class="text text-center">
                    <h2>Đăng Nhập</h2>
                    <p>Đăng nhập để đặt phòng và nhận hỗ trợ tốt nhất</p>
                    <form action="{{ route('frontend.home.postlogin') }}" method="post" class="account_form">
                        {{ csrf_field() }}
                        <div class="field-form">
                            <input type="text" name="username" class="field-text" placeholder="User name">
                        </div>
                        <div class="field-form">
                            <input type="password" name="password" class="field-text" placeholder="Password">
                        </div>
                        <div class="field-form field-submit">
                            <button type="submit" class="awe-btn awe-btn-13">Login</button>
                        </div>
                        <span class="account-desc">I don’t have an account  -  <a href="#">Forgot Password</a></span>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection