<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCandidateRequest;
use App\Http\Requests\UpdateCandidateRequest;
use App\Http\Resources\Admin\CandidateResource;
use App\Models\Candidate;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CandidateApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('candidate_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CandidateResource(Candidate::all());
    }

    public function store(StoreCandidateRequest $request)
    {
        $candidate = Candidate::create($request->all());

        return (new CandidateResource($candidate))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Candidate $candidate)
    {
        abort_if(Gate::denies('candidate_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CandidateResource($candidate);
    }

    public function update(UpdateCandidateRequest $request, Candidate $candidate)
    {
        $candidate->update($request->all());

        return (new CandidateResource($candidate))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Candidate $candidate)
    {
        abort_if(Gate::denies('candidate_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $candidate->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
