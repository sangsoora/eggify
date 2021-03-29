@extends('web.layout.master')

@section('content')
    <header class="header-small">
        <div class="d-flex position-relative mb-2"><a class="link-icon" href="{{ route('web.provider', $provider->id) }}"><i class="la la-arrow-left mr-2"></i></a><a class="m-auto" href="{{ auth()->check() && \App\Models\User::findOrFail(auth()->user()->id)->isProvider() ? route('web.provider-dashboard'): route('web.index') }}"><img src="/assets/img/logo-color.png"></a></div>
    </header>
    <main>

        {!! Form::open(['method' => 'POST', 'route' => ['web.opinions.add.store', $id], 'id' => 'option-add' ]) !!}
        <section class="pt-0">
            <div class="card">
                {{--<span class="tag">Premium</span>
                <span class="share"><i class="la la-share-alt"></i></span>
                <span class="like"><i class="la la-heart"></i></span>--}}
                <div class="carousel slide" data-ride="carousel" data-interval="false" data-pause="false" data-keyboard="false">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img class="w-100 d-block" src="{{ $provider->provider_company != null ? $provider->provider_company->getUrlImageAttribute() : '/assets/images/no-product.png' }}" alt="{{ $provider->provider_company != null ? $provider->provider_company->name : '' }}">
                        </div>
                        {{--<div class="carousel-item"><img class="w-100 d-block" src="/assets/img/slider-comunity.png" alt="Slide Image"></div>
                        <div class="carousel-item"><img class="w-100 d-block" src="/assets/img/slider-providers.png" alt="Slide Image"></div>--}}
                    </div>
                    <div><a class="carousel-control-prev" href="#" role="button" data-slide="prev"><span class="carousel-control-prev-icon"></span><span class="sr-only">Previous</span></a><a class="carousel-control-next" href="#" role="button" data-slide="next"><span class="carousel-control-next-icon"></span><span class="sr-only">Next</span></a></div>
                    <ol class="carousel-indicators">
                        <li data-target="#" data-slide-to="0" class="active"></li>
                        {{--<li data-target="#" data-slide-to="1"></li>
                        <li data-target="#" data-slide-to="2"></li>--}}
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
                </div>
            </div>
        </section>

        <section class="container">
            <div class="row">
                <div class="col-12">
                    <h5 class="title-action">Valoración del proveedor</h5>
                    @foreach($ratingsCriteria as $i => $el)
                        <div class="row">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-12">
                                        <span>{{ $el->name }}</span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="rating rating-criteria" data-id="{{ $el->id }}">
                                            <span class="stars">
                                                <span class="fa fa-star pointer checked" data-num="1"></span>
                                                <span class="fa fa-star pointer" data-num="2"></span>
                                                <span class="fa fa-star pointer" data-num="3"></span>
                                                <span class="fa fa-star pointer" data-num="4"></span>
                                                <span class="fa fa-star pointer" data-num="5"></span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <section class="container">
            <div class="row">
                <div class="col-12">
                    <h5 class="title-action">¿Lo recomiendas?</h5>
                </div>
            </div>
            <div class="row recommended">
                <div class="col-6">
                    <button class="btn btn-secondary rounded-pill form-control" type="button" data-value="1">Si</button>
                </div>
                <div class="col-6">
                    <button class="btn btn-secondary rounded-pill form-control" type="button" data-value="0">No</button>
                </div>
            </div>
        </section>
        <section class="container">
            <div class="row">
                <div class="col-12">
                    <h5 class="title-action">Título de tu opinión</h5>
                </div>
            </div>
            <div class="row recommended">
                <div class="col-12">
                    {!! Form::textarea('title', '', ['class' => 'form-control', '', 'id'=> 'title', 'size' => '5x2', 'required']) !!}
                </div>
            </div>
        </section>
        <section class="container">
            <div class="row">
                <div class="col-12">
                    <h5 class="title-action">Escribe tu opinión</h5>
                    <p>0/75</p>
                </div>
            </div>
            <div class="row recommended">
                <div class="col-12">
                    {!! Form::textarea('comment', '', ['class' => 'form-control', '', 'id'=> 'comment', 'size' => '5x5', 'required']) !!}
                </div>
            </div>
        </section>
        <section class="container">
            <div class="row">
                <div class="col-12">
                    <h5 class="title-action">Una imágen vale más que mil palabras. Sube tus fotos.</h5>
                </div>
            </div>
            <div class="row photo">
                <div class="col-6">
                    <button class="btn btn-secondary rounded-pill form-control" type="button">Toma una foto</button>
                </div>
                <div class="col-6">
                    <button class="btn btn-secondary rounded-pill form-control" type="button">Desde la galería</button>
                </div>
            </div>
        </section>
        <section class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <button class="btn btn-secondary form-control rounded-pill" type="submit">Publicar</button>
                </div>
            </div>
        </section>
        {!! Form::close() !!}

        <div class="modal fade" role="dialog" tabindex="-1" id="modal-done">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header"><a href="/" class="close" aria-label="Close"><span aria-hidden="true">×</span></a></div>
                    <div class="modal-body">
                        <p>Opinión añadida correctamente.</p>
                    </div>
                    <div class="modal-footer">
                        <a class="btn btn-secondary rounded-pill w-100 m-auto" role="button" href="/">Volver al inicio</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" role="dialog" tabindex="-1" id="modal-error">
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
        <div class="modal fade" role="dialog" tabindex="-1" id="validation-modal">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    </div>
                    <div class="modal-body">
                        <p></p>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary rounded-pill w-100 m-auto" type="button" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

@push('custom-scripts')
    <script type="text/javascript">

        $('.recommended button').on('click', function () {
            let $that = $(this);

            $('.recommended button').removeClass('active');
            $that.addClass('active');
        });

        $('.stars span').on('click', function () {
            let $that = $(this);
            let $wp = $that.closest('.stars');
            let num = $that.attr('data-num');

            $wp.find('span').removeClass('checked');

            $wp.find('span').each(function (index) {
                if ((index + 1) <= num) {
                    $(this).addClass('checked');
                }
            });
        });

    </script>
@endpush
