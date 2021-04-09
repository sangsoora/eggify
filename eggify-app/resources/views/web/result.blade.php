@extends('web.layout.master')

@section('content')
    @include('web.layout.sidebar')
    @include('web.layout.sidebarlogin')
    <header class="header-small mobile">
        <div class="d-flex position-relative mb-2">
            <a class="link-icon" href="{{ route('web.search.provider') }}"><i class="la la-arrow-left mr-2"></i></a>
            <a class="m-auto" href="{{ auth()->check() && \App\Models\User::findOrFail(auth()->user()->id)->isProvider() ? route('web.provider-dashboard'): route('web.index') }}"><img src="/assets/img/logo-color.png"></a>
        </div>
    </header>
    <header class="d-flex header-opacity justify-content-between" id="header-desktop">
        <div class="p-2">
            <button class="btn mr-auto p-0" type="button"><a href="{{ auth()->check() && \App\Models\User::findOrFail(auth()->user()->id)->isProvider() ? route('web.provider-dashboard'): route('web.index') }}"><img src="/assets/img/logo-color.png"></a></button>
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
        <section id="filters" class="container">
            <div class="row">
                <div class="col">
                    <form>
                        <div class="position-relative mb-3">
                            <h5 class="title-action mb-3">{{ $category_selected != null ? $category_selected->name : 'Todas las categorías' }}</h5>
                            <div class="input-group">
                                <div class="input-group-prepend"><span class="input-group-text"><i class="la la-map-marker"></i></span></div>
                                <input class="form-control" type="text" readonly="" disabled="" value="{{ ($city_selected != null ? $city_selected->name : 'Seleccionar ciudad') }}">
                                <div class="input-group-append">
                                    <button class="btn" type="button" onclick="selectcustom.toggle(this)" data-target="select-option-location">Editar</button>
                                </div>
                            </div>
                            <div id="select-option-location" class="select-option-custom">
                                <ul class="list-unstyled">
                                    @foreach($cities as $i => $el)
                                        <li style="cursor: pointer" data-link="{{ route('web.result', [ 'category' => $category_selected != null ? $category_selected->id : 0, 'city' => $el->id ]) }}">{{ $el->name }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        {{--<div class="pb-3">
                            <h5 class="title-action mb-3">Ordenar por mejor<i class="la la-angle-down pl-3"></i></h5>
                            <div>
                                <button class="btn btn-secondary rounded-pill mr-3 my-1 active" type="button">Defecto<i class="la la-close pl-2"></i></button>
                                --}}{{--@foreach($ratings_criteria as $i => $el)
                                    <button class="btn btn-secondary rounded-pill mr-3 my-1" type="button">{{ $el->name }}</button>
                                @endforeach--}}{{--
                            </div>
                        </div>--}}
                    </form>
                </div>
            </div>
        </section>
        <section id="results" class="container">
            <div class="row">
                <div class="col-12">
                    @if ($providers->count() == 0)
                        <p>Lo sentimos!<br/>Crea una nueva búsqueda o revisa nuestras sugerencias a continuación:</p>
                    @else
                        <p>{{ $providers->count() == 1 ? '1 empresa' : sprintf('%s %s', $providers->count(), 'empresas') }}</p>
                        <div class="card-group">
                            @foreach($providers as $i => $el)
                                <div class="card">
                                    {{--<span class="tag">Premium</span>
                                    <span class="like"><i class="la la-heart"></i></span>--}}
                                    <a href="{{ route('web.provider', $el->id) }}">
                                        <img class="card-img w-100 d-block" src="{{ $el->provider_company != null ? $el->provider_company->getUrlImageAttribute() : '/assets/images/no-product.png' }}" alt="{{ $el->provider_company != null ? $el->provider_company->name : '' }}">
                                    </a>
                                    <div class="card-body">
                                        <h4 class="card-title">{{ $el->name }}</h4>
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
                                        <p class="card-text">{{ ($el->provider_type->name == 'distributor' ? 'Distribuidor' : 'Productor') }}, {{ $el->postal_code->city->name }}</p>
                                        <button class="btn btn-secondary rounded-pill mr-1" type="button" onclick="window.location.href='{{ route('web.provider', $el->id) }}'">Saber más</button>
                                        @if (auth()->check() && \App\Models\User::findOrFail(auth()->user()->id)->isUser())
                                            <button class="btn btn-secondary rounded-pill icon mr-1" type="button" data-toggle="modal" data-target="#note-modal" data-userto="{{ $el->user_id }}"><i class="la la-file-text"></i></button>
                                            <button class="btn btn-secondary rounded-pill icon mr-1" type="button" data-toggle="modal" data-target="#message-modal" data-userto="{{ $el->user_id }}"><i class="la la-envelope"></i></button>
                                            <button class="btn btn-secondary rounded-pill icon mr-1" type="button" data-toggle="modal" data-target="#phone-modal"><i class="la la-phone"></i></button>
                                        @else
                                            <button class="btn btn-secondary rounded-pill icon mr-1" type="button" data-toggle="modal" data-target="#register-modal"><i class="la la-file-text"></i></button>
                                            <button class="btn btn-secondary rounded-pill icon mr-1" type="button" data-toggle="modal" data-target="#register-modal"><i class="la la-envelope"></i></button>
                                            <button class="btn btn-secondary rounded-pill icon mr-1" type="button" data-toggle="modal" data-target="#register-modal"><i class="la la-phone"></i></button>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        @if (auth()->check() && \App\Models\User::findOrFail(auth()->user()->id)->isUser())
                            <div class="modal fade" role="dialog" tabindex="-1" id="note-modal">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Añadir una nota</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                        </div>
                                        <div class="modal-body">
                                            {!! Form::textarea('note', '', ['class' => 'form-control', '', 'id'=> 'note', 'size' => '5x5']) !!}
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-primary rounded-pill w-100 m-auto" type="button" onclick="createNote(this)">@lang('global.general.save')</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" role="dialog" tabindex="-1" id="message-modal">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Enviar mensaje</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                        </div>
                                        <div class="modal-body">
                                            {!! Form::textarea('message', '', ['class' => 'form-control', '', 'id'=> 'message', 'size' => '5x5']) !!}
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-primary rounded-pill w-100 m-auto" type="button" onclick="sendMessage(this)">@lang('global.general.send')</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="modal fade" role="dialog" tabindex="-1" id="register-modal">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                        </div>
                                        <div class="modal-body">
                                            <p>No olvides que para poder dejar una nota y tener completo acceso a nuestra plataforma antes debes registrarte.</p>
                                        </div>
                                        <div class="modal-footer">
                                            <a class="btn btn-primary rounded-pill w-100 m-auto" href="{{ route('web.signup-client') }}">Registrarme ahora</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endif
                </div>
            </div>
        </section>
        @if($cities->count() > 0)
            <section class="container">
                <div class="row">
                    <div class="col">
                        <h5 class="title-action mb-3">Ciudades cercanas</h5>
                        <ul class="list-unstyled list-custom">
                            @foreach($cities->random($cities->count() >= 5 ? 5 : $cities->count()) as $i => $el)
                                <li class="d-flex" style="cursor: pointer" onclick="window.location.href='{{ route('web.result', [ 'category' => $category_selected != null ? $category_selected->id : 0, 'city' => $el->id ]) }}'"><span class="mr-auto">{{ $el->name }}</span><span>{{ $el->postal_code->first()->provider->count() }}</span></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </section>
        @endif
        <section id="go-top" class="container">
            <div class="row">
                <div class="col text-center">
                    <button class="btn text-action" type="button"><i class="la la-upload mr-2"></i>Volver arriba</button>
                </div>
            </div>
        </section>
    </main>
@endsection

@push('custom-scripts')
    <script type="text/javascript">
        $(document).ready(function () {

            $('#note-modal').on('show.bs.modal', function (event) {
                let modal = $(this);
                let button = $(event.relatedTarget);
                let userto = button.data('userto');

                modal.find('.modal-footer button').attr('data-userto', userto);

                modal.find('.modal-body #note').val('Cargando...');

                let fd = new FormData();
                fd.append('user_to_id', userto);

                $.ajax({
                    data: fd,
                    method: "POST",
                    url: '{{ route('web.user.note.get') }}',
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    processData: false,
                    contentType: false,
                }).done(function (response) {
                    modal.find('.modal-body #note').val(response.message);
                    modal.find('.modal-footer button').html('Guardar');
                });
            });

            $('#message-modal').on('show.bs.modal', function (event) {
                let modal = $(this);
                let button = $(event.relatedTarget);
                let userto = button.data('userto');

                modal.find('.modal-body #message').val('');
                modal.find('.modal-footer button').html('Enviar');
                modal.find('.modal-footer button').prop("disabled", false);
                modal.find('.modal-footer button').attr('data-userto', userto);
            });

        });

        function createNote(el) {
            let fd = new FormData();
            fd.append('note', $('#note').val());
            fd.append('user_to_id', $(el).attr('data-userto'));

            $(el).prop("disabled", true);
            $(el).html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Cargando...');

            $.ajax({
                data: fd,
                method: "POST",
                url: '{{ route('web.user.note.store') }}',
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                processData: false,
                contentType: false,
            }).done(function (response) {
                $(el).html("Nota guardada!");
            });
        }

        function sendMessage(el) {
            let fd = new FormData();
            fd.append('message', $('#message').val());
            fd.append('user_to_id', $(el).attr('data-userto'));

            $(el).prop("disabled", true);
            $(el).html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Cargando...');

            $.ajax({
                data: fd,
                method: "POST",
                url: '{{ route('web.user.message.store') }}',
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                processData: false,
                contentType: false,
            }).done(function (response) {
                $(el).html("Mensaje enviado!");
            });
        }
    </script>
@endpush
