@extends('admin.layout.master')

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin">@lang('admin.menu.dashboard')</a></li>
            <li class="breadcrumb-item"><a href="/admin/order">@lang('admin.menu.order')</a></li>
        </ol>
    </nav>
    <div class="row chat-wrapper">
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <h6 class="card-title mb-0">{{ sprintf('%s %s - %s', trans('admin.menu.order'), $budget->id, trans('global.general.see')) }}</h6>
                    </div>
                    <div class="mt-3">
                        <label class="tx-11 font-weight-bold mb-0 text-uppercase">@lang('admin.page.order.table.date'):</label>
                        <p class="text-muted">{{ $budget->data }}</p>
                    </div>
                    <div class="mt-3">
                        <label class="tx-11 font-weight-bold mb-0 text-uppercase">@lang('admin.page.order.table.time'):</label>
                        <p class="text-muted">{{ $budget->time }}</p>
                    </div>
                    <div class="mt-3">
                        <label class="tx-11 font-weight-bold mb-0 text-uppercase">@lang('admin.page.order.table.status'):</label>
                        <p class="text-muted">{{ $budget->budget_status->name }}</p>
                    </div>
                    <div class="mt-3">
                        <a href="{{ route('admin.order') }}" class="btn btn-light">@lang('global.general.return')</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-9 chat-content">
            <div class="card">
                <div class="card-body">
                    <div class="chat-body">
                        <ul class="messages">
                            @foreach($budget->messages as $i => $el)
                                <li class="message-item {{ $i % 2 == 0 ? 'friend' : 'me' }}">
                                    <img src="{{ url('https://via.placeholder.com/37x37') }}" class="img-xs rounded-circle" alt="avatar">
                                    <div class="content">
                                        <div class="message">
                                            <div class="bubble">
                                                <p>{{ $el->message }}</p>
                                            </div>
                                            <span>{{ sprintf('%s / %s', ($el->user_from->isOperator() ? $el->user_from->operator->name : $el->user_from->provider->name), ucfirst(\Carbon\Carbon::parse($el->created_at)->toDateTimeString())) }}</span>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('custom-scripts')
    <script src="{{ asset('assets/js/chat.js') }}"></script>
@endpush
