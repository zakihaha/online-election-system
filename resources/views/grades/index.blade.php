@extends('layouts.app')

@section('content')
    <section>

        <div class="container">
            <h2 class="mb-4">Daftar Kelas</h2>
            <a href="{{ route('grades.create') }}" class="btn btn-primary mb-3">Tambah</a>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Kelas</th>
                        <th>Jurusan</th>
                        <th>Sub Kelas</th>
                        <th>Jumlah Siswa</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($grades as $grade)
                        <tr>
                            <td>{{ $grade->year }}</td>
                            <td>{{ $grade->major }}</td>
                            <td>{{ $grade->subclass }}</td>
                            <td>{{ $grade->total }}</td>
                            <td>
                                <a href="{{ route('grades.edit', $grade->id) }}" class="btn btn-primary">Ubah</a>
                                <a href="{{ route('grades.show', $grade->id) }}" class="btn btn-secondary">Detail</a>

                                <form action="{{ route('grades.destroy', $grade->id) }}" method="POST"
                                    style="display: inline;">
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
    </section>
@endsection
