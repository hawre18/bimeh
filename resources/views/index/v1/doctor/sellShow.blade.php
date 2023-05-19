@extends('template.v1.doctor.app')
@section('alert')
    <script src="{{asset('vendor/sweetalert/sweetalert.all.js')}}"></script>
    @include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])
@endsection
@section('content')
    <div class="container-fluid">
        <div class="layout-specing">
            <div class="row">
                <div class="col-xl-9 col-md-6">
                    <h5 class="mb-0">جزئیات فاکتور</h5>
                </div><!--end col-->
                <div class="col-12 mt-4">
                    <div class="table-responsive bg-white shadow rounded">
                        <div class="label alert-success"><span>موجودی کیف پول: </span>{{$customer->wallet->modeCharge}}</div>
                        <table class="table mb-0 table-center">
                            <thead>
                            <tr>
                                <th class="border-bottom p-3" style="min-width: 180px;">مشتری</th>
                                <th class="border-bottom p-3" style="min-width: 150px;">تاریخ صدور</th>
                                <th class="border-bottom p-3">کدفاکتور</th>
                                <th class="border-bottom p-3">خدمات</th>
                                <th class="border-bottom p-3" style="min-width: 150px;"> مبلغ</th>
                                <th class="border-bottom p-3">علیات</th>
                            </tr>
                            </thead>
                            <tbody>

                                <tr>
                                    <td class="p-3">
                                        @if($sell->customer!=null)
                                            {{$customer->f_name.' '}}{{$customer->l_name.' '}}{{$customer->nationalcode}}
                                    @elseif($sell->customer==null)
                                    null
                                            @endif
                                    </td>
                                    <td class="p-3">{{\Hekmatinasser\Verta\Verta::instance($sell->created_at)->formatDifference(\Hekmatinasser\Verta\Verta::today('Asia/Tehran'))}}</td>
                                    <td class="p-3">{{$sell->id}}</td>
                                    <td class="p-3"> @foreach($sell->services as $service){{$service->title.','}} @endforeach</td>
                                    <td class="p-3"> {{$sell->totalPrice}} </td>
                                    <td class="text-end p-3"><div class="  mt-4 mt-md-0 text-left">
                                            <form method="post" action="{{route('sell.pay',$sell->id)}}">
                                                {{ csrf_field() }}
                                                {{ method_field('PATCH') }}
                                                <button class="btn btn-primary" type="submit">pay</button>
                                            </form></div></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div><!--end row-->
        </div>
    </div><!--end container-->
@endsection
