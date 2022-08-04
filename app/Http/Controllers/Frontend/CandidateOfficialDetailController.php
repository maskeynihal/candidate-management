<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyCandidateOfficialDetailRequest;
use App\Http\Requests\StoreCandidateOfficialDetailRequest;
use App\Http\Requests\UpdateCandidateOfficialDetailRequest;
use App\Models\CandidateOfficialDetail;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CandidateOfficialDetailController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('candidate_official_detail_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $candidateOfficialDetails = CandidateOfficialDetail::all();

        return view('frontend.candidateOfficialDetails.index', compact('candidateOfficialDetails'));
    }

    public function create()
    {
        abort_if(Gate::denies('candidate_official_detail_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.candidateOfficialDetails.create');
    }

    public function store(StoreCandidateOfficialDetailRequest $request)
    {
        $candidateOfficialDetail = CandidateOfficialDetail::create($request->all());

        return redirect()->route('frontend.candidate-official-details.index');
    }

    public function edit(CandidateOfficialDetail $candidateOfficialDetail)
    {
        abort_if(Gate::denies('candidate_official_detail_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.candidateOfficialDetails.edit', compact('candidateOfficialDetail'));
    }

    public function update(UpdateCandidateOfficialDetailRequest $request, CandidateOfficialDetail $candidateOfficialDetail)
    {
        $candidateOfficialDetail->update($request->all());

        return redirect()->route('frontend.candidate-official-details.index');
    }

    public function show(CandidateOfficialDetail $candidateOfficialDetail)
    {
        abort_if(Gate::denies('candidate_official_detail_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.candidateOfficialDetails.show', compact('candidateOfficialDetail'));
    }

    public function destroy(CandidateOfficialDetail $candidateOfficialDetail)
    {
        abort_if(Gate::denies('candidate_official_detail_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $candidateOfficialDetail->delete();

        return back();
    }

    public function massDestroy(MassDestroyCandidateOfficialDetailRequest $request)
    {
        CandidateOfficialDetail::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
