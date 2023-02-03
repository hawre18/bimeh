@extends('template.v1.admin.app')
@section('alert')
    <script src="{{asset('vendor/sweetalert/sweetalert.all.js')}}"></script>
    @include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])
@endsection
@section('content')
    <div class="page-wrapper doctris-theme toggled">

        <!-- Start Page Content -->
        <main class="page-content bg-light">
            <div class="container-fluid" >
                <div class="layout-specing">
                    <div class="row">
                        <div class="col-lg-8 mt-4">
                            <div class="card border-0 p-4 rounded shadow">
                                <form class="mt-4" method="post" action="/admin/wallet/charging">
                                    @csrf
                                    <input type="hidden" name="_method" value="patch">
                                    <div class="row">

                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">مقدار شارژ</label>
                                                <input name="charge" type="number" class="form-control" placeholder="مقدار شارژ :">
                                                <input name="customer_id" type="text" class="form-control" value="{{$customer->id}}">
                                            </div>
                                        </div><!--end col-->
                                    </div><!--end row-->
                                    <button type="submit" class="btn btn-primary">شارژ کردن حساب کاربری </button>
                                </form>
                            </div>
                        </div><!--end col-->
                    </div><!--end row-->
                </div>
            </div><!--end container-->

            <!-- Footer Start -->
            <footer class="bg-white shadow py-3">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <div class="col">
                            <div class="text-sm-start text-center">
                                <p class="mb-0 text-muted"> © داکتریس - ارائه <i class="mdi mdi-heart text-danger"></i> از <a href="" target="_blank" class="text-reset">آفرید تیم<p>
                            </div>
                        </div><!--end col-->
                    </div><!--end row-->
                </div><!--end container-->
            </footer><!--end footer-->
            <!-- End -->
        </main>
        <!--End page-content" -->
    </div>
    <!-- page-wrapper -->
@endsection

