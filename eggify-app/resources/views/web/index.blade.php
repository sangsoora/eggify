@extends('web.layout.master')

@section('content')
    @include('web.layout.sidebar')
    <div id="sidepopup" class="sidepopup">
        <div class="d-flex closebtn pb-2">
            <button class="btn mr-auto p-0" type="button" onclick="sidepopup.close()"><img src="assets/img/logo-color.png"></button>
            <button class="btn p-0" type="button" onclick="sidepopup.close()"><i class="fa fa-close mr-2"></i></button>
        </div>
        <h5 class="title-action mb-2 pl-4">¿Qué buscas?</h5>
        <div class="link-list">
            @foreach($categories as $i => $el)
                <a href="{{ route('web.result', [ 'category' => $el->id ]) }}"><i class="la la-circle mr-3"></i><span>{{ $el->name }}</span></a>
                <span class="separator"></span>
            @endforeach
        </div>
    </div>
    @include('web.layout.sidebarlogin')

    <header class="d-flex header-opacity">
        <div class="mr-auto p-2">
            <button class="btn btn-nav" type="button" onclick="sidenav.open()"><i class="la la-navicon"></i></button>
        </div>
        @if (!(auth()->check() && \App\Models\User::findOrFail(auth()->user()->id)->isUser()))
            <div id="header-links" class="p-2 align-self-center"><a href="javascript:void(0)" onclick="sidepopuplogin.open()">Acceder</a><span class="mx-1">/</span><a href="javascript:void(0)" onclick="sidepopuplogin.open()">Regístrate</a></div>
        @endif
    </header>
    <main>
        <section id="banner-header">
            <div class="container">
                <div class="row mb-3">
                    <div class="col"><a href="/"><img class="d-block m-auto logo" src="assets/img/logo.png" alt="logo"></a></div>
                </div>
                <div class="row text-center">
                    <div class="col px-4">
                        <h5 class="text-white mb-3">Queremos ayudarte</h5>
                        <form id="home-searcher"><input class="border rounded-pill form-control form-control-sm" type="text" placeholder="¿Qué buscas?" readonly="">
                            <button class="btn btn-primary rounded-pill" type="button" onclick="sidepopup.open()"><i class="la la-search px-3"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <section class="container-fluid">
            <div class="d-flex card-custom card-custom-small">
                <div class="card text-center"><a href="javascript:void(0)" onclick="sidepopup.open()"><img class="radius shadow" src="assets/img/slider-providers.png"></a>
                    <div class="card-body"><a class="card-link" href="javascript:void(0)" onclick="sidepopup.open()">Proveedores</a></div>
                </div>
                <div class="card text-center"><a href="https://community.eggify.net/"><img class="radius shadow" src="assets/img/slider-comunity.png"></a>
                    <div class="card-body"><a class="card-link" href="https://community.eggify.net/">Comunidad</a></div>
                </div>
                <div class="card card-end"></div>
            </div>
        </section>
        <section class="container position-relative">
            <h5 class="title-action mb-3">Nuestros proveedores destacados</h5>
            <div class="d-flex card-custom card-custom-big">
                @foreach($providers as $i => $el)
                    <div class="card">
                        <a href="{{ route('web.provider', $el->id) }}"><img class="radius" src="/assets/img/slider-providers.png"></a>
                        <div class="card-body mt-2">
                            <a class="card-link title-action" href="{{ route('web.provider', $el->id) }}">
                                <h5 class="title-action">{{ $el->name }}</h5>
                            </a>
                            <div class="rating">
                                <span class="mr-1">{{ round($el->rating->avg('rating'), 2) }}</span>
                                <span class="mr-1">
                                    <span class="{{ ($el->rating->avg('rating') > 0 ? 'fa fa-star checked' : 'fa fa-star') }}"></span>
                                    <span class="{{ ($el->rating->avg('rating') > 1 ? 'fa fa-star checked' : 'fa fa-star') }}"></span>
                                    <span class="{{ ($el->rating->avg('rating') > 2 ? 'fa fa-star checked' : 'fa fa-star') }}"></span>
                                    <span class="{{ ($el->rating->avg('rating') > 3 ? 'fa fa-star checked' : 'fa fa-star') }}"></span>
                                    <span class="{{ ($el->rating->avg('rating') > 4 ? 'fa fa-star checked' : 'fa fa-star') }}"></span>
                                </span>
                                <span>{{ sprintf('%s %s', $el->rating->count(), ($el->rating->count() == 1 ? 'Opinión' : 'Opiniones')) }}</span>
                            </div>
                            <a class="card-link" href="{{ route('web.provider', $el->id) }}">
                                <button class="btn btn-secondary form-control rounded-pill mt-3" type="button">Más información</button>
                            </a>
                        </div>
                    </div>
                @endforeach
                <div class="card card-end"></div>
            </div>
        </section>
        <section class="container position-relative mt-3 pb-3">
            <div class="bg-custom-primary"></div>
            <h5 class="text-white mb-3 title-action">Servicios populares</h5>
            <div class="d-flex card-custom card-custom-small card-custom-icon">
                @foreach($categories_featured as $i => $el)
                    <div class="card">
                        <a href="{{ route('web.result', $el->id) }}">
                            <button style="min-height: 78px;min-width: 196px;" class="btn btn-secondary btn-custom la-circle" type="button">{{ $el->name }}</button>
                        </a>
                    </div>
                @endforeach
                <div class="card card-end"></div>
            </div>
        </section>
        {{--<section class="container position-relative">
            <h5 class="title-action mb-3">Productos destacados</h5>
            <div class="d-flex card-custom card-custom-big">
                <div class="card"><a href="#"><img class="radius" src="assets/img/wine.jpg"></a>
                    <div class="card-body mt-2"><a class="card-link" href="#">
                            <h5 class="title-action">Marca de Vino</h5>
                        </a>
                        <div class="rating">
                            <span class="mr-1">4.2</span>
                            <span class="mr-1">
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star"></span>
        <span class="fa fa-star"></span>
    </span>
                            <span>300 Opciones</span>
                        </div>
                        <a class="card-link" href="#">
                            <button class="btn btn-secondary form-control rounded-pill mt-3" type="button">Más información</button>
                        </a></div>
                </div>
                <div class="card"><a href="#"><img class="radius" src="assets/img/wines.jpg"></a>
                    <div class="card-body mt-2"><a class="card-link" href="#">
                            <h5 class="title-action">Marca de Vino</h5>
                        </a>
                        <div class="rating">
                            <span class="mr-1">4.2</span>
                            <span class="mr-1">
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star"></span>
        <span class="fa fa-star"></span>
    </span>
                            <span>300 Opciones</span>
                        </div>
                        <a class="card-link" href="#">
                            <button class="btn btn-secondary form-control rounded-pill mt-3" type="button">Más información</button>
                        </a></div>
                </div>
                <div class="card"><a href="#"><img class="radius" src="assets/img/white-wine.jpg"></a>
                    <div class="card-body mt-2"><a class="card-link" href="#">
                            <h5 class="title-action">Marca de Vino</h5>
                        </a>
                        <div class="rating">
                            <span class="mr-1">4.2</span>
                            <span class="mr-1">
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star"></span>
        <span class="fa fa-star"></span>
    </span>
                            <span>300 Opciones</span>
                        </div>
                        <a class="card-link" href="#">
                            <button class="btn btn-secondary form-control rounded-pill mt-3" type="button">Más información</button>
                        </a></div>
                </div>
                <div class="card card-end"></div>
            </div>
        </section>--}}

        @if (!(auth()->check()))
            <section class="container">
                <div class="row">
                    <div class="col">
                        <h5 class="title-action mb-3">¿Eres un proveedor?<br>Haz parte de nosotros!</h5>
                        <a href="{{ route('web.about-provider') }}">
                            <button class="btn btn-secondary form-control rounded-pill" type="button">Conoce más y regístrate!</button>
                        </a>
                    </div>
                </div>
            </section>
        @endif
    </main>
@endsection
