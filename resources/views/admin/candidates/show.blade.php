@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.candidate.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.candidates.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.candidate.fields.id') }}
                        </th>
                        <td>
                            {{ $candidate->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.candidate.fields.email') }}
                        </th>
                        <td>
                            {{ $candidate->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.candidate.fields.first_name') }}
                        </th>
                        <td>
                            {{ $candidate->first_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.candidate.fields.middle_name') }}
                        </th>
                        <td>
                            {{ $candidate->middle_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.candidate.fields.last_name') }}
                        </th>
                        <td>
                            {{ $candidate->last_name }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.candidates.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        {{ trans('global.relatedData') }}
    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#candidate_candidate_personal_details" role="tab" data-toggle="tab">
                {{ trans('cruds.candidatePersonalDetail.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="candidate_candidate_personal_details">
            @includeIf('admin.candidates.relationships.candidateCandidatePersonalDetails', ['candidatePersonalDetails' => $candidate->candidateCandidatePersonalDetails])
        </div>
    </div>
</div>

@endsection