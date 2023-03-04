@extends('template.v1.user.app')
@section('content')
<!-- Start Slider Area -->
<div class="slider-activation" id="home">
    <div class="slider-paralax bg_image bg_image--11 d-flex align-items-center justify-content-center" data-black-overlay="6">
        <div class="slide slide-style-4">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="inner text-center">
                            <h1 class="title">{{$information->title}}</h1>
                            <p class="description">{!!substr($information->description,0,40)!!}
                            <div class="slide-btn button-group"><a class="btn-default" href="{{route('contact')}}">تماس با ما</a><a class="btn-default btn-border btn-opacity" href="{{route('about')}}">درباره ما</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Slider Area -->

<!-- Start Seervices Area -->
<div class="service-area creative-service-wrapper ptb--120 bg_color--1">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title text-center"><span class="subtitle">برخی از طرح هایی که ما به شما ارائه میدهیم</span>
                    <h2 class="title">خدماتی را برای شما فراهم می کند.</h2>
                    <p class="description">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است., <br> لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است..</p>
                </div>
            </div>
        </div>
        <div class="row creative-service mt--30">
            <div class="col-lg-12">
                <div class="row service-main-wrapper">

                    <!-- Starrt Single Services -->
                    @foreach(App\Models\Type::all() as $type)
                    <div class="col-lg-4 col-md-6 col-sm-6 col-12 text-left">
                        <a href="{{route('type.show',$type->id)}}">
                            <div class="service service__style--2 text-left bg-gray">
                                <div class="icon">
                                    <i data-feather="cast"></i>
                                </div>
                                <div class="content">
                                    <h3 class="title">{{$type->label}}</h3>
                                    <p>{!! substr($type->description,0,90) !!}</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                    <!-- ENd Single Services -->


                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Seervices Area -->

<!-- Start Portfolio Area -->
<div class="portfolio-area pt--120 pb--140 bg_color--5">
    <div class="rn-slick-dot">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title text-center"><span class="subtitle">پروژه های ما</span>
                        <h2 class="title">برخی از کارهای اخیر ما</h2>
                        <p class="description">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است., <br>
                            اما اکثریت دچار تغییر شده اند.</p>
                    </div>
                </div>
            </div>
            <div class="row rn-slick-activation rn-slick-dot mt--10 slick-space-gutter--15 slickdot--20" data-slick-options='{
                    "spaceBetween": 15,
                    "slidesToShow": 3,
                    "slidesToScroll": 1,
                    "arrows": false,
                    "infinite": true,
                    "dots": true
                }' data-slick-responsive='[
                {"breakpoint":890, "settings": {"slidesToShow": 3}},
                {"breakpoint":770, "settings": {"slidesToShow": 2}},
                {"breakpoint":490, "settings": {"slidesToShow": 1}}
                ]'>
                @foreach(App\Models\Sample::with('image')->get()->all() as $sample)
                <div class="single_im_portfolio">
                    <div class="im_portfolio">
                        <div class="thumbnail_inner">
                            <div class="thumbnail"><a href="#"><img src="{{asset('storage/photos/sample/'.$sample->image->path)}}" alt="React Creative Agency"></a></div>
                        </div>
                        <div class="content">
                            <div class="inner">
                                <div class="portfolio_heading">
                                    <div class="category_list"><a href="#">{{$sample->dateDo}} </a></div>
                                    <h4 class="title"><a href="#">{{$sample->label}} </a>
                                    </h4>
                                </div>
                                <div class="portfolio_hover">
                                    <p>{!! substr($sample->description,0,50) !!}</p>
                                </div>
                            </div>
                        </div><a class="transparent_link" href="#"></a>
                    </div>
                </div>

                @endforeach
            </div>
        </div>
    </div>
</div>
<!-- ENd Portfolio Area -->

<!-- Start Counter Up Section -->
<div class="rn-counterup-area ptb--120 bg_color--1">
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
<!-- ENd Counter Up Section -->



