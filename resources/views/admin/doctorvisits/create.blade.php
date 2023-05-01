@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.doctorvisit.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.doctorvisits.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="idcontractor_id">{{ trans('cruds.doctorvisit.fields.idcontractor') }}</label>
                <select class="form-control select2 {{ $errors->has('idcontractor') ? 'is-invalid' : '' }}" name="idcontractor_id" id="idcontractor_id" required>
                    @foreach($idcontractors as $id => $entry)
                        <option value="{{ $id }}" {{ old('idcontractor_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('idcontractor'))
                    <div class="invalid-feedback">
                        {{ $errors->first('idcontractor') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.doctorvisit.fields.idcontractor_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="complaint">{{ trans('cruds.doctorvisit.fields.complaint') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('complaint') ? 'is-invalid' : '' }}" name="complaint" id="complaint">{!! old('complaint') !!}</textarea>
                @if($errors->has('complaint'))
                    <div class="invalid-feedback">
                        {{ $errors->first('complaint') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.doctorvisit.fields.complaint_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="objectivestat">{{ trans('cruds.doctorvisit.fields.objectivestat') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('objectivestat') ? 'is-invalid' : '' }}" name="objectivestat" id="objectivestat">{!! old('objectivestat') !!}</textarea>
                @if($errors->has('objectivestat'))
                    <div class="invalid-feedback">
                        {{ $errors->first('objectivestat') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.doctorvisit.fields.objectivestat_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="treatment">{{ trans('cruds.doctorvisit.fields.treatment') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('treatment') ? 'is-invalid' : '' }}" name="treatment" id="treatment">{!! old('treatment') !!}</textarea>
                @if($errors->has('treatment'))
                    <div class="invalid-feedback">
                        {{ $errors->first('treatment') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.doctorvisit.fields.treatment_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="mkb_id">{{ trans('cruds.doctorvisit.fields.mkb') }}</label>
                <select class="form-control select2 {{ $errors->has('mkb') ? 'is-invalid' : '' }}" name="mkb_id" id="mkb_id">
                    @foreach($mkbs as $id => $entry)
                        <option value="{{ $id }}" {{ old('mkb_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('mkb'))
                    <div class="invalid-feedback">
                        {{ $errors->first('mkb') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.doctorvisit.fields.mkb_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="datetimepriem">{{ trans('cruds.doctorvisit.fields.datetimepriem') }}</label>
                <input class="form-control datetime {{ $errors->has('datetimepriem') ? 'is-invalid' : '' }}" type="text" name="datetimepriem" id="datetimepriem" value="{{ old('datetimepriem') }}">
                @if($errors->has('datetimepriem'))
                    <div class="invalid-feedback">
                        {{ $errors->first('datetimepriem') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.doctorvisit.fields.datetimepriem_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.doctorvisit.fields.visitpurpose') }}</label>
                <select class="form-control {{ $errors->has('visitpurpose') ? 'is-invalid' : '' }}" name="visitpurpose" id="visitpurpose">
                    <option value disabled {{ old('visitpurpose', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Doctorvisit::VISITPURPOSE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('visitpurpose', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('visitpurpose'))
                    <div class="invalid-feedback">
                        {{ $errors->first('visitpurpose') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.doctorvisit.fields.visitpurpose_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.doctorvisit.fields.rezultatvisit') }}</label>
                <select class="form-control {{ $errors->has('rezultatvisit') ? 'is-invalid' : '' }}" name="rezultatvisit" id="rezultatvisit">
                    <option value disabled {{ old('rezultatvisit', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Doctorvisit::REZULTATVISIT_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('rezultatvisit', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('rezultatvisit'))
                    <div class="invalid-feedback">
                        {{ $errors->first('rezultatvisit') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.doctorvisit.fields.rezultatvisit_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection

@section('scripts')
<script>
    $(document).ready(function () {
  function SimpleUploadAdapter(editor) {
    editor.plugins.get('FileRepository').createUploadAdapter = function(loader) {
      return {
        upload: function() {
          return loader.file
            .then(function (file) {
              return new Promise(function(resolve, reject) {
                // Init request
                var xhr = new XMLHttpRequest();
                xhr.open('POST', '{{ route('admin.doctorvisits.storeCKEditorImages') }}', true);
                xhr.setRequestHeader('x-csrf-token', window._token);
                xhr.setRequestHeader('Accept', 'application/json');
                xhr.responseType = 'json';

                // Init listeners
                var genericErrorText = `Couldn't upload file: ${ file.name }.`;
                xhr.addEventListener('error', function() { reject(genericErrorText) });
                xhr.addEventListener('abort', function() { reject() });
                xhr.addEventListener('load', function() {
                  var response = xhr.response;

                  if (!response || xhr.status !== 201) {
                    return reject(response && response.message ? `${genericErrorText}\n${xhr.status} ${response.message}` : `${genericErrorText}\n ${xhr.status} ${xhr.statusText}`);
                  }

                  $('form').append('<input type="hidden" name="ck-media[]" value="' + response.id + '">');

                  resolve({ default: response.url });
                });

                if (xhr.upload) {
                  xhr.upload.addEventListener('progress', function(e) {
                    if (e.lengthComputable) {
                      loader.uploadTotal = e.total;
                      loader.uploaded = e.loaded;
                    }
                  });
                }

                // Send request
                var data = new FormData();
                data.append('upload', file);
                data.append('crud_id', '{{ $doctorvisit->id ?? 0 }}');
                xhr.send(data);
              });
            })
        }
      };
    }
  }

  var allEditors = document.querySelectorAll('.ckeditor');
  for (var i = 0; i < allEditors.length; ++i) {
    ClassicEditor.create(
      allEditors[i], {
        extraPlugins: [SimpleUploadAdapter]
      }
    );
  }
});
</script>

@endsection