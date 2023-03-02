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
                                <th class="border-bottom p-3">کدملی</th>
                                <th class="border-bottom p-3" style="min-width: 150px;"> همراه</th>
                                <th class="border-bottom p-3">تاریخ عضویت</th>
                                <th class="border-bottom p-3">علیات</th>
                            </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="p-3">{{$customer->f_name}}</td>
                                    <td class="p-3">{{$customer->l_name}}</td>
                                    <td class="p-3">{{$customer->nationalcode}}</td>
                                    <td class="p-3"> {{$customer->phone}} </td>
                                    <td class="p-3">{{\Hekmatinasser\Verta\Verta::instance($customer->created_at)->formatDifference(\Hekmatinasser\Verta\Verta::today('Asia/Tehran'))}}</td>
                                    <td class="text-end p-3">
                                        <a href="{{route('create.address',['customerId'=>$customer->id])}}" class="btn btn-icon btn-pills btn-soft-primary">آدرس</a>
                                        <a href="{{route('wallet.charge',['customerId'=>$customer->id])}}" class="btn btn-icon btn-pills btn-soft-success">کیف</a>
                                        <form method="post" action="{{route('customer.destroy',$customer->id)}}">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button type="submit" class="btn btn-icon btn-pills btn-soft-danger">حذف</button>
                                        </form>
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
                                        <form method="post" action="{{route('address.destroy',$address->id)}}">
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
        </div>
    </div><!--end container-->

@endsection
