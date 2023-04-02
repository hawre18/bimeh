@extends('template.v1.admin.app')
@section('alert')
    <script src="{{asset('vendor/sweetalert/sweetalert.all.js')}}"></script>
    @include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])
@endsection
@section('content')
    <!-- Hero Start -->
    <section class="bg-half-150 d-table w-100 bg-light" style="background: url('./assets/v1/admin/images/bg/bg-lines-one.png') center;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-8">
                    <img src="{{asset('assets/v1/admin/images/logo-dark.png')}}" height="24" class="mx-auto d-block" alt="">
                    <div class="card login-page bg-white shadow mt-4 rounded border-0">
                        <div class="card-body">
                            <h4 class="text-center">ثبت ادمین جدید</h4>
                            <form method="post" action="/admin/user/crud" class="login-form mt-4" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label"> نام<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" placeholder="نام" name="fname" required="" value="{{old('fname')}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">نام خانوادگی <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" placeholder="نام خانوادگی" name="lname" required="" value="{{old('lname')}}">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label class="form-label">نام کاربری <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" placeholder="نام کاربری" name="userName" required="" value="{{old('userName')}}">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label class="form-label">شماره همراه <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" placeholder="شماره همراه" name="phone" required="" value="{{old('phone')}}">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label class="form-label">کدملی<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" placeholder="کدملی" name="nationalcode" required="" value="{{old('nationalcode')}}">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label class="form-label">ایمیل<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" placeholder="ایمیل" name="email" required="" value="{{old('email')}}">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label class="form-label">پسورد<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" placeholder="پسورد" name="password" required="" value="{{old('password')}}">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="d-grid">
                                            <button class="btn btn-primary">ثبت نام</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div><!---->
                </div> <!--end col-->
            </div><!--end row-->
        </div> <!--end container-->
    </section><!--end section-->
    <!-- Hero End -->
@endsection
