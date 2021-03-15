@if (auth()->check() && \App\Models\User::findOrFail(auth()->user()->id)->isUser())
    <footer id="tools-bar">
        @if (\App\Models\User::findOrFail(auth()->user()->id)->isOperator())
            <div class="row m-auto" id="tools-bar-general">
                <div class="col-3 text-center"><a href="{{ route('web.search.provider') }}"><i class="la la-search"></i>Proveedores</a></div>
                <div class="col-3 text-center"><a href="{{ route('web.inbox') }}"><i class="la la-envelope"></i>Inbox</a></div>
                <div class="col-3 text-center"><a href="https://community.eggify.net/"><i class="la la-comment"></i>Comunidad</a></div>
                <div class="col-3 text-center"><a href="{{ route('web.user.profile') }}"><i class="la la-user"></i>Mi cuenta</a></div>
            </div>
        @elseif (\App\Models\User::findOrFail(auth()->user()->id)->isProvider())
            <div class="row m-auto" id="tools-bar-provider" style="display: flex">
                <div class="col-3 text-center"><a href="{{ route('web.provider-dashboard') }}"><i class="la la-check"></i>Organizador</a></div>
                <div class="col-3 text-center"><a href="{{ route('web.provider-showcase') }}"><i class="la la-building"></i>Escaparate</a></div>
                <div class="col-3 text-center"><a href="{{ route('web.inbox') }}"><i class="la la-envelope"></i>Inbox</a></div>
                <div class="col-3 text-center"><a href="{{ route('web.user.profile') }}"><i class="la la-user"></i>Mi cuenta</a></div>
            </div>
        @endif
    </footer>
@else
    <footer id="tools-bar">
        <div class="row m-auto" id="tools-bar-general">
            <div class="col-3 text-center m-auto"><a href="https://community.eggify.net/"><i class="la la-comment"></i>Comunidad</a></div>
        </div>
    </footer>
@endif
