@extends('admin.layouts.auth')

@section('content')
<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper auth-form-light">
        <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
            <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">

                    @include('admin.layouts.partials.error')

                  <h4>{{ trans('auth.register.create_new') }}</h4>
                  <h6 class="font-weight-light">{{ trans('auth.register.join') }}</h6>

                  {!! Form::open(['method' => 'POST', 'route' => ['register'], 'class' => 'pt-3']) !!}
                  {!! Honeypot::generate('my_name', 'my_time') !!}
                    <div class="form-group">
                      <label>{{ trans('auth.register.firstname') }}</label>
                      <div class="input-group">
                        <div class="input-group-prepend bg-transparent">
                          <span class="input-group-text bg-transparent border-right-0">
                            <i class="mdi mdi-account-outline text-primary"></i>
                          </span>
                        </div>
                        <input id="name" type="text" class="form-control form-control-lg border-left-0 @error('name') is-invalid @enderror" placeholder="name" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                      </div>
                    </div>
                    <div class="form-group">
                      <label>{{ trans('auth.register.emailaddress') }}</label>
                      <div class="input-group">
                        <div class="input-group-prepend bg-transparent">
                          <span class="input-group-text bg-transparent border-right-0">
                            <i class="mdi mdi-email-outline text-primary"></i>
                          </span>
                        </div>
                        <input id="email" type="email" class="form-control form-control-lg border-left-0 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                      </div>
                    </div>
                    <div class="form-group">
                            <label>{{ trans('auth.register.phone') }}</label>
                            <div class="input-group">
                                    {!! Form::select('country', $country, old('country'), ['class' => 'form-control-lg register js-example-basic-single w-50']) !!}

                              <div class="input-group-prepend bg-transparent">
                                <span class="input-group-text bg-transparent border-right-0">
                                  <i class="mdi mdi-phone-outline text-primary"></i>
                                </span>
                              </div>

                              <input id="phone" type="number" class="form-control form-control-lg border-left-0 phone @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" placeholder="Phone">
                                  @error('phone')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                            </div>
                    </div>

                    <div class="form-group">
                      <label>{{ trans('auth.register.password') }}</label>
                      <div class="input-group">
                        <div class="input-group-prepend bg-transparent">
                          <span class="input-group-text bg-transparent border-right-0">
                            <i class="mdi mdi-lock-outline text-primary"></i>
                          </span>
                        </div>

                        <input id="password" type="password" class="form-control form-control-lg border-left-0 @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                      </div>
                    </div>
                    <div class="mb-4">
                      <div class="form-check">
                        <label class="form-check-label text-muted">
                          <input name="check" type="checkbox" class="form-check-input" required>
                          {{ trans('auth.register.agree') }}
                        </label>
                      </div>
                    </div>
                    <div class="mt-3">
                            <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">
                                    {{ trans('auth.register.submit') }}
                            </button>
                    </div>
                    <div class="text-center mt-4 font-weight-light">
                            {{ trans('auth.register.logintxt') }} <a href="{{ route('login') }}" class="text-primary">{{ trans('auth.register.login') }}</a>
                    </div>
                  </form>
                </div>
              </div>
                <div class="col-lg-6 register-half-bg d-flex flex-row">
                <p class="text-white font-weight-medium text-center flex-grow align-self-end"> <strong>Copyright &copy; {{ Carbon\Carbon::now()->format('Y') }}</strong>
                    <a class="text-white" href="https://www.cycling-friendly.com" target="_blank">Cycling Friendly</a>. All rights reserved.</span>
                </p>
                </div>
            </div>
            </div>
        <!-- content-wrapper ends -->
        </div>
    </div>
    <!-- page-body-wrapper ends -->
</div>
      @push('javascript')
      <script>
          $(function () {
              $('.phone').numeric({
                  negative: false,

              });
          });

      </script>
      @endpush
@endsection
