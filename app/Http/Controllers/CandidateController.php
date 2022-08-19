<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Models\Grade;
use Illuminate\Http\Request;

class CandidateController extends Controller
{
    public function index()
    {
        $candidates = Candidate::with('candidateMembers')->orderBy('number')->get();
        return view('candidates.index', compact('candidates'));
    }

    public function show(Candidate $candidate)
    {
        $candidate->load('candidateMembers', 'candidateMembers.grade');
        return view('candidates.show', compact('candidate'));
    }

    public function create()
    {
        $grades = Grade::all();
        return view('candidates.create', compact('grades'));
    }

    public function store()
    {
        request()->validate([
            'number' => 'integer|required|unique:candidates',
            'vision' => 'required',
            'mission' => 'required',
            'picture' => 'required|mimes:jpg,jpeg,bmp,png',
        ]);

        if (request()->file('picture')) {
            $picture = request()->file('picture');
            $pictureUrl = $picture->storeAs("pictures/candidates", \Str::slug(request()->name) . \Str::random(4) . ".{$picture->extension()}");
        } else {
            $pictureUrl = null;
        }

        Candidate::create([
            'number' => request()->number,
            'vision' => request()->vision,
            'mission' => request()->mission,
            'picture' => $pictureUrl,
        ]);
        return redirect()->route('candidates.index');
    }

    public function edit(Candidate $candidate)
    {
        $grades = Grade::all();
        return view('candidates.edit', compact('candidate', 'grades'));
    }

    public function update(Candidate $candidate)
    {
        request()->validate([
            'number' => 'integer|required|unique:candidates,number,' . $candidate->id,
            'vision' => 'required',
            'mission' => 'required',
            'picture' => 'mimes:jpg,jpeg,bmp,png',
        ]);

        if (request()->file('picture')) {
            \Storage::delete($candidate->picture);

            $picture = request()->file('picture');
            $pictureUrl = $picture->storeAs("pictures/candidates", \Str::slug(request()->name) . \Str::random(4) . ".{$picture->extension()}");
        } else {
            $pictureUrl = $candidate->picture;
        }

        $candidate->update([
            'number' => request()->number,
            'vision' => request()->vision,
            'mission' => request()->mission,
            'picture' => $pictureUrl,
        ]);
        return redirect()->route('candidates.show', $candidate->id);
    }

    public function destroy(Candidate $candidate)
    {
        $candidate->delete();
        return redirect()->route('candidates.index');
    }
}
