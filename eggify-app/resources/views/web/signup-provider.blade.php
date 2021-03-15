@extends('web.layout.master')

@section('content')
    <header class="header-oval">
        <div class="bg-custom-oval"></div>
        <div class="d-flex header-content position-relative mb-2"><a class="link-icon" href="{{ route('web.index') }}"><i class="la la-arrow-left"></i></a><a class="m-auto" href="{{ route('web.index') }}"><img src="assets/img/logo-splash.png"></a><a class="link-icon link-icon-right" href="{{ route('web.index') }}"><i class="la la-close"></i></a></div>
    </header>
    <main>
        <section class="container">
            <div class="row mb-3">
                <div class="col-12">
                    <h5 class="title-action text-center mb-4">Regístrate</h5>
                    {{--<button class="btn btn-tertiary form-control rounded-pill mb-3" type="button"><i class="la la-linkedin-square"></i>Continua con LinkedIn</button>
                    <button class="btn btn-tertiary form-control rounded-pill" type="button"><i class="la la-google"></i>Continua con Google</button>--}}
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    {!! Form::open(['method' => 'POST', 'route' => ['web.signup-provider.store'], 'id' => 'signup-provider']) !!}
                    <div class="form-group input-text-icon"><input class="form-control" type="text" placeholder="Nombre de la empresa" name="name" required=""><i class="la la-briefcase"></i></div>
                    <div class="form-group input-text-icon"><input class="form-control" type="password" placeholder="Contraseña" name="password" required=""><i class="la la-eye"></i></div>
                    <div class="form-group input-text-icon"><input class="form-control" type="email" placeholder="Email" required="" name="email"><i class="la la-envelope"></i></div>
                    <div class="form-group input-text-icon"><input class="form-control" type="tel" placeholder="Teléfono" required="" name="phone"><i class="la la-phone"></i></div>
                    <div class="form-group input-text-icon"><input class="form-control" type="text" placeholder="Ubicación" name="address" required=""><i class="la la-map-marker"></i></div>
                    <div class="form-group input-text-icon">
                        {!! Form::select('provider_type_id', $providerTypes->pluck('name', 'id'), old('provider_type_id'), ['class' => 'form-control', 'id' => 'provider_type_id', 'required']) !!}
                        <i class="la la-briefcase"></i>
                    </div>
                    <div class="form-group">
                        <h6 class="mb-1">¿Qué productos o servicios ofrecen?</h6>
                        <div class="categories">
                            @foreach($categories as $category)
                                <button class="btn btn-secondary rounded-pill mr-3 my-1" type="button" data-id="{{ $category->id }}">{{ $category->name }}</button>
                            @endforeach
                        </div>
                    </div>
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" id="policy_consent" required="" name="policy_consent">
                        <label class="form-check-label" for="policy_consent">
                            He leído y acepto las&nbsp;<a class="text-underline text-action" href="https://www.eggify.net/copy-of-terminos-y-condiciones">condiciones de uso</a> y de&nbsp;<a class="text-underline text-action" href="https://www.eggify.net/copy-of-terminos-y-condiciones">privacidad</a>
                        </label>
                    </div>
                    <button class="btn btn-secondary form-control rounded-pill" type="submit">Registrarme</button>
                    <div class="modal fade" role="dialog" tabindex="-1" id="signup-modal-done">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header"><a href="/" class="close" aria-label="Close"><span aria-hidden="true">×</span></a></div>
                                <div class="modal-body">
                                    <p>Gracias! Ya formas parte de nosotros. ¿Tienes tiempo para completar tu perfil ahora? Sino, no te preocupes, lo podrás hacer más tarde.</p>
                                </div>
                                <div class="modal-footer">
                                    <a class="btn btn-primary rounded-pill w-100 mx-0 mt-0 mb-3" role="button" href="{{ route('web.user.profile.edit') }}">Completar mi perfil ahora</a>
                                    <a class="btn btn-secondary rounded-pill w-100 m-auto" role="button" href="/">Recordarme luego</a></div>
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
                    <div class="modal fade" role="dialog" tabindex="-1" id="signup-validation-modal">
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
                    {!! Form::close() !!}
                </div>
            </div>
        </section>
    </main>
@endsection

@push('custom-scripts')
    <script type="text/javascript">
        $('.categories button').on('click', function () {
            let $that = $(this);

            $('.categories button').removeClass('active');
            $that.addClass('active');
        });
    </script>
@endpush
