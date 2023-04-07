@extends('template.v1.admin.app')
@section('alert')
    <script src="{{asset('vendor/sweetalert/sweetalert.all.js')}}"></script>
    @include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])
@endsection
@section('content')

    <div class="container-fluid" id="app">
        <div class="layout-specing">
            <form >

            </form>
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <rep-component></rep-component>
                    </div>
                </div>

            </div><!--end row-->


        </div>
    </div><!--end container-->


@endsection

