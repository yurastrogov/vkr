@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    Добавить
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.shedules.store") }}" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="name">{{ trans('cruds.shedule.fields.name') }}</label>
                            <input class="form-control" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                            @if($errors->has('name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('name') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.shedule.fields.name_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="workdays">{{ trans('cruds.shedule.fields.workdays') }}</label>
                            <div style="padding-bottom: 4px">
                                <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                                <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                            </div>
                            <select class="form-control select2" name="workdays[]" id="workdays" multiple required>
                                @foreach($workdays as $id => $workday)
                                    <option value="{{ $id }}" {{ in_array($id, old('workdays', [])) ? 'selected' : '' }}>{{ $workday }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('workdays'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('workdays') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.shedule.fields.workdays_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="worktimestart">{{ trans('cruds.shedule.fields.worktimestart') }}</label>
                            <input class="form-control timepicker" type="text" name="worktimestart" id="worktimestart" value="{{ old('worktimestart') }}" required>
                            @if($errors->has('worktimestart'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('worktimestart') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.shedule.fields.worktimestart_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="worktimeend">{{ trans('cruds.shedule.fields.worktimeend') }}</label>
                            <input class="form-control timepicker" type="text" name="worktimeend" id="worktimeend" value="{{ old('worktimeend') }}" required>
                            @if($errors->has('worktimeend'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('worktimeend') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.shedule.fields.worktimeend_helper') }}</span>
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
