<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyCandidateRequest;
use App\Http\Requests\StoreCandidateRequest;
use App\Http\Requests\UpdateCandidateRequest;
use App\Models\Candidate;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CandidateController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('candidate_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $candidates = Candidate::all();

        return view('frontend.candidates.index', compact('candidates'));
    }

    public function create()
    {
        abort_if(Gate::denies('candidate_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.candidates.create');
    }

    public function store(StoreCandidateRequest $request)
    {
        $candidate = Candidate::create($request->all());

        return redirect()->route('frontend.candidates.index');
    }

    public function edit(Candidate $candidate)
    {
        abort_if(Gate::denies('candidate_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.candidates.edit', compact('candidate'));
    }

    public function update(UpdateCandidateRequest $request, Candidate $candidate)
    {
        $candidate->update($request->all());

        return redirect()->route('frontend.candidates.index');
    }

    public function show(Candidate $candidate)
    {
        abort_if(Gate::denies('candidate_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $candidate->load('candidateCandidatePersonalDetails');

        return view('frontend.candidates.show', compact('candidate'));
    }

    public function destroy(Candidate $candidate)
    {
        abort_if(Gate::denies('candidate_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $candidate->delete();

        return back();
    }

    public function massDestroy(MassDestroyCandidateRequest $request)
    {
        Candidate::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
