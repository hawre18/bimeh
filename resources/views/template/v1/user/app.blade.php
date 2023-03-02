
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title> شرکت شفا آوا</title>

    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/v1/user/images/favicon.ico')}}">

    <!-- CSS Style -->
    <link rel="stylesheet" href="{{asset('assets/v1/user/css/vendor/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/v1/user/css/plugins/feature.css')}}">
    <link rel="stylesheet" href="{{asset('assets/v1/user/css/vendor/slick.css')}}">
    <link rel="stylesheet" href="{{asset('assets/v1/user/css/vendor/slick-theme.css')}}">
    <link rel="stylesheet" href="{{asset('assets/v1/user/css/vendor/lightbox.css')}}">
    <link rel="stylesheet" href="{{asset('assets/v1/user/css/vendor/fontawesome.css')}}">
    <link rel="stylesheet" href="{{asset('assets/v1/user/css/style.css')}}">
</head>

<body>

<!-- start header Arae -->
<header class="header-area formobile-menu header--transparent default-color">
    <div class="header-wrapper" id="header-wrapper">
        <div class="header-left">
            <div class="logo"><a href="index-2.html"><img src="{{asset('assets/v1/user/images/logo/logo.png')}}" alt="Digital Agency"></a>
            </div>
        </div>
        <div class="header-right">
            <nav class="mainmenunav d-none d-md-block">
                <ul class="mainmenu">
                    <li class="has-dropdown">
                        <a href="{{route('/')}}">خانه </a>
                    </li>
                    <li class="has-dropdown">
                        <a href="#">خدمات </a>
                        <ul class="submenu">
                            <li><a href="service.html">خدمات </a></li>
                            <li><a href="service-details.html">جزئیات خدمات </a></li>
                        </ul>
                    </li>
                    <li><a href="about.html">درباره ما </a></li>
                    <li><a href="{{route('contact')}}">تماس با ما </a></li>
                </ul>
            </nav>
            <div class="humberger-menu d-block d-lg-none pl--20 pl_sm--10">
                    <span class="menutrigger text-white">
                        <i data-feather="menu"></i>
                    </span>
            </div>
        </div>
    </div>
</header>
<!-- End header Arae -->
<!-- Start Popup Menu Area  -->
<div class="rn-popup-mobile-menu d-block d-lg-none">
    <div class="inner">
        <div class="popup-menu-top">
            <div class="logo">
                <a href="index-2.html"><img src="{{asset('assets/v1/user/images/logo/logo-symbol-dark.png')}}" alt="imroz"></a>
            </div>
            <div class="close-menu d-block d-lg-none">
                    <span class="closeTrigger">
                    <i data-feather="x"></i>
                </span>
            </div>
        </div>
        <ul class="mainmenu">
            <li class="has-dropdown">
                <a href="{{route('/')}}">ورود/عضویت </a>
            </li>
            <li class="has-dropdown">
                <a href="{{route('/')}}">خانه </a>
            </li>
            <li class="has-dropdown">
                <a href="#">خدمات </a>
                <ul class="submenu">
                    <li><a href="service.html">خدمات </a></li>
                    <li><a href="service-details.html">جزئیات خدمات </a></li>
                </ul>
            </li>
            <li><a href="about.html">درباره ما </a></li>

            <li><a href="{{route('contact')}}">تماس با ما </a></li>
        </ul>
    </div>
</div>
<!-- End Popup Menu Area  -->
@yield('content')
<!-- Start Footer Area Start -->
<div class="footer-style-3 pt--100 pb--30 bg_color--6">
    <div class="wrapper">
        <div class="row align-items-center justify-content-between">
            <div class="col-lg-12">
                <div class="inner text-center">
                    <div class="logo">
                        <a href="{{route('/')}}">
                            <img src="{{asset('assets/v1/user/images/logo/logo-light.png')}}" alt="Logo images">
                        </a>
                    </div>
                    <!-- Social icone Area -->
                    <ul class="social-share d-flex justify-content-center liststyle">
                        <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                    </ul>
                    <!-- End -->
                    <div class="text mt--20">
                        <p>© 20023 <a target="_blank" href="#">شفا آوا </a>. تمام حقوق محفوظ است.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Start Footer Area End -->
<!-- Start Top To Bottom Area  -->
<div class="rn-progress-parent">
    <svg class="rn-back-circle svg-inner" width="100%" height="100%" viewBox="-1 -1 102 102">
        <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
    </svg>
</div>
<!-- End Top To Bottom Area  -->

<!-- js
======================================-->
<!-- modernizer JS -->
<script src="{{asset('assets/v1/user/js/vendor/modernizer.min.js')}}"></script>
<!-- jquery JS -->
<script src="{{asset('assets/v1/user/js/vendor/jquery.js')}}"></script>
<!-- Bootstrap JS -->
<script src="{{asset('assets/v1/user/js/vendor/bootstrap.min.js')}}"></script>

<script src="{{asset('assets/v1/user/js/vendor/avoid-console.js')}}"></script>
<script src="{{asset('assets/v1/user/js/vendor/waypoint.js')}}"></script>
<script src="{{asset('assets/v1/user/js/vendor/wow.js')}}"></script>
<script src="{{asset('assets/v1/user/js/vendor/feather.js')}}"></script>
<script src="{{asset('assets/v1/user/js/vendor/slick.min.js')}}"></script>
<script src="{{asset('assets/v1/user/js/vendor/counterup.js')}}"></script>
<script src="{{asset('assets/v1/user/js/vendor/video.js')}}"></script>
<script src="{{asset('assets/v1/user/js/vendor/masonry.js')}}"></script>
<script src="{{asset('assets/v1/user/js/vendor/lightbox.js')}}"></script>
<script src="{{asset('assets/v1/user/js/vendor/particles.js')}}"></script>
<script src="{{asset('assets/v1/user/js/vendor/backtotop.js')}}"></script>

<!-- main JS -->
<script src="{{asset('assets/v1/user/js/main.js')}}"></script>

</body>


</html>
