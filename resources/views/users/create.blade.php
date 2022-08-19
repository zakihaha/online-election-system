@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Buat Akun Baru</h2>

    <form action="{{route('users.store')}}" method="post">
        @csrf
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" name="username" placeholder="Username" value="{{old('username')}}">
            @error('username')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-3">
            <label for="grade" class="form-label">Kelas</label>
            <select name="grade_id" id="grade_id" class="form-control">
                @foreach ($grades as $grade)
                    <option value="{{$grade->id}}">{{$grade->year . $grade->major . $grade->subclass}}</option>
                @endforeach
            </select>
            @error('grade_id')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Password" value="{{old('password')}}">
            @error('password')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <button class="btn btn-primary" type="submit">Tambahkan</button>
    </form>

</div>
@endsection
