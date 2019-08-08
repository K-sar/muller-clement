<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ mix('/css/app.css') }}" rel="stylesheet" media="all">
    @yield('CSS')
    <title>Document</title>
</head>
<body>
<header>
    <h1 class="CM">Clément Muller</h1>
    <nav>
        <a href="/">
            <h3>Accueil</h3>
        </a>
        <a href="/CV">
            <h3>CV</h3>
        </a>
        <a href="/portfolio">
            <h3>Portfolio</h3>
        </a>
        <a href="/galerie">
            <h3>Galerie</h3>
        </a>
        @yield('nav')
            <!-- Authentication Links -->
        @guest
            <a href="{{ route('login') }}">
                <h3>Connexion</h3>
            </a>
            @if (Route::has('register'))
                <a class="nav-link" href="{{ route('register') }}">
                    <h3>Inscription</h3>
                </a>
            @endif
        @else
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                <h3>{{ Auth::user()->name }}</h3> <span class="caret"></span>
            </a>

                <a href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                    <h3>{{ __('Déconnexion') }}</h3>
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
        @endguest
    </nav>
</header>
<div id="bloc_page">
    <h1 class="CM">Clément Muller</h1>
    @if (Session::has('status'))
        <ul>
            <li>{!! session('status') !!}</li>
        </ul>
    @endif

    @yield('content')
</div>
<script src="{{ mix('/js/app.js') }}"></script>
</body>
</html>