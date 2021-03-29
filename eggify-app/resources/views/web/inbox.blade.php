@extends('web.layout.master')

@section('content')
    <header class="header-small mobile">
        <div class="d-flex position-relative">
            <a class="link-icon" href="{{ auth()->check() && \App\Models\User::findOrFail(auth()->user()->id)->isProvider() ? route('web.provider-dashboard'): route('web.index') }}"><i class="la la-arrow-left mr-2"></i></a>
            <a class="m-auto" href="{{ auth()->check() && \App\Models\User::findOrFail(auth()->user()->id)->isProvider() ? route('web.provider-dashboard'): route('web.index') }}"><img src="/assets/img/logo-color.png"></a>
        </div>
        <div class="nav-anchor mt-3">
            <a class="active" href="#">Mensajes</a>
            <a href="#">Notificaciones</a>
        </div>
    </header>
    <header class="d-flex header-opacity justify-content-between" id="header-desktop">
        <div class="p-2">
            <button class="btn mr-auto p-0" type="button"><a href="/"><img src="/assets/img/logo-color.png"></a></button>
        </div>
        <div class="p-2 align-self-center nav-menu-desktop">
          <a href="{{ route('web.about') }}" class="mr-5">Sobre nosotros</a>
          <a href="{{ route('web.search.provider') }}" class="mr-5">Proveedores</a>
          <a href="{{ route('web.inbox') }}" class="mr-5">Inbox</a>
          <a href="https://community.eggify.net/" class="mr-5">Comunidad</a>
        </div>

        <button class="btn btn-nav" type="button" onclick="sidenav.open()"><i class="far fa-user"></i></button>
    </header>
    <main class="main-desktop">
        <section id="results" class="container">
            <div class="row">
                <div class="col-12">
                    @if ($messages->count() == 0)
                        <p>Ups!<br/>No has recibido ningún mensaje todavía</p>
                    @else
                        <div class="card-group">
                            @foreach($messages as $i => $el)
                                <div class="card mb-3">

                                    <a href="{{ route('web.inbox.get', $el->id) }}">

                                        <div class="card-body">


                                            <h4 class="card-title">{{ $el->user_from->name }}</h4>
                                            <h6 class="card-subtitle mb-2 text-muted">


                                                <span class="date-from">{{ ucfirst(\Carbon\Carbon::parse($el->created_at)->diffForHumans()) }}</span>

                                            </h6>

                                            <p class="card-text">{{ sprintf('%s%s', substr($el->message, 0, 90), strlen($el->message) > 90 ? '...' : '')  }}</p>
                                        </div>



                                    </a>

                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </section>
    </main>
@endsection
