@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.candidateOfficialDetail.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.candidate-official-details.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="official_email">{{ trans('cruds.candidateOfficialDetail.fields.official_email') }}</label>
                <input class="form-control {{ $errors->has('official_email') ? 'is-invalid' : '' }}" type="email" name="official_email" id="official_email" value="{{ old('official_email') }}" required>
                @if($errors->has('official_email'))
                    <div class="invalid-feedback">
                        {{ $errors->first('official_email') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.candidateOfficialDetail.fields.official_email_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.candidateOfficialDetail.fields.area') }}</label>
                <select class="form-control {{ $errors->has('area') ? 'is-invalid' : '' }}" name="area" id="area">
                    <option value disabled {{ old('area', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\CandidateOfficialDetail::AREA_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('area', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('area'))
                    <div class="invalid-feedback">
                        {{ $errors->first('area') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.candidateOfficialDetail.fields.area_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.candidateOfficialDetail.fields.designation') }}</label>
                <select class="form-control {{ $errors->has('designation') ? 'is-invalid' : '' }}" name="designation" id="designation" required>
                    <option value disabled {{ old('designation', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\CandidateOfficialDetail::DESIGNATION_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('designation', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('designation'))
                    <div class="invalid-feedback">
                        {{ $errors->first('designation') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.candidateOfficialDetail.fields.designation_helper') }}</span>
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