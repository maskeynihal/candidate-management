<?php

namespace App\Http\Requests;

use App\Models\CandidateOfficialDetail;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreCandidateOfficialDetailRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('candidate_official_detail_create');
    }

    public function rules()
    {
        return [
            'official_email' => [
                'required',
                'unique:candidate_official_details',
            ],
            'designation' => [
                'required',
            ],
        ];
    }
}
