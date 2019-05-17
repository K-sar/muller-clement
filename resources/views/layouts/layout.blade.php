<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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
</body>
</html>