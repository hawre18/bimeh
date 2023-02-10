@extends('template.v1.admin.app')
@section('alert')
    <script src="{{asset('vendor/sweetalert/sweetalert.all.js')}}"></script>
    @include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])
@endsection
@section('content')
            <div class="container-fluid" >
                <div class="layout-specing">
                    <div class="row">
                        <div class="col-lg-8 mt-4">
                            <div class="card border-0 p-4 rounded shadow">
                                <form class="mt-4" method="post" action="{{route('addresses.store',['customerId'=>$customer->id])}}">
                                    @csrf
                                    <div class="alert alert-info"><span>برای کاربر موردنظر {{count($addresses)}} آدر ثبت شده است</span><a href="{{url('admin/address')}}"><i class="uil uil-home"></i></a></div>
                                    <div class="row">
                                        <div class="col-md-6" id="app">
                                            <div class="mb-3">
                                                <select-city-component></select-city-component>
                                            </div>
                                        </div><!--end col-->

                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">آدرس</label>
                                                <textarea name="addrbody" type="textarea" class="form-control" value="{{old('addrbody')}}"></textarea>
                                            </div>
                                        </div><!--end col-->

                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">تلفن ثابت</label>
                                                <input name="tellphone" id="number" type="text" value="{{old('tellphone')}}" class="form-control" placeholder="تلفن ثابت :">
                                            </div>
                                        </div><!--end col-->
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">شماره تماس</label>
                                                <input name="phone" id="phone" type="text" class="form-control" placeholder="شماره تماس :" value="{{old('phone')}}">
                                                <input name="customer_id" disabled hidden  type="text" class="form-control hidden disabel" value="{{$customer->id}}">
                                            </div>
                                        </div><!--end col-->
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">کدپستی</label>
                                                <input name="postcode" id="number" type="text" class="form-control" placeholder="کدپستی" value="{{old('postcode')}}">
                                            </div>
                                        </div><!--end col-->
                                    </div><!--end row-->
                                    <button type="submit" class="btn btn-primary">افزودن آدرس</button>
                                </form>
                            </div>
                        </div><!--end col-->
                        <div class="col-12 mt-4">
                            <div class="table-responsive bg-white shadow rounded">
                                <table class="table mb-0 table-center">
                                    <thead>
                                    <tr>
                                        <th class="border-bottom p-3" style="min-width: 50px;">#</th>
                                        <th class="border-bottom p-3" style="min-width: 180px;">آدرس</th>
                                        <th class="border-bottom p-3" style="min-width: 150px;">استان</th>
                                        <th class="border-bottom p-3">شهر</th>
                                        <th class="border-bottom p-3" style="min-width: 150px;">کدپستی</th>
                                        <th class="border-bottom p-3" style="min-width: 150px;">تلفن</th>
                                        <th class="border-bottom p-3">علیات</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($addresses as $address)
                                        <tr>
                                            <th class="p-3">{{$loop->index+1}}</th>
                                            <td class="p-3">{{$address->bodyad}}</a></td>
                                            <td class="p-3">{{$address->province->name}}</td>
                                            <td class="p-3">{{$address->city->name}}</td>
                                            <td class="p-3"> {{$address->postcode}} </td>
                                            <td class="p-3"> {{$address->phone}} </td>
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

