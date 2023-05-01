@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @can('mkb_create')
                <div style="margin-bottom: 10px;" class="row">
                    <div class="col-lg-12">
                        <a class="btn btn-success" href="{{ route('frontend.mkbs.create') }}">
                            {{ trans('global.add') }}
                        </a>

                    </div>
                </div>
            @endcan
            <div class="card">
                <div class="card-header">
                    Международный классификатор болезней
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-Mkb">
                            <thead>
                                <tr>
                                    <th>
                                        {{ trans('cruds.mkb.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.mkb.fields.code') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.mkb.fields.name') }}
                                    </th>
                                    <th>
                                        Действие
                                    </th>
                                </tr>

                            </thead>
                            <tbody>
                                @foreach($mkbs as $key => $mkb)
                                    <tr data-entry-id="{{ $mkb->id }}">
                                        <td>
                                            {{ $mkb->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $mkb->code ?? '' }}
                                        </td>
                                        <td>
                                            {{ $mkb->name ?? '' }}
                                        </td>
                                        <td>
                                            @can('mkb_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('frontend.mkbs.show', $mkb->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('mkb_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('frontend.mkbs.edit', $mkb->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('mkb_delete')
                                                <form action="{{ route('frontend.mkbs.destroy', $mkb->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
                    {{ $mkbs->links() }}
                </div>


            </div>
        </div>
    </div>

</div>
@endsection
@section('scripts')
@parent

@endsection
