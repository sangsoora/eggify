@extends('web.layout.master')

@section('content')
    @include('web.layout.sidebar')
    <header class="header-oval mobile">
        <div class="bg-custom-oval"></div>
        <div class="header-sup">
            <div class="p-2">
                <button class="btn btn-nav" type="button" onclick="sidenav.open()"><i class="la la-navicon"></i></button>
            </div>
            <a class="m-auto" href="{{ route('web.index') }}"><img class="p-0" src="/assets/img/logo-color.png"></a>
        </div>
        <div class="d-flex header-content">
            <div class="mr-3 profile-img">
                <img src="/assets/img/video-maker.png" alt="{{ $user->provider->name }}">
            </div>
            <div class="align-self-center">
                <h5 class="m-0">{{ $user->provider->name }}</h5>
            </div>
        </div>
        <div class="text-center mt-2 mb-1"><a class="btn btn-secondary rounded-pill" href="{{ route('web.provider-showcase') }}">Ver escaparate</a></div>
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
    <main class="main-desktop">
        <div class="d-flex provider-header-desktop">
            <div class="mr-3 profile-img">
                <img src="/assets/img/video-maker.png" alt="{{ $user->provider->name }}">
            </div>
            <div class="align-self-center">
                <h5 class="m-0">{{ $user->provider->name }}</h5>
            </div>
        </div>
        <section class="container pb-1">
            <div class="row mb-3">
                <div class="col-12">
                    <h5 class="title-action text-center mb-3">Mi organizador</h5>
                    <div class="row resume-elements mb-3">
                        <div class="col-6"><a href="#"><span class="color-red">1</span>Solicitudes pendientes</a></div>
                        <div class="col-6"><a href="#"><span class="color-yellow">2</span>Presupuestos enviados</a></div>
                    </div>
                    <div class="row resume-elements">
                        <div class="col-6"><a href="#"><span class="color-green">1</span>Pedidos activos</a></div>
                        <div class="col-6"><a href="#"><span class="color-blue">30</span>Mis clientes</a></div>
                    </div>
                </div>
            </div>
        </section>
        <hr>
        <section id="opinions-rating" class="container mobile">
            <div class="row">
                <div class="col-12">
                    <h5 class="title-action text-center mb-3">Valoraciones</h5>
                </div>
                <div class="col-4">
                    <div class="rating rating-total">
                        <span class="text">
                            {{ $user->provider->rating->count() ? round($user->provider->rating->avg('rating'), 2) : 0 }}
			            </span>
                        <span class="stars">
                            <span class="{{ ($user->provider->rating->avg('rating') > 0 ? 'fa fa-star checked' : 'fa fa-star') }}"></span>
                            <span class="{{ ($user->provider->rating->avg('rating') > 1 ? 'fa fa-star checked' : 'fa fa-star') }}"></span>
                            <span class="{{ ($user->provider->rating->avg('rating') > 2 ? 'fa fa-star checked' : 'fa fa-star') }}"></span>
                            <span class="{{ ($user->provider->rating->avg('rating') > 3 ? 'fa fa-star checked' : 'fa fa-star') }}"></span>
                            <span class="{{ ($user->provider->rating->avg('rating') > 4 ? 'fa fa-star checked' : 'fa fa-star') }}"></span>
                        </span>
                    </div>
                </div>
                <div class="col-8 pl-0">
                    <p class="text-action">Visualizaciones</p>
                    <p class="text-small"><i class="la la-eye mr-1"></i>2000</p>
                    <p class="text-action">Valoraciones</p>
                    <p class="text-small"><i class="la la-comment mr-1"></i>{{ $user->provider->rating->count() ? $user->provider->rating->count() : 0 }}</p>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-12">
                    <ul class="list-unstyled mb-0">
                        @foreach($ratingsCriteria as $i => $el)
                            <li class="d-flex"><span class="mr-auto">{{ $el->name }}</span>
                                <div class="rating">
                                <span class="stars">
                                    <span class="{{ ($el->rating > 0 ? 'fa fa-star checked' : 'fa fa-star') }}"></span>
                                    <span class="{{ ($el->rating > 1 ? 'fa fa-star checked' : 'fa fa-star') }}"></span>
                                    <span class="{{ ($el->rating > 2 ? 'fa fa-star checked' : 'fa fa-star') }}"></span>
                                    <span class="{{ ($el->rating > 3 ? 'fa fa-star checked' : 'fa fa-star') }}"></span>
                                    <span class="{{ ($el->rating > 4 ? 'fa fa-star checked' : 'fa fa-star') }}"></span>
                                </span>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </section>
        <section id="opinions-rating" class="container rating-desktop">
            <h5 class="title-action text-center mb-3">Valoraciones</h5>
            <div class="d-flex justify-content-between">
                <div class="rating-avg">
                    <div class="rating rating-total">
                        <span class="text">
                            {{ round($user->provider->rating->avg('rating'), 2) }}
                        </span>
                        <span class="stars">
                            <span class="{{ ($user->provider->rating->avg('rating') > 0 ? 'fa fa-star checked' : 'fa fa-star') }}"></span>
                            <span class="{{ ($user->provider->rating->avg('rating') > 1 ? 'fa fa-star checked' : 'fa fa-star') }}"></span>
                            <span class="{{ ($user->provider->rating->avg('rating') > 2 ? 'fa fa-star checked' : 'fa fa-star') }}"></span>
                            <span class="{{ ($user->provider->rating->avg('rating') > 3 ? 'fa fa-star checked' : 'fa fa-star') }}"></span>
                            <span class="{{ ($user->provider->rating->avg('rating') > 4 ? 'fa fa-star checked' : 'fa fa-star') }}"></span>
                        </span>
                    </div>
                </div>
                <div class="rating-detail">
                    <h5 class="title-action">{{ sprintf('%s %s de %s', $user->provider->rating->count(), ($user->provider->rating->count() == 1 ? 'opinión' : 'opiniones'), $user->provider->name) }}</h5>
                    <ul class="list-unstyled mb-0">
                        @foreach($ratingsCriteria as $i => $el)
                            <li class="d-flex"><span class="mr-auto">{{ $el->name }}</span>
                                <div class="rating">
                                <span class="stars">
                                    <span class="{{ ($el->rating > 0 ? 'fa fa-star checked' : 'fa fa-star') }}"></span>
                                    <span class="{{ ($el->rating > 1 ? 'fa fa-star checked' : 'fa fa-star') }}"></span>
                                    <span class="{{ ($el->rating > 2 ? 'fa fa-star checked' : 'fa fa-star') }}"></span>
                                    <span class="{{ ($el->rating > 3 ? 'fa fa-star checked' : 'fa fa-star') }}"></span>
                                    <span class="{{ ($el->rating > 4 ? 'fa fa-star checked' : 'fa fa-star') }}"></span>
                                </span>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </section>
        <hr>
        <section id="opinions" class="container">
            <div class="row">
                <div class="col-12">
                    <h5 class="title-action text-center">Últimas opiniones recibidas</h5>
                </div>
            </div>
            <div class="row mt-3" id="opinions-list">
                <div class="col-12">
                    @foreach($user->provider->rating->take(2) as $i => $el)
                        <div class="opinion">
                            <div class="row mb-2">
                                <div class="col-3"><img class="rounded-circle" src="/assets/img/user.png"></div>
                                <div class="col-6 text">
                                    <span class="d-block title">{{ $el->user->name }}</span>
                                    <span class="d-block">{{ $el->user->operator->operator_position->name }}</span>
                                    <span class="d-block">{{ $el->user->operator->operator_company->name }}</span>
                                </div>
                                <div class="col-3 text">
                                    <span class="d-block date-from">{{ ucfirst(\Carbon\Carbon::parse($el->created_at)->diffForHumans()) }}</span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="rating">
                                        <span class="mr-1">{{ $el->rating }}</span>
                                        <span class="stars">
                                        <span class="{{ ($el->rating > 0 ? 'fa fa-star checked' : 'fa fa-star') }}"></span>
                                        <span class="{{ ($el->rating > 1 ? 'fa fa-star checked' : 'fa fa-star') }}"></span>
                                        <span class="{{ ($el->rating > 2 ? 'fa fa-star checked' : 'fa fa-star') }}"></span>
                                        <span class="{{ ($el->rating > 3 ? 'fa fa-star checked' : 'fa fa-star') }}"></span>
                                        <span class="{{ ($el->rating > 4 ? 'fa fa-star checked' : 'fa fa-star') }}"></span>
                                    </span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <p>{{ $el->comment }}</p>
                                </div>
                            </div>
                            <div class="row opinion-actions">
                                <div class="col-8"><span class="mr-3"><i class="la la-camera mr-1"></i>0</span><span class="mr-3"><i class="la la-eye mr-1"></i>100</span><span class="mr-3"><i class="la la-comment mr-1"></i>7</span></div>
                                <div class="col-4 text-right"><span>Denunciar</span></div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-12"><a class="btn btn-secondary form-control rounded-pill" role="button" href="{{ route('web.opinions', $user->provider->id) }}">Ver todas las opiniones</a></div>
            </div>
        </section>

    </main>
@endsection
