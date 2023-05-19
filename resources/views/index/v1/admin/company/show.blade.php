@extends('template.v1.admin.app')
@section('alert')
    <script src="{{asset('vendor/sweetalert/sweetalert.all.js')}}"></script>
    @include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])
@endsection
@section('content')
    <!-- Start Page Content -->
    <div class="container-fluid">
        <div class="layout-specing">
            <div class="row">
                <div class="col-12 mt-4">
                    <div class="table-responsive bg-white shadow rounded">
                        <table class="table mb-0 table-center">
                            <thead>
                            <tr>
                                <th class="border-bottom p-3" >شرکت/ارگان</th>
                                <th class="border-bottom p-3" >مدیر شرکت</th>
                                <th class="border-bottom p-3">کد ثبتی</th>
                                <th class="border-bottom p-3" >استان</th>
                                <th class="border-bottom p-3">شهر</th>
                                <th class="border-bottom p-3">آدرس</th>
                                <th class="border-bottom p-3">تلفن</th>
                                <th class="border-bottom p-3">کد پستی</th>
                                <th class="border-bottom p-3">کاربر ثبت کننده</th>
                            </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="p-3">{{$company->companyName}}</td>
                                    <td class="p-3">{{$company->companyBoss}}</td>
                                    <td class="p-3">{{$company->uniqueCode}}</td>
                                    <td class="p-3">
                                        @if($company->province!=null)
                                            {{$company->province->name}}
                                    @elseif($company->province==null)
                                    null
                                            @endif
                                    </td>
                                    <td class="p-3">
                                        @if($company->city->name!=null)
                                            {{$company->city->name}}
                                        @elseif($company->city->name==null)
                                            null
                                        @endif
                                    </td>
                                    <td class="p-3"> {{$company->address}} </td>
                                    <td class="p-3"> {{$company->tellphone}} </td>
                                    <td class="p-3"> {{$company->postcode}} </td>
                                    <td class="p-3">
                                        @if($company->user!=null)
                                            {{$company->user->f_name." "}}{{$company->user->l_name}}
                                        @elseif($company->user==null)
                                            null
                                        @endif
                                    </td>

                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div><!--end row-->
        </div>
    </div><!--end container-->

@endsection
