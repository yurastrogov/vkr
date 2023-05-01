@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    Просмотр контрагента
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group">

                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.contragent.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $contragent->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.contragent.fields.surname') }}
                                    </th>
                                    <td>
                                        {{ $contragent->surname }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.contragent.fields.name') }}
                                    </th>
                                    <td>
                                        {{ $contragent->name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.contragent.fields.fathername') }}
                                    </th>
                                    <td>
                                        {{ $contragent->fathername }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.contragent.fields.berthday') }}
                                    </th>
                                    <td>
                                        {{ $contragent->berthday }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.contragent.fields.gender') }}
                                    </th>
                                    <td>
                                        {{ App\Models\Contragent::GENDER_RADIO[$contragent->gender] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.contragent.fields.address') }}
                                    </th>
                                    <td>
                                        {{ $contragent->address }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.contragent.fields.telephone') }}
                                    </th>
                                    <td>
                                        {{ $contragent->telephone }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.contragent.fields.snils') }}
                                    </th>
                                    <td>
                                        {{ $contragent->snils }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.contragent.fields.insurance') }}
                                    </th>
                                    <td>
                                        {{ $contragent->insurance->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.contragent.fields.polis') }}
                                    </th>
                                    <td>
                                        {{ $contragent->polis }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.contragent.fields.insertion') }}
                                    </th>
                                    <td>
                                        {{ $contragent->insertion->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.contragent.fields.spasport') }}
                                    </th>
                                    <td>
                                        {{ $contragent->spasport }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.contragent.fields.npasport') }}
                                    </th>
                                    <td>
                                        {{ $contragent->npasport }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.contragent.fields.pasportvudan') }}
                                    </th>
                                    <td>
                                        {{ $contragent->pasportvudan }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.contragent.fields.datepasport') }}
                                    </th>
                                    <td>
                                        {{ $contragent->datepasport }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.contragent.fields.codepasport') }}
                                    </th>
                                    <td>
                                        {{ $contragent->codepasport }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.contragents.index') }}">
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
