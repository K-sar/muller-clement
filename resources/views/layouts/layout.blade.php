<!doctype html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <link rel="icon" type="image/x-icon" href="/storage/miniatures/favicon.ico"/>
        @yield('CSS')
        @yield('title')

        <meta property="og:title" content="Clément Muller"/>
        <meta property="og:type" content="website"/>
        <meta property="og:url" content="https://www.muller-clement.com"/>
        <meta property="og:image" content="https://www.muller-clement.com/storage/portfolio/c4e85dcf547ed5ac0501d9007a7da5eb.jpg"/>
        <meta property="og:description" content="Mon site, avec mon CV, mon portfolio et mes photos"/>

        <meta name="twitter:card" content="summary">
        <meta name="twitter:site" content="@publisher_handle">
        <meta name="twitter:title" content="Clément Muller">
        <meta name="twitter:description" content="Mon site, avec mon CV, mon portfolio et mes photos">
        <meta name="twitter:creator" content="Clément Muller">
        <meta name="twitter:image" content="https://www.muller-clement.com/storage/portfolio/c4e85dcf547ed5ac0501d9007a7da5eb.jpg">

        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link href="{{ mix('/css/app.css') }}" rel="stylesheet" media="all">
        @yield ('CSS')
        <script src="https://kit.fontawesome.com/6f85f396e0.js"></script>
    </head>
    <body>
        <div id="divHeader">
            <header>
                <a href="/">
                    <h1 id="ClementMuller">Clément Muller</h1>
                </a>
                <div class="nav">
                    <div class="responsiveNav"><i class="fas fa-bars"></i></div>
                    <nav>
                        <div>
                            <a href="/">
                                <h3><i class="fas fa-home"></i></h3>
                            </a>
                        </div>
                        <div>
                            <a href="/CV">
                                <h3>CV</h3>
                            </a>
                        </div>
                        <div>
                            <a href="/portfolio">
                                <h3>Portfolio</h3>
                            </a>
                        </div>
                        <div>
                            <a href="/galerie">
                                <h3>Galerie</h3>
                            </a>
                        </div>
                    @yield('nav')
                    <!-- Authentication Links -->
                        @guest
                            <div class="userIcon">
                                <h3><i class="far fa-user-circle"></i></h3>
                                <div class="userMenu">
                                    <a href="{{ route('login') }}">
                                        <h3>Connexion</h3>
                                    </a>
                                    @if (Route::has('register'))
                                        <a class="nav-link" href="{{ route('register') }}">
                                            <h3>Inscription</h3>
                                        </a>
                                    @endif
                                </div>
                            </div>
                        @else
                            <div class="userIcon">
                                <h3><i class="fas fa-user-circle"></i></h3>
                                <div class="userMenu">
                                    <a href="/home">
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
                                </div>
                            </div>
                        @endguest
                    </nav>
                </div>
            </header>
        </div>
        <div id="bloc_page">
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
