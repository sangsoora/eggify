@extends('admin.layout.master')

@push('plugin-styles')
    <link href="{{ asset('assets/plugins/datatables-net/dataTables.bootstrap4.css') }}" rel="stylesheet"/>
@endpush

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin">@lang('admin.menu.dashboard')</a></li>
            <li class="breadcrumb-item active" aria-current="page">@lang('admin.menu.operator')</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">@lang('admin.page.operator.title')</h6>
                    <p class="card-description">@lang('admin.page.operator.description')</p>

                    <div class="mb-3 float-right">
                        <a href="{{ route('admin.operator.create') }}" class="btn btn-primary btn-icon-text">
                            <i class="btn-icon-prepend" data-feather="plus"></i>
                            @lang('global.general.create')
                        </a>
                    </div>

                    <div class="table-responsive">
                        <table id="dataTable" class="table">
                            <thead>
                            <tr>
                                <th>@lang('admin.page.operator.table.name')</th>
                                <th>@lang('admin.page.operator.table.business')</th>
                                <th>@lang('admin.page.operator.table.orders')</th>
                                <th></th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('plugin-scripts')
    <script src="{{ asset('assets/plugins/datatables-net/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-net-bs4/dataTables.bootstrap4.js') }}"></script>
@endpush

@push('custom-scripts')
    <script src="{{ asset('assets/js/data-table.js') }}"></script>

    <script>
        $(function () {
            $('#dataTable').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                stateSave: true,
                ajax: '{{ route('admin.operator.data') }}',
                order: [],
                oLanguage: {
                    "sProcessing": '@lang('global.general.processing')'
                },
                columns: [
                    {data: 'name'},
                    {data: 'business'},
                    {data: 'orders'},
                    {data: 'action', orderable: false, searchable: false}
                ],
                initComplete: function(settings, json) {
                    feather.replace();
                }
            });
        });
    </script>
@endpush
