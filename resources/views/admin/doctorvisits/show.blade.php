@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.doctorvisit.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.doctorvisits.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.doctorvisit.fields.id') }}
                        </th>
                        <td>
                            {{ $doctorvisit->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.doctorvisit.fields.idcontractor') }}
                        </th>
                        <td>
                            {{ $doctorvisit->idcontractor->surname ?? '' }} {{ $doctorvisit->idcontractor->name ?? '' }} {{ $doctorvisit->idcontractor->fathername ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.doctorvisit.fields.complaint') }}
                        </th>
                        <td>
                            {!! $doctorvisit->complaint !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.doctorvisit.fields.objectivestat') }}
                        </th>
                        <td>
                            {!! $doctorvisit->objectivestat !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.doctorvisit.fields.treatment') }}
                        </th>
                        <td>
                            {!! $doctorvisit->treatment !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.doctorvisit.fields.mkb') }}
                        </th>
                        <td>
                            {{ $doctorvisit->mkb->code ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.doctorvisit.fields.datetimepriem') }}
                        </th>
                        <td>
                            {{ $doctorvisit->datetimepriem }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.doctorvisit.fields.visitpurpose') }}
                        </th>
                        <td>
                            {{ App\Models\Doctorvisit::VISITPURPOSE_SELECT[$doctorvisit->visitpurpose] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.doctorvisit.fields.rezultatvisit') }}
                        </th>
                        <td>
                            {{ App\Models\Doctorvisit::REZULTATVISIT_SELECT[$doctorvisit->rezultatvisit] ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.doctorvisits.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection
