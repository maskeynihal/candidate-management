@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.create') }} {{ trans('cruds.candidatePersonalDetail.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.candidate-personal-details.store") }}" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="candidate_id">{{ trans('cruds.candidatePersonalDetail.fields.candidate') }}</label>
                            <select class="form-control select2" name="candidate_id" id="candidate_id" required>
                                @foreach($candidates as $id => $entry)
                                    <option value="{{ $id }}" {{ old('candidate_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('candidate'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('candidate') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.candidatePersonalDetail.fields.candidate_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="first_name">{{ trans('cruds.candidatePersonalDetail.fields.first_name') }}</label>
                            <input class="form-control" type="text" name="first_name" id="first_name" value="{{ old('first_name', '') }}" required>
                            @if($errors->has('first_name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('first_name') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.candidatePersonalDetail.fields.first_name_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="middle_name">{{ trans('cruds.candidatePersonalDetail.fields.middle_name') }}</label>
                            <input class="form-control" type="text" name="middle_name" id="middle_name" value="{{ old('middle_name', '') }}">
                            @if($errors->has('middle_name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('middle_name') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.candidatePersonalDetail.fields.middle_name_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="last_name">{{ trans('cruds.candidatePersonalDetail.fields.last_name') }}</label>
                            <input class="form-control" type="text" name="last_name" id="last_name" value="{{ old('last_name', '') }}" required>
                            @if($errors->has('last_name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('last_name') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.candidatePersonalDetail.fields.last_name_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="emergency_contact_number">{{ trans('cruds.candidatePersonalDetail.fields.emergency_contact_number') }}</label>
                            <input class="form-control" type="text" name="emergency_contact_number" id="emergency_contact_number" value="{{ old('emergency_contact_number', '') }}">
                            @if($errors->has('emergency_contact_number'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('emergency_contact_number') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.candidatePersonalDetail.fields.emergency_contact_number_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="join_date">{{ trans('cruds.candidatePersonalDetail.fields.join_date') }}</label>
                            <input class="form-control date" type="text" name="join_date" id="join_date" value="{{ old('join_date') }}" required>
                            @if($errors->has('join_date'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('join_date') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.candidatePersonalDetail.fields.join_date_helper') }}</span>
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