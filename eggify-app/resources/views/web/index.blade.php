@extends('web.layout.master')

@section('content')
    @include('web.layout.sidebar')
    <div id="sidepopup" class="sidepopup">
        <div class="d-flex closebtn pb-2">
            <button class="btn mr-auto p-0" type="button" onclick="sidepopup.close()"><img src="/assets/img/logo-color.png"></button>
            <button class="btn p-0" type="button" onclick="sidepopup.close()"><i class="fa fa-close mr-2"></i></button>
        </div>
        <h5 class="title-action mb-2 pl-4">¿Qué buscas?</h5>
        <div class="link-list">
            @foreach($categories as $i => $el)
                <a href="{{ route('web.result', [ 'category' => $el->id ]) }}"><img class="category-icon" src="{{ $el->getUrlImageAttribute() }}" ><span>{{ $el->name }}</span></a>
                <span class="separator"></span>
            @endforeach
        </div>
    </div>
    @include('web.layout.sidebarlogin')

    <header class="d-flex header-opacity mobile">
        <div class="mr-auto p-2">
            <button class="btn btn-nav" type="button" onclick="sidenav.open()"><i class="la la-navicon"></i></button>
        </div>
        @if (!(auth()->check() && \App\Models\User::findOrFail(auth()->user()->id)->isUser()))
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
        <section id="banner-header">
            <div class="container">
                <div class="row mb-3">
                    <div class="col"><a href="/"><img class="d-block m-auto logo" src="/assets/img/logo.png" alt="logo"></a></div>
                </div>
                <div class="row text-center mobile">
                    <div class="col px-4">
                        <h5 class="text-white mb-3">Faster · Better · Stronger</h5>
                        <div id="home-searcher" class="wp-search">
                            <input class="border rounded-pill form-control form-control-sm" type="text" name="text-search" placeholder="¿Qué buscas?">
                            <button class="btn btn-primary rounded-pill" type="button" onclick="sidepopup.open(this)"><i class="la la-search px-3"></i></button>
                        </div>
                    </div>
                </div>
                <div class="row text-center banner-header-text-desktop">
                    <div class="col px-4">
                        <h3>Faster · Better · Stronger</h3>
                        <p class="text-white mb-3">Un centro profesional donde los operadores y<br>proveedores de F&B pueden encontrarse</p>
                        <div class="wp-search col-6 offset-3 mt-5" id="home-searcher">
                            <input class="border rounded-pill form-control form-control-sm" type="text" name="text-search" placeholder="¿Qué buscas?">
                            <button class="btn btn-primary rounded-pill" type="button" onclick="sidepopup.open(this)"><i class="la la-search px-3"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="container-fluid">
            <div class="d-flex card-custom card-custom-small mobile">
                <div class="card text-center"><a href="javascript:void(0)" onclick="sidepopup.open(this)"><img class="radius shadow" src="assets/img/slider-providers.png"></a>
                    <div class="card-body"><a class="card-link" href="javascript:void(0)" onclick="sidepopup.open(this)">Proveedores</a></div>
                </div>
                <div class="card text-center"><a href="javascript:void(0)" onclick="sidepopup.open(this)"><img class="radius shadow" src="assets/img/slider-blog.png"></a>
                    <div class="card-body"><a class="card-link" href="javascript:void(0)" onclick="sidepopup.open(this)">Productores</a></div>
                </div>
                <div class="card text-center"><a href="https://community.eggify.net/"><img class="radius shadow" src="/assets/img/slider-comunity.png"></a>
                    <div class="card-body"><a class="card-link" href="https://community.eggify.net/">Comunidad</a></div>
                </div>
                <div class="card card-end"></div>
            </div>
            <div class="d-flex card-custom card-custom-small-desktop">
                <div class="card text-center"><a href="javascript:void(0)" onclick="sidepopup.open(this)"><img class="radius shadow" src="assets/img/slider-providers.png"></a>
                    <div class="card-body"><a class="card-link" href="javascript:void(0)" onclick="sidepopup.open(this)">Proveedores</a></div>
                </div>
                <div class="card text-center"><a href="javascript:void(0)" onclick="sidepopup.open(this)"><img class="radius shadow" src="assets/img/slider-productores.svg"></a>
                    <div class="card-body"><a class="card-link" href="javascript:void(0)" onclick="sidepopup.open(this)">Productores</a></div>
                </div>
                <div class="card text-center"><a href="https://community.eggify.net/"><img class="radius shadow" src="/assets/img/slider-comunity.png"></a>
                    <div class="card-body"><a class="card-link" href="https://community.eggify.net/">Comunidad</a></div>
                </div>
                <div class="card text-center"><a href=""><img class="radius shadow" src="/assets/img/slider-blog.png"></a>
                    <div class="card-body"><a class="card-link" href="">Blog</a></div>
                </div>
            </div>
        </section>
        <hr>
        <section class="container position-relative">
            <h5 class="title-action mb-3 mobile">Nuestros proveedores destacados</h5>
            <div class="text-center title-desktop">
              <h2 class="title-action mb-3">Proveedores destacados</h2>
            </div>
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
        <section class="container position-relative mt-3 pb-3 mobile">
            <div class="bg-custom-primary"></div>
            <h5 class="text-white mb-3 title-action">Servicios populares</h5>
            <div class="d-flex card-custom card-custom-small card-custom-icon">
                @foreach($categories_featured as $i => $el)
                    <div class="card d-flex align-items-center justify-content-center" style="min-height: 78px;min-width: 196px;">
                        <a href="{{ route('web.result', $el->id) }}">
                            <img  class="category-icon" src="{{ $el->getUrlImageAttribute() }}" >{{ $el->name }}
                        </a>
                    </div>
                @endforeach
                <div class="card card-end"></div>
            </div>
        </section>
        <section>
            <div class="banner-middle text-center">
                <h2>Servicios populares</h2>
                <div class="d-flex justify-content-around">
                    @foreach($categories_featured as $i => $el)
                        <div class="card d-flex align-items-center justify-content-center" style="min-height: 78px;min-width: 196px;">
                            <a href="{{ route('web.result', $el->id) }}">
                                <img  class="category-icon" src="{{ $el->getUrlImageAttribute() }}" >{{ $el->name }}
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        {{--<section class="container position-relative">
            <h5 class="title-action mb-3 mobile">Productos destacados</h5>
            <div class="text-center title-desktop">
              <h2 class="title-action mb-3">Productos destacados</h2>
            </div>
            <div class="d-flex card-custom card-custom-big">
                <div class="card"><a href="#"><img class="radius" src="/assets/img/wine.jpg"></a>
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
                <div class="card"><a href="#"><img class="radius" src="/assets/img/wines.jpg"></a>
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
                <div class="card"><a href="#"><img class="radius" src="/assets/img/white-wine.jpg"></a>
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
            <section class="container mobile">
                <div class="row">
                    <div class="col">
                        <h5 class="title-action mb-3">¿Eres un proveedor?<br>Haz parte de nosotros!</h5>
                        <a href="{{ route('web.about-provider') }}">
                            <button class="btn btn-secondary form-control rounded-pill" type="button">Conoce más y regístrate!</button>
                        </a>
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
