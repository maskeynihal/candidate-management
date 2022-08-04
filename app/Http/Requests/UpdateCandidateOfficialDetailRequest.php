<?php

namespace App\Http\Requests;

use App\Models\CandidateOfficialDetail;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateCandidateOfficialDetailRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('candidate_official_detail_edit');
    }

    public function rules()
    {
        return [
            'official_email' => [
                'required',
                'unique:candidate_official_details,official_email,' . request()->route('candidate_official_detail')->id,
            ],
            'designation' => [
                'required',
            ],
        ];
    }
}
