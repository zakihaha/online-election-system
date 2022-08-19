<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Models\CandidateMember;
use App\Models\Grade;
use Illuminate\Http\Request;

class CandidateMemberController extends Controller
{
    public function create(Candidate $candidate)
    {
        $grades = Grade::all();
        return view('candidate-members.create', compact('candidate', 'grades'));
    }

    public function store(Candidate $candidate)
    {
        request()->validate([
            'name' => 'required',
            'grade_id' => 'required|exists:grades,id',
        ]);

        $candidate->candidateMembers()->create([
            'name' => request()->name,
            'grade_id' => request()->grade_id,
        ]);

        return redirect()->route('candidates.show', $candidate->id);
    }

    public function edit(CandidateMember $candidateMember)
    {
        $grades = Grade::all();
        return view('candidate-members.edit', compact('candidateMember', 'grades'));
    }

    public function update(CandidateMember $candidateMember)
    {
        request()->validate([
            'name' => 'required',
            'grade_id' => 'required|exists:grades,id',
        ]);

        $candidateMember->update([
            'name' => request()->name,
            'grade_id' => request()->grade_id,
        ]);

        return redirect()->route('candidates.show', $candidateMember->candidate_id);
    }

    public function destroy(CandidateMember $candidateMember)
    {
        \Storage::delete($candidateMember->picture);

        $candidateMember->delete();
        return redirect()->route('candidates.show', $candidateMember->candidate_id);
    }
}
