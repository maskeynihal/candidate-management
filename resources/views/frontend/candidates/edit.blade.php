@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.edit') }} {{ trans('cruds.candidate.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.candidates.update", [$candidate->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="email">{{ trans('cruds.candidate.fields.email') }}</label>
                            <input class="form-control" type="email" name="email" id="email" value="{{ old('email', $candidate->email) }}" required>
                            @if($errors->has('email'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('email') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.candidate.fields.email_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="first_name">{{ trans('cruds.candidate.fields.first_name') }}</label>
                            <input class="form-control" type="text" name="first_name" id="first_name" value="{{ old('first_name', $candidate->first_name) }}" required>
                            @if($errors->has('first_name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('first_name') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.candidate.fields.first_name_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="middle_name">{{ trans('cruds.candidate.fields.middle_name') }}</label>
                            <input class="form-control" type="text" name="middle_name" id="middle_name" value="{{ old('middle_name', $candidate->middle_name) }}">
                            @if($errors->has('middle_name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('middle_name') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.candidate.fields.middle_name_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="last_name">{{ trans('cruds.candidate.fields.last_name') }}</label>
                            <input class="form-control" type="text" name="last_name" id="last_name" value="{{ old('last_name', $candidate->last_name) }}" required>
                            @if($errors->has('last_name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('last_name') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.candidate.fields.last_name_helper') }}</span>
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