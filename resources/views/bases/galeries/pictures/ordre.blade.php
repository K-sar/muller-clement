@extends ("layouts.layout")

@section('title')
    <title>Clément Muller - Galerie - Modifier l'ordre du dossier {{$folder->name}}</title>
    <meta name="description" content="Formulaire de modification de l'ordre des photos du dossier {{$folder->name}}"/>
@endsection

@section("nav")
    <div><a href="{{route('folder.show', $folder->slug)}}"><h3><i class="fas fa-arrow-left"></i></h3></a></div>
@endsection

@section("content")
    <h2>Modifier l'ordre</h2>
    <div id="menu">
        @foreach ($pictures as $picture)
            <div class="miniature photo">
                <div class="button photo">
                    <div class="fond photo">
                        <img src="/storage/miniatures/pictures/{{$picture->link}}" alt="{{$picture->alternative}}"/>
                    </div>
                </div>
                <form method="post" action="{{route('picture.ordre.update', [$folder->slug, $picture->slug])}}" class="sliderForm">
                    @csrf
                    <label>Ordre :</label>
                    <input type="text" name="ordre" value="{{old("ordre")?:$picture->ordre}}"/>
                    <input type="submit" value="Modifier"/>
                </form>
            </div>
        @endforeach
    </div>
@endsection