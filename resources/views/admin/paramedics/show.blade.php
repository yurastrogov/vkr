@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.paramedic.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.paramedics.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.paramedic.fields.id') }}
                        </th>
                        <td>
                            {{ $paramedic->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.paramedic.fields.id_user') }}
                        </th>
                        <td>
                            {{ $paramedic->id_user->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.paramedic.fields.surname') }}
                        </th>
                        <td>
                            {{ $paramedic->surname }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.paramedic.fields.name') }}
                        </th>
                        <td>
                            {{ $paramedic->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.paramedic.fields.fathername') }}
                        </th>
                        <td>
                            {{ $paramedic->fathername }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.paramedic.fields.speciality') }}
                        </th>
                        <td>
                            {{ $paramedic->speciality->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.paramedic.fields.shedule') }}
                        </th>
                        <td>
                            {{ $paramedic->shedule->name ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.paramedics.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection