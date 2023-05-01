@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @can('paramedic_create')
                <div style="margin-bottom: 10px;" class="row">
                    <div class="col-lg-12">
                        <a class="btn btn-success" href="{{ route('frontend.paramedics.create') }}">
                           Добавить
                        </a>

                    </div>
                </div>
            @endcan
            <div class="card">
                <div class="card-header">
                    Список врачей
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-Paramedic">
                            <thead>
                                <tr>
                                    <th>
                                        {{ trans('cruds.paramedic.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.paramedic.fields.id_user') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.paramedic.fields.surname') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.paramedic.fields.name') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.paramedic.fields.fathername') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.paramedic.fields.speciality') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.paramedic.fields.shedule') }}
                                    </th>
                                    <th>
                                        Действие
                                    </th>
                                </tr>

                            </thead>
                            <tbody>
                                @foreach($paramedics as $key => $paramedic)
                                    <tr data-entry-id="{{ $paramedic->id }}">
                                        <td>
                                            {{ $paramedic->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $paramedic->id_user->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $paramedic->surname ?? '' }}
                                        </td>
                                        <td>
                                            {{ $paramedic->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $paramedic->fathername ?? '' }}
                                        </td>
                                        <td>
                                            {{ $paramedic->speciality->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $paramedic->shedule->name ?? '' }}
                                        </td>
                                        <td>
                                            @can('paramedic_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('frontend.paramedics.show', $paramedic->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('paramedic_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('frontend.paramedics.edit', $paramedic->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('paramedic_delete')
                                                <form action="{{ route('frontend.paramedics.destroy', $paramedic->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
                    {{ $paramedics->links() }}
                </div>

            </div>

        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent

@endsection
