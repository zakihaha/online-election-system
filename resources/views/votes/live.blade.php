@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="mb-5 text-center">Live Counting</h2>

        <div class="row justify-content-center">
            @foreach ($candidates as $index => $candidate)
            <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                <div class="card">
                    <p class="btn btn-blue mb-3 number-votes">{{ $candidate->votes }}</p>
                    <img src="{{ $candidate->picture() }}" class="card-img-top" alt="paslon">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-40px">
                            <div>
                                @foreach ($candidate->candidateMembers as $member)
                                    <h4 class="card-title mb-10px">{{ $member->name }}</h4>
                                @endforeach
                            </div>
                            <p class="number-paslon">#{{ $candidate->number }}</p>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection
