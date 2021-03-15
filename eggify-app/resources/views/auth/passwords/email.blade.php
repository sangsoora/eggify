@extends('admin.layouts.auth')

@section('content')
<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper auth-form-light">
        <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
            <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                <h4>@lang('global.app_reset_password')</h4>
                <h6 class="font-weight-light">
                    @lang('global.app_change_notifications_field_1_label')</h6>
                    {{-- <div class="card-header">{{ __('Reset Password') }}</div> --}}
                    <div class="card-body">
                        @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                        @endif
                        <form method="POST" class="pt-3" action="{{ route('password.email') }}">
                            @csrf
                            <div class="form-group">
                                <input id="email" type="email"
                                    class="form-control form-control-lg @error('email') is-invalid @enderror"
                                    name="email" placeholder="Email" value="{{ old('email') }}" required
                                    autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="mt-3">
                                <button type="submit"
                                    class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">
                                    @lang('global.app_send')
                                </button>
                            </div>
                            <div class="text-center mt-4 font-weight-light">
                                {{ trans('auth.register.logintxt') }} <a href="{{ route('login') }}"
                                    class="text-primary">{{ trans('auth.register.login') }}</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
