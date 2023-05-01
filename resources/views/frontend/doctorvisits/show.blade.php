@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    Просмотр
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group">

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
                                        ФИО
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
                            <a class="btn btn-default" href="{{ route('frontend.registrationvisit.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>

                            <a class="btn btn-info" onclick="window.print();return false;" href="#">
                                Распечатать
                            </a>


                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
