@extends('layouts.app')

@section('content')
    <section>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">{{ __('Dashboard') }}</div>

                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif

                            <a href="{{ route('grades.index') }}">Daftar Kelas</a>
                            <br>
                            <a href="{{ route('users.index') }}">Daftar Akun</a>
                            <br>
                            <a href="{{ route('candidates.index') }}">Daftar Kandidat</a>
                            <br>
                            <a href="{{ route('votes.live') }}">Live Counting</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
