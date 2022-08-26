@extends('layouts.app')

@section('content')
    <section id="vote" class="section-pad relative">

        <div class="container">
            @if (auth()->user()->isVoted())
                <div class="alert alert-info mb-5" role="alert">
                    Terima kasih telah berpartisipasi di Event Airlangga 2022, Kunjungi Instagram <a class="text-danger"
                        href="https://www.instagram.com/mpk.smerusaka/">@mpk.smerusaka</a> untuk melihat streaming live
                    counting!
                </div>
            @endif
            <h1 class="text-center title">THE CHOICE IS YOURS</h1>

            <div class="row justify-content-center">
                @foreach ($candidates as $index => $candidate)
                    <!-- modal details -->
                    <div class="modal fade" id="modal-{{ $index }}" tabindex="-1"
                        aria-labelledby="modalLabel-{{ $index }}" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content box-airlangga">
                                <img class="absolute bottom-0 right-0 mascot-2" src="{{ asset('img/mascot-2.png') }}" alt="">
                                <div class="modal-body">
                                    <div class="d-flex justify-content-between align-items-center mb-40px">
                                        <p class="number-paslon">#{{ $index + 1 }}</p>
                                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="vision mb-40px">
                                        <h3 class="mb-20px text-center">Visi</h3>
                                        <p class="wh-pre-warp">{{ $candidate->vision }}</p>
                                    </div>
                                    <div class="mission">
                                        <h3 class="mb-20px text-center">Misi</h3>
                                        <p class="wh-pre-warp">{{ $candidate->mission }}</p>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- modal vote -->
                    <div class="modal fade" id="modal-vote-{{ $index }}" tabindex="-1"
                        aria-labelledby="modalLabel-vote-{{ $index }}" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content box-airlangga">
                                <div class="modal-body modal-body-airlangga">
                                    <p class="confirm-text">Apakah kamu yakin untuk memilih paslon nomor
                                        #{{ $index + 1 }}?</p>
                                </div>
                                {{-- <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                    @if (!auth()->user()->isVoted())
                                        <form action="{{ route('votes.store', $candidate->id) }}" method="post">
                                            @csrf
                                            <button type="submit" class="btn btn-blue">Yakin</button>
                                        </form>
                                    @endif
                                </div> --}}
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 col-sm-12 mb-4 list-candidate-{{ $index }}">
                        <div class="card">
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

                                {{-- <div class="d-flex justify-content-between align-items-center">
                                    <button type="button" class="no-btn details" data-bs-toggle="modal"
                                        data-bs-target="#modal-{{ $index }}">
                                        Lihat Detail
                                    </button>
                                    @if (!auth()->user()->isVoted())
                                        <button type="button" class="btn btn-blue" data-bs-toggle="modal"
                                            data-bs-target="#modal-vote-{{ $index }}">
                                            Vote
                                        </button>
                                    @endif
                                </div> --}}

                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
