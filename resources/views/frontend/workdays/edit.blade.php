@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    Редактировать
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.workdays.update", [$workday->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="day">{{ trans('cruds.workday.fields.day') }}</label>
                            <input class="form-control" type="text" name="day" id="day" value="{{ old('day', $workday->day) }}" required>
                            @if($errors->has('day'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('day') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.workday.fields.day_helper') }}</span>
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
