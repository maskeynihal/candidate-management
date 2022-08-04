@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.show') }} {{ trans('cruds.candidatePersonalDetail.title') }}
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.candidate-personal-details.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.candidatePersonalDetail.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $candidatePersonalDetail->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.candidatePersonalDetail.fields.candidate') }}
                                    </th>
                                    <td>
                                        {{ $candidatePersonalDetail->candidate->email ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.candidatePersonalDetail.fields.first_name') }}
                                    </th>
                                    <td>
                                        {{ $candidatePersonalDetail->first_name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.candidatePersonalDetail.fields.middle_name') }}
                                    </th>
                                    <td>
                                        {{ $candidatePersonalDetail->middle_name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.candidatePersonalDetail.fields.last_name') }}
                                    </th>
                                    <td>
                                        {{ $candidatePersonalDetail->last_name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.candidatePersonalDetail.fields.emergency_contact_number') }}
                                    </th>
                                    <td>
                                        {{ $candidatePersonalDetail->emergency_contact_number }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.candidatePersonalDetail.fields.join_date') }}
                                    </th>
                                    <td>
                                        {{ $candidatePersonalDetail->join_date }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.candidate-personal-details.index') }}">
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