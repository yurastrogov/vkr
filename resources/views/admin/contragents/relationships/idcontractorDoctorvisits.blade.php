@can('doctorvisit_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.doctorvisits.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.doctorvisit.title_singular') }}
            </a>
        </div>
    </div>
@endcan

<div class="card">
    <div class="card-header">
        {{ trans('cruds.doctorvisit.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-idcontractorDoctorvisits">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.doctorvisit.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.doctorvisit.fields.idcontractor') }}
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
                            {{ trans('cruds.doctorvisit.fields.mkb') }}
                        </th>
                        <th>
                            {{ trans('cruds.mkb.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.doctorvisit.fields.datetimepriem') }}
                        </th>
                        <th>
                            {{ trans('cruds.doctorvisit.fields.rezultatvisit') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($doctorvisits as $key => $doctorvisit)
                        <tr data-entry-id="{{ $doctorvisit->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $doctorvisit->id ?? '' }}
                            </td>
                            <td>
                                {{ $doctorvisit->idcontractor->surname ?? '' }}
                            </td>
                            <td>
                                {{ $doctorvisit->idcontractor->name ?? '' }}
                            </td>
                            <td>
                                {{ $doctorvisit->idcontractor->fathername ?? '' }}
                            </td>
                            <td>
                                {{ $doctorvisit->idcontractor->berthday ?? '' }}
                            </td>
                            <td>
                                @if($doctorvisit->idcontractor)
                                    {{ $doctorvisit->idcontractor::GENDER_RADIO[$doctorvisit->idcontractor->gender] ?? '' }}
                                @endif
                            </td>
                            <td>
                                {{ $doctorvisit->mkb->code ?? '' }}
                            </td>
                            <td>
                                {{ $doctorvisit->mkb->name ?? '' }}
                            </td>
                            <td>
                                {{ $doctorvisit->datetimepriem ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\Doctorvisit::REZULTATVISIT_SELECT[$doctorvisit->rezultatvisit] ?? '' }}
                            </td>
                            <td>
                                @can('doctorvisit_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.doctorvisits.show', $doctorvisit->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('doctorvisit_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.doctorvisits.edit', $doctorvisit->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('doctorvisit_delete')
                                    <form action="{{ route('admin.doctorvisits.destroy', $doctorvisit->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('doctorvisit_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.doctorvisits.massDestroy') }}",
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
  let table = $('.datatable-idcontractorDoctorvisits:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection