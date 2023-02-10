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
                                    <th class="border-bottom p-3" style="min-width: 50px;">#</th>
                                    <th class="border-bottom p-3" style="min-width: 180px;">کاربر</th>
                                    <th class="border-bottom p-3" style="min-width: 150px;">آدرس</th>
                                    <th class="border-bottom p-3" style="min-width: 150px;">کدپستی</th>
                                    <th class="border-bottom p-3">استان</th>
                                    <th class="border-bottom p-3">تاریخ ایجاد</th>
                                    <th class="border-bottom p-3">علیات</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($addresses as $address)
                                    <tr>
                                        <th class="p-3">{{$loop->index+1}}</th>
                                        <td class="p-3">{{$address->customer['f_name'].' '.$address->customer['l_name']}}</td>
                                        <td class="p-3">{{$address->bodyad}}</td>
                                        <td class="p-3">{{$address->postcode}}</td>
                                        <td class="p-3"> {{$address->province->name}} </td>
                                        <td class="p-3">{{\Hekmatinasser\Verta\Verta::instance($address->created_at)->formatDifference(\Hekmatinasser\Verta\Verta::today('Asia/Tehran'))}}</td>
                                        <td class="text-end p-3">
                                            <a href="{{route('address.destroy',$address->id)}}" class="btn btn-icon btn-pills btn-soft-danger" >حذف</a>
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
