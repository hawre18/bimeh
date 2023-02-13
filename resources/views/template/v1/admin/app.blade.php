<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>سامانه جامع مدیریت شرکت</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Premium Bootstrap 4 Landing Page Template">
    <meta name="keywords" content="Appointment, Booking, System, Dashboard, Health">
    <meta name="author" content="Shreethemes">
    <meta name="website" content=" ">
    <meta name="Version" content="v1.2.0">
    <!-- favicon -->
    <link rel="shortcut icon" href="{{asset('assets/v1/admin/images/favicon.ico')}}">
    <!-- Bootstrap -->
    <link href="{{asset('assets/v1/admin/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
    <!-- Icons -->
    <link href="{{asset('assets/v1/admin/css/materialdesignicons.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/v1/admin/css/remixicon.css')}}" rel="stylesheet" type="text/css">

    <!-- Iconscout -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link href="{{asset('assets/v1/admin/css/unicons.iconscout.com/release/v3.0.6/css/line.css')}}" rel="stylesheet">
    <!-- Css -->
    <link href="{{asset('assets/v1/admin/css/style-rtl.min.css')}}" rel="stylesheet" type="text/css" id="theme-opt">

</head>

<body>

<!-- Loader -->
<div id="preloader">
    <div id="status">
        <div class="spinner">
            <div class="double-bounce1"></div>
            <div class="double-bounce2"></div>
        </div>
    </div>
</div>
<!-- Loader -->

