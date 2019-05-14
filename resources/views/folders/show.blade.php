@extends ("layouts.layout")

@section("CSS")
    <link href="css/style_folders.css" rel="stylesheet" media="all">
@endsection

@section("content")
    <h2>{{$folder->name}}</h2>
    <p>Id du folder : {{$folder->id}}</p>
    <a href="{{route('picture.create')}}">Ajouter une photo</a>
    @foreach ($pictures as $picture)
        {{$picture->info}}
    @endforeach
@endsection