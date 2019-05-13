@extends ("layouts.layout")

@section("CSS")
    <link href="CSS/style_folders.css" rel="stylesheet" media="all">
@endsection

@section("content")
    <h2>La Galerie Photo</h2>
    <a href="{{route('folder.create')}}">Nouveau dossier</a>
    @foreach ($folders as $folder)
        <a href="{{route('folder.show', $folder->id)}}"><div class="folders">{{$folder->name}}</div></a>
        <a href="{{route('folder.edit', $folder->id)}}">Modifier</a>
        <form action="{{ route('folder.destroy', $folder->id)}}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit">Supprimer</button>
        </form>
    @endforeach
@endsection