<button type="button" onclick="window.location='{{ route('admin.subcategory.edit', $id) }}'" class="btn btn-primary btn-icon" data-toggle="tooltip" data-placement="top" title="@lang('global.general.edit')">
    <i data-feather="edit"></i>
</button>

{!! Form::open(['route' => ['admin.subcategory.destroy', $id], 'method' => 'DELETE', 'class' => 'd-inline']) !!}
<button type="submit" class="btn btn-danger btn-icon btn-delete" data-toggle="tooltip" data-placement="top" title="@lang('global.general.delete')">
    <i data-feather="trash"></i>
</button>
{!! Form::close() !!}
