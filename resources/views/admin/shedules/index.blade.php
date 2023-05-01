@extends('layouts.admin')
@section('content')
@can('shedule_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.shedules.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.shedule.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.shedule.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Shedule">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.shedule.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.shedule.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.shedule.fields.workdays') }}
                        </th>
                        <th>
                            {{ trans('cruds.shedule.fields.worktimestart') }}
                        </th>
                        <th>
                            {{ trans('cruds.shedule.fields.worktimeend') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                    <tr>
                        <td>
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <select class="search">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach($workdays as $key => $item)
                                    <option value="{{ $item->day }}">{{ $item->day }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                        </td>
                        <td>
                        </td>
                        <td>
                        </td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($shedules as $key => $shedule)
                        <tr data-entry-id="{{ $shedule->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $shedule->id ?? '' }}
                            </td>
                            <td>
                                {{ $shedule->name ?? '' }}
                            </td>
                            <td>
                                @foreach($shedule->workdays as $key => $item)
                                    <span class="badge badge-info">{{ $item->day }}</span>
                                @endforeach
                            </td>
                            <td>
                                {{ $shedule->worktimestart ?? '' }}
                            </td>
                            <td>
                                {{ $shedule->worktimeend ?? '' }}
                            </td>
                            <td>
                                @can('shedule_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.shedules.show', $shedule->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('shedule_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.shedules.edit', $shedule->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('shedule_delete')
                                    <form action="{{ route('admin.shedules.destroy', $shedule->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('shedule_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.shedules.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 25,
  });
  let table = $('.datatable-Shedule:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
let visibleColumnsIndexes = null;
$('.datatable thead').on('input', '.search', function () {
      let strict = $(this).attr('strict') || false
      let value = strict && this.value ? "^" + this.value + "$" : this.value

      let index = $(this).parent().index()
      if (visibleColumnsIndexes !== null) {
        index = visibleColumnsIndexes[index]
      }

      table
        .column(index)
        .search(value, strict)
        .draw()
  });
table.on('column-visibility.dt', function(e, settings, column, state) {
      visibleColumnsIndexes = []
      table.columns(":visible").every(function(colIdx) {
          visibleColumnsIndexes.push(colIdx);
      });
  })
})

</script>
@endsection