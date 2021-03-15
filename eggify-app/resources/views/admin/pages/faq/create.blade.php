@extends('admin.layout.master')

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin">@lang('admin.menu.dashboard')</a></li>
            <li class="breadcrumb-item"><a href="/admin/faqs">@lang('admin.menu.faqs')</a></li>
            <li class="breadcrumb-item active" aria-current="page">@lang('global.general.create')</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-12 stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">{{ sprintf('%s - %s', trans('admin.menu.faqs'), trans('global.general.create')) }}</h6>
                    {!! Form::open(['method' => 'POST', 'route' => ['admin.faqs.store']])!!}
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                {!! Form::label('title', trans('admin.page.faq.name')) !!}
                                {!! Form::input('text', 'title', old('title'), ['id' => 'title', 'class' => 'form-control', 'placeholder' => trans('admin.page.faq.name')]) !!}
                            </div>
                        </div><!-- Col -->
                        <div class="col-sm-6">
                            <div class="form-group">
                                {!! Form::label('description', trans('admin.page.faq.description')) !!}
                                {!! Form::textarea('description', old('description'), ['class' => 'form-control','placeholder' => trans('admin.page.faq.description'), 'id'=> 'description', 'size' => '5x8']) !!}
                            </div>
                        </div><!-- Col -->
                    </div><!-- Row -->
                    <button type="submit" class="btn btn-primary mr-2">@lang('global.general.save')</button>
                    <a href="{{ route('admin.faqs') }}" class="btn btn-light">@lang('global.general.cancel')</a>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
