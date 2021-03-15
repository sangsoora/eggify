@extends('admin.layout.master')

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin">@lang('admin.menu.dashboard')</a></li>
            <li class="breadcrumb-item"><a href="/admin/subcategory">@lang('admin.menu.subcategory')</a></li>
            <li class="breadcrumb-item active" aria-current="page">@lang('global.general.edit')</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-12 stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">{{ sprintf('%s - %s', trans('admin.menu.subcategory'), trans('global.general.edit')) }}</h6>
                    {!! Form::open(['method' => 'PUT','route' => ['admin.subcategory.update', $subcategory->id]])!!}
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                {!! Form::label('name', trans('admin.page.subcategory.name')) !!}
                                {!! Form::input('text', 'name', $subcategory->name, ['id' => 'name', 'class' => 'form-control', 'placeholder' => trans('admin.page.subcategory.name')]) !!}
                            </div>
                        </div><!-- Col -->
                    </div><!-- Row -->
                    <button type="submit" class="btn btn-primary mr-2">@lang('global.general.update')</button>
                    <a href="{{ route('admin.subcategory') }}" class="btn btn-light">@lang('global.general.cancel')</a>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
