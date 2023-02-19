@extends('template.v1.user.app')
@section('content')
<!-- Bread Crumb Area -->
<div class="rn-page-title-area pt--120 pb--190 bg_image bg_image--15" data-black-overlay="6">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="rn-page-title text-center pt--100">
                    <h2 class="title theme-gradient">تماس با ما</h2>
                    <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. . </p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Bread Crumb  End -->

<!-- adderss -->
<div class="rn-contact-top-area ptb--120 bg_color--5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title mb--30 text-center"><span class="subtitle">آدرس های تماس با ما</span>
                    <h2 class="title">آدرس تماس سریع</h2>
                    <p class="description">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. , <br> لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. .</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                <div class="rn-address">
                    <div class="icon">
                        <i data-feather="headphones"></i>
                    </div>
                    <div class="inner">
                        <h4 class="title">شماره تماس</h4>
                        <p><a href="tel:+444555666777">+444 555 666 777</a></p>
                        <p><a href="tel:+222222222333">+222 222 222 333</a></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                <div class="rn-address">
                    <div class="icon">
                        <i data-feather="mail"></i>
                    </div>
                    <div class="inner">
                        <h4 class="title">آدرس ایمیل ما</h4>
                        <p><a href="mailto:admin@gmail.com">admin@gmail.com</a></p>
                        <p><a href="mailto:example@gmail.com">example@gmail.com</a></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                <div class="rn-address">
                    <div class="icon">
                        <i data-feather="map-pin"></i>
                    </div>
                    <div class="inner">
                        <h4 class="title">موقعیت ما</h4>
                        <p>5678 جاده اصلی بنگلا، شهرها 580 <br> 5678 جاده اصلی بنگلا، شهرها 580</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- adderss ENd -->

<!-- Contact area -->
<div class="rn-contact-page ptb--120 bg_color--1">
    <div class="container">
        <div class="row row--35 align-items-start">
            <div class="col-lg-6 order-2 order-lg-1">
                <div class="section-title text-left mb--50">
                    <span class="subtitle">یه ســلام بـگو!</span>
                    <h2 class="title">با ما تماس بگیرید.</h2>
                    <div class="im_address">
                        <span>مستقیما با ما تماس بگیرید:</span><a class="link im-hover" href="phone.html">+111 (0)55 5869
                            8976</a>
                    </div>
                    <div class="im_address mt--5">
                        <span>آدرس ایمیل: </span><a class="link im-hover" href="email.html">example@gmail.com</a>
                    </div>
                </div>
                <form id="contact-form" method="POST" action="http://rainbowit.net/html/imroz/mail.php" class="rwt-dynamic-form row contact-form--1">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="contact-name"></label>
                            <input name="contact-name" id="contact-name" type="text" placeholder="نام شما">
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="contact-phone"></label>
                            <input type="text" name="contact-phone" id="contact-phone" placeholder="تلفن شما">
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="contact-email"></label>
                            <input name="contact-email" id="contact-email" type="email" placeholder="ایمیل شما">
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="contact-message"></label>
                            <textarea name="contact-message" id="contact-message" placeholder="پیام شما"></textarea>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-submit">
                            <button name="submit" type="submit" id="submit" class="btn-default btn-primary">اکنون ارسال کنید</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-6 order-1 order-lg-2">
                <div class="thumbnail mb_md--30 mb_sm--30">
                    <img src="{{asset('assets/v1/user/images/about/about-12.jpg')}}" alt="imroz">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Contact area End -->
@endsection
