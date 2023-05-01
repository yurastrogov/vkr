@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.lpu.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.lpus.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.lpu.fields.id') }}
                        </th>
                        <td>
                            {{ $lpu->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.lpu.fields.code') }}
                        </th>
                        <td>
                            {{ $lpu->code }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.lpu.fields.name') }}
                        </th>
                        <td>
                            {{ $lpu->name }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.lpus.index') }}">
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
            <a class="nav-link" href="#insertion_contragents" role="tab" data-toggle="tab">
                {{ trans('cruds.contragent.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="insertion_contragents">
            @includeIf('admin.lpus.relationships.insertionContragents', ['contragents' => $lpu->insertionContragents])
        </div>
    </div>
</div>

@endsection