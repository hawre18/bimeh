@extends('template.v1.admin.app')
@section('alert')
    <script src="{{asset('vendor/sweetalert/sweetalert.all.js')}}"></script>
    @include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])
@endsection
@section('content')
    <div class="row">
        <div class="col-xl-9 col-md-6">
            <h5 class="mb-0">فاکتورها</h5>
        </div><!--end col-->
        <div class="container-fluid">
            <div class="layout-specing">
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
                                <th class="border-bottom p-3">دکتر مرجع</th>
                                <th class="border-bottom p-3" style="min-width: 150px;"> مبلغ</th>
                                <th class="border-bottom p-3">علیات</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($sells as $sell)
                                <tr>
                                    <th class="p-3">{{$loop->index+1}}</th>
                                    <td class="p-3">{{$sell->customer->f_name.' '}}{{$sell->customer->l_name.' '}}{{$sell->customer->nationalcode}}</td>
                                    <td class="p-3">{{\Hekmatinasser\Verta\Verta::instance($sell->created_at)->formatJalaliDatetime(\Hekmatinasser\Verta\Verta::today('Asia/Tehran'))}}</td>
                                    <td class="p-3">{{$sell->id}}</td>
                                    @if($sell->status==0)
                                        <td class="p-3" ><span class="label alert-info" >پرداخت نشده</span></td>
                                    @endif
                                    @if($sell->status==1)
                                        <td class="p-3" ><span class="label alert-success">پرداخت شده</span></td>
                                    @endif
                                    <td class="p-3"> {{$sell->doctor->fname.' '}}{{$sell->doctor->lname}} </td>
                                    <td class="p-3"> {{$sell->totalPrice}} </td>
                                    <td class="text-end p-3">
                                        @if($sell->status==1)
                                            <a href="{{route('sells.pdf',$sell->id)}}" class="btn  btn-soft-info">PDF</a>
                                        @endif
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
