<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Texugo') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Bowlby+One+SC&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Alatsi&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
</head>
<body>
    <div id="app">
        <header id="header">
            <nav class="navbar navbar-expand-md shadow navbar-light">
                <div class="container">
                    <a class="navbar-brand nav-title" href="{{ url('/') }}">
                        {{-- <img src="{{ asset('images/texugo-100.png') }}" width="40" height="40" alt=""> --}}
                        {{ config('app.name', 'Laravel') }} <!--<span class="text-muted h6">.net</span>-->
                    </a>

                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav mr-auto">

                        </ul>

                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto">

                            <!-- Authentication Links -->
                            @guest
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('index') }}">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tooltip" data-placement="bottom" title="Vídeo com play automatico" href="{{ route('presentation') }}">Apresentações</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}">{{ __('Cadastrar') }}</a>
                                    </li>
                                @endif
                            @else
                                @if (Auth::user()->is_admin == 1)
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('admin.users.index') }}">Usuários</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('post.index') }}">Posts</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('tag.index') }}">Tags</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('postPhoto.index') }}">Fotos</a>
                                    </li>
                                @else
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tooltip" data-placement="bottom" title="Vídeo com play automatico" href="{{ route('presentation') }}">Apresentações</a>
                                    </li>
                                @endif
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }} <span class="caret"></span>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('user.index') }}">
                                            {{ __('Perfil') }}
                                        </a>
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- Laracast flash -->
            <div class="text-center h5">
                @include('flash::message')
            </div>
            <!-- End Laracast Flahs -->
        </header>

        <main class="py-4">
            @yield('content')
        </main>
        <footer class="text-center footer">
            <div class="py-4">
                <small class="text-muted">Copyright &copy; Texugo desenvolvedor</small>
            </div>
        </footer>
    </div>
</body>
</html>
