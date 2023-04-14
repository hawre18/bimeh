@extends('template.v1.admin.app')
@section('alert')
    <script src="{{asset('vendor/sweetalert/sweetalert.all.js')}}"></script>
    @include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])
@endsection
@section('content')

    <div class="row">
        <div class="col-xl-4 col-lg-6 mt-4">
            <div class="card border-0 shadow rounded">
                <div class="d-flex justify-content-between align-items-center p-4 border-bottom">
                    <h6 class="mb-0"><i class="uil uil-calender text-primary ms-1 h5"></i>براساس تاریخ</h6>
                </div>
                <ul class="list-unstyled mb-0 p-4">

                    <form method="post" action="{{route('repwithdate')}}" enctype="multipart/form-data">
                        @csrf
                        <li>
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="d-inline-flex">
                                    <div class="me-3">
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                            <label for="main" class="form-label">بخش اصلی</label>
                                            <select id="main" class="form-control department-name select2input" name="main" data-live-search="true" >
                                                <option selected>انتخاب کنید</option>
                                                <option value="customers" >مشتری</option>
                                                <option value="users" >بازاریاب</option>
                                                <option value="orders" >فروش ها</option>
                                                <option value="doctors" >دکترها</option>
                                            </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                            <label class="form-label"> از تاریخ: </label>
                                            <input name="dateS" type="date" class="flatpickr flatpickr-input form-control" id="checkin-date" >
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label class="form-label"> تا تاریخ: </label>
                                                <input name="dateE" type="date" class="flatpickr flatpickr-input form-control" id="checkin-date2">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="d-grid">
                                                <button class="btn btn-primary">ثبت</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div>

                                </div>
                            </div>
                        </li>
                    </form>

                </ul>
            </div>
        </div><!--end col-->
    </div><!--end row-->
@endsection

