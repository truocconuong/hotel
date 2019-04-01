<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!-- TITLE -->
    <title>Lotus</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="format-detection" content="telephone=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <link rel="shortcut icon" href="{{asset('theme/asset/images/favicon.png')}}"/>

    <!-- GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Hind:400,300,500,600%7cMontserrat:400,700' rel='stylesheet' type='text/css'>

    <!-- CSS LIBRARY -->
    <link rel="stylesheet" type="text/css" href="{{ asset('theme/asset/css/lib/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('theme/asset/css/lib/font-lotusicon.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('theme/asset/css/lib/bootstrap-select.min.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('theme/asset/css/lib/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('theme/asset/css/lib/owl.carousel.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('theme/asset/css/lib/jquery-ui.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('theme/asset/css/lib/magnific-popup.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('theme/asset/css/lib/settings.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('theme/asset/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('theme/asset/css/helper.css') }}">

    <!-- MAIN STYLE -->
    <link rel="stylesheet" type="text/css" href="{{ asset('theme/asset/css/style.css') }}">

    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
    <![endif]-->
</head>

<!--[if IE 7]> <body class="ie7 lt-ie8 lt-ie9 lt-ie10"> <![endif]-->
<!--[if IE 8]> <body class="ie8 lt-ie9 lt-ie10"> <![endif]-->
<!--[if IE 9]> <body class="ie9 lt-ie10"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <body> <!--<![endif]-->


<!-- PRELOADER -->
<div id="preloader">
    <span class="preloader-dot"></span>
</div>
<!-- END / PRELOADER -->

<!-- PAGE WRAP -->
<div id="page-wrap">

    <!-- HEADER -->
    <header id="header" class="header-v2">

        <!-- HEADER TOP -->
        <!--  <div class="header_top">
             <div class="container">
                 <div class="header_left float-left">
                     <span><i class="lotus-icon-location"></i> 225 Beach Street, Australian</span>
                     <span><i class="lotus-icon-phone"></i> 1-548-854-8898</span>
                 </div>
                 <div class="header_right float-right">

                     <span class="login-register">
                         <a href="login.html">Login</a>
                         <a href="register.html">register</a>
                     </span>

                 </div>
             </div>
         </div> -->
        <!-- END / HEADER TOP -->

        <!-- HEADER LOGO & MENU -->
        <div class="header_content" id="header_content">

            <div class="container">
                <!-- HEADER LOGO -->
                <div class="header_logo">
                    <a href="#"><img src="{{ asset('theme/asset/images/logo-header.png') }}" alt="" width="100px" height="100px"></a>
                </div>
                <!-- END / HEADER LOGO -->

                <!-- HEADER MENU -->
                <nav class="header_menu">
                <ul class="menu">
                    <li class="current-menu-item">
                        <a href="index-2.html">Home <span class="fa fa-caret-down"></span></a>

                    </li>
                    <li><a href="about.html">About</a></li>

                    <li>
                        <a href="#">Room <span class="fa fa-caret-down"></span></a>
                        <ul class="sub-menu">
                            <li><a href="room-2.html">Room 2</a></li>
                            <li><a href="room-detail.html">Room Detail</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">Reservation <span class="fa fa-caret-down"></span></a>
                        <ul class="sub-menu">
                            <li><a href="reservation-step-1.html">Reservation Step 1</a></li>
                            <li><a href="reservation-step-2.html">Reservation Step 2</a></li>
                            <li><a href="reservation-step-3.html">Reservation Step 3</a></li>
                            <li><a href="reservation-step-4.html">Reservation Step 4</a></li>
                            <li><a href="reservation-step-5.html">Reservation Step 5</a></li>
                        </ul>
                    </li>
                    <li><a href="contact.html">Contact</a></li>
                </ul>
                </nav>
                <!-- END / HEADER MENU -->

                <!-- MENU BAR -->
                <span class="menu-bars">
                        <span></span>
                    </span>
                <!-- END / MENU BAR -->

            </div>
        </div>
        <!-- END / HEADER LOGO & MENU -->

    </header>
    <!-- END / HEADER -->


