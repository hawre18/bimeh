@extends('template.v1.admin.app')
@section('alert')
    <script src="{{asset('vendor/sweetalert/sweetalert.all.js')}}"></script>
    @include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])
@endsection
@section('content')

        <div class="container-fluid">
            <div class="layout-specing">
                <div ><a class="btn btn-primary" href="{{route('wallets.create')}}">افزودن کیف پول</a></div>
                <div class="row">
                    <div class="col-12 mt-4">
                        <div class="table-responsive bg-white shadow rounded">
                            <table class="table mb-0 table-center">
                                <thead>
                                <tr>
                                    <th class="border-bottom p-3" style="min-width: 50px;">#</th>
                                    <th class="border-bottom p-3" style="min-width: 180px;">مشتری</th>
                                    <th class="border-bottom p-3" style="min-width: 150px;">نوع</th>
                                    <th class="border-bottom p-3">شارژ</th>
                                    <th class="border-bottom p-3">علیات</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($wallets as $wallet)
                                    <tr>
                                        <th class="p-3">{{$loop->index+1}}</th>
                                        <td class="p-3">{{$wallet->customer->f_name}}{{' '}}{{$wallet->customer->l_name}}</td>
                                        <td class="p-3">{{$wallet->type->label}}</td>
                                        <td class="p-3">{{$wallet->modeCharge}}</td>
                                        <td class="text-end p-3">
                                            <a href="{{route('wallets.edit',$wallet->id)}}" class="btn btn-icon btn-pills btn-soft-success" >ویرایش</a>
                                            <a href="{{route('wallet.charge',['customerId'=>$wallet->customer->id,'typePlane'=>$wallet->type_id])}}" class="btn btn-icon btn-pills btn-soft-success">کیف</a>
                                            <form method="post" action="{{route('wallets.destroy',$wallet->id)}}">
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
