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
                            <h4 class="text-center">ویرایش کاربر</h4>
                            <form method="post" action="{{route('employ.update',$employ->id)}}" class="login-form mt-4" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                {{ method_field('PATCH') }}
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label"> نام<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" placeholder="نام" name="fname" required="" value="{{$employ->f_name}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">نام خانوادگی <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" placeholder="نام خانوادگی" name="lname" required="" value="{{$employ->l_name}}">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label class="form-label">شماره همراه <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" placeholder="شماره همراه" name="phone" required="" value="{{$employ->phone}}">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label class="form-label">کدملی<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" placeholder="کدملی" name="nationalcode" required="" value="{{$employ->nationalcode}}">
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label class="form-label">شرکت/ارگان<span class="text-danger">*</span></label>
                                            <select class="form-control" name="company">
                                                <option>انتخاب کنید</option>
                                                @foreach($companies as $company)
                                                    <option @if($company->id==$employ->company_id) selected @endif value="{{$company->id}}">{{$company->companyName}}</option>
                                                @endforeach
                                            </select>
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
