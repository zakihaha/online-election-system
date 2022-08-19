@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="mb-4">Daftar Akun</h2>
        <a href="{{ route('users.create') }}" class="btn btn-primary mb-5">Tambah</a>

        <div class="mb-4">
            <form action="{{ route('users.index') }}" method="get">
                <label class="form-label" for="username">Pencarian</label>
                <div class="d-flex">
                    <input type="text" name="username" id="username" class="form-control me-3" placeholder="Ketikkan username atau kelas">
                    <button type="submit" class="btn btn-blue me-3">Cari</button>
                    <a href="{{ route('users.index') }}" class="btn btn-blue">Clear</a>
                </div>
            </form>
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Kelas</th>
                    <th>Username</th>
                    <th>Role</th>
                    <th>Status Memilih</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->grade->year . $user->grade->major . $user->grade->subclass }}</td>
                        <td>{{ $user->username }}</td>
                        <td>{{ $user->role }}</td>
                        <td>{!! $user->voted
                            ? '<span class="badge bg-success">Sudah</span>'
                            : '<span class="badge bg-secondary">Belum</span>' !!}</td>
                        <td>
                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary">Ubah</a>
                            <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $users->links() }}

    </div>
@endsection
