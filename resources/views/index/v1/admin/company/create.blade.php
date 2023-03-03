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
                    <div class="card login-page bg-white shadow mt-4 rounded border-0">
                        <div class="card-body">
                            <h4 class="text-center">ثبت ‌نام مشتری حقوقی</h4>
                            <form method="post" action="/admin/company" class="login-form mt-4" enctype="multipart/form-data">
                                @csrf
                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label"> ارگان<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" placeholder="اسم ارگان" name="name" required="" value="{{old('name')}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">مدیر ارگان<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" placeholder="مدیر ارگان" name="companyBoss" required="" value="{{old('companyBoss')}}">
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label class="form-label">کد ثبت<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" placeholder="کد ثبت" name="uniqueCode" required="" value="{{old('uniqueCode')}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6" id="app">
                                        <div class="mb-3">
                                            <select-city-component></select-city-component>
                                        </div>
                                    </div><!--end col-->

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">آدرس</label>
                                            <textarea name="addrbody" type="textarea" class="form-control" value="{{old('addrbody')}}"></textarea>
                                        </div>
                                    </div><!--end col-->

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">تلفن ثابت</label>
                                            <input name="tellphone" id="number" type="text" value="{{old('tellphone')}}" class="form-control" placeholder="تلفن ثابت :">
                                        </div>
                                    </div><!--end col-->
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">کدپستی</label>
                                            <input name="postcode" id="number" type="text" class="form-control" placeholder="کدپستی" value="{{old('postcode')}}">
                                        </div>
                                    </div><!--end col-->
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
