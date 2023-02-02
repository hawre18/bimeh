@extends('template.v1.admin.app')
@section('alert')
    <script src="{{asset('vendor/sweetalert/sweetalert.all.js')}}"></script>
    @include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])
@endsection
@section('content')
    <div class="page-wrapper doctris-theme toggled">

        <!-- Start Page Content -->
        <main class="page-content bg-light">
            <div class="container-fluid" >
                <div class="layout-specing">
                    <div class="row">
                        <div class="col-lg-8 mt-4">
                            <div class="card border-0 p-4 rounded shadow">
                                <form class="mt-4" method="post" action="/admin/address">
                                    @csrf
                                    <div class="alert alert-info"><span>برای کاربر آدرس ثبت شده به{{count($address)}}تعداد وجود دارد</span><a href="{{url('admin/address')}}"><i class="uil uil-home"></i></a></div>
                                    <div class="row">
                                        <div class="col-md-6" id="app">
                                            <div class="mb-3">
                                                <select-city-component></select-city-component>
                                            </div>
                                        </div><!--end col-->

                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">آدرس</label>
                                                <textarea name="addrbody" type="textarea" class="form-control" ></textarea>
                                            </div>
                                        </div><!--end col-->

                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">تلفن ثابت</label>
                                                <input name="tellphone" id="number" type="text" class="form-control" placeholder="تلفن ثابت :">
                                            </div>
                                        </div><!--end col-->
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">شماره تماس</label>
                                                <input name="phone" id="number" type="text" class="form-control" placeholder="شماره تماس :">
                                                <input name="customer_id" disabled hidden  type="text" class="form-control hidden disabel" value="{{$customer->id}}">
                                            </div>
                                        </div><!--end col-->
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">کدپستی</label>
                                                <input name="postcode" id="number" type="text" class="form-control" placeholder="کدپستی">
                                            </div>
                                        </div><!--end col-->
                                    </div><!--end row-->
                                    <button type="submit" class="btn btn-primary">افزودن آدرس</button>
                                </form>
                            </div>
                        </div><!--end col-->
                    </div><!--end row-->
                </div>
            </div><!--end container-->

            <!-- Footer Start -->
            <footer class="bg-white shadow py-3">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <div class="col">
                            <div class="text-sm-start text-center">
                                <p class="mb-0 text-muted"> © داکتریس - ارائه <i class="mdi mdi-heart text-danger"></i> از <a href="" target="_blank" class="text-reset">آفرید تیم<p>
                            </div>
                        </div><!--end col-->
                    </div><!--end row-->
                </div><!--end container-->
            </footer><!--end footer-->
            <!-- End -->
        </main>
        <!--End page-content" -->
    </div>
    <!-- page-wrapper -->
@endsection

