@extends('template.v1.doctor.app')
@section('alert')
    <script src="{{asset('vendor/sweetalert/sweetalert.all.js')}}"></script>
    @include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])
@endsection

@section('content')
    <div class="row">
        <div class="col-xl-9 col-md-6">
            <h5 class="mb-0">ایجاد فاکتور جدید </h5>
        </div><!--end col-->
    </div>
    <!-- Hero Start -->
    <section class="bg-half-150 d-table w-100 bg-light" style="background: url('./assets/v1/admin/images/bg/bg-lines-one.png') center;">
        <div class="container">

            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-8">
                    <div class="card login-page bg-white shadow mt-4 rounded border-0">
                        <div class="card-body">
                            <h4 class="text-center">ایجاد فاکتور جدید</h4>
                            <form method="post" action="/doctors/selling" class="login-form mt-4" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="_method" value="post">
                                <div class="row"  id="app">

                                    <div class="col-md-12">
                                        <div class="mb-3">
                                        <select-customer-component></select-customer-component>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="d-grid">
                                            <button class="btn btn-primary">ثبت</button>
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
@section('multi')
    <script type="text/javascript" src="{{asset('assets/v1/admin/js/mdb.min.js')}}"></script>
@endsection
