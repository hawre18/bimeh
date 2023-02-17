@extends('template.v1.admin.app')
@section('alert')
    <script src="{{asset('vendor/sweetalert/sweetalert.all.js')}}"></script>
    @include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])
@endsection
@section('content')
    <div class="page-wrapper doctris-theme toggled">
            <div class="container-fluid" >
                <div class="layout-specing">
                    <div class="row">
                        <div class="col-lg-8 mt-4">
                            <div class="card border-0 p-4 rounded shadow">
                                <div class="label label-success">
                                    <span >
                                        موجودی شما: {{$wallet->modeCharge}}تومان
                                    </span>
                                </div>
                                <form class="mt-4" method="post" action="{{route('wallet.charging',['customerId'=>$wallet->customer->id])}}">
                                    @csrf
                                    {{ method_field('PUT') }}
                                    <div class="row" id="app">
                                       <plane-component></plane-component>
                                    </div><!--end row-->
                                    <button type="submit" class="btn btn-primary">شارژ کردن حساب کاربری </button>
                                </form>
                            </div>
                        </div><!--end col-->
                    </div><!--end row-->
                </div>
            </div><!--end container-->

    </div>
    <!-- page-wrapper -->
@endsection

