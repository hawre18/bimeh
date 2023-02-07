@extends('template.v1.doctor.app')
@section('alert')
    <script src="{{asset('vendor/sweetalert/sweetalert.all.js')}}"></script>
    @include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])
@endsection
@section('content')
        <div class="container-fluid">
            <div class="layout-specing">
                <div class="row">
                    <div class="col-12 mt-4">
                        <div class="table-responsive bg-white shadow rounded">
                            <table class="table mb-0 table-center">
                                <thead>
                                <tr>
                                    <th class="border-bottom p-3" style="min-width: 50px;">#</th>
                                    <th class="border-bottom p-3" style="min-width: 180px;">مشتری</th>
                                    <th class="border-bottom p-3" style="min-width: 150px;">تاریخ صدور</th>
                                    <th class="border-bottom p-3">کدفاکتور</th>
                                    <th class="border-bottom p-3" style="min-width: 150px;"> مبلغ</th>
                                    <th class="border-bottom p-3">علیات</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($sells as $sell)
                                    <tr>
                                        <th class="p-3">{{$loop->index+1}}</th>
                                        <td class="p-3">
                                            <a href="{{route('sell.show',['idSell'=>$sell->id,'idCustomer'=>$sell->customer->nationalcode])}}" class="text-dark">{{$sell->customer->f_name.' '}}{{$sell->customer->l_name.' '}}{{$sell->customer->nationalcode}}</a>
                                        </td>
                                        <td class="p-3">{{\Hekmatinasser\Verta\Verta::instance($sell->created_at)->formatDifference(\Hekmatinasser\Verta\Verta::today('Asia/Tehran'))}}</td>
                                        <td class="p-3">{{$sell->id}}</td>
                                        <td class="p-3"> {{$sell->totalPrice}} </td>
                                        <td class="text-end p-3">
                                            <a href="" class="btn btn-icon btn-pills btn-soft-primary">dfg</a>
                                            <a href="#" class="btn btn-icon btn-pills btn-soft-success" data-bs-toggle="modal" data-bs-target="#acceptappointment"><i class="uil uil-price-circle"></i></a>
                                            <a href="" class="btn btn-icon btn-pills btn-soft-danger" data-bs-toggle="modal" data-bs-target="#cancelappointment"><i class="uil uil-times-circle"></i></a>
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
