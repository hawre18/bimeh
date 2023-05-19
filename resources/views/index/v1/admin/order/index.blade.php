@extends('template.v1.admin.app')
@section('alert')
    <script src="{{asset('vendor/sweetalert/sweetalert.all.js')}}"></script>
    @include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])
@endsection
@section('content')
    <!-- Start Page Content -->
    <div class="container-fluid">
        <div class="layout-specing">
            <div ><a class="btn btn-primary" href="{{route('order.create')}}">ایجاد فروش</a></div>
            <div class="row">
                <div class="col-12 mt-4">
                    <div class="table-responsive bg-white shadow rounded">
                        <table class="table mb-0 table-center">
                            <thead>
                            <tr>
                                <th class="border-bottom p-3" style="min-width: 50px;">#</th>
                                <th class="border-bottom p-3" style="min-width: 180px;">طرح انتخابی</th>
                                <th class="border-bottom p-3" style="min-width: 150px;">مشتری</th>
                                <th class="border-bottom p-3" style="min-width: 150px;">کاربر پرداخت کننده</th>
                                <th class="border-bottom p-3" style="min-width: 150px;">نوع پرداخت</th>
                                <th class="border-bottom p-3" style="min-width: 150px;">شناسه پرداخت</th>
                                <th class="border-bottom p-3">وضعیت</th>
                                <th class="border-bottom p-3">عملیات</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($orders as $order)
                                <tr>
                                    <th class="p-3">{{$loop->index+1}}</th>
                                    <td class="p-3">
                                        @if($order->plane!=null)
                                            {{$order->plane->title}}
                                    @elseif($order->plane==null)
                                    null
                                            @endif
                                    </td>
                                    <td class="p-3">
                                        @if($order->customer!=null)
                                            {{$order->customer->f_name.' '.$order->customer->l_name.' '.$order->customer->nationalcode}}
                                    @elseif($order==null)
                                    null
                                            @endif
                                    </td>
                                    <td class="p-3">
                                        @if($order->user!=null)
                                            {{$order->user->f_name.' '.$order->user->l_name}}
                                    @elseif($order->user==null)
                                    null
                                    @endif
                                    </td>
                                    @if($order->payType=='transfer')
                                        <td class="p-3" ><span class="label alert-info" >انتقال وجه</span></td>
                                    @endif
                                    @if($order->payType=="cache")
                                        <td class="p-3" ><span class="label alert-success">نقدا</span></td>
                                    @endif
                                    @if($order->payType=="pos")
                                        <td class="p-3" ><span class="label alert-success">دستگاه pos</span></td>
                                    @endif
                                    <td class="p-3" ><span class="label alert-success">{{$order->codePay}}</span></td>
                                    @if($order->status==0)
                                        <td class="p-3" ><span class="label alert-info" >پرداخت نشده</span></td>
                                    @endif
                                    @if($order->status==1)
                                        <td class="p-3" ><span class="label alert-success">پرداخت شده</span></td>
                                    @endif

                                    <td class="text-end p-3">
                                        @if($order->status==0)
                                            <a href="{{route('order.pay',['orderId'=>$order->id])}}" class="btn btn-icon btn-soft-success">pay</a>
                                            <form method="post" action="{{route('order.destroy',$order->id)}}">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                <button type="submit" class="btn btn-icon btn-pills btn-soft-danger">حذف</button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div><!--end row-->
            <div style="text-align: center">
                {!! $orders->render() !!}
            </div>
        </div>
    </div><!--end container-->

@endsection
