@extends('web.layout.master')

@section('content')
    <header class="header-small">
        <div class="d-flex position-relative mb-2">
            <a class="link-icon" href="{{ route('web.inbox') }}"><i class="la la-arrow-left mr-2"></i></a>
            <a class="m-auto" href="{{ route('web.index') }}"><img src="/assets/img/logo-color.png"></a>
        </div>
    </header>
    <main>
        <section id="opinions" class="container pt-0">
            <div class="row">
                <div class="col-12">
                    <h5 class="title-action">Mensaje</h5>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-12">
                    <div class="row mb-2 opinion pb-3">
                        <div class="col-3">
                            @if ($message->user_from->isOperator())
                                <img class="rounded-circle" src="{{ $message->user_from->operator != null && $message->user_from->operator->operator_company != null ? $message->user_from->operator->operator_company->getUrlImageAttribute() : '/assets/images/no-product.png' }}"
                                     alt="{{ $message->user_from->operator->operator_company != null ? $message->user_from->operator->operator_company->name : '' }}">
                            @else
                                <img class="rounded-circle" src="{{ $message->user_from->provider != null && $message->user_from->provider->provider_company != null ? $message->user_from->provider->provider_company->getUrlImageAttribute() : '/assets/images/no-product.png' }}"
                                     alt="{{ $message->user_from->provider->provider_company->operator_company != null ? $message->user_from->provider->provider_company->name : '' }}">
                            @endif
                        </div>
                        <div class="col-9 text">
                            <span class="d-block title">{{ $message->user_from->name }}</span>
                            @if ($message->user_from->isOperator())
                                <span class="d-block">{{ $message->user_from->operator != null ? $message->user_from->operator->operator_position->name : '' }}</span>
                                <span class="d-block">{{ $message->user_from->operator != null ? $message->user_from->operator->operator_company->name : '' }}</span>
                            @else
                                <span class="d-block">{{ $message->user_from->provider != null ? $message->user_from->provider->provider_category->name : '' }}</span>
                                <span class="d-block">{{ $message->user_from->provider != null ? $message->user_from->provider->provider_company->name : '' }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <h6 class="card-subtitle my-2 text-muted">


                                <span class="date-from">{{ ucfirst(\Carbon\Carbon::parse($message->created_at)->diffForHumans()) }}</span>

                            </h6>
                            <p>{{ $message->message }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        {!! Form::open(['method' => 'POST', 'route' => ['web.inbox.store', $message->user_from->id], 'id' => 'message-add' ]) !!}
        {!! Form::hidden('user_to_id', $message->user_from->id) !!}
        {!! Form::hidden('budget_id', $message->budget_id) !!}
        <section class="container">
            <div class="row">
                <div class="col-12">
                    <h5 class="title-action">Escribe tu mensaje</h5>
                    <p>0/75</p>
                </div>
            </div>
            <div class="row recommended">
                <div class="col-12">
                    {!! Form::textarea('message', '', ['class' => 'form-control', '', 'id'=> 'message', 'size' => '5x5', 'required']) !!}
                </div>
            </div>
        </section>
        <section class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <button class="btn btn-secondary form-control rounded-pill" type="submit">Responder</button>
                </div>
            </div>
        </section>
        {!! Form::close() !!}
        <div class="modal fade" role="dialog" tabindex="-1" id="modal-done">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header"><a href="/" class="close" aria-label="Close"><span aria-hidden="true">×</span></a></div>
                    <div class="modal-body">
                        <p>Mensaje enviado correctamente.</p>
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
    </main>
@endsection
