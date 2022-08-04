<?php

namespace App\Http\Requests;

use App\Models\Candidate;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateCandidateRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('candidate_edit');
    }

    public function rules()
    {
        return [
            'email' => [
                'required',
                'unique:candidates,email,' . request()->route('candidate')->id,
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
