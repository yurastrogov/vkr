@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @can('insurance_create')
                <div style="margin-bottom: 10px;" class="row">
                    <div class="col-lg-12">
                        <a class="btn btn-success" href="{{ route('frontend.insurances.create') }}">
                            {{ trans('global.add') }}
                        </a>

                    </div>
                </div>
            @endcan
            <div class="card">
                <div class="card-header">
                    {{ trans('global.list') }} страховых компаний
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-Insurance">
                            <thead>
                                <tr>
                                    <th>
                                        {{ trans('cruds.insurance.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.insurance.fields.code') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.insurance.fields.name') }}
                                    </th>
                                    <th>
                                        Действие
                                    </th>
                                </tr>

                            </thead>
                            <tbody>
                                @foreach($insurances as $key => $insurance)
                                    <tr data-entry-id="{{ $insurance->id }}">
                                        <td>
                                            {{ $insurance->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $insurance->code ?? '' }}
                                        </td>
                                        <td>
                                            {{ $insurance->name ?? '' }}
                                        </td>
                                        <td>
                                            @can('insurance_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('frontend.insurances.show', $insurance->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('insurance_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('frontend.insurances.edit', $insurance->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('insurance_delete')
                                                <form action="{{ route('frontend.insurances.destroy', $insurance->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
                    {{ $insurances->links() }}
                </div>

            </div>

        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent

@endsection