<!-- Start Testimonial Area  -->
<div class="rn-testimonial-area bg_color--1 ptb--120">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <!-- Start Tab Content  -->
                <div class="rn-testimonial-content tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="tab1" role="tabpanel" aria-labelledby="tab1-tab">
                        <div class="inner">
                            <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد..</p>
                        </div>
                        <div class="author-info">
                            <h6><span>جوری ونستون </span> - طراح ، متخصص ، سئوکار.</h6>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="tab2" role="tabpanel" aria-labelledby="tab2-tab">
                        <div class="inner">
                            <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد..</p>
                        </div>
                        <div class="author-info">
                            <h6><span>جان دیرا </span> - طراح ، متخصص ، سئوکار.</h6>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="tab3" role="tabpanel" aria-labelledby="tab3-tab">
                        <div class="inner">
                            <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد..</p>
                        </div>
                        <div class="author-info">
                            <h6><span>علومن سنت </span> - طراح ، متخصص ، سئوکار.</h6>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="tab4" role="tabpanel" aria-labelledby="tab4-tab">
                        <div class="inner">
                            <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد..</p>
                        </div>
                        <div class="author-info">
                            <h6><span>جوان روسی </span> - طراح ، متخصص ، سئوکار.</h6>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="tab5" role="tabpanel" aria-labelledby="tab5-tab">
                        <div class="inner">
                            <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد..</p>
                        </div>
                        <div class="author-info">
                            <h6><span>فاطیما </span> - طراح ، متخصص ، سئوکار.</h6>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="tab6" role="tabpanel" aria-labelledby="tab6-tab">
                        <div class="inner">
                            <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد..</p>
                        </div>
                        <div class="author-info">
                            <h6><span>ایرون روین </span> - طراح ، متخصص ، سئوکار.</h6>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="tab7" role="tabpanel" aria-labelledby="tab7-tab">
                        <div class="inner">
                            <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد..</p>
                        </div>
                        <div class="author-info">
                            <h6><span>موهما ورنم </span> - طراح ، متخصص ، سئوکار.</h6>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="tab8" role="tabpanel" aria-labelledby="tab8-tab">
                        <div class="inner">
                            <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد..</p>
                        </div>
                        <div class="author-info">
                            <h6><span>شیپا  </span> - طراح ، متخصص ، سئوکار.</h6>
                        </div>
                    </div>
                </div>
                <!-- End Tab Content  -->
            </div>

            <div class="col-lg-6 mt_md--40 mt_sm--40">
                <!-- Start Tab Nav  -->
                <ul class="testimonial-thumb-wrapper nav nav-tabs" id="myTab" role="tablist">
                    <li>
                        <a class="active" id="tab1-tab" data-toggle="tab" href="#tab1" role="tab" aria-controls="tab1" aria-selected="true">
                            <div class="testimonial-thumbnai">
                                <div class="thumb">
                                    <img src="{{asset('assets/v1/user/images/client/testimonial-1.jpg')}}" alt="Testimonial Images">
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a id="tab2-tab" data-toggle="tab" href="#tab2" role="tab" aria-controls="tab2" aria-selected="false">
                            <div class="testimonial-thumbnai">
                                <div class="thumb">
                                    <img src="{{asset('assets/v1/user/images/client/testimonial-2.jpg')}}" alt="Testimonial Images">
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a id="tab3-tab" data-toggle="tab" href="#tab3" role="tab" aria-controls="tab3" aria-selected="false">
                            <div class="testimonial-thumbnai">
                                <div class="thumb">
                                    <img src="{{asset('assets/v1/user/images/client/testimonial-3.jpg')}}" alt="Testimonial Images">
                                </div>
                            </div>
                        </a>
                    </li>
                </ul>
                <!-- End Tab Content  -->
            </div>
        </div>
    </div>
</div>
<!-- End Testimonial Area  -->

<!-- Rn Blog Area Start-->
<div class="rn-blog-area pt--120 pb--140 bg_color--5">
    <div class="container">
        <div class="row align-items-end">
            <!-- Title area -->
            <div class="col-lg-12">
                <div class="section-title text-center"><span class="subtitle">نشست های اخیر </span>
                    <h2 class="title">نشست های اخیر </h2>
                    <p class="description">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است., <br> لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است..</p>
                </div>
            </div>
            <!-- End -->
        </div>
        <div class="row rn-slick-activation rn-slick-dot mt--10 slick-space-gutter--15 slickdot--20" data-slick-options='{
                "spaceBetween": 15,
                "slidesToShow": 3,
                "slidesToScroll": 1,
                "arrows": true,
                "infinite": true,
                "dots": true,
                "prevArrow": {"buttonClass": "slick-btn slick-prev", "iconClass": "ion ion-ios-arrow-back" },
                "nextArrow": {"buttonClass": "slick-btn slick-next", "iconClass": "ion ion-ios-arrow-forward" }
            }' data-slick-responsive='[
            {"breakpoint":890, "settings": {"slidesToShow": 3}},
            {"breakpoint":770, "settings": {"slidesToShow": 2}},
            {"breakpoint":490, "settings": {"slidesToShow": 1}}
            ]'>
            <!-- Start Blog Area  -->
            @foreach(App\Models\Session::with('image')->get()->all() as $session)
            <div class="imroz-blog">
                <div class="im_box">
                    <div class="thumbnail ">
                        <a href="{{route('uSession.show',$session->id)}}">
                            <img class="w-100" src="{{asset('storage/photos/session/'.$session->image->path)}}" alt="Blog Images" />
                        </a>
                    </div>
                    <div class="content">
                        <div class="inner">
                            <div class="content_heading">
                                <div class="category_list"><a href="#">{{$session->title}}</a></div>
                                <h4 class="title"><a href="#">{!! substr($session->description,0,30) !!}</a></h4>
                            </div>
                            <div class="content_footer"><a class="rn-btn btn-opacity" href="{{route('uSession.show',$session->id)}}">ادامه مطلب </a>
                            </div>
                        </div><a class="transparent_link" href="{{route('uSession.show',$session->id)}}"></a>
                    </div>
                </div>
            </div>
            @endforeach
            <!-- End Blog Area  -->
        </div>
    </div>
</div>
<!-- Rn Blog Area End-->

@endsection
