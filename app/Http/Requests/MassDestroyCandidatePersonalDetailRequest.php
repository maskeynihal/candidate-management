<?php

namespace App\Http\Requests;

use App\Models\CandidatePersonalDetail;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyCandidatePersonalDetailRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('candidate_personal_detail_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:candidate_personal_details,id',
        ];
    }
}
