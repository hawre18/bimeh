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
                            <h4 class="text-center">ویرایش جلسه</h4>
                            <form method="post" action="{{route('session.update',$session->id)}}" class="login-form mt-4" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                {{ method_field('PATCH') }}
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label class="form-label"> عنوان<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" placeholder="عنوان" name="title" required="" value="{{$session->title}}">
                                        </div>
                                    </div>
                                    <label class="form-label">توضیحات<span class="text-danger">*</span></label>
                                    <div id="container">
                                        <textarea  id="description" name="description">{{$session->description}}</textarea>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label"> تاریخ برگزاری نشست<span class="text-danger">*</span></label>
                                            <input type="date" value="{{$session->date}}" placeholder="قالب:09-08-1999"  name="date">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label class="form-label">گالری تصاویر<span class="text-danger">*</span></label>
                                            <input type="hidden" name="photo_id" id="session-photo">
                                            <div class="form-control dropzone" id="photo"></div>
                                                <div class="col-sm-3" id="updated_photo_{{$image->id}}">
                                                    <img class="img-responsive" src="{{asset('storage/photos/session/'.$image->path)}}">
                                                    <button type="button" class="btn btn-danger" onclick="removeImages({{$image->id}})">حذف</button>
                                                </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="d-grid">
                                            <button class="btn btn-primary" onclick="sessionGallery()">ویرایش</button>
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
        var photo=[].concat({{$image->id}})
        var drop=new Dropzone('#photo',{
            addRemoveLinks:true,
            url:"{{route('photoSession.upload')}}",
            sending:function (file,xhr,formData) {
                formData.append("_token","{{csrf_token()}}")
            },
            success: function (file,response) {
                photosGallery.push(response.photo_id)
            }
        });
        sessionGallery=function () {
            document.getElementById('session-photo').value=photosGallery.concat(photo)
        }
        removeImages=function (id) {
            var index=photo.indexOf(id)
            photo.splice(index,1);
            document.getElementById('updated_photo_'+id).remove();
        }
        CKEDITOR.replace('description',{
            customConfig:'config.js',
            toolbar:'simple',
            language:'fa',
            removePlugins:'cloudservices, easyimage'
        });
    </script>
@endsection

