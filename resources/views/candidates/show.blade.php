@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="mb-4">Detail Pasangan</h2>

        <div class="d-flex mb-4">
            <a href="{{ route('candidates.edit', $candidate->id) }}" class="btn btn-primary me-2">Ubah</a>
            <a href="{{ route('candidate-members.create', $candidate->id) }}" class="btn btn-secondary">Tambahkan pasangan</a>
        </div>

        <img class="mb-3" src="{{ $candidate->picture() }}" alt="" width="400">

        <div class="mb-2">
            <h3>Visi</h3>
            <p>{{ $candidate->vision }}</p>
        </div>

        <div class="mb-2">
            <h3>Misi</h3>
            <p>{{ $candidate->mission }}</p>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Kelas</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($candidate->candidateMembers as $member)
                    <tr>
                        <td>{{ $member->name }}</td>
                        <td>{{ $member->grade->year . $member->grade->major . $member->grade->subclass }}</td>
                        <td>
                            <a href="{{ route('candidate-members.edit', $member->id) }}" class="btn btn-primary">Ubah</a>
                            <form action="{{ route('candidate-members.destroy', $member->id) }}" method="POST"
                                style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
        </table>

    </div>
@endsection
