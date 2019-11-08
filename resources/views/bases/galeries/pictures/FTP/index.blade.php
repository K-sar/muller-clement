@extends ("layouts.layout")

@section('title')
    <title>Clément Muller - Galerie - Toutes les photos @if (!empty($laserTag)) avec le tag : {{$laserTag->name}} @endif</title>
    <meta name="description" content="Liste de toutes les photos @if (!empty($laserTag)) avec le tag : {{$laserTag->name}} @endif"/>
@endsection

@section("content")
    <h2>Toutes les photos non triées </h2>
    <div id="menu">
        @foreach ($FTPs as $FTP)
                <div class="miniature photo relative">
                    <div class="menu-auth">
                        <a href="{{route('FTPAdd', [$FTP])}}"><button><i class="fas fa-plus"></i></button></a>
                        <a href="{{route('FTPDelete', [$FTP])}}"><button><i class="far fa-trash-alt"></i></button></a>
                    </div>
                    <div class="button photo">
                        <div class="fond photo">
                            <img src="/storage/pictures/{{$FTP}}" alt="bug"/>
                        </div>
                    </div>
                </div>
        @endforeach
    </div>
@endsection





