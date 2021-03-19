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
                        <p class="text-white mb-3">Un centro profesional donde los operadores y proveedores de F&amp;B pueden encontrarse</p>
                        @if (!(auth()->check()))
                            <a class="btn btn-secondary rounded-pill form-control" href="{{ route('web.signup-client') }}">¡Regístrate ahora!</a>
                        @endif
                    </div>
                </div>
                <div class="row text-center banner-header-text-desktop">
                    <div class="col px-4">
                        <h3>Faster · Better · Stronger</h3>
                        <p class="text-white mb-3">Un centro profesional donde los operadores y<br>proveedores de F&B pueden encontrarse</p>
                        @if (!(auth()->check() && \App\Models\User::findOrFail(auth()->user()->id)->isUser()))
                            <button class="btn btn-secondary rounded-pill w-50 mt-5" type="button">¡Regístrate ahora!</button>
                        @endif
                    </div>
                </div>
            </div>
        </section>
        <section class="container articles">
            <h5 class="title-action mb-3 mobile">Beneficios</h5>
            <h2 class="title-action mb-3 title-desktop">Beneficios</h2>
            <div class="row">
                <div class="col-4 col-md-6"><img class="radius shadow" src="/assets/img/verdura.png"></div>
                <div class="col-8 col-md-6 align-self-center">
                    <p class="m-0 mobile">Encuentra proveedores de confianza fácil y rápido.</p>
                    <h3 class="m-0 px-5 title-desktop">Encuentra proveedores de<br>confianza fácil y rápido.</h3>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <hr>
                </div>
            </div>
            <div class="row">
                <div class="col-8 col-md-6 align-self-center">
                    <p class="m-0 mobile">Una herramienta de trabajo al alcance de tu mano.</p>
                    <h3 class="m-0 px-5 title-desktop">Una herramienta de trabajo<br>al alcance de tu mano.</h3>
                </div>
                <div class="col-4 col-md-6"><img class="radius shadow" src="/assets/img/hand.png"></div>
            </div>
            <div class="row">
                <div class="col">
                    <hr>
                </div>
            </div>
            <div class="row">
                <div class="col-4 col-md-6"><img class="radius shadow" src="/assets/img/share.png"></div>
                <div class="col-8 col-md-6 align-self-center">
                    <p class="m-0 mobile">Comparte experiencias, preguntas o aprende sobre últimas tendecias.</p>
                    <h3 class="m-0 px-5 title-desktop">Comparte experiencias,<br>preguntas o aprende sobre<br>últimas tendecias.</h3>
                </div>
            </div>
        </section>
        <section class="container position-relative mb-3">
            <h5 class="title-action mb-3"><strong>Testimonios</strong></h5>
            <div class="d-flex card-custom card-custom-small testimonials">
                <div class="card">
                    <div class="card-body">
                        <div class="row mb-2">
                            <div class="col-3"><img class="rounded-circle" src="/assets/img/user.png"></div>
                            <div class="col-9"><span class="d-block title title-action">Miguel</span><span class="d-block">Cargo</span><span class="d-block">Nombre del restaurante</span></div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <p>Usando Googlity he logrado optimizar mi tiempo como nunca antes!</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="row mb-2">
                            <div class="col-3"><img class="rounded-circle" src="/assets/img/user.png"></div>
                            <div class="col-9"><span class="d-block title title-action">Miguel</span><span class="d-block">Cargo</span><span class="d-block">Nombre del restaurante</span></div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <p>Usando Googlity he logrado optimizar mi tiempo como nunca antes!</p>
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
                    <h2>¿Eres un proveedor? Haz parte de nosotros!</h2>
                    <a class="btn btn-secondary rounded-pill" href="{{ route('web.about-provider') }}">Conoce más y regístrate!</a>
                </div>
            </section>
        @endif
    </main>
@endsection
