@extends('template.v1.admin.app')
@section('alert')
    <script src="{{asset('vendor/sweetalert/sweetalert.all.js')}}"></script>
    @include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])
@endsection
@section('content')

    <div class="container-fluid">
        <div class="layout-specing">
            <div ><a class="btn btn-primary" href="{{route('plane.create')}}">چاپ</a></div>
            <div class="row">
                <div class="col-12 mt-4">
                    <div class="table-responsive bg-white shadow rounded">
                        @if($type=='doctors')
                            <table class="table mb-0 table-center">
                                <thead>
                                <tr>
                                    <th class="border-bottom p-3" style="min-width: 50px;">#</th>
                                    <th class="border-bottom p-3" style="min-width: 180px;">نام</th>
                                    <th class="border-bottom p-3" style="min-width: 150px;">نام خانوادگی</th>
                                    <th class="border-bottom p-3">کدنظام </th>
                                    <th class="border-bottom p-3" style="min-width: 150px;"> همراه</th>
                                    <th class="border-bottom p-3" style="min-width: 150px;"> ایمیل</th>
                                    <th class="border-bottom p-3">تاریخ عضویت</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($rows as $row)
                                    <tr>
                                        <th class="p-3">{{$loop->index+1}}</th>
                                        <td class="p-3">{{$row->fname}}</a></td>
                                        <td class="p-3">{{$row->lname}}</td>
                                        <td class="p-3">{{$row->sku}}</td>
                                        <td class="p-3"> {{$row->phone}} </td>
                                        <td class="p-3"> {{$row->email}} </td>
                                        <td class="p-3">{{\Hekmatinasser\Verta\Verta::instance($row->created_at)->formatJalaliDatetime(\Hekmatinasser\Verta\Verta::today('Asia/Tehran'))}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        @endif
                        @if($type=='customers')
                                <table class="table mb-0 table-center">
                                    <thead>
                                    <tr>
                                        <th class="border-bottom p-3" style="min-width: 50px;">#</th>
                                        <th class="border-bottom p-3" style="min-width: 180px;">نام</th>
                                        <th class="border-bottom p-3" style="min-width: 150px;">نام خانوادگی</th>
                                        <th class="border-bottom p-3">کدملی</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($rows as $row)
                                        <tr>
                                            <th class="p-3">{{$loop->index+1}}</th>
                                            <td class="p-3">{{$row->f_name}}</td>
                                            <td class="p-3">{{$row->l_name}}</td>
                                            <td class="p-3">{{$row->nationalcode}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            @endif
                    </div>
                </div>
            </div><!--end row-->
        </div>
    </div><!--end container-->


@endsection
