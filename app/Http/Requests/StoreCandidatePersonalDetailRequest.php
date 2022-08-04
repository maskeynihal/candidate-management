<?php

namespace App\Http\Requests;

use App\Models\CandidatePersonalDetail;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreCandidatePersonalDetailRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('candidate_personal_detail_create');
    }

    public function rules()
    {
        return [
            'candidate_id' => [
                'required',
                'integer',
            ],
            'first_name' => [
                'string',
                'required',
            ],
            'middle_name' => [
                'string',
                'nullable',
            ],
            'last_name' => [
                'string',
                'required',
            ],
            'emergency_contact_number' => [
                'string',
                'nullable',
            ],
            'join_date' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
        ];
    }
}
