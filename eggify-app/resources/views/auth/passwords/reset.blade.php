@extends('admin.layouts.auth')

@section('content')
<div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper auth-form-light">
            <div class="content-wrapper d-flex align-items-center auth px-0">
            <div class="row w-100 mx-0">
                <div class="col-lg-4 mx-auto">
                <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                    <h4> @lang('global.app_forgot_password')</h4>
                    <h6 class="font-weight-light">
                        @lang('global.app_change_notifications_field_1_label')</h6>

                    <div class="card-body">
                        <form method="POST" action="{{ route('password.update') }}">
                            @csrf
                            <input type="hidden" name="token" value="{{ $token }}">
                            <div class="form-group">
                                <input id="email" type="email"
                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                    value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus
                                    placeholder="Email">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    required autocomplete="new-password"
                                    placeholder="@lang('global.app_new_password')">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input id="password-confirm" type="password" class="form-control"
                                    name="password_confirmation" required autocomplete="new-password"
                                    placeholder="@lang('global.app_password_confirm')">
                            </div>
                            <div class="form-group mb-0">

                                <button type="submit"
                                    class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">
                                    {{ __('Reset Password') }}
                                </button>

                                <div class="text-center mt-4 font-weight-light">
                                        {{ trans('auth.register.logintxt') }} <a href="{{ route('login') }}"
                                            class="text-primary">{{ trans('auth.register.login') }}</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
