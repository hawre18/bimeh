@extends('template.v1.admin.app')
@section('styles')
    <link rel="stylesheet" href="{{asset('/admin/dist/css/dropzone.css')}}">
@endsection
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
                            <h4 class="text-center">افزودن نمونه کار جدید</h4>
                            <form method="post" action="/admin/sample" class="login-form mt-4" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label"> نوع خدمت<span class="text-danger">*</span></label>
                                            <select class="form-control" name="service">
                                                <option  disabled>انتخاب کنید</option>
                                                @foreach($services as $service)
                                                <option value="{{$service->id}}" >{{$service->title}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">مشتری<span class="text-danger">*</span></label>
                                            <select class="form-control" name="customer">
                                                <option  disabled>انتخاب کنید</option>
                                                @foreach($customers as $customer)
                                                    <option value="{{$customer->id}}" >{{$customer->f_name." "}}{{$customer->l_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">متخصص<span class="text-danger">*</span></label>
                                            <select class="form-control" name="doctor">
                                                <option  disabled>انتخاب کنید</option>
                                                @foreach($doctors as $doctor)
                                                    <option value="{{$doctor->id}}" >{{$doctor->fname." "}}{{$doctor->lname}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label"> تاریخ انجام<span class="text-danger">*</span></label>
                                            <input type="date" class="form-control" placeholder="تاریخ انجام" name="dateDo" required="" value="{{old('dateDo')}}">
                                        </div>
                                    </div>
                                    <label class="form-label">توضیحات<span class="text-danger">*</span></label>
                                    <div id="container">
                                        <textarea  id="description" name="description">{{old('description')}}</textarea>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label class="form-label">عکس<span class="text-danger">*</span></label>
                                            <input type="hidden" name="photo_id" id="sample-photo">
                                            <div id="photo" class="dropzone" ></div>
                                            <div class="=row">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="d-grid">
                                            <button class="btn btn-primary" onclick="sampleGallery()">ثبت</button>
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
@section('scripts')
    <script type="text/javascript" src="{{asset('/admin/dist/js/dropzone.js')}}"></script>
    <script type="text/javascript" src="{{asset('/assets/v1/admin/ckeditor/ckeditor.js')}}"></script>
    <script>
        Dropzone.autoDiscover=false;
        var photosGallery=[]
        var drop=new Dropzone('#photo',{
            addRemoveLinks:true,
            url:"{{route('photoSample.upload')}}",
            sending:function (file,xhr,formData) {
                formData.append("_token","{{csrf_token()}}")
            },
            success: function (file,response) {
                photosGallery.push(response.photo_id)
            }
        });
        sampleGallery=function () {
            document.getElementById('sample-photo').value = photosGallery
        }



    CKEDITOR.replace('description',{
    customConfig:'config.js',
    toolbar:'simple',
    language:'fa',
    removePlugins:'cloudservices, easyimage'
    });

        </script>
@endsection

