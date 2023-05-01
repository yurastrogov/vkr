@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @can('doctorvisit_create')
                <div style="margin-bottom: 10px;" class="row">
                    <div class="col-lg-12">
                         <a class="btn btn-success" href="{{ route('frontend.registrationvisit.create') }}">
                            Записать пациента
                        </a>

                    </div>
                </div>
            @endcan
            <div class="card">
                <div class="card-header">
                      Запись на приём к врачу
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-Doctorvisit">
                            <thead>
                                <tr>
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
                                        Действие
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($doctorvisits as $key => $doctorvisit)
                                    <tr data-entry-id="{{ $doctorvisit->id }}">
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
                                                <a class="btn btn-xs btn-primary" href="{{ route('frontend.doctorvisits.show', $doctorvisit->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('doctorvisit_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('frontend.doctorvisits.edit', $doctorvisit->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('doctorvisit_delete')
                                                <form action="{{ route('frontend.doctorvisits.destroy', $doctorvisit->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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

                <div class="d-flex justify-content-center">
                    {{ $doctorvisits->links() }}
                </div>


            </div>

        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('doctorvisit_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('frontend.doctorvisits.massDestroy') }}",
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
  let table = $('.datatable-Doctorvisit:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });

})

</script>
@endsection
