@extends('template.v1.admin.app')
@section('alert')
    <script src="{{asset('vendor/sweetalert/sweetalert.all.js')}}"></script>
    @include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])
@endsection
@section('content')
    <!-- Start Page Content -->
        <div class="container-fluid">
            <div class="layout-specing">
                <div class="row">
                    <div class="col-12 mt-4">
                        <div class="table-responsive bg-white shadow rounded">
                            <table class="table mb-0 table-center">
                                <thead>
                                <tr>
                                    <th class="border-bottom p-3" style="min-width: 50px;">#</th>
                                    <th class="border-bottom p-3" style="min-width: 180px;">نام</th>
                                    <th class="border-bottom p-3" style="min-width: 150px;">نام خانوادگی</th>
                                    <th class="border-bottom p-3">کدنظام پزشکی</th>
                                    <th class="border-bottom p-3" style="min-width: 150px;"> همراه</th>
                                    <th class="border-bottom p-3" style="min-width: 150px;"> ایمیل</th>
                                    <th class="border-bottom p-3">تاریخ عضویت</th>
                                    <th class="border-bottom p-3">علیات</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($doctors as $doctor)
                                    <tr>
                                        <th class="p-3">{{$loop->index+1}}</th>
                                        <td class="p-3">{{$doctor->fname}}</a></td>
                                        <td class="p-3">{{$doctor->lname}}</td>
                                        <td class="p-3">{{$doctor->sku}}</td>
                                        <td class="p-3"> {{$doctor->phone}} </td>
                                        <td class="p-3"> {{$doctor->email}} </td>
                                        <td class="p-3">{{\Hekmatinasser\Verta\Verta::instance($doctor->created_at)->formatDifference(\Hekmatinasser\Verta\Verta::today('Asia/Tehran'))}}</td>
                                        <td class="text-end p-3">
                                            <a href="{{route('doctors.edit',$doctor->id)}}" class="btn btn-icon btn-pills btn-soft-primary">ویرایش</a>
                                            <a href="{{route('doctors.destroy',$doctor->id)}}" class="btn btn-icon btn-pills btn-soft-danger">حذف</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div><!--end row-->
            </div>
        </div><!--end container-->
@endsection
