@extends('template.v1.layout')
@section('content')
    <div id="preloader">
        <div id="status">
            <div class="spinner">
                <div class="double-bounce1"></div>
                <div class="double-bounce2"></div>
            </div>
        </div>
    </div>
    <!-- Loader -->
    <!-- Hero Start -->
    <section class="bg-home d-flex bg-light align-items-center" style="background: url('../assets/images/bg/bg-lines-one.png') center;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7 col-md-10 text-center">
                    <img src="{{asset('assets/v1/admin/images/svg/error.svg')}}" class="img-fluid" alt="">
                    <h3 class="mb-4">صفحه یافت نشد</h3>
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->
    </section><!--end section-->
@endsection
