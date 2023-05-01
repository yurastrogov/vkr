@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @can('medicposition_create')
                <div style="margin-bottom: 10px;" class="row">
                    <div class="col-lg-12">
                        <a class="btn btn-success" href="{{ route('frontend.medicpositions.create') }}">
                            Добавить
                        </a>
                    </div>
                </div>
            @endcan
            <div class="card">
                <div class="card-header">
                    Список должностей
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-Medicposition">
                            <thead>
                                <tr>
                                    <th>
                                        {{ trans('cruds.medicposition.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.medicposition.fields.name') }}
                                    </th>
                                    <th>
                                        Действие
                                    </th>
                                </tr>

                            </thead>
                            <tbody>
                                @foreach($medicpositions as $key => $medicposition)
                                    <tr data-entry-id="{{ $medicposition->id }}">
                                        <td>
                                            {{ $medicposition->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $medicposition->name ?? '' }}
                                        </td>
                                        <td align="right">
                                            @can('medicposition_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('frontend.medicpositions.show', $medicposition->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('medicposition_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('frontend.medicpositions.edit', $medicposition->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('medicposition_delete')
                                                <form action="{{ route('frontend.medicpositions.destroy', $medicposition->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
                    {{ $medicpositions->links() }}
                </div>


            </div>

        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent

@endsection
