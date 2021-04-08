<div id="sidenav" class="sidenav">
    <a class="closebtn" href="javascript:void(0)" onclick="sidenav.close()"><i class="fas fa-arrow-left mr-2"></i><img src="/assets/img/logo-text.png"></a>
    <a href="/"><i class="fas fa-home mr-3"></i>Home</a>
    <a href="{{ route('web.about') }}"><i class="fas fa-egg mr-3"></i>Sobre nosotros</a>
    <a href="{{ route('web.search.provider') }}"><i class="fas fa-search mr-3"></i>Proveedores</a>

    @if (auth()->check() && \App\Models\User::findOrFail(auth()->user()->id)->isUser())
        <a href="{{ route('web.inbox') }}"><i class="far fa-envelope mr-3"></i>Inbox</a>
        <a href="{{ route('web.user.profile') }}"><i class="far fa-user mr-3"></i>Mi cuenta</a>
        @if (\App\Models\User::findOrFail(auth()->user()->id)->isProvider())
            <a href="{{ route('web.provider-dashboard') }}"><i class="la la-check mr-3"></i>Organizador</a>
            <a href="{{ route('web.provider-showcase') }}"><i class="la la-building mr-3"></i>Escaparate</a>
        @endif
    @endif
    <a href="https://community.eggify.net/"><i class="far fa-comment-dots mr-3"></i>Comunidad</a>
    @if (!auth()->check())
        <a href="{{ route('web.about-provider') }}"><i class="fas fa-box mr-3"></i>¿Eres un proveedor?</a>
    @endif
    <span class="separator"></span>
    {{--<a href="#"><i class="fas fa-info-circle mr-3"></i>Ayuda</a>--}}
    <a href="https://www.eggify.net/copy-of-terminos-y-condiciones"><i class="fas fa-lock mr-3"></i>Política de privacidad</a>
    <a href="https://www.eggify.net/terminos-y-condiciones"><i class="fas fa-balance-scale mr-3"></i>Términos y condiciones</a>

    @if (!(auth()->check() && \App\Models\User::findOrFail(auth()->user()->id)->isUser()))
        <a href="javascript:void(0)" onclick="sidenav.close();sidepopuplogin.open()"><i class="fas fa-sign-in-alt mr-3"></i>Iniciar sesión</a>
    @else
        <a href="{{ route('web.user.logout') }}"><i class="fas fa-sign-out-alt mr-3"></i>Cerrar sesión</a>
    @endif
</div>
