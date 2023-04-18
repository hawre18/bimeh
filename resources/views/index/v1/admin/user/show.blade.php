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
                                <th class="border-bottom p-3" style="min-width: 180px;">نام</th>
                                <th class="border-bottom p-3" style="min-width: 150px;">نام خانوادگی</th>
                                <th class="border-bottom p-3" style="min-width: 150px;">نام کاربری</th>
                                <th class="border-bottom p-3">کدملی</th>
                                <th class="border-bottom p-3" style="min-width: 150px;"> همراه</th>
                                <th class="border-bottom p-3" style="min-width: 150px;"> ایمیل</th>

                            </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="p-3">{{$admin->f_name}}</td>
                                    <td class="p-3">{{$admin->l_name}}</td>
                                    <td class="p-3">{{$admin->user_name}}</td>
                                    <td class="p-3">{{$admin->nationalcode}}</td>
                                    <td class="p-3"> {{$admin->phone}} </td>
                                    <td class="p-3"> {{$admin->email}} </td>

                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div><!--end row-->
        </div>
    </div><!--end container-->

@endsection
