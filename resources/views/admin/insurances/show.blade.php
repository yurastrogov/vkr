@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.insurance.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.insurances.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.insurance.fields.id') }}
                        </th>
                        <td>
                            {{ $insurance->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.insurance.fields.code') }}
                        </th>
                        <td>
                            {{ $insurance->code }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.insurance.fields.name') }}
                        </th>
                        <td>
                            {{ $insurance->name }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.insurances.index') }}">
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
            <a class="nav-link" href="#insurance_contragents" role="tab" data-toggle="tab">
                {{ trans('cruds.contragent.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="insurance_contragents">
            @includeIf('admin.insurances.relationships.insuranceContragents', ['contragents' => $insurance->insuranceContragents])
        </div>
    </div>
</div>

@endsection