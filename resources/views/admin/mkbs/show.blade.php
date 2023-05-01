@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.mkb.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.mkbs.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.mkb.fields.id') }}
                        </th>
                        <td>
                            {{ $mkb->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mkb.fields.code') }}
                        </th>
                        <td>
                            {{ $mkb->code }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mkb.fields.name') }}
                        </th>
                        <td>
                            {{ $mkb->name }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.mkbs.index') }}">
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
            <a class="nav-link" href="#mkb_doctorvisits" role="tab" data-toggle="tab">
                {{ trans('cruds.doctorvisit.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="mkb_doctorvisits">
            @includeIf('admin.mkbs.relationships.mkbDoctorvisits', ['doctorvisits' => $mkb->mkbDoctorvisits])
        </div>
    </div>
</div>

@endsection