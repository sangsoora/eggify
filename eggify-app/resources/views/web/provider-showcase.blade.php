@extends('web.layout.master')

@section('content')
    @include('web.layout.sidebar')
    <header class="header-small mobile">
        <div class="d-flex position-relative mb-2">
            <a class="link-icon" href="{{ auth()->check() && \App\Models\User::findOrFail(auth()->user()->id)->isProvider() ? route('web.provider-dashboard'): route('web.index') }}"><i class="la la-arrow-left mr-2"></i></a>
            <a class="m-auto" href="{{ auth()->check() && \App\Models\User::findOrFail(auth()->user()->id)->isProvider() ? route('web.provider-dashboard'): route('web.index') }}"><img src="/assets/img/logo-color.png"></a>
        </div>
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
        {!! Form::open(['method' => 'POST', 'route' => ['web.provider-showcase.update'], 'id' => 'edit-provider-showcase' ]) !!}
        <section class="container">
            <div class="row">
                <div class="col-12">
                    <h5 class="title-action mb-3">Mi escaparate</h5>
                    <div class="row information">
                        <div class="col-4 pr-0">
                            <img src="{{ $user->provider->provider_company != null ? $user->provider->provider_company->getUrlImageAttribute() : '/assets/images/no-product.png' }}" alt="{{ $user->provider->provider_company != null ? $user->provider->provider_company->name : '' }}">
                        </div>
                        <div class="col-7">
                            <h5 class="text-action mb-0">{{ $user->provider->name }}</h5>

                            <div class="rating">
                                <span class="mr-1">{{ round($user->provider->rating->avg('rating'), 2) }}</span>
                                <span class="stars">
                                    <span class="{{ ($user->provider->rating->avg('rating') > 0 ? 'fa fa-star checked' : 'fa fa-star') }}"></span>
                                    <span class="{{ ($user->provider->rating->avg('rating') > 1 ? 'fa fa-star checked' : 'fa fa-star') }}"></span>
                                    <span class="{{ ($user->provider->rating->avg('rating') > 2 ? 'fa fa-star checked' : 'fa fa-star') }}"></span>
                                    <span class="{{ ($user->provider->rating->avg('rating') > 3 ? 'fa fa-star checked' : 'fa fa-star') }}"></span>
                                    <span class="{{ ($user->provider->rating->avg('rating') > 4 ? 'fa fa-star checked' : 'fa fa-star') }}"></span>
                                </span>
                            </div>
                            <p><i class="la la-map-marker mr-1"></i>{{ $user->provider->postal_code->city->name }}</p>
                            <p>{{ ($user->provider->provider_type->name == 'distributor' ? 'Distribuidor' : 'Productor') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <hr>
        <section class="container pt-0">
            <div class="row mb-4">
                <div class="col-12">
                    <h5 class="title-action">¿Quiénes sois?</h5>
                    <textarea class="form-control" rows="5" name="about">{{ $user->provider->about }}</textarea>
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-12">
                    <h5 class="title-action">¿A qué os dedicáis?</h5>
                    <textarea class="form-control" rows="5" name="description">{{ $user->provider->description }}</textarea>
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-12">
                    <h5 class="title-action">¿Cuál es vuestra propuesta de valor (USP)?</h5>
                    <textarea class="form-control" rows="5" name="usp">{{ $user->provider->usp }}</textarea>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-4">
                    <h5 class="title-action desktop-title">Municipio donde estáis ubicados</h5>
                    <input class="form-control with-border mb-4" type="text" name="municipality" value="{{ $user->provider->municipality }}">
                </div>
                <div class="col-12 col-md-4">
                    <h5 class="title-action desktop-title">Localizaciones donde operáis</h5>
                    <input class="form-control with-border mb-4" type="text" name="location" value="{{ $user->provider->location }}">
                </div>
                <div class="col-12 col-md-4">
                    <h5 class="title-action desktop-title">¿Cuándo empezasteis en el mercado?</h5>
                    <input class="form-control with-border mb-4" type="date" name="starting" value="{{ $user->provider->starting }}">
                </div>
            </div>
        </section>
        <section class="container">
            <h5 class="title-action">Sube tus fotos</h5>


                @for($i = 0; $i < 4; $i++)

                    @if($i % 2 == 0)
                        <div class="row wp mt-3">
                    @endif

                    <div class="col-6">

                        @if($providerImages != null && count($providerImages) - 1 >= $i)
                            <div id="img-preview" class="img-upload" style="background: url('{!! getUrlResource('/provider/' . $user->provider->id . '/' . $providerImages[$i]['name']) !!}') center / cover no-repeat">
                        @else
                            <div id="img-preview" class="img-upload">
                        @endif
                            <input type="file" id="logo-upload-{{ $i }}" class="img-input img-input-gallery" name="logo[]" data-id="{{ $i }}" accept="image/*">
                            <label class="btn btn-secondary" for="logo-upload-{{ $i }}" style="{{ ($providerImages != null && count($providerImages) - 1 >= $i ? 'display: none' : '') }}"><i class="la la-plus"></i></label>
                            <button class="btn btn-secondary btn-trash" style="{{ ($providerImages != null && count($providerImages) - 1 >= $i ? 'display: block' : '') }}" type="button" data-id="{{ $i }}" onclick="myFunctions.imageTrash(this)"><i class="la la-trash" style="vertical-align: top;"></i></button>
                            <input type="hidden" id="logo-removed-{{ $i }}" name="logoremoved[]" value="0" />
                        </div>

                    </div>

                    @if($i % 2 != 0)
                        </div>
                    @endif

                @endfor


        </section>
        <section id="opinions-rating" class="container mobile">
            <div class="row">
                <div class="col-4">
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
                <div class="col-8 pl-0">
                    <h5 class="title-action">{{ sprintf('%s %s de %s', $user->provider->rating->count(), ($user->provider->rating->count() == 1 ? 'opinión' : 'opiniones'), $user->provider->name) }}</h5>
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
        <section id="opinions" class="container">
            <div class="row">
                <div class="col-12">
                    <h5 class="title-action">Opiniones</h5>
                </div>
            </div>
            <div class="row mt-3" id="opinions-list">
                <div class="col-12">
                    @foreach($ratingsProvider as $i => $el)
                        <div class="opinion">
                            <div class="row mb-2">
                                <div class="col-3">
                                    <img class="rounded-circle" src="{{ $el->rating->user->operator->operator_company != null ? $el->rating->user->operator->operator_company->getUrlImageAttribute() : '/assets/images/no-product.png' }}" alt="{{ $el->rating->user->operator->operator_company != null ? $el->rating->user->operator->operator_company->name : '' }}">
                                </div>
                                <div class="col-6 text">
                                    <span class="d-block title">{{ $el->rating->user->name }}</span>
                                    <span class="d-block">{{ $el->rating->user->operator->operator_position != null ? $el->rating->user->operator->operator_position->name : '-' }}</span>
                                    <span class="d-block">{{ $el->rating->user->operator->operator_company != null ? $el->rating->user->operator->operator_company->name : '-' }}</span>
                                </div>
                                <div class="col-3 text">
                                    <span class="d-block date-from">{{ ucfirst(\Carbon\Carbon::parse($el->rating->created_at)->diffForHumans()) }}</span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="rating">
                                        <span class="mr-1">{{ $el->rating->rating }}</span>
                                        <span class="stars">
                                        <span class="{{ ($el->rating->rating > 0 ? 'fa fa-star checked' : 'fa fa-star') }}"></span>
                                        <span class="{{ ($el->rating->rating > 1 ? 'fa fa-star checked' : 'fa fa-star') }}"></span>
                                        <span class="{{ ($el->rating->rating > 2 ? 'fa fa-star checked' : 'fa fa-star') }}"></span>
                                        <span class="{{ ($el->rating->rating > 3 ? 'fa fa-star checked' : 'fa fa-star') }}"></span>
                                        <span class="{{ ($el->rating->rating > 4 ? 'fa fa-star checked' : 'fa fa-star') }}"></span>
                                    </span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <p>{{ $el->rating->comment }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="row">
                <div class="col-12"><a class="btn btn-secondary form-control rounded-pill" role="button" href="{{ route('web.opinions', $user->provider->id) }}">Ver todas las opiniones</a></div>
            </div>
        </section>
        <section id="map" class="container">
            <div class="row">
                <div class="col-12">
                    <h5 class="title-action">Mapa</h5>
                    <p><i class="la la-map-marker mr-2"></i>{{ $user->provider->postal_code->city->name }}</p>
                    <iframe allowfullscreen="" frameborder="0" src="{{ sprintf('https://www.google.com/maps/embed/v1/place?key=AIzaSyCkcQorgPkzeihdpqqZVuJWZVV2OL6d4bw&q=%s', urlencode(strtolower($user->provider->address))) }}" width="100%" height="200"></iframe>
                </div>
            </div>
        </section>
        <button class="btn btn-secondary form-control rounded-pill mt-3 mb-3" type="submit">Guardar</button>
        <div class="modal fade" role="dialog" tabindex="-1" id="signup-modal-done">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header"><a href="/" class="close" aria-label="Close"><span aria-hidden="true">×</span></a></div>
                    <div class="modal-body">
                        <p>Perfil actualizado correctamente.</p>
                    </div>
                    <div class="modal-footer">
                        <a class="btn btn-secondary rounded-pill w-100 m-auto" role="button" href="/">Volver al inicio</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" role="dialog" tabindex="-1" id="signup-modal-error">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    </div>
                    <div class="modal-body">
                        <p>Ups! Algo no ha ido según lo esperado. Inténtalo de nuevo más tarde o contacta con nosotros. Perdona las molestias.</p>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary rounded-pill w-100 m-auto" type="button" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </main>
@endsection
