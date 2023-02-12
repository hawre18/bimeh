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
                            <h4 class="text-center">ویرایش مقام</h4>
                            <form method="post" action="{{route('role.update',$role->id)}}" class="login-form mt-4" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                {{ method_field('PATCH') }}
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label"> نام<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" placeholder="به لاتین وارد شود" name="name" required="" value="{{ $role->name or old('name') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">عنوان دسترسی<span class="text-danger">*</span></label>
                                            <textarea type="text" class="form-control" placeholder="عنوان دسترسی" name="label" required="" >{{ $role->label or old('label') }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="permission" class="form-label">دسترسی ها </label>
                                            <select id="permission_id[]" class="form-control department-name select2input" name="permission_id[]" multiple>
                                                @foreach(\App\Models\Permission::latest()->get() as $permission){
                                                <option value="{{ $permission->id }}" {{ in_array(trim($permission->id) , $role->permissions->pluck('id')->toArray()) ? 'selected' : ''  }}>{{ $permission->name }} - {{ $permission->label }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="d-grid">
                                            <button class="btn btn-primary">ویرایش </button>
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
