<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyCandidatePersonalDetailRequest;
use App\Http\Requests\StoreCandidatePersonalDetailRequest;
use App\Http\Requests\UpdateCandidatePersonalDetailRequest;
use App\Models\Candidate;
use App\Models\CandidatePersonalDetail;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CandidatePersonalDetailController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('candidate_personal_detail_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $candidatePersonalDetails = CandidatePersonalDetail::with(['candidate'])->get();

        return view('frontend.candidatePersonalDetails.index', compact('candidatePersonalDetails'));
    }

    public function create()
    {
        abort_if(Gate::denies('candidate_personal_detail_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $candidates = Candidate::pluck('email', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('frontend.candidatePersonalDetails.create', compact('candidates'));
    }

    public function store(StoreCandidatePersonalDetailRequest $request)
    {
        $candidatePersonalDetail = CandidatePersonalDetail::create($request->all());

        return redirect()->route('frontend.candidate-personal-details.index');
    }

    public function edit(CandidatePersonalDetail $candidatePersonalDetail)
    {
        abort_if(Gate::denies('candidate_personal_detail_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $candidates = Candidate::pluck('email', 'id')->prepend(trans('global.pleaseSelect'), '');

        $candidatePersonalDetail->load('candidate');

        return view('frontend.candidatePersonalDetails.edit', compact('candidatePersonalDetail', 'candidates'));
    }

    public function update(UpdateCandidatePersonalDetailRequest $request, CandidatePersonalDetail $candidatePersonalDetail)
    {
        $candidatePersonalDetail->update($request->all());

        return redirect()->route('frontend.candidate-personal-details.index');
    }

    public function show(CandidatePersonalDetail $candidatePersonalDetail)
    {
        abort_if(Gate::denies('candidate_personal_detail_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $candidatePersonalDetail->load('candidate');

        return view('frontend.candidatePersonalDetails.show', compact('candidatePersonalDetail'));
    }

    public function destroy(CandidatePersonalDetail $candidatePersonalDetail)
    {
        abort_if(Gate::denies('candidate_personal_detail_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $candidatePersonalDetail->delete();

        return back();
    }

    public function massDestroy(MassDestroyCandidatePersonalDetailRequest $request)
    {
        CandidatePersonalDetail::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
