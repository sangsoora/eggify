@extends('web.layout.master')

@section('content')
    @include('web.layout.sidebar')
    <header class="header-oval mobile">
        <div class="bg-custom-oval"></div>
        <div class="header-sup">
            <div class="p-2"><button class="btn btn-nav" type="button" onclick="sidenav.open()"><i class="la la-navicon"></i></button></div><a class="m-auto" href="{{ auth()->check() && \App\Models\User::findOrFail(auth()->user()->id)->isProvider() ? route('web.provider-dashboard'): route('web.index') }}"><img class="p-0" src="/assets/img/logo-color.png"></a>
        </div>
        <div class="d-flex header-content profile-img-small position-relative mb-2">
            <div class="m-auto text-center profile-img">
                <p class="m-0 mb-1">{{ $user->operator->name }}</p>
                <img src="{{ $user->operator->operator_company != null ? $user->operator->operator_company->getUrlImageAttribute() : '/assets/images/no-product.png' }}" alt="{{ $user->operator->operator_company != null ? $user->operator->operator_company->name : '' }}">
            </div>
        </div>
    </header>
    <header class="d-flex header-opacity justify-content-between" id="header-desktop">
        <div class="p-2">
            <button class="btn mr-auto p-0" type="button"><a href="/"><img src="/assets/img/logo-color.png"></a></button>
        </div>
        <div class="p-2 align-self-center nav-menu-desktop">
          <a href="{{ route('web.about') }}" class="mr-5">Sobre nosotros</a>
          <a href="{{ route('web.search.provider') }}" class="mr-5">Proveedores</a>
          <a href="{{ route('web.inbox') }}" class="mr-5">Inbox</a>
          <a href="https://community.eggify.net/" class="mr-5">Comunidad</a>
        </div>
        <button class="btn btn-nav" type="button" onclick="sidenav.open()"><i class="far fa-user"></i></button>
    </header>
    <main class="main-desktop">
        <div class="d-flex provider-header-desktop">
            <div class="mr-3 profile-img">
                <img src="{{ $user->operator->provider_company != null ? $user->operator->provider_company->getUrlImageAttribute() : '/assets/images/no-product.png' }}" alt="{{ $user->operator->name }}">
            </div>
            <div class="align-self-center">
                <h5 class="m-0">{{ $user->operator->name }}</h5>
            </div>
        </div>
        <section class="container">
            <div class="row mb-3">
                <div class="col-12">
                    <h5 class="title-action mb-2">Mi perfil</h5>
                    <div><a class="d-block border-bottom" href="{{ route('web.user.profile.edit') }}">Información personal</a></div>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-12">
                    <h5 class="title-action mb-2">Ajustes</h5>
                    <div><a class="d-block border-bottom" href="{{ route('web.inbox') }}">Notificaciones</a></div>
                    {{--<div class="mt-2"><a class="d-block border-bottom" href="#">Mejora tu plan</a></div>
                    <div class="mt-2"><a class="d-block border-bottom" href="#">Tu método de pago</a></div>--}}
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <h5 class="title-action mb-2">Soporte</h5>
                    {{--<div><a class="d-block border-bottom" href="#">Ayuda</a></div>--}}
                    <div class="mt-2"><a class="d-block border-bottom" href="https://www.eggify.net/terminos-y-condiciones">Términos y condiciones</a></div>
                    <div class="mt-2"><a class="d-block border-bottom" href="https://www.eggify.net/copy-of-terminos-y-condiciones">Política de privacidad</a></div>
                    <div class="mt-2"><a class="d-block border-bottom" href="{{ route('web.user.logout') }}">Cerrar sesión</a></div>
                </div>
            </div>
        </section>
    </main>
@endsection
