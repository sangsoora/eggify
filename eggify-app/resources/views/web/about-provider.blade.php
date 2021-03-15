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
                        <p class="text-white mb-3">Hacer crecer tu negocio con Eggidy</p><a class="btn btn-secondary rounded-pill form-control" role="button" href="{{ route('web.signup-provider') }}">¡Regístrate ahora!</a>
                    </div>
                </div>
            </div>
        </section>
        <section class="container articles">
            <h5 class="title-action mb-3">¿Qué ofrecemos?</h5>
            <div class="row">
                <div class="col-4"><img class="radius shadow" src="assets/img/hand.png"></div>
                <div class="col-8 align-self-center pl-0">
                    <p class="m-0">Da a conocer tu negocio creando un escaparate online.</p>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <hr>
                </div>
            </div>
            <div class="row">
                <div class="col-8 align-self-center pr-0">
                    <p class="m-0">Posicionáte y gana confianza entre los ucuarios gracias a sus valoraciones.</p>
                </div>
                <div class="col-4"><img class="radius shadow" src="assets/img/kitchen-1.png"></div>
            </div>
            <div class="row">
                <div class="col">
                    <hr>
                </div>
            </div>
            <div class="row">
                <div class="col-4"><img class="radius shadow" src="assets/img/mobile-instagram.png"></div>
                <div class="col-8 align-self-center pl-0">
                    <p class="m-0">Gestiona tus solicitudes, siempre al alcance de tu mano.</p>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <hr>
                </div>
            </div>
            <div class="row">
                <div class="col-8 align-self-center pr-0">
                    <p class="m-0">En todo momento conocerás la información real y actualizada de tu escaparate.</p>
                </div>
                <div class="col-4"><img class="radius shadow" src="assets/img/analytics.png"></div>
            </div>
        </section>
        <section class="container position-relative mb-3">
            <h5 class="title-action mb-3"><strong>Testimonios</strong></h5>
            <div class="d-flex card-custom card-custom-small testimonials">
                <div class="card">
                    <div class="card-body">
                        <div class="row mb-2">
                            <div class="col-3"><img class="rounded-circle" src="assets/img/user.png"></div>
                            <div class="col-9"><span class="d-block title title-action">Nombre del proveedor</span></div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <p>“Usando Googlity hemos logrado capturar muchos más clientes!”</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="row mb-2">
                            <div class="col-3"><img class="rounded-circle" src="assets/img/user.png"></div>
                            <div class="col-9"><span class="d-block title title-action">Nombre del proveedor</span></div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <p>“Usando Googlity hemos logrado capturar muchos más clientes!”</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card card-end"></div>
            </div>
        </section>
        <section class="container bg-primary">
            <div class="row">
                <div class="col-12">
                    <h5 class="text-white mb-3 title-action"><strong>Servicios premium</strong></h5>
                    <p class="text-white">Descubre el plan que más se ajusta a tu negocio<br></p>
                    <button class="btn btn-secondary rounded-pill form-control" type="button">Ver planes</button>
                </div>
            </div>
        </section>
    </main>
@endsection
