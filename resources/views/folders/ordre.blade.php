@extends ("layouts.layout")

@section('title')
    <title>Clément Muller - Galerie - Modifier l'ordre des dossiers</title>
    <meta name="description" content="Formulaire pour modifier l'ordre des dossiers de la Galerie"/>
@endsection

@section("content")
    <h2>Modifier l'ordre</h2>
    <div id="menu">
        @foreach ($folders as $folder)
            <div class="miniature">
                <div class="button">
                    <div class="fond">
                        <img src="/storage/miniatures/pictures/{{$folder->slider_pictures->first()->link}}" alt="{{$folder->slider_pictures->first()->alternative}}"/>
                    </div>
                    <h2>
                        {{$folder->name}}
                    </h2>
                </div>
                <form method="post" action="{{route('folder.ordre.update', [$folder->slug])}}" class="sliderForm">
                    @csrf
                    <label>Slider :</label>
                    <input type="text" name="ordre" value="{{old("ordre")?:$folder->ordre}}"/>
                    <input type="submit" value="Modifier"/>
                </form>
            </div>
        @endforeach
    </div>
@endsection