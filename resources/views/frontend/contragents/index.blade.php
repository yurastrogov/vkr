@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @can('contragent_create')
                <div style="margin-bottom: 10px;" class="row">
                    <div class="col-lg-12">
                        <a class="btn btn-success" href="{{ route('frontend.contragents.create') }}">
                            {{ trans('global.add') }}
                        </a>

                    </div>
                </div>
            @endcan
            <div class="card">
                <div class="card-header">
                    {{ trans('global.list') }} контрагентов
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-Contragent">
                            <thead>
                                <tr>
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
                                        Действие
                                    </th>
                                </tr>

                            </thead>
                            <tbody>
                                @foreach($contragents as $key => $contragent)
                                    <tr data-entry-id="{{ $contragent->id }}">
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
                                                <a class="btn btn-xs btn-primary" href="{{ route('frontend.contragents.show', $contragent->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('contragent_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('frontend.contragents.edit', $contragent->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('contragent_delete')
                                                <form action="{{ route('frontend.contragents.destroy', $contragent->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
                    {{ $contragents->links() }}
                </div>


            </div>

        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent

@endsection
