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
                                    <th class="border-bottom p-3">وضعیت</th>
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
                                        @if($sell->status==0)
                                        <td class="p-3">پرداخت نشده</td>
                                        @endif
                                        @if($sell->status==1)
                                            <td class="p-3">پرداخت شده</td>
                                        @endif
                                        <td class="p-3"> {{$sell->totalPrice}} </td>
                                        <td class="text-end p-3">
                                            <a href="" class="btn btn-icon btn-pills btn-soft-primary">dfg</a>
                                            <form method="post" action="{{route('sell.pay',$sell->id)}}">
                                                {{ csrf_field() }}
                                                {{ method_field('PATCH') }}
                                                <button class="btn btn-icon btn-pills btn-soft-success" type="submit">pay</button>
                                            </form>
                                            <form method="post" action="{{route('sell.destroy',$sell->id)}}">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                <button class="btn btn-icon btn-pills btn-soft-primary" type="submit">حذف</button>
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
