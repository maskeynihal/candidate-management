<?php

namespace App\Http\Requests;

use App\Models\Candidate;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreCandidateRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('candidate_create');
    }

    public function rules()
    {
        return [
            'email' => [
                'required',
                'unique:candidates',
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
        ];
    }
}
