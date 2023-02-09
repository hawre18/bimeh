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
                                    <th class="border-bottom p-3">کدملی</th>
                                    <th class="border-bottom p-3" style="min-width: 150px;"> همراه</th>
                                    <th class="border-bottom p-3">تاریخ عضویت</th>
                                    <th class="border-bottom p-3">علیات</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($customers as $customer)
                                    <tr>
                                        <th class="p-3">{{$loop->index+1}}</th>
                                        <td class="p-3">
                                            <a href="#" class="text-dark">{{$customer->f_name}}</a>
                                        </td>
                                        <td class="p-3">{{$customer->l_name}}</td>
                                        <td class="p-3">{{$customer->nationalcode}}</td>
                                        <td class="p-3"> {{$customer->phone}} </td>
                                        <td class="p-3">{{$customer->created_at}}</td>
                                        <td class="text-end p-3">
                                            <a href="{{route('address.customer',$customer->id)}}" class="btn btn-icon btn-pills btn-soft-primary">dfg</a>
                                            <a href="{{route('wallet.charge',$customer->id)}}" class="btn btn-icon btn-pills btn-soft-success"><i class="uil uil-check-circle"></i></a>
                                            <a href="#" class="btn btn-icon btn-pills btn-soft-danger" data-bs-toggle="modal" data-bs-target="#cancelappointment"><i class="uil uil-times-circle"></i></a>
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
