@extends('template.v1.user.app')
@section('content')
<!-- Start Breadcrumb Area -->
<div class="breadcrumb-area rn-bg-color ptb--120 bg_image bg_image--1">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-inner pt--100">
                    <h2 class="title">درباره ما</h2>
                    <ul class="page-list">
                        <li class="rn-breadcrumb-item"><a href="index-2.html">خانه </a></li>
                        <li class="rn-breadcrumb-item active">درباره ما </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumb Area -->

<!-- About area Start -->
<div class="about-area ptb--120 bg_color--1">
    <div class="about-wrapper">
        <div class="container">
            <div class="row row--35 align-items-center">
                <div class="col-lg-5 col-md-12">
                    <div class="thumbnail"><img class="w-100" src="assets/images/about/about-1.png" alt="About Images"></div>
                </div>
                <div class="col-lg-7 col-md-12">
                    <div class="about-inner inner">
                        <div class="section-title">
                            <div class="icon">
                                <i data-feather="send"></i>
                            </div>
                            <h2 class="title">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم.</h2>
                            <p class="description">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد..</p>
                            <p class="description">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد.</p>
                            <div class="purchase-btn"><a class="btn-transparent" href="index-2.html">خرید ایــمروز</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- About area End -->

<!-- Rn Counter Up Area -->
<div class="rn-counterup-area ptb--120 bg_color--5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title text-center"><span class="subtitle">شفا آوا</span>
                    <h2 class="title">رشد شرکت ما</h2>
                    <p class="description">ما در چند سال گذشته قدرت خود را افزایش داده ایم.</p>
                </div>
            </div>
        </div>
        <div class="row mt--30">
            <div class="im_single_counterup col-lg-3 col-md-4 col-sm-6 col-12">
                <div class="im_counterup">
                    <div class="inner">
                        <div class="icon">
                            <i data-feather="heart"></i>
                        </div>
                        <h2 class="counter"><span>{{count($customer)}}</span></h2>
                        <p class="description">مشتریان ثابت</p>
                    </div>
                </div>
            </div>
            <div class="im_single_counterup col-lg-3 col-md-4 col-sm-6 col-12">
                <div class="im_counterup">
                    <div class="inner">
                        <div class="icon">
                            <i data-feather="clock"></i>
                        </div>
                        <h2 class="counter"><span>{{count($services)}}</span></h2>
                        <p class="description">سرویس ها</p>
                    </div>
                </div>
            </div>
            <div class="im_single_counterup col-lg-3 col-md-4 col-sm-6 col-12">
                <div class="im_counterup">
                    <div class="inner">
                        <div class="icon">
                            <i data-feather="circle"></i>
                        </div>
                        <h2 class="counter"><span>{{count($plane)}}</span></h2>
                        <p class="description">طرح ها</p>
                    </div>
                </div>
            </div>
            <div class="im_single_counterup col-lg-3 col-md-4 col-sm-6 col-12">
                <div class="im_counterup">
                    <div class="inner">
                        <div class="icon">
                            <i data-feather="award"></i>
                        </div>
                        <h2 class="counter"><span>55</span></h2>
                        <p class="description">برنده جوایز</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Rn Counter Up Area End -->

<!-- Finding us area -->
<div class="rn-finding-us-area attacment-fixed rn-finding-us ptb--120 bg_color--1 bg_image bg_image--18" data-black-overlay="5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <div class="inner">
                    <div class="content-wrapper">
                        <div class="content">
                            <h4 class="theme-gradient">اکنون کار خود را پیدا کنید</h4>
                            <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. .</p><a class="btn-default" href="about.html">شروع کنید</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Finding us area End -->

<!-- Team Area Start -->
<div class="rn-team-area bg_color--1 ptb--120">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title text-center mb--25"><span class="subtitle">مهارت های تیمی </span>
                    <h2 class="title">مهارت های تیمی </h2>
                    <p class="description">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. , <br> لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. .</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                <div class="team">
                    <div class="thumbnail"><img class="w-100" src="assets/images/team/team-01.jpg" alt="Blog Images"></div>
                    <div class="content">
                        <h4 class="title">جاد دوئو</h4>
                        <p class="designation">توسعه وب </p>
                    </div>
                    <ul class="social-icon">
                        <li>
                            <a href="https://www.facebook.com/">
                                <i data-feather="facebook"></i>
                            </a>
                        </li>
                        <li>
                            <a href="http://linkedin.com/">
                                <i data-feather="linkedin"></i>
                            </a>
                        </li>
                        <li>
                            <a href="https://twitter.com/">
                                <i data-feather="twitter"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                <div class="team">
                    <div class="thumbnail"><img class="w-100" src="assets/images/team/team-02.jpg" alt="Blog Images"></div>
                    <div class="content">
                        <h4 class="title">سعید بنلادن</h4>
                        <p class="designation">توسعه وب </p>
                    </div>
                    <ul class="social-icon">
                        <li>
                            <a href="https://www.facebook.com/">
                                <i data-feather="facebook"></i>
                            </a>
                        </li>
                        <li>
                            <a href="http://linkedin.com/">
                                <i data-feather="linkedin"></i>
                            </a>
                        </li>
                        <li>
                            <a href="https://twitter.com/">
                                <i data-feather="twitter"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                <div class="team">
                    <div class="thumbnail"><img class="w-100" src="assets/images/team/team-03.jpg" alt="Blog Images"></div>
                    <div class="content">
                        <h4 class="title">جاد دوئو</h4>
                        <p class="designation">توسعه وب </p>
                    </div>
                    <ul class="social-icon">
                        <li>
                            <a href="https://www.facebook.com/">
                                <i data-feather="facebook"></i>
                            </a>
                        </li>
                        <li>
                            <a href="http://linkedin.com/">
                                <i data-feather="linkedin"></i>
                            </a>
                        </li>
                        <li>
                            <a href="https://twitter.com/">
                                <i data-feather="twitter"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Team Area End -->
@endsection
