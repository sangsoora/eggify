@extends('web.layout.master')

@section('content')
    <header class="header-small">
        <div class="d-flex position-relative mb-2"><a class="link-icon" href="{{ route('web.provider', $provider->id) }}"><i class="la la-arrow-left mr-2"></i></a><a class="m-auto" href="{{ route('web.index') }}"><img src="/assets/img/logo-color.png"></a></div>
    </header>
    <main>
        <section>
            <div class="card">
                {{--<span class="tag">Premium</span>
                <span class="share"><i class="la la-share-alt"></i></span>
                <span class="like"><i class="la la-heart"></i></span>--}}
                <div class="carousel slide" data-ride="carousel" data-interval="false" data-pause="false" data-keyboard="false">
                    <div class="carousel-inner">
                        <div class="carousel-item active"><img class="w-100 d-block" src="/assets/img/chears.jpg" alt="Slide Image"></div>
                        <div class="carousel-item"><img class="w-100 d-block" src="/assets/img/slider-comunity.png" alt="Slide Image"></div>
                        <div class="carousel-item"><img class="w-100 d-block" src="/assets/img/slider-providers.png" alt="Slide Image"></div>
                    </div>
                    <div><a class="carousel-control-prev" href="#" role="button" data-slide="prev"><span class="carousel-control-prev-icon"></span><span class="sr-only">Previous</span></a><a class="carousel-control-next" href="#" role="button" data-slide="next"><span class="carousel-control-next-icon"></span><span class="sr-only">Next</span></a></div>
                    <ol class="carousel-indicators">
                        <li data-target="#" data-slide-to="0" class="active"></li>
                        <li data-target="#" data-slide-to="1"></li>
                        <li data-target="#" data-slide-to="2"></li>
                    </ol>
                </div>
                <div class="card-body">
                    <h4 class="card-title">{{ $provider->name }}</h4>
                    <div class="rating">
                        <span class="mr-1">{{ round($provider->rating->avg('rating'), 2) }}</span>
                        <span class="mr-1">
                            <span class="{{ ($provider->rating->avg('rating') > 0 ? 'fa fa-star checked' : 'fa fa-star') }}"></span>
                            <span class="{{ ($provider->rating->avg('rating') > 1 ? 'fa fa-star checked' : 'fa fa-star') }}"></span>
                            <span class="{{ ($provider->rating->avg('rating') > 2 ? 'fa fa-star checked' : 'fa fa-star') }}"></span>
                            <span class="{{ ($provider->rating->avg('rating') > 3 ? 'fa fa-star checked' : 'fa fa-star') }}"></span>
                            <span class="{{ ($provider->rating->avg('rating') > 4 ? 'fa fa-star checked' : 'fa fa-star') }}"></span>
                        </span>
                        <span>{{ sprintf('%s %s', $provider->rating->count(), ($provider->rating->count() == 1 ? 'Opinión' : 'Opiniones')) }}</span>
                    </div>
                    <p class="card-text mb-0"><i class="la la-map-marker mr-2"></i>{{ $provider->postal_code->city->name }}</p>
                    <p class="card-text">{{ ($provider->provider_type->name == 'distributor' ? 'Distribuidor' : 'Productor') }}</p>
                    {{--@if (auth()->check() && \App\Models\User::findOrFail(auth()->user()->id)->isUser())
                        <button class="btn btn-secondary rounded-pill mr-1" type="button">Solicitar presupuesto</button>
                        <button class="btn btn-secondary rounded-pill icon mr-1" type="button"><i class="la la-envelope"></i></button>
                    @else
                        <button class="btn btn-secondary rounded-pill mr-1" type="button" data-toggle="modal" data-target="#register-modal-budget">Solicitar presupuesto</button>
                        <button class="btn btn-secondary rounded-pill icon mr-1" type="button" data-toggle="modal" data-target="#register-modal-contact"><i class="la la-envelope"></i></button>
                    @endif
                    <button class="btn btn-secondary rounded-pill icon" type="button" data-toggle="modal" data-target="#register-modal-phone"><i class="la la-phone"></i></button>--}}
                </div>
            </div>
            <div class="modal fade" role="dialog" tabindex="-1" id="register-modal-budget">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                        </div>
                        <div class="modal-body">
                            <p>No olvides que para poder solicitar un presupuesto y tener completo acceso a nuestra plataforma antes debes registrarte.</p>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-primary rounded-pill w-100 m-auto" type="button">Registrarme ahora</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" role="dialog" tabindex="-1" id="register-modal-contact">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                        </div>
                        <div class="modal-body">
                            <p>No olvides que para poder contactar con el proveedor y tener completo acceso a nuestra plataforma antes debes registrarte.</p>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-primary rounded-pill w-100 m-auto" type="button">Registrarme ahora</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" role="dialog" tabindex="-1" id="register-modal-phone">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                        </div>
                        <div class="modal-body">
                            <p>Actualiza a un plan PRO para poder ver el teléfono de contacto!</p>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-primary rounded-pill w-100 m-auto" type="button">Cambiar ahora</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="opinions-rating" class="container">
            <div class="row">
                <div class="col-4">
                    <div class="rating rating-total">
                        <span class="text">
                            {{ round($provider->rating->avg('rating'), 2) }}
                        </span>
                        <span class="stars">
                            <span class="{{ ($provider->rating->avg('rating') > 0 ? 'fa fa-star checked' : 'fa fa-star') }}"></span>
                            <span class="{{ ($provider->rating->avg('rating') > 1 ? 'fa fa-star checked' : 'fa fa-star') }}"></span>
                            <span class="{{ ($provider->rating->avg('rating') > 2 ? 'fa fa-star checked' : 'fa fa-star') }}"></span>
                            <span class="{{ ($provider->rating->avg('rating') > 3 ? 'fa fa-star checked' : 'fa fa-star') }}"></span>
                            <span class="{{ ($provider->rating->avg('rating') > 4 ? 'fa fa-star checked' : 'fa fa-star') }}"></span>
                        </span>
                    </div>
                </div>
                <div class="col-8 pl-0">
                    <h5 class="title-action">{{ sprintf('%s %s de %s', $provider->rating->count(), ($provider->rating->count() == 1 ? 'opinión' : 'opiniones'), $provider->name) }}</h5>
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
                                <div class="col-3"><img class="rounded-circle" src="/assets/img/user.png"></div>
                                <div class="col-6 text">
                                    <span class="d-block title">{{ $el->rating->user->name }}</span>
                                    <span class="d-block">{{ $el->rating->user->operator->operator_position->name }}</span>
                                    <span class="d-block">{{ $el->rating->user->operator->operator_company->name }}</span>
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
            @if (auth()->check() && \App\Models\User::findOrFail(auth()->user()->id)->isOperator())
                <div class="row">
                    <div class="col-12"><a class="btn btn-secondary form-control rounded-pill" role="button" href="{{ route('web.opinions.add', $provider->id) }}">Añadir opinión</a></div>
                </div>
            @endif
        </section>
        <section id="go-top" class="container">
            <div class="row">
                <div class="col text-center">
                    <button class="btn text-action" type="button"><i class="la la-upload mr-2"></i>Volver arriba</button>
                </div>
            </div>
        </section>
    </main>
@endsection
