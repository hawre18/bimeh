@extends('index.v1.user.index')
@section('content')

    <!-- Start Page Content -->
    <main class="page-content bg-light">

        <div class="container-fluid">
            <div class="layout-specing">
                <div class="d-md-flex justify-content-between">
                    <div>
                        <h5 class="mb-0"> قرنطینه شدن و مراقبت های پزشکی کمتر</h5>

                        <ul class="list-unstyled mt-2 mb-0">
                            <li class="list-inline-item user text-muted me-2"><i class="mdi mdi-account"></i> کلوین کارلو</li>
                            <li class="list-inline-item date text-muted"><i class="mdi mdi-calendar-check"></i> 1 بهمن 1400</li>
                        </ul>
                    </div>

                </div>

                <div class="row">
                    <div class="col-lg-8 col-lg-7 mt-4">
                        <div class="card rounded shadow border-0 overflow-hidden">
                            <img src="{{asset('assets/v1/user/images/blog/single.jpg')}}" class="img-fluid" alt="">

                            <div class="p-4">
                                <!-- <ul class="list-unstyled">
                                    <li class="list-inline-item user text-muted me-2"><i class="mdi mdi-account"></i> کلوین کارلو</li>
                                    <li class="list-inline-item date text-muted"><i class="mdi mdi-calendar-check"></i> 1 بهمن 1400</li>
                                </ul> -->

                                <p class="text-muted">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از
                                    طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای
                                    شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای
                                    زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد </p>
                                <p class="text-muted">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از
                                    طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای
                                    شرایط فعلی </p>
                                <p class="text-muted mb-0">شرایط سخت تایپ به پایان رسد وزمان مورد نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.</p>

                                <h5 class="card-title mt-4 mb-0">نظرات :</h5>

                                <ul class="media-list list-unstyled mb-0">
                                    <li class="mt-4">
                                        <div class="d-flex justify-content-between">
                                            <div class="d-flex align-items-center">
                                                <a class="pe-3" href="#">
                                                    <img src="{{asset('assets/v1/user/images/client/01.jpg')}}" class="img-fluid avatar avatar-md-sm rounded-circle shadow" alt="img">
                                                </a>
                                                <div class="commentor-detail">
                                                    <h6 class="mb-0"><a href="javascript:void(0)" class="text-dark media-heading">لورنزو پیترسون</a></h6>
                                                    <small class="text-muted"">15ام اسفند ، 1400 در 01:25 بعد از ظهر </small>
                                                </div>
                                            </div>
                                            <a href="#" class="text-muted"><i class="mdi mdi-reply"></i> پاسخ </a>
                                        </div>
                                        <div class="mt-3">
                                            <p class="text-muted font-italic p-3 bg-light rounded">" لورم ایپسوم متن ساختگی با تولید
                                                سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه
                                                روزنامه و مجله است "</p>
                                        </div>
                                    </li>

                                </ul>

                                <h5 class="card-title mt-4 mb-0">نظر بدهید :</h5>

                                <form class="mt-3">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label class="form-label">نظر شما</label>
                                                <textarea id="message" placeholder="نظر شما" rows="5" name="message" class="form-control" required=""></textarea>
                                            </div>
                                        </div><!--end col-->

                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label">نام<span class="text-danger">*</span></label>
                                                <input id="name" name="name" type="text" placeholder="نام" class="form-control" required="">
                                            </div>
                                        </div><!--end col-->

                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label">ایمیل شما <span class="text-danger">*</span></label>
                                                <input id="email" type="email" placeholder="ایمیل" name="email" class="form-control" required="">
                                            </div>
                                        </div><!--end col-->

                                        <div class="col-md-12">
                                            <div class="send d-grid">
                                                <button type="submit" class="btn btn-primary">ارسال پیام</button>
                                            </div>
                                        </div><!--end col-->
                                    </div><!--end row-->
                                </form><!--end form-->
                            </div>
                        </div>
                    </div><!--end col-->

                </div><!--end row-->
            </div>
        </div><!--end container-->

    </main>
    <!--End page-content" -->
@endsection
