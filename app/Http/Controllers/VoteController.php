<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use Illuminate\Http\Request;

class VoteController extends Controller
{
    public function index()
    {
        $candidates = Candidate::with('candidateMembers')->orderBy('number')->get();
        return view('votes.index', compact('candidates'));
    }

    public function store(Candidate $candidate)
    {
        // if (auth()->user()->voted == false) {
        //     $candidate->vote();
        //     auth()->user()->update(['voted' => true]);
        // }

        return redirect()->route('votes.index');
    }

    public function live()
    {
        $candidates = Candidate::with('candidateMembers')->orderBy('number')->get();
        return view('votes.live', compact('candidates'));
    }
}
