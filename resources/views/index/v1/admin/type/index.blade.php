@extends('template.v1.admin.app')
@section('alert')
    <script src="{{asset('vendor/sweetalert/sweetalert.all.js')}}"></script>
    @include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])
@endsection
@section('content')

        <div class="container-fluid">
            <div class="layout-specing">
                <div ><a class="btn btn-primary" href="{{route('type.create')}}">افزودن نوع</a></div>
                <div class="row">
                    <div class="col-12 mt-4">
                        <div class="table-responsive bg-white shadow rounded">
                            <table class="table mb-0 table-center">
                                <thead>
                                <tr>
                                    <th class="border-bottom p-3" style="min-width: 50px;">#</th>
                                    <th class="border-bottom p-3" style="min-width: 180px;">نام</th>
                                    <th class="border-bottom p-3" style="min-width: 150px;">برچسب</th>
                                    <th class="border-bottom p-3">علیات</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($types as $type)
                                    <tr>
                                        <th class="p-3">{{$loop->index+1}}</th>
                                        <td class="p-3">{{$type->name}}</td>
                                        <td class="p-3">{{$type->label}}</td>
                                        <td class="text-end p-3">
                                            <a href="{{route('type.edit',$type->id)}}" class="btn btn-icon btn-pills btn-soft-success" >ویرایش</a>
                                            <form method="post" action="{{route('type.destroy',$type->id)}}">
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
                <div style="text-align: center">
                    {!! $types->render() !!}
                </div>
            </div>
        </div><!--end container-->


@endsection
