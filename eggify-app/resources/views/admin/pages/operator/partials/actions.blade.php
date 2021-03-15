<button type="button" onclick="window.location='{{ route('admin.operator.edit', $id) }}'" class="btn btn-primary btn-icon" data-toggle="tooltip" data-placement="top" title="@lang('global.general.edit')">
    <i data-feather="edit"></i>
</button>

{!! Form::open(['route' => ['admin.operator.destroy', $id], 'method' => 'DELETE', 'class' => 'd-inline']) !!}
<button type="submit" class="btn btn-danger btn-icon btn-delete" data-toggle="tooltip" data-placement="top" title="@lang('global.general.delete')">
    <i data-feather="trash"></i>
</button>
{!! Form::close() !!}
