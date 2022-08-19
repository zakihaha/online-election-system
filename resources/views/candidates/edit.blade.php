@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="mb-4">Edit Visi dan Misi</h2>

        <form action="{{ route('candidates.update', $candidate->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="number" class="form-label">Nomor</label>
                <input type="number" class="form-control" name="number" id="number" placeholder="Nomor"
                    value="{{ $candidate->number }}">
                @error('number')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label for="vision" class="form-label">Visi</label>
                <textarea class="form-control" id="vision" name="vision" rows="3" placeholder="Visi">{{ $candidate->vision }}</textarea>
                @error('vision')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label for="mission" class="form-label">Misi</label>
                <textarea class="form-control" id="mission" name="mission" rows="3" placeholder="Misi">{{ $candidate->mission }}</textarea>
                @error('mission')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label for="picture" class="form-label">Pilih Foto</label>
                <input type="file" class="form-control" id="picture" name="picture">
                @error('picture')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <button class="btn btn-primary" type="submit">Tambahkan</button>
        </form>
    </div>
@endsection
