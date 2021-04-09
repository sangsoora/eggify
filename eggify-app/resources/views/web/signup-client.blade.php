@extends('web.layout.master')

@section('content')
    @include('web.layout.sidebar')
    <header class="header-oval mobile">
        <div class="bg-custom-oval"></div>
        <div class="d-flex header-content position-relative mb-2"><a class="link-icon" href="{{ auth()->check() && \App\Models\User::findOrFail(auth()->user()->id)->isProvider() ? route('web.provider-dashboard'): route('web.index') }}"><i class="la la-arrow-left"></i></a><a class="m-auto" href="{{ auth()->check() && \App\Models\User::findOrFail(auth()->user()->id)->isProvider() ? route('web.provider-dashboard'): route('web.index') }}"><img src="/assets/img/logo-splash.png"></a><a class="link-icon link-icon-right" href="{{ auth()->check() && \App\Models\User::findOrFail(auth()->user()->id)->isProvider() ? route('web.provider-dashboard'): route('web.index') }}"><i class="la la-close"></i></a></div>
    </header>
    <header class="d-flex header-opacity justify-content-between" id="header-desktop">
        <div class="p-2">
            <button class="btn mr-auto p-0" type="button"><a href="{{ auth()->check() && \App\Models\User::findOrFail(auth()->user()->id)->isProvider() ? route('web.provider-dashboard'): route('web.index') }}"><img src="/assets/img/logo-color.png"></a></button>
        </div>
        <div class="p-2 align-self-center nav-menu-desktop">
          <a href="{{ route('web.about') }}" class="mr-5">Sobre nosotros</a>
          <a href="{{ route('web.search.provider') }}" class="mr-5">Proveedores</a>
          <a href="https://community.eggify.net/" class="mr-5">Comunidad</a>
        </div>
        <button class="btn btn-nav" type="button" onclick="sidenav.open()"><i class="far fa-user"></i></button>
    </header>
    <main class="main-desktop">
        <section class="container">
            <div class="row mb-3">
                <div class="col-12">
                    <h5 class="title-action text-center mb-4">Regístrate</h5>
                    <a href="/auth/redirect"><button class="btn btn-tertiary form-control rounded-pill mb-3" type="button"><i class="la la-linkedin-square"></i>Continua con LinkedIn</button></a>
                    {{--<button class="btn btn-tertiary form-control rounded-pill" type="button"><i class="la la-google"></i>Continua con Google</button>--}}
                </div>
            </div>
        </section>
    </main>
@endsection
