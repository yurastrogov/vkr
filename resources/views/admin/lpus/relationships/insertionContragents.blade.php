@can('contragent_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.contragents.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.contragent.title_singular') }}
            </a>
        </div>
    </div>
@endcan

<div class="card">
    <div class="card-header">
        {{ trans('cruds.contragent.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-insertionContragents">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.contragent.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.contragent.fields.surname') }}
                        </th>
                        <th>
                            {{ trans('cruds.contragent.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.contragent.fields.fathername') }}
                        </th>
                        <th>
                            {{ trans('cruds.contragent.fields.berthday') }}
                        </th>
                        <th>
                            {{ trans('cruds.contragent.fields.gender') }}
                        </th>
                        <th>
                            {{ trans('cruds.contragent.fields.snils') }}
                        </th>
                        <th>
                            {{ trans('cruds.contragent.fields.polis') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($contragents as $key => $contragent)
                        <tr data-entry-id="{{ $contragent->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $contragent->id ?? '' }}
                            </td>
                            <td>
                                {{ $contragent->surname ?? '' }}
                            </td>
                            <td>
                                {{ $contragent->name ?? '' }}
                            </td>
                            <td>
                                {{ $contragent->fathername ?? '' }}
                            </td>
                            <td>
                                {{ $contragent->berthday ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\Contragent::GENDER_RADIO[$contragent->gender] ?? '' }}
                            </td>
                            <td>
                                {{ $contragent->snils ?? '' }}
                            </td>
                            <td>
                                {{ $contragent->polis ?? '' }}
                            </td>
                            <td>
                                @can('contragent_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.contragents.show', $contragent->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('contragent_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.contragents.edit', $contragent->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('contragent_delete')
                                    <form action="{{ route('admin.contragents.destroy', $contragent->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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

@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('contragent_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.contragents.massDestroy') }}",
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
  let table = $('.datatable-insertionContragents:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection