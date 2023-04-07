@extends('template.v1.admin.app')
@section('alert')
    <script src="{{asset('vendor/sweetalert/sweetalert.all.js')}}"></script>
    @include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])
@endsection
@section('content')
    <!-- Start Page Content -->
        <div class="container-fluid">
            <div class="layout-specing">
                <div ><a class="btn btn-primary" href="{{route('company.create')}}">افزودن مشتری</a></div>
                <div class="row">
                    <div class="col-12 mt-4">
                        <div class="table-responsive bg-white shadow rounded">
                            <table class="table mb-0 table-center">
                                <thead>
                                <tr>
                                    <th class="border-bottom p-3" style="min-width: 50px;">#</th>
                                    <th class="border-bottom p-3" style="min-width: 180px;">اسم شرکت</th>
                                    <th class="border-bottom p-3" style="min-width: 150px;">مدیرشرکت</th>
                                    <th class="border-bottom p-3">کد ثبتی</th>
                                    <th class="border-bottom p-3">علیات</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($companys as $company)
                                    <tr>
                                        <th class="p-3">{{$loop->index+1}}</th>
                                        <td class="p-3">
                                            <a href="{{route('company.show',$company->id)}}" class="text-dark">{{$company->companyName}}</a>
                                        </td>
                                        <td class="p-3">{{$company->companyBoss}}</td>
                                        <td class="p-3">{{$company->uniqueCode}}</td>
                                        <td class="text-end p-3">
                                            <a href="{{route('company.edit',$company->id)}}" class="btn btn-icon btn-pills btn-soft-danger" >ویرایش</a>
                                            <form method="post" action="{{route('company.destroy',$company->id)}}">
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
                    {!! $companys->render() !!}
                </div>
            </div>
        </div><!--end container-->

@endsection
