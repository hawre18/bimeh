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
                            <h4 class="text-center">ویرایش خدمت</h4>
                            <form method="post" action="{{route('services.update',$service->id)}}" class="login-form mt-4" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                {{ method_field('PATCH') }}
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label"> نوع خدمت<span class="text-danger">*</span></label>
                                            <select name="type">
                                                <option>نتخاب کنید</option>
                                                @foreach($types as $type)
                                                    <option value="{{$type->id}}" @if($service->type_id==$type->id) selected @endif>{{$type->label}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label"> عنوان<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" placeholder="عنوان" name="title" required="" value="{{$service->title}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">توضیحات<span class="text-danger">*</span></label>
                                            <textarea type="text" class="form-control" name="label" required="" >{{$service->label}}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label class="form-label">قیمت<span class="text-danger">*</span></label>
                                            <input type="number" class="form-control" placeholder="قیمت" name="price" required="" value="{{$service->price}}">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <span>بصورت اعشار وارد شود مثلا:50%=0.5</span>
                                            <label class="form-label">پرداخت توسط بیمه<span class="text-danger">*</span></label>
                                            <input type="number" class="form-control" name="offPrice" required="" value="{{$service->offPrice}}">
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
