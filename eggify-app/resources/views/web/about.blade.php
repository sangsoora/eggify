@extends('web.layout.master')

@section('content')
    @include('web.layout.sidebar')
    @include('web.layout.sidebarlogin')

    <header class="d-flex header-opacity">
        <div class="mr-auto p-2">
            <button class="btn btn-nav" type="button" onclick="sidenav.open()"><i class="la la-navicon"></i></button>
        </div>
        @if (!(auth()->check()))
            <div id="header-links" class="p-2 align-self-center"><a href="javascript:void(0)" onclick="sidepopuplogin.open()">Acceder</a><span class="mx-1">/</span><a href="javascript:void(0)" onclick="sidepopuplogin.open()">Regístrate</a></div>
        @endif
    </header>
    <main>
        <section id="banner-header" style="overflow: hidden;">
            <div class="container">
                <div class="row mb-3">
                    <div class="col"><a href="/"><img class="d-block m-auto logo" src="assets/img/logo.png" alt="logo"></a></div>
                </div>
                <div class="row text-center">
                    <div class="col px-4">
                        <p class="text-white mb-3">Un centro profesional donde los operadores y proveedores de F&amp;B pueden encontrarse</p>
                        @if (!(auth()->check()))
                            <a class="btn btn-secondary rounded-pill form-control" href="{{ route('web.signup-client') }}">¡Regístrate ahora!</a>
                        @endif
                    </div>
                </div>
            </div>
        </section>
        <section class="container articles">
            <h5 class="title-action mb-3">Beneficios</h5>
            <div class="row">
                <div class="col-4"><img class="radius shadow" src="assets/img/verdura.png"></div>
                <div class="col-8 align-self-center">
                    <p class="m-0">Encuentra proveedores de confianza fácil y rápido.</p>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <hr>
                </div>
            </div>
            <div class="row">
                <div class="col-8 align-self-center">
                    <p class="m-0">Una herramienta de trabajo al alcance de tu mano.</p>
                </div>
                <div class="col-4"><img class="radius shadow" src="assets/img/hand.png"></div>
            </div>
            <div class="row">
                <div class="col">
                    <hr>
                </div>
            </div>
            <div class="row">
                <div class="col-4"><img class="radius shadow" src="assets/img/share.png"></div>
                <div class="col-8 align-self-center">
                    <p class="m-0">Comparte experiencias, preguntas o aprende sobre últimas tendecias.</p>
                </div>
            </div>
        </section>
        <section class="container position-relative mb-3">
            <h5 class="title-action mb-3"><strong>Testimonios</strong></h5>
            <div class="d-flex card-custom card-custom-small testimonials">
                <div class="card">
                    <div class="card-body">
                        <div class="row mb-2">
                            <div class="col-3"><img class="rounded-circle" src="assets/img/user.png"></div>
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
                            <div class="col-3"><img class="rounded-circle" src="assets/img/user.png"></div>
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
            <section class="container bg-primary">
                <div class="row">
                    <div class="col-12">
                        <h5 class="text-white mb-3 title-action"><strong>¿Eres un proveedor?</strong></h5>
                        <p class="text-white">Crea con nosotros tu escaparate y consigue más clientes!</p>
                        <a class="btn btn-secondary rounded-pill form-control" href="{{ route('web.signup-provider') }}">Registrate!</a>
                    </div>
                </div>
            </section>
        @endif
    </main>
@endsection
