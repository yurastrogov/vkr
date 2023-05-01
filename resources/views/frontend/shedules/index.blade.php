@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @can('shedule_create')
                <div style="margin-bottom: 10px;" class="row">
                    <div class="col-lg-12">
                        <a class="btn btn-success" href="{{ route('frontend.shedules.create') }}">
                            {{ trans('global.add') }}
                        </a>
                    </div>
                </div>
            @endcan
            <div class="card">
                <div class="card-header">
                    Список графиков работы
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-Shedule">
                            <thead>
                                <tr>
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
                                        Действие
                                    </th>
                                </tr>

                            </thead>
                            <tbody>
                                @foreach($shedules as $key => $shedule)
                                    <tr data-entry-id="{{ $shedule->id }}">
                                        <td>
                                            {{ $shedule->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $shedule->name ?? '' }}
                                        </td>
                                        <td>
                                            @foreach($shedule->workdays as $key => $item)
                                                <span>{{ $item->day }}</span>
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
                                                <a class="btn btn-xs btn-primary" href="{{ route('frontend.shedules.show', $shedule->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('shedule_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('frontend.shedules.edit', $shedule->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('shedule_delete')
                                                <form action="{{ route('frontend.shedules.destroy', $shedule->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
                    {{ $shedules->links() }}
                </div>


            </div>

        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent

@endsection
