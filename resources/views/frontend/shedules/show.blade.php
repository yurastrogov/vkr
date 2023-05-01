@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    Просмотр графика
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.shedules.index') }}">
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
                            <a class="btn btn-default" href="{{ route('frontend.shedules.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
