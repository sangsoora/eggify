@extends('admin.layout.master')

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin">@lang('admin.menu.dashboard')</a></li>
            <li class="breadcrumb-item"><a href="/admin/category">@lang('admin.menu.category')</a></li>
            <li class="breadcrumb-item active" aria-current="page">@lang('global.general.edit')</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-12 stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">{{ sprintf('%s - %s', trans('admin.menu.category'), trans('global.general.edit')) }}</h6>
                    {!! Form::open(['method' => 'PUT','route' => ['admin.category.update', $category->id]])!!}
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                {!! Form::label('name', trans('admin.page.category.name')) !!}
                                {!! Form::input('text', 'name', $category->name, ['id' => 'name', 'class' => 'form-control', 'placeholder' => trans('admin.page.category.name')]) !!}
                            </div>
                        </div><!-- Col -->
                        <div class="col-sm-6">
                            <div class="form-group">
                                {!! Form::label('subcategory', trans('admin.page.category.table.subcategory')) !!}
                                {!! Form::select('subcategory[]', $subcategory->pluck('name', 'id'), $category->provider_subcategory->pluck('id'), ['class' => 'form-control', 'id' => 'subcategory', 'multiple']) !!}
                            </div>
                        </div><!-- Col -->
                    </div><!-- Row -->
                    <button type="submit" class="btn btn-primary mr-2">@lang('global.general.update')</button>
                    <a href="{{ route('admin.category') }}" class="btn btn-light">@lang('global.general.cancel')</a>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
