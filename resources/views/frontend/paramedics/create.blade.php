@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    Добавить врача
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.paramedics.store") }}" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="id_user_id">{{ trans('cruds.paramedic.fields.id_user') }}</label>
                            <select class="form-control select2" name="id_user_id" id="id_user_id" required>
                                @foreach($id_users as $id => $entry)
                                    <option value="{{ $id }}" {{ old('id_user_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('id_user'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('id_user') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.paramedic.fields.id_user_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="surname">{{ trans('cruds.paramedic.fields.surname') }}</label>
                            <input class="form-control" type="text" name="surname" id="surname" value="{{ old('surname', '') }}" required>
                            @if($errors->has('surname'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('surname') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.paramedic.fields.surname_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="name">{{ trans('cruds.paramedic.fields.name') }}</label>
                            <input class="form-control" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                            @if($errors->has('name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('name') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.paramedic.fields.name_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="fathername">{{ trans('cruds.paramedic.fields.fathername') }}</label>
                            <input class="form-control" type="text" name="fathername" id="fathername" value="{{ old('fathername', '') }}" required>
                            @if($errors->has('fathername'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('fathername') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.paramedic.fields.fathername_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="speciality_id">{{ trans('cruds.paramedic.fields.speciality') }}</label>
                            <select class="form-control select2" name="speciality_id" id="speciality_id" required>
                                @foreach($specialities as $id => $entry)
                                    <option value="{{ $id }}" {{ old('speciality_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('speciality'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('speciality') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.paramedic.fields.speciality_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="shedule_id">{{ trans('cruds.paramedic.fields.shedule') }}</label>
                            <select class="form-control select2" name="shedule_id" id="shedule_id" required>
                                @foreach($shedules as $id => $entry)
                                    <option value="{{ $id }}" {{ old('shedule_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('shedule'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('shedule') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.paramedic.fields.shedule_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-danger" type="submit">
                                {{ trans('global.save') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
