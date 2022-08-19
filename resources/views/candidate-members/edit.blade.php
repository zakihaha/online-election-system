@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="mb-4">Edit Member</h2>

        <form action="{{ route('candidate-members.update', $candidateMember->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Nama Lengkap</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan nama lengkap"
                    value="{{ $candidateMember->name }}">
                @error('name')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label for="grade" class="form-label">Kelas</label>
                <select name="grade_id" id="grade_id" class="form-control">
                    @foreach ($grades as $grade)
                        <option value="{{ $grade->id }}" {{ $candidateMember->grade_id == $grade->id ? 'selected' : '' }}>
                            {{ $grade->year . $grade->major . $grade->subclass }}</option>
                    @endforeach
                </select>
                @error('grade_id')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <button class="btn btn-primary" type="submit">Edit</button>
        </form>
    </div>
@endsection
