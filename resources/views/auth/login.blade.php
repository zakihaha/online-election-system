@extends('layouts.app')

@section('content')
    <section id="login">
        <div class="container">
            <div class="box">
                <h2 class="text-center title fw-600">Login</h2>

                <form action="{{ route('login') }}" method="post">
                    @csrf
                    <div class="mb-30px">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control @error('username') is-invalid @enderror" name="username"
                            id="username" value="{{ old('username') }}" placeholder="Masukkan username" required>
                        @error('username')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-30px">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control  @error('password') is-invalid @enderror" name="password"
                            id="password" placeholder="Masukkan password" required>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                    {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="text-center">
                        <button type="submit" onclick="location.href='vote.html'" class="btn btn-blue btn-login">Let's
                            Go</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
