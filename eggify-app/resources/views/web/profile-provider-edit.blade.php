@extends('web.layout.master')

@section('content')
    <header class="header-oval">
        <div class="bg-custom-oval"></div>
        <div class="d-flex header-content position-relative mb-2"><a class="link-icon" href="{{ route('web.index') }}"><i class="la la-arrow-left"></i></a>
            <div class="m-auto text-center profile-img"><img src="{{ $user->provider->provider_company != null ? $user->provider->provider_company->getUrlImageAttribute() : '/assets/images/no-product.png' }}" alt="{{ $user->provider->name }}">
                <p class="m-0 mt-1">{{ $user->provider->name }}</p>
            </div>
        </div>
    </header>
    <main>
        <section class="container">
            <div class="row">
                <div class="col-12">
                    <h5 class="title-action text-center mb-4">Información de la compañía</h5>

                    {!! Form::open(['method' => 'POST', 'route' => ['web.user.profile.update'], 'id' => 'edit-provider' ]) !!}
                    <div class="form-group input-text-icon"><input class="form-control" type="text" placeholder="Nombre de la empresa" name="name" required="" value="{{ $user->provider->name }}"><i class="la la-briefcase"></i></div>
                    <div class="form-group input-text-icon"><input class="form-control" type="password" placeholder="Contraseña" name="password" value=""><i class="la la-eye"></i></div>
                    <div class="form-group input-text-icon"><input class="form-control" type="email" placeholder="Email" required="" name="email" value="{{ $user->email }}"><i class="la la-envelope"></i></div>
                    <div class="form-group input-text-icon"><input class="form-control" type="tel" placeholder="Teléfono" required="" name="phone" value="{{ $user->provider->phone }}"><i class="la la-phone"></i></div>
                    <div class="form-group input-text-icon"><input class="form-control" type="text" placeholder="Ubicación" name="address" required="" value="{{ $user->provider->address }}"><i class="la la-map-marker"></i></div>
                    <div class="form-group">
                        <h6 class="mb-1">¿Qué productos o servicios ofrecen?</h6>
                        <div class="provider-category">
                            @foreach($providerCategories as $category)
                                <button class="btn btn-secondary rounded-pill mr-3 my-1 {{ $user->provider->provider_category_id != null && $user->provider->provider_category_id == $category->id ? 'active' : '' }}" type="button" data-id="{{ $category->id }}">{{ $category->name }}</button>
                            @endforeach
                        </div>
                    </div>
                    <div class="form-group input-text-icon"><input class="form-control" type="text" placeholder="Web" name="web" required="" value="{{ $user->provider->provider_company != null ? $user->provider->provider_company->web : '' }}"><i class="la la-link"></i></div>
                    <div class="form-group">
                        <h6 class="mb-3">Logo de tu compañía</h6>
                        <div class="form-row">
                            <div class="col-6">
                                <div id="img-preview" class="img-upload">
                                    <input type="file" id="logo-upload" class="img-input" name="logo" accept="image/*">
                                    <label class="btn btn-secondary" for="logo-upload"><i class="la la-plus"></i></label>
                                    <button class="btn btn-secondary btn-trash" type="button" onclick="myFunctions.imageTrash(this)"><i class="la la-trash" style="vertical-align: top;"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <h6 class="mb-1">Número de empleados</h6>
                        <div class="employee">
                            @foreach($companyEmployees as $employee)
                                <button class="btn btn-secondary rounded-pill mr-3 my-1 {{ $user->provider->provider_employees_id != null && $user->provider->provider_employees_id == $employee->id ? 'active' : '' }}" type="button" data-id="{{ $employee->id }}">{{ $employee->name }}</button>
                            @endforeach
                        </div>
                    </div>
                    <div class="form-group input-text-icon"><input class="form-control" type="number" placeholder="Años" name="years" required="" value="{{ $user->provider->provider_company != null ? $user->provider->provider_company->years : '' }}"><span style="position: absolute;top: 8px;right: 40px;">Años</span><i class="la la-building"></i></div>
                    <div class="form-group input-text-icon pr-0"><input class="form-control" type="text" placeholder="LinkedIn" name="linkedin" required="" value="{{ $user->provider->provider_company != null ? $user->provider->provider_company->linkedin : '' }}"></div>
                    <button class="btn btn-secondary form-control rounded-pill" type="submit">Guardar</button>
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
                    {!! Form::close() !!}
                </div>
            </div>
        </section>
    </main>
@endsection

@push('custom-scripts')
    <script type="text/javascript">

        $('.provider-category button').on('click', function () {
            let $that = $(this);

            $('.provider-category button').removeClass('active');
            $that.addClass('active');
        });

        $('.employee button').on('click', function () {
            let $that = $(this);

            $('.employee button').removeClass('active');
            $that.addClass('active');
        });

    </script>
@endpush

