@extends ("layouts.layout")

@section("CSS")
    <link href="css/style_pictures.css" rel="stylesheet" media="all">
@endsection

@section("content")
    <h2>Toutes les photos</h2>
    <a href="{{route('picture.create')}}">Ajouter une photo</a>
    @foreach ($pictures as $picture)
        {{$picture->info}}

        <a href="{{route('picture.show', $picture->id)}}"><div class="miniature">{{$picture->info}}</div></a>
        <a href="{{route('picture.edit', $picture->id)}}">Modifier</a>
        <form action="{{ route('picture.destroy', $picture->id)}}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit">Supprimer</button>
        </form>
    @endforeach
@endsection