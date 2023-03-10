@extends('template.v1.user.app')
@section('content')
    <div class="rn-page-title-area pt--120 pb--190 bg_image " style="background-image:url({{asset('storage/photos/sample/'.$sample->image->path)}})" data-black-overlay="7">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="blog-single-page-title text-center pt--100">
                        <h2 class="title theme-gradient">{{$sample->service->title}}</h2>
                        <ul class="blog-meta d-flex justify-content-center align-items-center">
                            <li><i data-feather="clock"></i>{{\Hekmatinasser\Verta\Verta::instance($sample->dateDo)->formatJalaliDatetime(\Hekmatinasser\Verta\Verta::today('Asia/Tehran'))}}</li>
                            <li> <i data-feather="user"></i>{{'مشتری'.' '.$sample->customer->f_name." ".$sample->customer->l_name}}</li>
                            <li> <i data-feather="user"></i>{{'متخصص'.' '.$sample->doctor->fname." ".$sample->doctor->lname}}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="rn-blog-details pt--110 pb--70 bg_color--1">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="inner-wrapper">
                        <div class="inner">
                            <p>{!!substr($sample->description,0,70)!!}</p>
                            <div class="thumbnail"><img src="{{asset('storage/photos/sample/'.$sample->image->path)}}" alt="Blog Images"></div>
                            <p class="mt--40">{!!$sample->description!!}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
