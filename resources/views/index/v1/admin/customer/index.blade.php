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
                                    <th class="border-bottom p-3">علیات</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($customers as $customer)
                                    <tr>
                                        <th class="p-3">{{$loop->index+1}}</th>
                                        <td class="p-3">
                                            <a href="{{route('customer.show',$customer->id)}}" class="text-dark">{{$customer->f_name}}</a>
                                        </td>
                                        <td class="p-3">{{$customer->l_name}}</td>
                                        <td class="p-3">{{$customer->nationalcode}}</td>
                                        <td class="text-end p-3">
                                            <a href="{{route('create.address',['customerId'=>$customer->id])}}" class="btn btn-icon btn-pills btn-soft-primary">آدرس</a>
                                            <a href="{{route('wallet.charge',['customerId'=>$customer->id])}}" class="btn btn-icon btn-pills btn-soft-success">کیف</a>
                                            <a href="{{route('customer.destroy',$customer->id)}}" class="btn btn-icon btn-pills btn-soft-danger" >حذف</a>
                                            <a href="{{route('customer.edit',$customer->id)}}" class="btn btn-icon btn-pills btn-soft-danger" >ویرایش</a>
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
