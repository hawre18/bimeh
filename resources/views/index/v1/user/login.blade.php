@extends('index.v1.user.login')
@section('content')
    <!-- Hero Start -->
    <section class="bg-home d-flex bg-light align-items-center" style="background: url('../assets/images/bg/bg-lines-one.png') center;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-8">
                    <img src="{{asset('assets/v1/user/images/logo-dark.png')}}" height="24" class="mx-auto d-block" alt="">
                    <div class="card login-page bg-white shadow mt-4 rounded border-0">
                        <div class="card-body">
                            <h4 class="text-center">ورود</h4>
                            <form action="index.html" class="login-form mt-4">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label class="form-label">ایمیل شما <span class="text-danger">*</span></label>
                                            <input type="email" class="form-control" placeholder="ایمیل" name="email" required="">
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label class="form-label">کلمه عبور <span class="text-danger">*</span></label>
                                            <input type="password" class="form-control" placeholder="کلمه عبور" required="">
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="d-flex justify-content-between">
                                            <div class="mb-3">
                                                <div class="form-check">
                                                    <input class="form-check-input align-middle" type="checkbox" value="" id="remember-check">
                                                    <label class="form-check-label" for="remember-check">به یاد داشته باشید </label>
                                                </div>
                                            </div>
                                            <a href="forgot-password.html" class="text-dark h6 mb-0">رمز عبور را فراموش کرده اید؟</a>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 mb-0">
                                        <div class="d-grid">
                                            <button class="btn btn-primary">ورود</button>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 mt-3 text-center">
                                        <h6 class="text-muted">یا</h6>
                                    </div><!--end col-->

                                    <div class="col-12 text-center">
                                        <p class="mb-0 mt-3"><small class="text-dark me-2">حساب کاربری ندارید؟</small> <a href="signup.html" class="text-dark fw-bold">ثبت نام</a></p>
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
