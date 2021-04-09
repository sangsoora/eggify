@extends('web.layout.master')

@section('content')
    <div id="sidepopup" class="sidepopup" style="left: 0; z-index: 4;">
        <div class="d-flex closebtn pb-2">
            <a href="{{ auth()->check() && \App\Models\User::findOrFail(auth()->user()->id)->isProvider() ? route('web.provider-dashboard'): route('web.index') }}" class="btn mr-auto p-0"><img src="/assets/img/logo-color.png"></a>
            <a href="{{ auth()->check() && \App\Models\User::findOrFail(auth()->user()->id)->isProvider() ? route('web.provider-dashboard'): route('web.index') }}" class="btn p-0"><i class="fa fa-close mr-2"></i></a>
        </div>
        <h5 class="title-action mb-2 pl-4">¿Qué buscas?</h5>
        <div class="link-list">
            @foreach($categories as $i => $el)
                <a href="{{ route('web.result', [ 'category' => $el->id ]) }}"><img class="category-icon" src="{{ $el->getUrlImageAttribute() }}" ><span>{{ $el->name }}</span></a>
                <span class="separator"></span>
            @endforeach
        </div>
    </div>
@endsection
