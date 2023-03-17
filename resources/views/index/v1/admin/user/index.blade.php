@extends('template.v1.admin.app')
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
                                    <th class="border-bottom p-3" style="min-width: 180px;">نام</th>
                                    <th class="border-bottom p-3" style="min-width: 150px;">ایمیل</th>
                                    <th class="border-bottom p-3">کدملی</th>
                                    <th class="border-bottom p-3" style="min-width: 150px;"> همراه</th>
                                    <th class="border-bottom p-3">علیات</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($admins as $admin)
                                    <tr>
                                        <th class="p-3">{{$loop->index+1}}</th>
                                        <td class="p-3"><a href="{{route('crud.show',$admin->id)}}" class="text-dark">{{$admin->f_name.' '.$admin->l_name}}</a></td>
                                        <td class="p-3">{{$admin->email}}</td>
                                        <td class="p-3">{{$admin->nationalcode}}</td>
                                        <td class="p-3">{{$admin->phone}}</td>
                                        <td class="text-end p-3">
                                            <a href="{{route('crud.edit',$admin->id)}}" class="btn btn-icon btn-pills btn-soft-success">ویرایش</a>
                                            <a href="{{route('crud.destroy',$admin->id)}}" class="btn btn-icon btn-pills btn-soft-danger" >حذف</a>
                                            @if($admin->level=='user')
                                                <form method="post" action="{{route('admins.active',$admin->id)}}">
                                                    {{ csrf_field() }}
                                                    {{ method_field('PATCH') }}
                                                    <button type="submit" class="btn btn-icon btn-pills btn-soft-success">A</button>
                                                </form>
                                            @endif
                                            @if($admin->level=='admin')
                                                <form method="post" action="{{route('admins.active',$admin->id)}}">
                                                    {{ csrf_field() }}
                                                    {{ method_field('PATCH') }}
                                                    <button type="submit" class="btn btn-icon btn-pills btn-soft-danger">DA</button>
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


            </div>
        </div><!--end container-->


@endsection
