@extends('template.v1.admin.app')
@section('alert')
    <script src="{{asset('vendor/sweetalert/sweetalert.all.js')}}"></script>
    @include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])
@endsection
@section('content')

    <div class="container-fluid">
        <div class="layout-specing">
            <div ><a class="btn btn-primary" href="{{route('plane.create')}}">افزودن طرح</a></div>
            <div class="row">
                <div class="col-12 mt-4">
                    <div class="table-responsive bg-white shadow rounded">
                        <table class="table mb-0 table-center">
                            <thead>
                            <tr>
                                <th class="border-bottom p-3" style="min-width: 50px;">#</th>
                                <th class="border-bottom p-3" style="min-width: 180px;">عنوان پلن</th>
                                <th class="border-bottom p-3">نوع طرح</th>
                                <th class="border-bottom p-3" style="min-width: 150px;">توضیحات</th>
                                <th class="border-bottom p-3">قیمت</th>
                                <th class="border-bottom p-3">مقدار شارژ</th>

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
                    </div>
                </div>
            </div><!--end row-->
        </div>
    </div><!--end container-->


@endsection
