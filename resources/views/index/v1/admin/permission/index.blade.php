@extends('template.v1.admin.app')
@section('alert')
    <script src="{{asset('vendor/sweetalert/sweetalert.all.js')}}"></script>
    @include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])
@endsection
@section('content')
        <div class="container-fluid">
            <div class="layout-specing">
                <div ><a class="btn btn-primary" href="{{route('permission.create')}}">ایجاد سطح دسترسی</a></div>
                <div class="row">
                    <div class="col-12 mt-4">
                        <div class="table-responsive bg-white shadow rounded">
                            <table class="table mb-0 table-center">
                                <thead>
                                <tr>
                                    <th class="border-bottom p-3" style="min-width: 50px;">#</th>
                                    <th class="border-bottom p-3" style="min-width: 180px;">نام</th>
                                    <th class="border-bottom p-3" style="min-width: 150px;">عنوان</th>
                                    <th class="border-bottom p-3">علیات</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($permissiones as $permission)
                                    <tr>
                                        <th class="p-3">{{$loop->index+1}}</th>
                                        <td class="p-3">{{$permission->name}}</td>
                                        <td class="p-3">{{$permission->label}}</td>
                                        <td class="text-end p-3">
                                            <a href="{{route('permission.edit',$permission->id)}}" class="btn btn-icon btn-pills btn-soft-success">ویرایش</a>
                                            <form method="post" action="{{route('permission.destroy',$permission->id)}}">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                <button type="submit" class="btn btn-icon btn-pills btn-soft-danger">حذف</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div><!--end row-->
                <div style="text-align: center">
                    {!! $permissiones->render() !!}
                </div>
            </div>
        </div><!--end container-->
@endsection
