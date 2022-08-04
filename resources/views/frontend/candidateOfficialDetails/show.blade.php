@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.show') }} {{ trans('cruds.candidateOfficialDetail.title') }}
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.candidate-official-details.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.candidateOfficialDetail.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $candidateOfficialDetail->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.candidateOfficialDetail.fields.official_email') }}
                                    </th>
                                    <td>
                                        {{ $candidateOfficialDetail->official_email }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.candidateOfficialDetail.fields.area') }}
                                    </th>
                                    <td>
                                        {{ App\Models\CandidateOfficialDetail::AREA_SELECT[$candidateOfficialDetail->area] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.candidateOfficialDetail.fields.designation') }}
                                    </th>
                                    <td>
                                        {{ App\Models\CandidateOfficialDetail::DESIGNATION_SELECT[$candidateOfficialDetail->designation] ?? '' }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.candidate-official-details.index') }}">
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