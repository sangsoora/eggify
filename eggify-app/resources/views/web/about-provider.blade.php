@extends('web.layout.master')

@section('content')
    @include('web.layout.sidebar')
    @include('web.layout.sidebarlogin')

    <header class="d-flex header-opacity mobile">
        <div class="mr-auto p-2">
            <button class="btn btn-nav" type="button" onclick="sidenav.open()"><i class="la la-navicon"></i></button>
        </div>
        @if (!(auth()->check()))
            <div id="header-links" class="p-2 align-self-center"><a href="javascript:void(0)" onclick="sidepopuplogin.open()">Acceder</a><span class="mx-1">/</span><a href="javascript:void(0)" onclick="sidepopuplogin.open()">Regístrate</a></div>
        @endif
    </header>
    <header class="d-flex header-opacity justify-content-between" id="header-desktop">
        <div class="p-2">
            <button class="btn mr-auto p-0" type="button"><a href="/"><img src="/assets/img/logo-color.png"></a></button>
        </div>
        <div class="p-2 align-self-center nav-menu-desktop">
          <a href="{{ route('web.about') }}" class="mr-5">Sobre nosotros</a>
          <a href="{{ route('web.search.provider') }}" class="mr-5">Proveedores</a>
          @if (auth()->check() && \App\Models\User::findOrFail(auth()->user()->id)->isUser())
              <a href="{{ route('web.inbox') }}" class="mr-5">Inbox</a>
          @endif
          <a href="https://community.eggify.net/" class="mr-5">Comunidad</a>
        </div>
        @if (!(auth()->check() && \App\Models\User::findOrFail(auth()->user()->id)->isUser()))
            <div id="header-links" class="p-2 align-self-center"><a href="javascript:void(0)" onclick="sidepopuplogin.open()">Acceder</a><span class="mx-1">/</span><a href="javascript:void(0)" onclick="sidepopuplogin.open()">Regístrate</a></div>
        @endif
        <button class="btn btn-nav" type="button" onclick="sidenav.open()"><i class="far fa-user"></i></button>
    </header>
    <main>
        <section id="banner-header" style="overflow: hidden;">
            <div class="container">
                <div class="row mb-3">
                    <div class="col"><a href="/"><img class="d-block m-auto logo" src="/assets/img/logo.png" alt="logo"></a></div>
                </div>
                <div class="row text-center mobile">
                    <div class="col px-4">
                        <p class="text-white mb-3">Hacer crecer tu negocio con Eggify</p><a class="btn btn-secondary rounded-pill form-control" role="button" href="{{ route('web.signup-provider') }}">¡Regístrate ahora!</a>
                    </div>
                </div>
                <div class="row text-center banner-header-text-desktop">
                    <div class="col px-4">
                        <h3>Faster · Better · Stronger</h3>
                        <p class="text-white mb-3">Un centro profesional donde los operadores y<br>proveedores de F&B pueden encontrarse</p>
                        @if (!(auth()->check() && \App\Models\User::findOrFail(auth()->user()->id)->isUser()))
                            <a class="btn btn-secondary rounded-pill w-50 mt-5" role="button" href="{{ route('web.signup-provider') }}">¡Regístrate ahora!</a>
                        @endif
                    </div>
                </div>
            </div>
        </section>
        <section class="container articles">
            <h5 class="title-action mb-3">¿Qué ofrecemos?</h5>
            <div class="row">
                <div class="col-4 col-md-6"><img class="radius shadow" src="/assets/img/hand.png"></div>
                <div class="col-8 col-md-6 align-self-center pl-0">
                    <p class="m-0 mobile">Da a conocer tu negocio creando un escaparate online.</p>
                    <h3 class="m-0 px-5 title-desktop">Da a conocer tu negocio<br>creando un escaparate<br>online.</h3>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <hr>
                </div>
            </div>
            <div class="row">
                <div class="col-8 col-md-6 align-self-center pr-0">
                    <p class="m-0 mobile">Posicionáte y gana confianza entre los ucuarios gracias a sus valoraciones.</p>
                    <h3 class="m-0 px-5 title-desktop">Posicionáte y gana<br>confianza entre los ucuarios<br>gracias a sus valoraciones.</h3>
                </div>
                <div class="col-4 col-md-6"><img class="radius shadow" src="/assets/img/kitchen-1.png"></div>
            </div>
            <div class="row">
                <div class="col">
                    <hr>
                </div>
            </div>
            <div class="row">
                <div class="col-4 col-md-6"><img class="radius shadow" src="/assets/img/mobile-instagram.png"></div>
                <div class="col-8 col-md-6 align-self-center pl-0">
                    <p class="m-0 mobile">Gestiona tus solicitudes, siempre al alcance de tu mano.</p>
                    <h3 class="m-0 px-5 title-desktop">Gestiona tus<br>solicitudes, siempre al<br>alcance de tu mano.</h3>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <hr>
                </div>
            </div>
            <div class="row">
                <div class="col-8 col-md-6 align-self-center pr-0">
                    <p class="m-0 mobile">En todo momento conocerás la información real y actualizada de tu escaparate.</p>
                    <h3 class="m-0 px-5 title-desktop">En todo momento<br>conocerás la información real y<br>actualizada de tu escaparate.</h3>
                </div>
                <div class="col-4 col-md-6"><img class="radius shadow" src="/assets/img/analytics.png"></div>
            </div>
        </section>
        <section class="container position-relative mb-3">
            <h5 class="title-action mb-3"><strong>Testimonios</strong></h5>
            <div class="d-flex card-custom card-custom-small testimonials">
                <div class="card">
                    <div class="card-body">
                        <div class="row mb-2">
                            <div class="col-3"><img class="rounded-circle" src="/assets/img/user.png"></div>
                            <div class="col-9"><span class="d-block title title-action">Nombre del proveedor</span></div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <p>“Usando Eggify hemos logrado capturar muchos más clientes!”</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="row mb-2">
                            <div class="col-3"><img class="rounded-circle" src="/assets/img/user.png"></div>
                            <div class="col-9"><span class="d-block title title-action">Nombre del proveedor</span></div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <p>“Usando Eggify hemos logrado capturar muchos más clientes!”</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card card-end"></div>
            </div>
        </section>
        @if (!(auth()->check()))
            <section class="container bg-primary mobile">
                <div class="row">
                    <div class="col-12">
                        <h5 class="text-white mb-3 title-action"><strong>¿Eres un proveedor?</strong></h5>
                        <p class="text-white">Crea con nosotros tu escaparate y consigue más clientes!</p>
                        <a class="btn btn-secondary rounded-pill form-control" href="{{ route('web.signup-provider') }}">Registrate!</a>
                    </div>
                </div>
            </section>
            <section>
                <div class="banner-bottom text-center">
                    <h2>¿Eres un proveedor? ¡Únete a Eggify!</h2>
                    <a class="btn btn-secondary rounded-pill" href="{{ route('web.signup-provider') }}">Registrate!</a>
                </div>
            </section>
        @endif
        {{--<section class="container bg-primary mobile">
            <div class="row">
                <div class="col-12">
                    <h5 class="text-white mb-3 title-action"><strong>Servicios premium</strong></h5>
                    <p class="text-white">Descubre el plan que más se ajusta a tu negocio<br></p>
                    <button class="btn btn-secondary rounded-pill form-control" type="button">Ver planes</button>
                </div>
            </div>
        </section>--}}
    </main>
@endsection
