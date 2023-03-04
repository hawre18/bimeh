@extends('template.v1.admin.app')
@section('alert')
    <script src="{{asset('vendor/sweetalert/sweetalert.all.js')}}"></script>
    @include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])
@endsection
@section('content')
    <!-- Start Page Content -->
    <main class="page-content bg-light">


        <div class="container-fluid">
            <div class="layout-specing">
                <div class="d-md-flex justify-content-between">
                    <div>
                        <h5 class="mb-0"> {{$information->title}}</h5>

                        <ul class="list-unstyled mt-2 mb-0">
                            <li class="list-inline-item date text-muted"><i class="mdi mdi-calendar-check"></i>آخرین بروز رسانی {{\Hekmatinasser\Verta\Verta::instance($information->updated_at)->formatJalaliDatetime(\Hekmatinasser\Verta\Verta::today('Asia/Tehran'))}}</li>
                        </ul>
                    </div>

                </div>

                <div class="row">
                    <div class="col-lg-8 col-lg-7 mt-4">
                        <div class="card rounded shadow border-0 overflow-hidden">
                            <img src="{{asset('storage/photos/logo/'.$information->image->path)}}" class="img-fluid" alt="">

                            <div class="p-4">
                                <!-- <ul class="list-unstyled">
                                    <li class="list-inline-item user text-muted me-2"><i class="mdi mdi-account"></i> کلوین کارلو</li>
                                    <li class="list-inline-item date text-muted"><i class="mdi mdi-calendar-check"></i> 1 بهمن 1400</li>
                                </ul> -->

                                <p class="text-muted">{!! $information->description !!}</p>

                            </div>
                        </div>
                    </div><!--end col-->
                </div><!--end row-->
            </div>
        </div><!--end container-->
    </main>

@endsection
