@extends('web.layout.master')

@section('content')
    @include('web.layout.sidebar')
    <header class="header-oval">
        <div class="bg-custom-oval"></div>
        <div class="header-sup">
            <div class="p-2"><button class="btn btn-nav" type="button" onclick="sidenav.open()"><i class="la la-navicon"></i></button></div><a class="m-auto" href="{{ route('web.index') }}"><img class="p-0" src="assets/img/logo-color.png"></a>
        </div>
        <div class="d-flex header-content profile-img-small position-relative mb-2">
            <div class="m-auto text-center profile-img">
                <p class="m-0 mb-1">{{ $user->provider->name }}</p>
                <img src="{{ $user->provider->provider_company != null ? $user->provider->provider_company->getUrlImageAttribute() : '/assets/images/no-product.png' }}" alt="{{ $user->provider->name }}">
            </div>
        </div>
    </header>
    <main>
        <section class="container">
            <div class="row mb-3">
                <div class="col-12">
                    <h5 class="title-action mb-2">Mi perfil</h5>
                    <div><a class="d-block border-bottom" href="{{ route('web.user.profile.edit') }}">Información de la compañía</a></div>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-12">
                    <h5 class="title-action mb-2">Ajustes</h5>
                    <div><a class="d-block border-bottom" href="#">Notificaciones</a></div>
                    <div class="mt-2"><a class="d-block border-bottom" href="#">Mejora tu plan</a></div>
                    <div class="mt-2"><a class="d-block border-bottom" href="#">Tu método de pago</a></div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <h5 class="title-action mb-2">Soporte</h5>
                    <div><a class="d-block border-bottom" href="#">Ayuda</a></div>
                    <div class="mt-2"><a class="d-block border-bottom" href="https://www.eggify.net/terminos-y-condiciones">Términos y condiciones</a></div>
                    <div class="mt-2"><a class="d-block border-bottom" href="https://www.eggify.net/copy-of-terminos-y-condiciones">Política de privacidad</a></div>
                    <div class="mt-2"><a class="d-block border-bottom" href="{{ route('web.user.logout') }}">Cerrar sesión</a></div>
                </div>
            </div>
        </section>
    </main>
@endsection
