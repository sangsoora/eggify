@extends('admin.layout.master')

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin">@lang('admin.menu.dashboard')</a></li>
            <li class="breadcrumb-item"><a href="/admin/operator">@lang('admin.menu.operator')</a></li>
            <li class="breadcrumb-item active" aria-current="page">@lang('global.general.edit')</li>
        </ol>
    </nav>

    {!! Form::open(['method' => 'PUT','route' => ['admin.operator.update', $operator->id]])!!}
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">{{ sprintf('%s - %s', trans('admin.menu.operator'), trans('global.general.edit')) }}</h6>
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="form-group">
                                {!! Form::label('name', trans('admin.page.operator.table.name')) !!}
                                {!! Form::input('text', 'name', $user->name, ['id' => 'name', 'class' => 'form-control', 'placeholder' => trans('admin.page.operator.table.name'), 'required']) !!}
                            </div>
                        </div><!-- Col -->
                        <div class="col-sm-3">
                            <div class="form-group">
                                {!! Form::label('surname', trans('admin.page.operator.table.surname')) !!}
                                {!! Form::input('text', 'surname', $operator->surname, ['id' => 'surname', 'class' => 'form-control', 'placeholder' => trans('admin.page.operator.table.surname'), 'required']) !!}
                            </div>
                        </div><!-- Col -->
                        <div class="col-sm-3">
                            <div class="form-group">
                                {!! Form::label('email', trans('admin.page.operator.table.email')) !!}
                                {!! Form::input('text', 'email', $user->email, ['id' => 'email', 'class' => 'form-control', 'placeholder' => trans('admin.page.operator.table.email'), 'required']) !!}
                            </div>
                        </div><!-- Col -->
                        <div class="col-sm-3">
                            <div class="form-group">
                                {!! Form::label('password', trans('admin.page.operator.table.password')) !!}
                                {!! Form::input('password', 'password', old('password'), ['id' => 'password', 'class' => 'form-control', 'placeholder' => trans('admin.page.operator.table.password'), 'required']) !!}
                            </div>
                        </div><!-- Col -->
                    </div><!-- Row -->
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                {!! Form::label('address', trans('admin.page.operator.table.address')) !!}
                                {!! Form::input('text', 'address', $operator->address, ['id' => 'address', 'class' => 'form-control', 'placeholder' => trans('admin.page.operator.table.address'), 'required']) !!}
                            </div>
                        </div><!-- Col -->
                        <div class="col-sm-6">
                            <div class="form-group">
                                {!! Form::label('phone', trans('admin.page.operator.table.phone')) !!}
                                {!! Form::input('phone', 'phone', $operator->phone, ['id' => 'phone', 'class' => 'form-control', 'placeholder' => trans('admin.page.operator.table.phone')]) !!}
                            </div>
                        </div><!-- Col -->
                    </div><!-- Row -->
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                {!! Form::label('operator_job_id', trans('admin.page.operator.table.operator_job')) !!}
                                {!! Form::select('operator_job_id', $operatorjob->pluck('name', 'id'), $operator->operator_job_id, ['class' => 'form-control', 'id' => 'operator_job_id']) !!}
                            </div>
                        </div><!-- Col -->
                        <div class="col-sm-4">
                            <div class="form-group">
                                {!! Form::label('operator_job_tag_id', trans('admin.page.operator.table.operator_job_tag')) !!}
                                {!! Form::select('operator_job_tag_id', $operatorjobtag->pluck('name', 'id'), $operator->operator_job_tag_id, ['class' => 'form-control', 'id' => 'operator_job_tag_id']) !!}
                            </div>
                        </div><!-- Col -->
                        <div class="col-sm-4">
                            <div class="form-group">
                                {!! Form::label('operator_employees_id', trans('admin.page.operator.table.operator_employees')) !!}
                                {!! Form::select('operator_employees_id', $operatoremployees->pluck('name', 'id'), $operator->operator_employees_id, ['class' => 'form-control', 'id' => 'operator_employees_id']) !!}
                            </div>
                        </div><!-- Col -->
                    </div><!-- Row -->
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">@lang('admin.page.operator.section.company.title')</h6>
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="form-group">
                                {!! Form::label('companyname', trans('admin.page.operator.section.company.name')) !!}
                                {!! Form::input('text', 'companyname', $operator->operator_company->name, ['id' => 'companyname', 'class' => 'form-control', 'placeholder' => trans('admin.page.operator.section.company.name'), 'required']) !!}
                            </div>
                        </div><!-- Col -->
                        <div class="col-sm-3">
                            <div class="form-group">
                                {!! Form::label('companyweb', trans('admin.page.operator.section.company.web')) !!}
                                {!! Form::input('text', 'companyweb', $operator->operator_company->web, ['id' => 'companyweb', 'class' => 'form-control', 'placeholder' => trans('admin.page.operator.section.company.web'), 'required']) !!}
                            </div>
                        </div><!-- Col -->
                        <div class="col-sm-3">
                            <div class="form-group">
                                {!! Form::label('companyyears', trans('admin.page.operator.section.company.years')) !!}
                                {!! Form::input('number', 'companyyears', $operator->operator_company->years, ['id' => 'companyyears', 'class' => 'form-control', 'placeholder' => trans('admin.page.operator.section.company.years'), 'required']) !!}
                            </div>
                        </div><!-- Col -->
                        <div class="col-sm-3">
                            <div class="form-group">
                                {!! Form::label('companylinkedin', trans('admin.page.operator.section.company.linkedin')) !!}
                                {!! Form::input('text', 'companylinkedin', $operator->operator_company->linkedin, ['id' => 'companylinkedin', 'class' => 'form-control', 'placeholder' => trans('admin.page.operator.section.company.linkedin'), 'required']) !!}
                            </div>
                        </div><!-- Col -->
                    </div><!-- Row -->
                    <button type="submit" class="btn btn-primary mr-2">@lang('global.general.update')</button>
                    <a href="{{ route('admin.operator') }}" class="btn btn-light">@lang('global.general.cancel')</a>
                </div>
            </div>
        </div>
    </div>
    {!! Form::close() !!}
@endsection
