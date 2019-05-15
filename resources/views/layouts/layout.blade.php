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
<div id="bloc_page">
    <h1>Clément Muller</h1>
    @if (Session::has('status'))
        <ul>
            <li>{!! session('status') !!}</li>
        </ul>
    @endif

    @yield('content')
</div>
</body>
</html>