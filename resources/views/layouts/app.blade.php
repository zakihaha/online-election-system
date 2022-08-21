<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="shortcut icon" href="{{ asset('/img/favicon.png') }}" type="image/x-icon">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-dark bg-transparent">
            <img class="absolute blur-navbar-blue" src="{{ asset('img/blur-navbar/blue.svg') }}" alt="">
            <img class="absolute blur-navbar-red" src="{{ asset('img/blur-navbar/red.svg') }}" alt="">
            <img class="absolute blur-navbar-yellow" src="{{ asset('img/blur-navbar/yellow.svg') }}" alt="">
            <div class="container">
                <a class="navbar-brand" href="/">
                    <img src="{{ asset('img/logo.png') }}" alt="">
                </a>

                @guest
                    @if (Route::has('login'))
                        <a class="btn btn-purple" href="{{ route('login') }}">{{ __('Login') }}</a>
                    @endif
                @else
                    <div class="nav-item dropdown">
                        <a id="navbarDropdown" class="btn btn-purple" href="#" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->username }}
                        </a>


                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            @if (auth()->user()->isAdmin())
                                <a class="dropdown-item" href="{{ route('admin.index') }}">
                                    {{ __('Dashboard') }}
                                </a>
                            @else
                                <a class="dropdown-item" href="{{ route('votes.index') }}">
                                    {{ __('Vote Now') }}
                                </a>
                            @endif


                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </div>
                @endguest
            </div>
        </nav>

        <main class="min-vh-airlangga">
            @yield('content')
        </main>

        <footer class="mt-5">
            <p>Developed by MPK Satriya Adhijaya & <a href="https://instagram.com/osorateam" rel="noopener noreferrer" target="_blank">OSORA TEAM</a></p>
        </footer>
    </div>
</body>

</html>
