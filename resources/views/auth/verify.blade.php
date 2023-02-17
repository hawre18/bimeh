@extends('template.v1.admin.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('تایید ایمیل آدرس') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('یک لینک تایید به آدرس ایمیل شما ارسال شد') }}
                        </div>
                    @endif

                    {{ __('قیبل از انجام کاری لطفا لینک تایید ارسالی به ایمیلتان را چک کیند') }}
                    {{ __('اگر ایمیلی دریافت نکردید اینجا کلیک کنید') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('انجام عملیات') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
