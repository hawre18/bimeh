@extends('template.v1.admin.app')
@section('alert')
    <script src="{{asset('vendor/sweetalert/sweetalert.all.js')}}"></script>
    @include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])
@endsection
@section('content')
    <div class="row">
        <div class="col-xl-9 col-md-6">
            <h5 class="mb-0">خانه</h5>
        </div><!--end col-->
    </div>
@endsection
