@extends ("layouts.layout")

@section("CSS")
    <link href="CSS/style_folders.css" rel="stylesheet" media="all">
@endsection

@section("content")
    <h2>La Galerie Photo</h2>
    @foreach ($folders as $folder)
        <a href="/photos/{{$folder->id}}"><div class="folders">{{$folder->name}}</div></a>
    @endforeach
    <a href="{{route('folder_create')}}">Nouveau dossier</a>
@endsection