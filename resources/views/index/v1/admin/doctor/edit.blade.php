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
                            <h4 class="text-center">ویرایش متخصص</h4>
                            <form method="post" action="{{route('doctors.update',$doctor->id)}}" class="login-form mt-4" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                {{ method_field('PATCH') }}
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label"> نام<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" placeholder="نام" name="fname" required="" value="{{$doctor->fname}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">نام خانوادگی <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" placeholder="نام خانوادگی" name="lname" required="" value="{{$doctor->lname}}">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label class="form-label">شماره همراه <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" placeholder="شماره همراه" name="phone" required="" value="{{$doctor->phone}}">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label class="form-label">کد نظام پزشکی<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" placeholder="کد نظام پزشکی" name="sku" required="" value="{{$doctor->sku}}">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label class="form-label">آدرس<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" placeholder="آدرس" name="address" required="" value="{{$doctor->address}}">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label class="form-label">شماره ثابت <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" placeholder="با پیش کد استان" name="tellphone" required="" value="{{$doctor->tellphone}}">
                                        </div>
                                    </div>
                                    <div class="col-md-12" id="app">
                                        <div class="mb-3">
                                            <select-city-component></select-city-component>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label"> نوع خدمت<span class="text-danger">*</span></label>
                                            <select class="form-control" name="type">
                                                <option>نتخاب کنید</option>
                                                @foreach($types as $type)
                                                    <option value="{{$type->id}}" @if($doctor->type_id==$type->id) selected @endif>{{$type->label}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label class="form-label">ایمیل<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" placeholder="ایمیل" name="email" required="" value="{{$doctor->email}}">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label class="form-label">رمزعبور جدید</label>
                                            <input type="text" class="form-control" placeholder="اگر مایل به تغییر رمز عبور نیستید این فیلد را خالی بگذارین" name="password" >
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="d-grid">
                                            <button class="btn btn-primary">ویرایش</button>
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
