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
                            <h4 class="text-center">ویرایش طرح فروش</h4>
                            <form method="post" action="{{route('plane.update',$plane->id)}}" class="login-form mt-4" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                {{ method_field('PATCH') }}
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label"> عنوان<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" placeholder="عنوان" name="title" required="" value="{{$plane->title}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">توضیحات<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" placeholder="توضیحات" name="description" required=""value="{{$plane->description}}">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label class="form-label">قیمت<span class="text-danger">*</span></label>
                                            <input type="number" class="form-control" placeholder="قیمت" name="price" required=""value="{{$plane->price}}">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label class="form-label">مقدارشارژ<span class="text-danger">*</span></label>
                                            <input type="number" class="form-control" placeholder="مقدارشارژ" name="charge" required=""value="{{$plane->charge}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label"> نوع طرح<span class="text-danger">*</span></label>
                                            <select class="form-control" name="typePlane">
                                                <option  disabled>انتخاب کنید</option>
                                                @foreach($types as $type)
                                                    <option value="{{$type->id}}" >{{substr($type->label, 0, 20)}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label class="form-label">گالری تصاویر<span class="text-danger">*</span></label>
                                            <input type="hidden" name="photo_id" id="plane-photo">
                                            <div class="form-control dropzone" id="photo"></div>
                                                <div class="col-sm-3" id="updated_photo_{{$image->id}}">
                                                    <img class="img-responsive" src="{{asset('storage/photos/plane/'.$image->path)}}">
                                                    <button type="button" class="btn btn-danger" onclick="removeImages({{$image->id}})">حذف</button>
                                                </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="d-grid">
                                            <button class="btn btn-primary" onclick="PlaneGallery()">ویرایش</button>
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
    <script>
        Dropzone.autoDiscover=false;
        var photosGallery=[]
        var photo=[].concat({{$image->id}})
        var drop=new Dropzone('#photo',{
            addRemoveLinks:true,
            url:"{{route('photos.upload')}}",
            sending:function (file,xhr,formData) {
                formData.append("_token","{{csrf_token()}}")
            },
            success: function (file,response) {
                photosGallery.push(response.photo_id)
            }
        });
        PlaneGallery=function () {
            document.getElementById('plane-photo').value=photosGallery.concat(photo)
        }
        removeImages=function (id) {
            var index=photo.indexOf(id)
            photo.splice(index,1);
            document.getElementById('updated_photo_'+id).remove();
        }
    </script>
@endsection