<div class="page-wrapper doctris-theme toggled">
    @if(Auth::guard('web')->check())
        <nav id="sidebar" class="sidebar-wrapper">
            <div class="sidebar-content" data-simplebar="" style="height: calc(100% - 60px);">
                <div class="sidebar-brand">
                    <a href="{{route('doctors.home')}}">
                        <img src="../assets/images/logo-dark.png" height="24" class="logo-light-mode" alt="">
                        <img src="../assets/images/logo-light.png" height="24" class="logo-dark-mode" alt="">
                    </a>
                </div>

                <ul class="sidebar-menu pt-3">
                    <li><a href="{{route('doctors.home')}}"><i class="uil uil-dashboard ms-2 d-inline-block"></i>داشبرد</a></li>

                    <li class="sidebar-dropdown">
                        <a href="javascript:void(0)"><i class="uil uil-user ms-2 d-inline-block"></i>فاکتور</a>
                        <div class="sidebar-submenu">
                            <ul>
                                <li><a href="{{route('sells.index')}}">فاکتورهای پرداخت نشده</a></li>
                                <li><a href="{{route('sells.index')}}">فاکتورهای پرداخت شده</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="sidebar-dropdown">
                        <a href="javascript:void(0)"><i class="uil uil-user ms-2 d-inline-block"></i>دکترها</a>
                        <div class="sidebar-submenu">
                            <ul>
                                <li><a href="{{route('sells.index')}}">افزودن دکتر</a></li>
                                <li><a href="{{route('sells.index')}}">لیست دکترها</a></li>
                            </ul>
                        </div>
                    </li>

                    <li class="sidebar-dropdown">
                        <a href="javascript:void(0)"><i class="uil uil-wheelchair ms-2 d-inline-block"></i>بیماران</a>
                        <div class="sidebar-submenu">
                            <ul>
                                <li><a href="patients.html">بیماران</a></li>
                                <li><a href="add-patient.html">افزودن بیمار</a></li>
                                <li><a href="patient-profile.html">پروفایل</a></li>
                                <li><a href="patient-profile.html">پروفایل</a></li>
                                <li><a class="dropdown-item text-dark" href="{{route('logout')}}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}><span class="mb-0 d-inline-block me-1"><i class="uil uil-sign-out-alt align-middle h6"></i></span> خروج</a>
                                    <form id="logout-form" action="/doctors/logout" method="POST" class="d-none">
                                        @csrf
                                    </form></li>
                            </ul>
                        </div>
                    </li>
                </ul>
                <!-- sidebar-menu  -->
            </div>
            <!-- sidebar-content  -->
            <ul class="sidebar-footer list-unstyled mb-0">
                <li class="list-inline-item mb-0 me-1">
                    <a href="#" class="btn btn-icon btn-pills btn-soft-primary">
                        <i class="uil uil-comment icons"></i>
                    </a>
                </li>
            </ul>
        </nav>
    @endif
    <!-- sidebar-wrapper  -->

    <!-- Start Page Content -->
    <main class="page-content bg-light">
        @if(Auth::guard('web')->check())
            <div class="top-header">
                <div class="header-bar d-flex justify-content-between border-bottom">

                    <div class="d-flex align-items-center">
                        <a href="{{route('doctors.home')}}" class="logo-icon">
                            <img src="../assets/images/logo-icon.png" height="30" class="small" alt="">
                            <span class="big">
                            <img src="../assets/images/logo-dark.png" height="24" class="logo-light-mode" alt="">
                            <img src="../assets/images/logo-light.png" height="24" class="logo-dark-mode" alt="">
                        </span>
                        </a>
                        <a id="close-sidebar" class="btn btn-icon btn-pills btn-soft-primary me-2" href="#">
                            <i class="uil uil-bars"></i>
                        </a>
                    </div>
                    @if(Auth::guard('web')->check())
                        <ul class="list-unstyled mb-0">
                            <li class="list-inline-item mb-0 me-1">
                                <div class="dropdown dropdown-primary">
                                    <button type="button" class="btn btn-icon btn-pills btn-soft-primary dropdown-toggle p-0" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i data-feather="mail" class="fea icon-sm"></i></button>
                                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">4 <span class="visually-hidden">پیام های خوانده نشده</span></span>

                                    <div class="dropdown-menu dd-menu dropdown-menu-end bg-white shadow rounded border-0 mt-3 px-2 py-2" data-simplebar="" style="height: 320px; width: 300px;">
                                        <a href="#" class="d-flex align-items-center justify-content-between py-2">
                                            <div class="d-inline-flex position-relative overflow-hidden">
                                                <img src="../assets/images/client/02.jpg" class="avatar avatar-md-sm rounded-circle shadow" alt="">
                                                <small class="text-dark mb-0 d-block text-truncat ms-3"> یک ایمیل جدید دریافت کردید <b> جولیا </b> <small class="text-muted fw-normal d-inline-block">1 ساعت قبل</small></small>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </li>

                            <li class="list-inline-item mb-0 me-1">
                                <div class="dropdown dropdown-primary">
                                    <button type="button" class="btn btn-pills btn-soft-primary dropdown-toggle p-0" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="../assets/images/doctors/01.jpg" class="avatar avatar-ex-small rounded-circle" alt=""></button>
                                    <div class="dropdown-menu dd-menu dropdown-menu-end bg-white shadow border-0 mt-3 py-3" style="min-width: 200px;">
                                        <a class="dropdown-item d-flex align-items-center text-dark" href="">
                                            <img src="../assets/images/doctors/01.jpg" class="avatar avatar-md-sm rounded-circle border shadow ms-2" alt="">
                                            <div class="flex-1 ">
                                                <span class="d-block mb-1" >{{Auth::guard('web')->user()->name ." "}}</span>
                                            </div>
                                        </a>
                                        <a class="dropdown-item text-dark" href="{{route('doctors.home')}}"><span class="mb-0 d-inline-block me-1"><i class="uil uil-dashboard align-middle h6"></i></span>داشبرد</a>
                                        <div class="dropdown-divider border-top"></div>
                                        <a class="dropdown-item text-dark" href="{{route('logout')}}"><span class="mb-0 d-inline-block me-1"><i class="uil uil-sign-out-alt align-middle h6"></i></span> خروج</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    @endif
                </div>
            </div>
        @endif
        <div class="container-fluid">
            <div class="layout-specing">
                <div class="row">


                    @yield('content')

                </div><!--end row-->
            </div>
        </div><!--end container-->

        <!-- End -->
    </main>
    <!--End page-content" -->
</div>
<!-- page-wrapper -->
<!-- Back to top -->
<a href="#" onclick="topFunction()" id="back-to-top" class="btn btn-icon btn-pills btn-primary back-to-top"><i data-feather="arrow-up" class="icons"></i></a>
<!-- Back to top -->

<!-- Offcanvas Start -->
<div class="offcanvas offcanvas-end bg-white shadow" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header p-4 border-bottom">
        <h5 id="offcanvasRightLabel" class="mb-0">
            <img src="{{asset('assets/v1/admin/images/logo-dark.png')}}" height="24" class="light-version" alt="">
            <img src="{{asset('assets/v1/admin/images/logo-light.png')}}" height="24" class="dark-version" alt="">
        </h5>
        <button type="button" class="btn-close d-flex align-items-center text-dark" data-bs-dismiss="offcanvas" aria-label="Close"><i class="uil uil-times fs-4"></i></button>
    </div>
</div>
<!-- Offcanvas End -->
<!-- javascript -->
<script src="{{asset('js/app.js')}}"></script>
@yield('alert')
<script src="{{asset('assets/v1/admin/js/bootstrap.bundle.min.js')}}"></script>
<!-- Icons -->
<script src="{{asset('assets/v1/admin/js/feather.min.js')}}"></script>
<!-- Main Js -->
<script src="{{asset('assets/v1/admin/js/app.js')}}"></script>

</body>

</html>
