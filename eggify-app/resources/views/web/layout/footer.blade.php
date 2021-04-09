@if (auth()->check() && \App\Models\User::findOrFail(auth()->user()->id)->isUser())
    <footer id="tools-bar" class="mobile">
        @if (\App\Models\User::findOrFail(auth()->user()->id)->isOperator())
            <div class="row m-auto" id="tools-bar-general">
                <div class="col-3 text-center"><a href="{{ route('web.search.provider') }}"><i class="la la-search"></i>Proveedores</a></div>
                <div class="col-3 text-center"><a href="{{ route('web.inbox') }}"><i class="la la-envelope"></i>Inbox</a></div>
                <div class="col-3 text-center"><a href="https://community.eggify.net/"><i class="la la-comment"></i>Comunidad</a></div>
                <div class="col-3 text-center"><a href="{{ route('web.user.profile') }}"><i class="la la-user"></i>Mi cuenta</a></div>
            </div>
        @elseif (\App\Models\User::findOrFail(auth()->user()->id)->isProvider())
            <div class="row m-auto" id="tools-bar-provider" style="display: flex">
                @if ($provider_not_visible)
                    <div class="col-12 text-center p-2 mb-1 text-warning">¡Perfil pendiente de validación!</div>
                @endif
                <div class="col-3 text-center"><a href="{{ route('web.provider-dashboard') }}"><i class="la la-check"></i>Organizador</a></div>
                <div class="col-3 text-center"><a href="{{ route('web.provider-showcase') }}"><i class="la la-building"></i>Escaparate</a></div>
                <div class="col-3 text-center"><a href="{{ route('web.inbox') }}"><i class="la la-envelope"></i>Inbox</a></div>
                <div class="col-3 text-center"><a href="{{ route('web.user.profile') }}"><i class="la la-user"></i>Mi cuenta</a></div>
            </div>
        @endif
    </footer>
@else
    <footer id="tools-bar" class="mobile">
        <div class="row m-auto" id="tools-bar-general">
            <div class="col-3 text-center m-auto"><a href="https://community.eggify.net/"><i class="la la-comment"></i>Comunidad</a></div>
        </div>
    </footer>
@endif
<footer class="footer-desktop justify-content-between">
    <div class="footer-columns">
        <button class="btn mr-auto p-0" type="button"><a href="{{ auth()->check() && \App\Models\User::findOrFail(auth()->user()->id)->isProvider() ? route('web.provider-dashboard'): route('web.index') }}"><img src="/assets/img/logo-footer.svg"></a></button>
    </div>
    <div class="footer-columns">
        <h5>Información</h5>
        <p><a href="{{ route('web.about') }}">Sobre Nosotros</a></p>
        <p><a href="{{ route('web.search.provider') }}">Proveedores</a></p>
        @if (auth()->check() && \App\Models\User::findOrFail(auth()->user()->id)->isUser())
            <p><a href="#">Inbox</a></p>
        @endif
        <p><a href="https://community.eggify.net/">Comunidad</a></p>
        @if (!auth()->check())
            <p><a href="{{ route('web.about-provider') }}">¿Eres un proveedor?</a></p>
    @endif
    <!-- <p><a href="">Contacto</a></p> -->
    </div>
    <div class="footer-columns">
        <h5>Políticas de seguridad</h5>
        <p><a href="https://www.eggify.net/terminos-y-condiciones">Condiciones Legales</a></p>
        <p><a href="">Política de Privacidad</a></p>
        <p><a href="https://www.eggify.net/copy-of-terminos-y-condiciones">Política de Cookies</a></p>
    </div>
    <div class="footer-columns">
        <h5>Síguenos en</h5>
        <p><a href="https://www.instagram.com/eggi.fy/?hl=en">Instagram</a></p>
        <p><a href="https://www.linkedin.com/company/eggify/">LinkedIn</a></p>
    </div>
</footer>
