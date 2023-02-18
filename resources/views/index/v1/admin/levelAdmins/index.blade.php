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
                                    <th class="border-bottom p-3" style="min-width: 150px;">نام خانوادگی</th>
                                    <th class="border-bottom p-3">مقام</th>
                                    <th class="border-bottom p-3">علیات</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($roles as $role)
                                    @if(count($role->users))
                                        @foreach($role->users as $user)
                                    <tr>
                                        <td class="p-3">{{$loop->index+1}}</td>
                                        <td class="p-3">{{$user->f_name}}</td>
                                        <td class="p-3">{{$user->l_name}}</td>
                                        <td class="p-3">{{$role->label}}</td>
                                        <td class="text-end p-3">
                                            <a href="{{route('level.destroy',$role->id)}}" class="btn btn-soft-danger" >حذف مقام</a>
                                        </td>
                                    </tr>
                                        @endforeach
                                    @endif
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div><!--end row-->
            </div>
        </div><!--end container-->
@endsection
