@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="mb-4">Daftar Kandidat</h2>
        <a href="{{ route('candidates.create') }}" class="btn btn-primary mb-3">Buat</a>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nomor</th>
                    <th>Visi</th>
                    <th>Misi</th>
                    <th>Foto</th>
                    <th>Member</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($candidates as $candidate)
                    <tr>
                        <td>{{ $candidate->number }}</td>
                        <td>{{ $candidate->vision }}</td>
                        <td>{{ $candidate->mission }}</td>
                        <td><img src="{{ $candidate->picture() }}" alt="" width="200"></td>
                        <td>
                            @foreach ($candidate->candidateMembers as $member)
                                {{ $member->name }} <br>
                            @endforeach
                        </td>
                        <td>
                            <a href="{{ route('candidates.show', $candidate->id) }}" class="btn btn-secondary">Detail</a>
                            <form action="{{ route('candidates.destroy', $candidate->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
@endsection
