@extends('web.layouts.app')

@section('content')
<section class="ptb-70 gray-bg error-block-main">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="error-block-detail error-block-bg">
            <div class="row">
              <div class="col-xl-5 col-lg-6"></div>
              <div class="col-xl-7 col-lg-6">
                <div class="main-error-text">404</div>
                <div class="error-small-text">@lang('web.404.sorry')</div>
                <div class="error-slogan">@lang('web.404.page')</div>
                <ul class="social-icon mb-20">
                    <li><a href="https://www.facebook.com/justrentabikemallorca/"  target="_blank" title="Facebook" class="facebook"><i class="fa fa-facebook"> </i></a></li>
                    <li><a hred="https://www.instagram.com/justrentabikemallorca/" title="Instagram" class="instagram"><i class="fa fa-instagram"> </i></a></li>
                </ul>
                <div class="middle-580">
                  <p>@lang('web.404.content')</p>
                </div>
                <div class="mt-40"> <a href="{{route('web.home')}}" class="btn btn-color">@lang('web.404.back')</a> </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="bottom-shadow">
      <img alt="Roadie" src="{{ asset('web/images/bottom-shadow.png') }}">
    </div>
</section>
@endsection
