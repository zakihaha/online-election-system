@extends('layouts.app')

@section('content')
    <section>

        <div class="container">
            <h2 class="mb-4">Detail Kelas {{ $grade->year . $grade->major . $grade->subclass }}</h2>

            <div class="d-flex mb-4">
                <form action="{{ route('grades.users.generate', $grade->id) }}" method="post">
                    @csrf
                    @method('POST')
                    <button type="submit" class="btn btn-primary">Generate</button>
                </form>

                <a href="{{ route('grades.users.export', $grade->id) }}" class="btn btn-secondary ms-2">Export</a>
            </div>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Kelas</th>
                        <th>Username</th>
                        <th>Status Memilih</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($grade->users as $user)
                        <tr>
                            <td>{{ $grade->year . $grade->major . $grade->subclass }}</td>
                            <td>{{ $user->username }}</td>
                            <td>{!! $user->voted ? '<span class="badge bg-success">Sudah</span>' : '<span class="badge bg-secondary">Belum</span>' !!}</td>
                            <td>
                                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary">Ubah</a>
                                <form action="{{ route('users.destroy', $user->id) }}" method="POST"
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