@yield('content')





    <footer id="footer">

        <!-- FOOTER TOP -->
        <div class="footer_top">
            <div class="container">
                <div class="row">

                    <!-- WIDGET MAILCHIMP -->
                    <div class="col-lg-9">
                        <div class="mailchimp">
                            <h4>News &amp; Offers</h4>
                            <div class="mailchimp-form">
                                <form action="#" method="POST">
                                    <input type="text" name="email" placeholder="Your email address" class="input-text">
                                    <button class="awe-btn">SIGN UP</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- END / WIDGET MAILCHIMP -->

                    <!-- WIDGET SOCIAL -->
                    <div class="col-lg-3">
                        <div class="social">
                            <div class="social-content">
                                <a href="#"><i class="fa fa-pinterest"></i></a>
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-google-plus"></i></a>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                    <!-- END / WIDGET SOCIAL -->

                </div>
            </div>
        </div>
        <!-- END / FOOTER TOP -->

        <!-- FOOTER CENTER -->
        <div class="footer_center">
            <div class="container">
                <div class="row">

                    <div class="col-xs-12 col-lg-5">
                        <div class="widget widget_logo">
                            <div class="widget-logo">
                                <div class="img">
                                    <a href="#"><img src="{{asset('theme/asset/images/logo-footer.png')}}" alt=""></a>
                                </div>
                                <div class="text">
                                    <p><i class="lotus-icon-location"></i> 225 Beach Street, Australian</p>
                                    <p><i class="lotus-icon-phone"></i> 1-548-854-8898</p>
                                    <p><i class="fa fa-envelope-o"></i> <a href="mailto:hello@thelotushotel.com">hello@thelotushotel.com</a></p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-4 col-lg-2">
                        <div class="widget">
                            <h4 class="widget-title">Page site</h4>
                            <ul>
                                <li><a href="#">Guest Book</a></li>
                                <li><a href="#">Gallery</a></li>
                                <li><a href="#">Restaurant</a></li>
                                <li><a href="#">Event</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-xs-4 col-lg-2">
                        <div class="widget">
                            <h4 class="widget-title">ABOUT</h4>
                            <ul>
                                <li><a href="">About</a></li>
                                <li><a href="">Blog</a></li>
                                <li><a href="">Contact Us</a></li>
                                <li><a href="">Comming Soon</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-xs-4 col-lg-3">
                        <div class="widget widget_tripadvisor">
                            <h4 class="widget-title">Tripadvisor</h4>
                            <div class="tripadvisor">
                                <p>Now with hotel reviews by</p>
                                <img src="{{asset('theme/asset/images/tripadvisor.png')}}" alt="">
                                <span class="tripadvisor-circle">
                                        <i></i>
                                        <i></i>
                                        <i></i>
                                        <i></i>
                                        <i class="part"></i>
                                    </span>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
        <!-- END / FOOTER CENTER -->

        <!-- FOOTER BOTTOM -->
        <div class="footer_bottom">
            <div class="container">
                <p>&copy; 2016 Lotus Hotel All rights reserved.</p>
            </div>
        </div>
        <!-- END / FOOTER BOTTOM -->

    </footer>
    <!-- END / FOOTER -->

</div>
<!-- END / PAGE WRAP -->


<!-- LOAD JQUERY -->
<script type="text/javascript" src="{{ asset('theme/asset/js/lib/jquery-1.11.0.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('theme/asset/js/lib/jquery-ui.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('theme/asset/js/lib/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('theme/asset/js/lib/bootstrap-select.js') }}"></script>
<script type="text/javascript" src="{{ asset('theme/asset/js/lib/isotope.pkgd.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('theme/asset/js/lib/jquery.themepunch.revolution.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('theme/asset/js/lib/jquery.themepunch.tools.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('theme/asset/js/lib/owl.carousel.js')}}"></script>
<script type="text/javascript" src="{{ asset('theme/asset/js/lib/jquery.appear.min.js')}}"></script>
{{--<script type="text/javascript" src="{{ asset('theme/asset/js/lib/jquery.countTo.js')}}"></script>--}}
{{--<script type="text/javascript" src="{{ asset('theme/asset/js/lib/jquery.countdown.min.js')}}"></script>--}}
<script type="text/javascript" src="{{ asset('theme/asset/js/lib/jquery.parallax-1.1.3.js')}}"></script>
{{--<script type="text/javascript" src="{{ asset('theme/asset/js/lib/jquery.magnific-popup.min.js')}}"></script>--}}
<script type="text/javascript" src="{{ asset('theme/asset/js/scripts.js') }}"></script>



</body>

