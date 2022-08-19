@extends('layouts.app')

@section('content')
    <section>

        <div class="container">
            <h2 class="mb-4">Edit Kelas</h2>

            <form action="{{ route('grades.update', $grade->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="year" class="form-label">Kelas</label>
                    <select name="year" id="year" class="form-control">
                        <option value="X" {{ $grade->year == 'X' ? 'selected' : '' }}>X</option>
                        <option value="XI" {{ $grade->year == 'XI' ? 'selected' : '' }}>XI</option>
                        <option value="XII {{ $grade->year == 'XII' ? 'selected' : '' }}">XII</option>
                    </select>
                    @error('year')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="major" class="form-label">Jurusan</label>
                    <input type="text" class="form-control" id="major" name="major" placeholder="Jurusan"
                        value="{{ $grade->major }}">

                    @error('major')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="subclass" class="form-label">Kelas cabang</label>
                    <input type="number" class="form-control" id="subclass" name="subclass" placeholder="subclass"
                        value="{{ $grade->subclass }}">
                    @error('subclass')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="total" class="form-label">Total Siswa</label>
                    <input type="number" class="form-control" id="total" name="total" placeholder="total"
                        value="{{ $grade->total }}">
                    @error('total')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <button class="btn btn-primary" type="submit">Tambahkan</button>
            </form>
        </div>
    </section>
@endsection
