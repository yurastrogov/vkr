@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.shedule.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.shedules.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.shedule.fields.id') }}
                        </th>
                        <td>
                            {{ $shedule->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.shedule.fields.name') }}
                        </th>
                        <td>
                            {{ $shedule->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.shedule.fields.workdays') }}
                        </th>
                        <td>
                            @foreach($shedule->workdays as $key => $workdays)
                                <span class="label label-info">{{ $workdays->day }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.shedule.fields.worktimestart') }}
                        </th>
                        <td>
                            {{ $shedule->worktimestart }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.shedule.fields.worktimeend') }}
                        </th>
                        <td>
                            {{ $shedule->worktimeend }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.shedules.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        {{ trans('global.relatedData') }}
    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#shedule_paramedics" role="tab" data-toggle="tab">
                {{ trans('cruds.paramedic.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="shedule_paramedics">
            @includeIf('admin.shedules.relationships.sheduleParamedics', ['paramedics' => $shedule->sheduleParamedics])
        </div>
    </div>
</div>

@endsection