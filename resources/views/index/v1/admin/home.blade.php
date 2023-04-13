@extends('template.v1.admin.app')
@section('alert')
    <script src="{{asset('vendor/sweetalert/sweetalert.all.js')}}"></script>
    @include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])
@endsection
@section('content')
    <div class="container-fluid">
        <div class="layout-specing">
            <h5 class="mb-0">داشبرد</h5>

            <div class="row">
                <div class="col-xl-4 col-lg-4 col-md-4 mt-4">
                    <div class="card features feature-primary rounded border-0 shadow p-4">
                        <div class="d-flex align-items-center">
                            <div class="icon text-center rounded-md">
                                <i class="uil uil-bed h3 mb-0"></i>
                            </div>
                            <div class="flex-1 me-2">
                                <h5 class="mb-0">{{$customers}}</h5>
                                <p class="text-muted mb-0">مشتریان جدید</p>
                            </div>
                        </div>
                    </div>
                </div><!--end col-->

                <div class="col-xl-4 col-lg-4 col-md-4 mt-4">
                    <div class="card features feature-primary rounded border-0 shadow p-4">
                        <div class="d-flex align-items-center">
                            <div class="icon text-center rounded-md">
                                <i class="uil uil-file-medical-alt h3 mb-0"></i>
                            </div>
                            <div class="flex-1 me-2">
                                <h5 class="mb-0">{{$orders}}</h5>
                                <p class="text-muted mb-0">فاکتورهای فروش طرح</p>
                            </div>
                        </div>
                    </div>
                </div><!--end col-->

                <div class="col-xl-4 col-lg-4 col-md-4 mt-4">
                    <div class="card features feature-primary rounded border-0 shadow p-4">
                        <div class="d-flex align-items-center">
                            <div class="icon text-center rounded-md">
                                <i class="uil uil-social-distancing h3 mb-0"></i>
                            </div>
                            <div class="flex-1 me-2">
                                <h5 class="mb-0">{{$doctors}}</h5>
                                <p class="text-muted mb-0">دکترهای جدید</p>
                            </div>
                        </div>
                    </div>
                </div><!--end col-->

                <div class="col-xl-4 col-lg-4 col-md-4 mt-4">
                    <div class="card features feature-primary rounded border-0 shadow p-4">
                        <div class="d-flex align-items-center">
                            <div class="icon text-center rounded-md">
                                <i class="uil uil-medkit h3 mb-0"></i>
                            </div>
                            <div class="flex-1 me-2">
                                <h5 class="mb-0">{{$sells}}</h5>
                                <p class="text-muted mb-0">فاکتورهای صادره کلینیک ها</p>
                            </div>
                        </div>
                    </div>
                </div><!--end col-->
            </div><!--end row-->

            <div class="row">
                <div class="col-xl-4 col-lg-6 mt-4">
                    <div class="card border-0 shadow rounded">
                        <div class="d-flex justify-content-between align-items-center p-4 border-bottom">
                            <h6 class="mb-0"><i class="uil uil-calender text-primary ms-1 h5"></i>دکترهای فعال نشده</h6>
                            <h6 class="text-muted mb-0">{{$doctors}} دکتر</h6>
                        </div>

                        <ul class="list-unstyled mb-0 p-4">
                            <li>
                                @foreach($listDoctors as $doctor)
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="d-inline-flex">
                                        <div class="me-3">
                                            <h6 class="text-dark mb-0 d-block">{{$doctor->fname.' '.$doctor->lname}}</h6>
                                            <small class="text-muted">{{$doctor->sku}}</small>
                                        </div>
                                    </div>
                                    <div>
                                        <form method="post" action="{{route('doctors.active',$doctor->id)}}">
                                            {{ csrf_field() }}
                                            {{ method_field('PATCH') }}
                                            <button type="submit" class="btn btn-icon btn-pills btn-soft-success">A</button>
                                        </form>
                                    </div>
                                </div>
                                @endforeach
                            </li>
                        </ul>
                    </div>
                </div><!--end col-->
                <div class="col-xl-4 col-lg-6 mt-4">
                    <div class="card border-0 shadow rounded">
                        <div class="d-flex justify-content-between align-items-center p-4 border-bottom">
                            <h6 class="mb-0"><i class="uil uil-calender text-primary ms-1 h5"></i>فاکتورهای تایید نشده</h6>
                            <h6 class="text-muted mb-0">{{$orders}} فاکتور</h6>
                        </div>

                        <ul class="list-unstyled mb-0 p-4">
                            <li>
                                @foreach($listOrders as $order)
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="d-inline-flex">
                                            <div class="me-3">
                                                <h6 class="text-dark mb-0 d-block">{{$order->customer->f_name.' '.$order->customer->l_name}}</h6>
                                                <small class="text-muted">{{$order->codePay}}</small>
                                            </div>
                                        </div>
                                        <div>
                                            <form method="post" action="{{route('order.pay',$order->id)}}">
                                                {{ csrf_field() }}
                                                {{ method_field('PATCH') }}
                                                <button type="submit" class="btn btn-icon btn-pills btn-soft-success">Pay</button>
                                            </form>
                                        </div>
                                    </div>
                                @endforeach
                            </li>
                        </ul>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div>
    </div><!--end container-->
@endsection
