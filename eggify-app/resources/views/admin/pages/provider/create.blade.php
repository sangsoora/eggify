@extends('admin.layout.master')

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin">@lang('admin.menu.dashboard')</a></li>
            <li class="breadcrumb-item"><a href="/admin/provider">@lang('admin.menu.provider')</a></li>
            <li class="breadcrumb-item active" aria-current="page">@lang('global.general.create')</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-12 stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">{{ sprintf('%s - %s', trans('admin.menu.provider'), trans('global.general.create')) }}</h6>
                    {!! Form::open(['method' => 'POST', 'route' => ['admin.provider.store']])!!}
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="form-group">
                                {!! Form::label('name', trans('admin.page.provider.table.name')) !!}
                                {!! Form::input('text', 'name', old('name'), ['id' => 'name', 'class' => 'form-control', 'placeholder' => trans('admin.page.provider.table.name'), 'required']) !!}
                            </div>
                        </div><!-- Col -->
                        <div class="col-sm-3">
                            <div class="form-group">
                                {!! Form::label('phone', trans('admin.page.provider.table.phone')) !!}
                                {!! Form::input('phone', 'phone', old('phone'), ['id' => 'phone', 'class' => 'form-control', 'placeholder' => trans('admin.page.provider.table.phone')]) !!}
                            </div>
                        </div><!-- Col -->
                        <div class="col-sm-3">
                            <div class="form-group">
                                {!! Form::label('email', trans('admin.page.provider.table.email')) !!}
                                {!! Form::input('text', 'email', old('email'), ['id' => 'email', 'class' => 'form-control', 'placeholder' => trans('admin.page.users-admin.table.email'), 'required']) !!}
                            </div>
                        </div><!-- Col -->
                        <div class="col-sm-3">
                            <div class="form-group">
                                {!! Form::label('password', trans('admin.page.provider.table.password')) !!}
                                {!! Form::input('password', 'password', old('password'), ['id' => 'password', 'class' => 'form-control', 'placeholder' => trans('admin.page.users-admin.table.password'), 'required']) !!}
                            </div>
                        </div><!-- Col -->
                    </div><!-- Row -->
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                {!! Form::label('address', trans('admin.page.provider.table.address')) !!}
                                {!! Form::input('text', 'address', old('address'), ['id' => 'address', 'class' => 'form-control', 'placeholder' => trans('admin.page.provider.table.address'), 'required']) !!}
                            </div>
                        </div><!-- Col -->
                        <div class="col-sm-3">
                            <div class="form-group">
                                {!! Form::label('provider_category_id', trans('admin.page.provider.table.provider_category')) !!}
                                {!! Form::select('provider_category_id', $providercategory->pluck('name', 'id'), old('provider_category_id'), ['class' => 'form-control', 'id' => 'provider_category_id']) !!}
                            </div>
                        </div><!-- Col -->
                        <div class="col-sm-3">
                            <div class="form-group">
                                {!! Form::label('provider_subcategory_id', trans('admin.page.provider.table.provider_subcategory')) !!}
                                {!! Form::select('provider_subcategory_id', $providersubcategory->pluck('name', 'id'), old('provider_subcategory_id'), ['class' => 'form-control', 'id' => 'provider_subcategory_id']) !!}
                            </div>
                        </div><!-- Col -->
                    </div><!-- Row -->
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                {!! Form::label('about', trans('admin.page.provider.table.about')) !!}
                                {!! Form::textarea('about', old('about'), ['class' => 'form-control', '', 'id'=> 'about', 'size' => '5x5']) !!}
                            </div>
                        </div><!-- Col -->
                        <div class="col-sm-4">
                            <div class="form-group">
                                {!! Form::label('description', trans('admin.page.provider.table.description')) !!}
                                {!! Form::textarea('description', old('description'), ['class' => 'form-control', '', 'id'=> 'description', 'size' => '5x5']) !!}
                            </div>
                        </div><!-- Col -->
                        <div class="col-sm-4">
                            <div class="form-group">
                                {!! Form::label('usp', trans('admin.page.provider.table.usp')) !!}
                                {!! Form::textarea('usp', old('usp'), ['class' => 'form-control', '', 'id'=> 'usp', 'size' => '5x5']) !!}
                            </div>
                        </div><!-- Col -->
                    </div><!-- Row -->
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                {!! Form::label('municipality', trans('admin.page.provider.table.municipality')) !!}
                                {!! Form::input('text', 'municipality', old('municipality'), ['id' => 'municipality', 'class' => 'form-control', 'placeholder' => trans('admin.page.provider.table.municipality')]) !!}
                            </div>
                        </div><!-- Col -->
                        <div class="col-sm-4">
                            <div class="form-group">
                                {!! Form::label('location', trans('admin.page.provider.table.location')) !!}
                                {!! Form::input('text', 'location', old('location'), ['id' => 'location', 'class' => 'form-control', 'placeholder' => trans('admin.page.provider.table.location')]) !!}
                            </div>
                        </div><!-- Col -->
                        <div class="col-sm-4">
                            <div class="form-group">
                                {!! Form::label('starting', trans('admin.page.provider.table.starting')) !!}
                                {!! Form::input('date', 'starting', old('starting'), ['id' => 'starting', 'class' => 'form-control', 'placeholder' => trans('admin.page.provider.table.starting')]) !!}
                            </div>
                        </div><!-- Col -->
                    </div><!-- Row -->
                    <button type="submit" class="btn btn-primary mr-2">@lang('global.general.save')</button>
                    <a href="{{ route('admin.provider') }}" class="btn btn-light">@lang('global.general.cancel')</a>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection

@push('custom-scripts')
    <script
        src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_API_KEY') }}&libraries=places&language={{ app()->getLocale() }}">
    </script>

    <script type="text/javascript">
        const input = document.getElementById("address");
        const autocomplete = new google.maps.places.Autocomplete(input);
    </script>
@endpush
