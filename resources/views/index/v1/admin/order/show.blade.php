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
                                <th class="border-bottom p-3" style="min-width: 180px;">مشتری</th>
                                <th class="border-bottom p-3" style="min-width: 150px;">کاربر پرداخت کننده</th>
                                <th class="border-bottom p-3" style="min-width: 150px;">طرح خریداری شده</th>
                                <th class="border-bottom p-3">مبلغ پرداختی</th>
                                <th class="border-bottom p-3" style="min-width: 150px;"> شارژ موجود</th>
                                <th class="border-bottom p-3" style="min-width: 150px;"> تاریخ پرداخت</th>
                                <th class="border-bottom p-3">علیات</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td class="p-3">{{$order->customer->f_name.$order->customer->l_name}}</td>
                                <td class="p-3">{{$order->user->f_name.$order->user->l_name}}</td>
                                <td class="p-3">{{$order->plane->title}}</td>
                                <td class="p-3">{{$order->plane->price}}</td>
                                <td class="p-3">{{$order->plane->charge}}</td>
                                <td class="p-3">{{\Hekmatinasser\Verta\Verta::instance($order->created_at)->formatDifference(\Hekmatinasser\Verta\Verta::today('Asia/Tehran'))}}</td>
                                <td class="text-end p-3">
                                    @if($order->status==0)
                                        <a href="{{route('order.pay',['orderId'=>$order->id])}}" class="btn btn-icon btn-soft-success">pay</a>
                                    @endif
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <table class="table mb-0 table-center">
                            <thead>
                            <tr>
                                <th class="border-bottom p-3" style="min-width: 50px;">#</th>
                                <th class="border-bottom p-3" style="min-width: 180px;">آدرس</th>
                                <th class="border-bottom p-3" style="min-width: 150px;">استان</th>
                                <th class="border-bottom p-3">شهر</th>
                                <th class="border-bottom p-3" style="min-width: 150px;">کدپستی</th>
                                <th class="border-bottom p-3" style="min-width: 150px;">تلفن</th>
                                <th class="border-bottom p-3">علیات</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($addresses as $address)
                                <tr>
                                    <th class="p-3">{{$loop->index+1}}</th>
                                    <td class="p-3">{{$address->bodyad}}</a></td>
                                    <td class="p-3">{{$address->province->name}}</td>
                                    <td class="p-3">{{$address->city->name}}</td>
                                    <td class="p-3"> {{$address->postcode}} </td>
                                    <td class="p-3"> {{$address->phone}} </td>
                                    <td class="text-end p-3">
                                        <a href="{{route('address.destroy',$address->id)}}" class="btn btn-icon btn-pills btn-soft-danger" >حذف</a>
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
